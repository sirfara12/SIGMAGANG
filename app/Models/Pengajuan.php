<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    
    protected $fillable = [
        'mahasiswa_id',
        'lowongan_id',
        'status',
        'skor_spk',
        'catatan'
    ];

    protected $casts = [
        'status' => 'string',
        'skor_spk' => 'float'
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class);
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    public function isAccepted(): bool
    {
        return $this->status === 'accepted';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function canReapply(): bool
    {
        return $this->isRejected();
    }

    public function scopeForMahasiswa($query, $mahasiswaId)
    {
        return $query->where('mahasiswa_id', $mahasiswaId);
    }

    public function scopeForLowongan($query, $lowonganId)
    {
        return $query->where('lowongan_id', $lowonganId);
    }
}
