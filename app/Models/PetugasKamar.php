<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PetugasKamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'pasien_id',
        'assigned_at',
    ];

    // Mutator untuk assigned_at agar otomatis diubah menjadi format datetime yang benar
    public function setAssignedAtAttribute($value)
    {
        $this->attributes['assigned_at'] = Carbon::parse($value)->toDateTimeString();
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
}
