<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'username', 
        'email',
        'password',
        'role',
        'foto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Role methods
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isSiswa()
    {
        return $this->role === 'siswa';
    }

    public function isGuru()
    {
        return $this->role === 'guru';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    // Relationships
    public function articles()
    {
        return $this->hasMany(Article::class, 'id_user', 'id_user');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id_user');
    }
}
