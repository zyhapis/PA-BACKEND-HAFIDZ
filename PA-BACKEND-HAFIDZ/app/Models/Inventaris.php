<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventaris extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kategori_id',
        'jumlah',
        'harga',
        'kondisi',
    ];

    // Di dalam model Inventaris
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

}
