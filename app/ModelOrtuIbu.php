<?php
namespace App;
use Illuminate\Database\Eloquent\Model;



class ModelOrtuIbu extends Model{
    protected $table = 'data_ortu_ibu';

    public function data_siswa()
    {
        return $this->belongsTo('App\ModelPPDB');
    }
}