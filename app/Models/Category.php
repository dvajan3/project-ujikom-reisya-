<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_kategori', 'id_kategori');
    }

    // Accessor untuk kompatibilitas dengan view lama
    public function getNameAttribute()
    {
        return $this->nama_kategori;
    }
}