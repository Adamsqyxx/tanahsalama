<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    protected $fillable = [
        'kode_area',
        'nama_area',
        'deskripsi',
    ];

    public function plots(): HasMany
    {
        return $this->hasMany(Plot::class);
    }
}
