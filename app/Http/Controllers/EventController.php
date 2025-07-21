<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HargaEvent;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $title = 'Delete Data!';
        $text = "Apakah Kamu Yakin Akan Menghapus Data Ini?";
        confirmDelete($title, $text);
        $events = Event::all(); // Assuming you have an Event model
        return view('admin.event.index', compact('events')); // Adjust the view name as
    }
    public function create()
    {
        // Logic to show the form for creating a new event
        $kolaborators = \App\Models\User::where('role', 'kolaborator')->get();
        return view('admin.event.add', compact('kolaborators')); 
    }
    public function store(Request $request)
    {
        // Logic to store a new event in the database
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi_event' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'harga' => 'required|integer',
            'lokasi' => 'required|string',
            'kuota' => 'required|integer',
        ]);
        $event = new Event();
        $event->kolaborator_id = $request->kolaborator_id; 
        $event->nama_event = $request->nama_event;
        $event->deskripsi_event = $request->deskripsi_event;
        $event->tanggal = $request->tanggal;
        $event->waktu_mulai = $request->waktu_mulai;
        $event->harga = $request->harga;
        $event->lokasi = $request->lokasi;
        $event->maps = $request->maps;
        $event->link_zoom = $request->link_zoom;
        $event->kuota = $request->kuota;
        $event->keterangan = 'aktif';
        // Handle image upload if necessary
        if ($request->hasFile('gambar')) {
            $event->gambar = $request->file('gambar')->store('events', 'public');
        }
        $event->save();
        return redirect()->route('event.index')->with('success', 'Event created successfully.');
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $hargaevent = HargaEvent::where('event_id', $id)->get();
        return view('admin.event.show', compact('event','hargaevent')); // Adjust the view name as necessary
    }
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $kolaborators = \App\Models\User::where('role', 'kolaborator')->get();
        return view('admin.event.edit', compact('event', 'kolaborators')); // Adjust the view name as necessary
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi_event' => 'required|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'harga' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'kuota' => 'required|integer',
        ]);
        $event = Event::findOrFail($id);
        $event->kolaborator_id = $request->kolaborator_id; // Assuming the user is the kolaborator
        $event->nama_event = $request->nama_event;
        $event->deskripsi_event = $request->deskripsi_event;
        $event->tanggal = $request->tanggal;
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
        return redirect()->route('event.index')->with('success', 'Event updated successfully.');
    }
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->gambar) {
            Storage::disk('public')->delete($event->gambar);
        }
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }

    public function storeHargaEvent(Request $request, $id)
    {
        $request->validate([
            'nama_harga' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);
        $hargaEvent = new HargaEvent();
        $hargaEvent->event_id = $id;
        $hargaEvent->nama_harga = $request->nama_harga;
        $hargaEvent->harga = $request->harga;
        $hargaEvent->save();
        return redirect()->route('event.show', $id)->with('success', 'Harga event added successfully.');
    }

    public function peserta($id){

        $peserta = Pemesanan::with('event','user')->where('id_event', $id)->get();
        return view('admin.event.peserta', compact('peserta'));
    }
}
