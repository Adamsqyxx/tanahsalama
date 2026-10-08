<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
    'booking_id',
    'metode_pembayaran',
    'jenis_pembayaran',
    'tenor',
    'cicilan_ke',
    'jumlah',
    'tanggal_pembayaran',
    'bukti_pembayaran',
    'status',
    'catatan_admin',
    'verified_at',
    ];

    protected $casts = [
    'tanggal_pembayaran' => 'datetime',
    'verified_at' => 'datetime',
    'jumlah' => 'decimal:2',
    'tenor' => 'integer',
    'cicilan_ke' => 'integer',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}