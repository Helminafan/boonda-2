<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HargaEvent;
use App\Models\Image;
use App\Models\Pemesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userview()
    {
        $images = DB::table('images')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $events = DB::table('events')
            ->orderBy('created_at', 'desc')
            ->limit(9)
            ->get();

        return view('user.index', compact('images', 'events'));
    }


    public function detailcard($id)
    {
        $event = Event::where('id', $id)->first();
        $id_user = '';
        if (Auth::user()) {
            $id_user= Auth::user()->id;
        }
        $hargaevent = HargaEvent::where('event_id', $id)->get();
        $pemesanan = Pemesanan::where('id_user', $id_user)->where('id_event', $id)->get();


        if (!$event) {
            abort(404); // Event not found
        }
        return view('user.detailcard', compact('event', 'hargaevent','pemesanan'));
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


    public function katalog()
    {
        return view('user.katalog');
    }


    public function kolaborator()
    {
        return view('user.kolaborator');
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

        $pemesanan = new Pemesanan();
        $pemesanan->id_user = Auth::user()->id;
        $pemesanan->id_event = $request->id_event;
        $pemesanan->harga = $request->harga;
        $pemesanan->jenis_tiket = $request->jenis_tiket;
        $pemesanan->status = "sudah_bayar";
        $pemesanan->save();
        return redirect()->route('user.index')->with('success', 'pemesanan_berhasil');
    }

    public function kelasku_view()
    {

        $data = Pemesanan::where('id_user', Auth::user()->id)->get();
        return view('user.kelasku', compact('data'));
    }

    public function cetak($id)
    {
        $tiket = Pemesanan::with('event','user')->findOrFail($id);
        $tanggal = $tiket->created_at->format('Ymd');
        $idFormatted = str_pad($tiket->id, 5, '0', STR_PAD_LEFT); // contoh: 00023
        $kode_tiket = "$tanggal-$idFormatted";
        $pdf = Pdf::loadView('user.tiket', compact('tiket','kode_tiket'));
        return $pdf->stream('tiket.pdf');
    }
}
