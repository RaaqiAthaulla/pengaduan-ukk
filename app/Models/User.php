<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'nik',
        'tlp',
        'email',
        'password',
    ];

    // public function isAdmin()
    // {
    //     return $this->role === 'Admin';
    // }

    // public function isUser()
    // {
    //     return $this->role === 'User';
    // }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id', 'id_user');
    }

    public function masyarakat()
    {
        return $this->hasMany(Masyarakat::class);
    }
    public function tanggapan()
    {
        return $this->belongsTo(tanggapan::class, 'id', 'id_petugas');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeRoleUser($query)
    {
        return $query->where('role', 'User');
    }

    public function scopeRolePetugas($query)
    {
        return $query->where('role', 'petugas');
    }
}
