<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;

class Gedung extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jumlah',
        'inventaris_id',
        'inventaris_kategori_id',
    ];

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class, 'inventaris_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'inventaris_kategori_id');
    }

}
