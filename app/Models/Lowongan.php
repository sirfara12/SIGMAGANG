<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lowongan extends Model
{
    use HasFactory;
    protected $table = 'lowongan';
    protected $primaryKey = 'id';
    protected $fillable = ['deskripsi','nama','persyaratan','batas_pendaftaran','lokasi','prodi_id','perusahaan_id','periode_id'];

    public function perusahaan(): BelongsTo
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function periode(): BelongsTo
    {
        return $this->belongsTo(Periode::class);
    }

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }

    public function dokumenLowongans(): HasMany
    {
        return $this->hasMany(DokumenLowongan::class);
    }
    public function skills() {
        return $this->belongsToMany(Skill::class);
    }
}