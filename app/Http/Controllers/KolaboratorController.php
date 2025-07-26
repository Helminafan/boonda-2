<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HargaEvent;
use App\Models\Pemesanan;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KolaboratorController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $events = Event::where('kolaborator_id', $id)->get();
        return view('kolaborator.home', compact('events'));
    }

    public function eventkolaborator()
    {
        $id = Auth::user()->id;
        $events = Event::where('kolaborator_id', $id)->get(); // Assuming you have an Event model
        return view('kolaborator.kegiatan.index', compact('events')); // A
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $hargaevent = HargaEvent::where('event_id', $id)->get();
        return view('kolaborator.kegiatan.show', compact('event', 'hargaevent')); // Adjust the view name as necessary
    }

    public function peserta($id)
    {

        $peserta = Pemesanan::with('event', 'user')->where('id_event', $id)->get();
        return view('kolaborator.kegiatan.peserta', compact('peserta'));
    }

    public function updateKolaborator(Request $request, $id)
    {
        // Validate and update kolaborator data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required', //
            'alamat' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:15',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->deskripsi = $request->deskripsi;
        $user->alamat = $request->alamat;
        $user->no_telp = $request->no_telp;
        if ($request->hasFile('photo')) {
            if ($user->profile_photo_path) {
                Storage::delete($user->profile_photo_path);
            }
            $user->profile_photo_path = $request->file('photo')->store('kolaborator_photos');
        }
        $user->save();

        return redirect()->route('kolaborator.home')->with('success', 'Kolaborator updated successfully.');
    }

    public function ulasanKolabor()
    {
        $id = Auth::user()->id;
        $title = 'Delete Data!';
        $text = "Apakah Kamu Yakin Akan Menghapus Data Ini?";
        confirmDelete($title, $text);
        $ulasan = Review::where('id_kolaborator', $id)->get();
        return view('kolaborator.kegiatan.viewulasankolab', compact('ulasan'));
    }

    public function aktifUlasan($id)
    {
        $ulasan = Review::find($id);

        if ($ulasan->status == 'aktif') {
            $ulasan->status = 'nonaktif';
            $ulasan->save();
            return redirect()->route('kolaborator.ulasan.view', $ulasan->id_kolaborator);
        }
        if ($ulasan->status == 'nonaktif') {
            $ulasan->status = 'aktif';
            $ulasan->save();
            return redirect()->route('kolaborator.ulasan.view', $ulasan->id_kolaborator);
        }
    }

    public function destroyUlasan(string $id)
    {
        $data = Review::find($id);
        $data->delete();
        return redirect()->route('kolaborator.ulasan.view')->with('success', 'Data berhasil dihapus.');
    }

      public function createEvent()
    {
        // Logic to show the form for creating a new event
      
        return view('kolaborator.kegiatan.add'); 
    }

    public function storeEvent(Request $request)
    {
        // Logic to store a new event in the database
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi_event' => 'required|string',
            'tanggal' => 'required|date',
            'kota' => 'required|string|max:255',
            'fasilitas' => 'required|string|max:255',
            'waktu_mulai' => 'required|date_format:H:i',
            'harga' => 'required|integer',
            'lokasi' => 'required|string',
            'kuota' => 'required|integer',
        ]);
        $event = new Event();
        $event->kolaborator_id = Auth::user()->id; 
        $event->nama_event = $request->nama_event;
        $event->deskripsi_event = $request->deskripsi_event;
        $event->tanggal = $request->tanggal;
        $event->waktu_mulai = $request->waktu_mulai;
        $event->harga = $request->harga;
        $event->lokasi = $request->lokasi;
        $event->kota = $request->kota;
        $event->fasilitas = $request->fasilitas;
        $event->maps = $request->maps;
        $event->link_zoom = $request->link_zoom;
        $event->kuota = $request->kuota;
        $event->keterangan = 'aktif';
        // Handle image upload if necessary
        if ($request->hasFile('gambar')) {
            $event->gambar = $request->file('gambar')->store('events', 'public');
        }
        $event->save();
        return redirect()->route('kolaborator.event.view')->with('success', 'Event created successfully.');
    }
    public function editEvent($id)
    {
        $event = Event::findOrFail($id);
        $kolaborators = \App\Models\User::where('role', 'kolaborator')->get();
        return view('kolaborator.kegiatan.edit', compact('event', 'kolaborators')); // Adjust the view name as necessary
    }
    public function updateEvent(Request $request, $id)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi_event' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'fasilitas' => 'required',
            'kota' => 'required',
            'harga' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'required|integer',
        ]);
        $event = Event::findOrFail($id);
        $event->kolaborator_id = Auth::user()->id; // Assuming the user is the kolaborator
        $event->nama_event = $request->nama_event;
        $event->deskripsi_event = $request->deskripsi_event;
        $event->tanggal = $request->tanggal;
        $event->kota = $request->kota;
        $event->fasilitas = $request->fasilitas;
        $event->waktu_mulai = $request->waktu_mulai;
        $event->harga = $request->harga;
        $event->lokasi = $request->lokasi;
        $event->kuota = $request->kuota;
        // Handle image upload if necessary
        if ($request->hasFile('gambar')) {
            if ($event->gambar) {
                Storage::disk('public')->delete($event->gambar);
            }
            $event->gambar = $request->file('gambar')->store('events', 'public');
        }
        $event->save();
        return redirect()->route('kolaborator.event.view')->with('success', 'Event updated successfully.');
    }
    public function destroyEvent($id)
    {
        $event = Event::findOrFail($id);
        if ($event->gambar) {
            Storage::disk('public')->delete($event->gambar);
        }
        $event->delete();
        return redirect()->route('kolaborator.event.view')->with('success', 'Event deleted successfully.');
    }
}
