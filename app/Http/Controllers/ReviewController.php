<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $kolaborator = Event::find($id);
        $review = new Review();
        $review->id_event = $kolaborator->id;
        $review->id_user = Auth::user()->id;
        $review->id_kolaborator = $kolaborator->kolaborator_id;
        $review->bintang = $request->bintang;
        $review->isi_review = $request->isi_review;
        $review->status = 'nonaktif';
        $review->save();
        return redirect()->route('user.review', $id)->with('success', 'Review Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Review::find($id);
        $data->delete();
        return redirect()->route('kolaborator.ulasan.admin', $data->id_kolaborator)->with('success', 'Data berhasil dihapus.');
    }
}
