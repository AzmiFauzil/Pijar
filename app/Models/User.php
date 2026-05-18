<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Sangat penting: Memberitahu Laravel nama tabelnya adalah 'user'
    protected $table = 'user';

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'nama_user',
        'NIS',
        'kelas',
        'no_telepon',
        'email',
        'password',
        'role'
    ];

    // Kolom yang disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casting tipe data
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}