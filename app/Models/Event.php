<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'kolaborator_id',
        'nama_event',
        'deskripsi_event',
        'tanggal',
        'waktu_mulai',
        'harga',
        'lokasi',
        'gambar',
        'kuota',
        'status',
    ];
    public function kolaborator()
    {
        return $this->belongsTo(User::class, 'kolaborator_id');
    }
}
