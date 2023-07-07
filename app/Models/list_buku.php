<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_buku extends Model
{
    use HasFactory;

    protected $table = 'list_bukus';

    protected $fillable = [
        'judul_buku', 'slug', 'deskripsi', 'kategori_id', 'penulis_id'
    ];

    protected $hidden = [];

    public function kategori_bukus(){
        return $this->belongsTo(kategori_buku::class, 'kategori_id', 'id');
    }

    public function penulis_bukus(){
        return $this->belongsTo(penulis_buku::class, 'penulis_id', 'id');
    }

    // users ini yang akan di panggil di artikel.index
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}