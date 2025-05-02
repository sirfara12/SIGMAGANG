<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table = 'skill';
    protected $primaryKey = 'id';
    protected $fillable = ['nama'];

    public function lowongans() {
        return $this->belongsToMany(Lowongan::class);
    }   
    public function mahasiswa() {
        return $this->belongsToMany(Mahasiswa::class);
    }   
}
