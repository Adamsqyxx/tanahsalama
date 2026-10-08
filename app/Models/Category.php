<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
    'nama_kategori',
    'luas',
    'deskripsi',
    'harga',
    'booking_fee',
    'harga_cash',
    'cicilan_12',
    'cicilan_24',
    'cicilan_36',
    ];

    public function plots(): HasMany
    {
        return $this->hasMany(Plot::class);
    }
}
