<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'formulir';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_pendaftaran',
        'jenis_pendaftaran',
        'jurusan',
        'nama_sekolah_alamat',
        'nama_lengkap',
        'jenis_kelamin',
        'status',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'no_hp',
        'email',
        'nama_ayah',
        'nama_ibu',
        'nama_wali',
        'alamat_ortu',
        'no_hp_ortu',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'status' => 'boolean'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password', // if you have password field
    ];
}
