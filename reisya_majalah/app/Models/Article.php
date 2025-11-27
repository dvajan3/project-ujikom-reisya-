<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'id_user',
        'id_kategori',
        'foto',
        'status'
    ];

    protected $casts = [
        'tanggal' => 'date'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori', 'id_kategori');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Accessor untuk kompatibilitas dengan view lama
    public function getTitleAttribute()
    {
        return $this->judul;
    }

    public function getContentAttribute()
    {
        return $this->isi;
    }

    public function getIsFeaturedAttribute()
    {
        return $this->status === 'published';
    }

    public function getCategoryIdAttribute()
    {
        return $this->id_kategori;
    }
}