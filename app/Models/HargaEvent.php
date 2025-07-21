<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaEvent extends Model
{
    use HasFactory;
    protected $table = 'hargaevent';
    public $timestamps = true;
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
