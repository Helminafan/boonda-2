<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HargaEvent;
use App\Models\Pemesanan;
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
            'email' => 'required|email|unique:users,email,'. $id,
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
}
