<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number', 'level_kamar_id', 'status'
    ];

    public function levelKamar()
    {
        return $this->belongsTo(LevelKamar::class, 'level_kamar_id');
    }
}
