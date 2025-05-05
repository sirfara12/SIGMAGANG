<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $primaryKey = 'id';
    protected $fillable = ['deskripsi','nama','email','bidang','alamat','no_telp'];

    public function lowongan(): HasMany
    {
        return $this->hasMany(Lowongan::class);
    }
}
