<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function indexKolaborator()
    {
        $title = 'Delete Data!';
        $text = "Apakah Kamu Yakin Akan Menghapus Data Ini?";
        confirmDelete($title, $text);
        $kolaborators = User::where('role', 'kolaborator')->get();
        return view('admin.kolaborator.index', compact('kolaborators'));
    }

    // Other methods for kolaborator management...
    public function createKolaborator()
    {
        return view('admin.kolaborator.add');
    }
    public function storeKolaborator(Request $request)
    {
        // Validate and store kolaborator data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'no_telp' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required', //
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'kolaborator';
        $user->deskripsi = $request->deskripsi;
        $user->no_telp = $request->no_telp;
        if ($request->hasFile('photo')) {
            $user->profile_photo_path = $request->file('photo')->store('kolaborator_photos');
        }
        $user->assignRole('kolaborator'); // Assign the kolaborator role
        $user->save();

        return redirect()->route('kolaborator.index.admin')->with('success', 'Kolaborator created successfully.');
    }
    public function showKolaborator($id)
    {
        // Logic to show kolaborator details by ID
        return view('admin.kolaborator.show', compact('id'));
    }
    public function editKolaborator($id)
    {

        // Logic to edit kolaborator by ID
        $kolaborator = User::findOrFail($id);
        if (!$kolaborator) {
            return redirect()->route('kolaborator.index.admin')->with('error', 'Kolaborator not found.');
        }

        return view('admin.kolaborator.edit', compact('kolaborator'));
    }
    public function updateKolaborator(Request $request, $id)
    {
        // Validate and update kolaborator data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',

            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'deskripsi' => 'required', //
            'alamat' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:15',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role = 'kolaborator';
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


        return redirect()->route('kolaborator.index.admin')->with('success', 'Kolaborator updated successfully.');
    }
    public function destroyKolaborator($id)
    {
        // Logic to delete kolaborator by ID
        $user = User::findOrFail($id);
        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
        }
        $user->delete();
        return redirect()->route('kolaborator.index.admin')->with('success', 'Kolaborator deleted successfully.');
    }

    public function costumer()
    {
        $user = User::where('role', 'user')->get();
        return view('admin.costumer.index', compact('user'));
    }

    public function ulasanKolaborator($id)
    {
        $title = 'Delete Data!';
        $text = "Apakah Kamu Yakin Akan Menghapus Data Ini?";
        confirmDelete($title, $text);
        $ulasan = Review::where('id_kolaborator', $id)->get();
        return view('admin.kolaborator.ulasankolab', compact('ulasan'));
    }

    public function aktifUlasan($id)
    {
        $ulasan = Review::find($id);

        if ($ulasan->status == 'aktif') {
            $ulasan->status = 'nonaktif';
            $ulasan->save();
            return redirect()->route('kolaborator.ulasan.admin', $ulasan->id_kolaborator);
        }
        if ($ulasan->status == 'nonaktif') {
            $ulasan->status = 'aktif';
            $ulasan->save();
            return redirect()->route('kolaborator.ulasan.admin', $ulasan->id_kolaborator);
        }
    }
}
