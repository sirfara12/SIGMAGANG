<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class DosenPembimbing extends Model
{
    use HasFactory;
    protected $table = 'dosen_pembimbing';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nidn',
        'nama',
        'jabatan',
        'departemen',
        'no_telp',
        'preferensi_lokasi',
        'prodi_id',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function documents() {
        return $this->morphMany(Dokumen::class, 'documentable');
    }
}
