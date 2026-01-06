<?php
namespace App;
use Illuminate\Database\Eloquent\Model;



class ModelOrtuWali extends Model{
    protected $table = 'data_ortu_wali';

    public function data_siswa()
    {
        return $this->belongsTo('App\ModelPPDB');
    }
}