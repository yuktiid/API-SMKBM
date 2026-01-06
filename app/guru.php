<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\sosmed;

class guru extends Model
{
    // Tentukan nama tabel yang terkait dengan model ini
    protected $table = 'gurus';

    // Tentukan nama kolom yang boleh diisi dalam tabel
    // protected $fillable = ['id', '', 'kolom3'];
    public function sosmed(){
        return $this->hasMany(sosmed::class, 'niy','niy_nip');
    }
}