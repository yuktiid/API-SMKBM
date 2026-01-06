<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelLihatDataSiswa extends Model
{
    // Tentukan nama tabel yang terkait dengan model ini
    protected $table = 'data_siswa';
   

    // Tentukan nama kolom yang boleh diisi dalam tabel
    // protected $fillable = ['id', '', 'kolom3'];
}