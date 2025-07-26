<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HargaEvent;
use App\Models\Image;
use App\Models\Pemesanan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userview(Request $request)
    {
        // Images tetap
        $images = DB::table('images')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $kolaboratoruser = User::where('role','kolaborator')->get();

        // Query Event awal (untuk filter dynamic)
        $query = DB::table('events');

        $kota = Event::all();

        // Filter Kota
        if ($request->filled('kota')) {
            $query->where('kota', $request->kota);
        }

        // Filter Kolaborator
        if ($request->filled('kolaborator_id')) {
            $query->where('kolaborator_id', $request->kolaborator_id);
        }

        // Filter Fasilitas
        if ($request->filled('fasilitas')) {
            $query->where('fasilitas', $request->fasilitas);
        }

        // Filter Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter Rating
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        // Ambil hasil akhir (limit 9)
        $events = $query->orderBy('created_at', 'desc')->limit(9)->get();

        // Iklan tetap
        $iklan = DB::table('events')->where('keterangan', 'aktif')->get();

        return view('user.index', compact('images', 'events', 'iklan', 'kolaboratoruser','kota'));
    }



    public function detailcard($id)
    {
        $event = Event::where('id', $id)->first();
        $id_user = '';
        if (Auth::user()) {
            $id_user = Auth::user()->id;
        }
        $hargaevent = HargaEvent::where('event_id', $id)->get();
        $pemesanan = Pemesanan::where('id_user', $id_user)->where('id_event', $id)->get();


        if (!$event) {
            abort(404); // Event not found
        }
        return view('user.detailcard', compact('event', 'hargaevent', 'pemesanan'));
    }



    public function galleri(Request $request)
    {
        $years = DB::table('images')
            ->select('tahun')
            ->distinct()
            ->orderBy('tahun', 'asc')
            ->limit(5)
            ->get();
        $years2 =
            DB::table('images')
            ->select('tahun')
            ->distinct()
            ->orderBy('tahun', 'asc')
            ->get();

        $selectedYear = $request->query('year', $years->first()->tahun);
        $images = DB::table('images')
            ->where('tahun', $selectedYear)
            ->get();

        return view('user.galleri', compact('years', 'images', 'selectedYear', 'years2'));
    }
    public function review($id)
    {
        $event = Event::find($id);
        return view('user.review', compact('event'));
    }


    public function katalog()
    {
        return view('user.katalog');
    }


    public function kolaborator($id)
    {
        $kolaborator = User::with('ulasan')->find($id);
        return view('user.kolaborator', compact('kolaborator'));
    }

    public function pembayaranevent(Request $request)
    {

        $harga = $request->harga;
        $username = Auth::user()->name;
        $email = Auth::user()->email;
        $phone = Auth::user()->no_telp;
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $harga,
            ),
            'customer_details' => array(
                'first_name' => $username,
                'email' => $email,
                'phone' => $phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return response()->json(['token' => $snapToken]);
    }

    public function pemesanan(Request $request)
    {
        DB::beginTransaction(); // Mulai transaksi database

        try {
            $event = Event::findOrFail($request->id_event);

            // Cek apakah kuota masih tersedia
            if ($event->kuota <= 0) {
                return redirect()->back()->with('error', 'Kuota tiket telah habis.');
            }

            // Kurangi kuota
            $event->kuota -= 1;
            $event->save();

            // Simpan pemesanan
            $pemesanan = new Pemesanan();
            $pemesanan->id_user = Auth::id(); // lebih ringkas
            $pemesanan->id_event = $request->id_event;
            $pemesanan->harga = $request->harga;
            $pemesanan->jenis_tiket = $request->jenis_tiket;
            $pemesanan->status = 'sudah_bayar';
            $pemesanan->save();

            DB::commit(); // Commit jika tidak error

            return redirect()->route('user.index')->with('success', 'Pemesanan berhasil.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika terjadi error

            return redirect()->back()->with('error', 'Terjadi kesalahan saat memesan: ' . $e->getMessage());
        }
    }

    public function kelasku_view()
    {

        $data = Pemesanan::where('id_user', Auth::user()->id)->get();
        return view('user.kelasku', compact('data'));
    }

    public function cetak($id)
    {
        $tiket = Pemesanan::with('event', 'user')->findOrFail($id);
        $tanggal = $tiket->created_at->format('Ymd');
        $idFormatted = str_pad($tiket->id, 5, '0', STR_PAD_LEFT); // contoh: 00023
        $kode_tiket = "$tanggal-$idFormatted";
        $pdf = Pdf::loadView('user.tiket', compact('tiket', 'kode_tiket'));
        return $pdf->stream('tiket.pdf');
    }
}
