<?php
namespace App;
use Illuminate\Database\Eloquent\Model;



class ModelOrtu extends Model{
    protected $table = 'data_ortu';

    public function data_siswa()
    {
        return $this->belongsTo('App\ModelPPDB');
    }
}