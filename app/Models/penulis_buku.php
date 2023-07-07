<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penulis_buku extends Model
{
    use HasFactory;

    protected $table = 'penulis_bukus';

    protected $fillable = [
        'nama_penulis', 'slug'
    ];

    protected $hidden = [];

    public function list_buku(){
        return $this->hasMany('App\Models\list_buku', 'kategori_id', 'id');
    }
    
    public function getRouteKeyName(){
        return 'slug';
    }
}
