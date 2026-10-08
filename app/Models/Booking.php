<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    protected $fillable = [
    'plot_id',
    'kode_booking',
    'nama_pemesan',
    'no_hp',
    'email',
    'foto_ktp',
    'status',
    'booked_at',
    'expires_at',
    'confirmed_at',
];

    protected $casts = [
        'booked_at' => 'datetime',
        'expires_at' => 'datetime',
        'confirmed_at' => 'datetime',
    ];

    public function plot(): BelongsTo
    {
        return $this->belongsTo(Plot::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}

