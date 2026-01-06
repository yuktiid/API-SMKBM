<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\kategori;
class ModelNews extends Model
{
    // Tentukan nama tabel yang terkait dengan model ini
    protected $table = 'news';

    // Tentukan nama kolom yang boleh diisi dalam tabel
    // protected $fillable = ['id', '', 'kolom3'];
    
    public function kateg(){
        return $this->hasMany(kategori::class, 'id','id_kategori');
    }
   
}