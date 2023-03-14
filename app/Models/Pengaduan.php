<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    // protected $guarded = ['id_user'];  
    // protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'judul',
        'isi_laporan',
        'foto',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
