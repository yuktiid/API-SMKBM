<?php

namespace App\Http\Controllers;

use App\ModelLihatDataSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DataSiswaController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel yang terkait dengan model
        $data = ModelLihatDataSiswa::all();
        return response()->json($data);
    }
    public function datajoin($id)
    {

        $data = DB::table('data_siswa')
        ->join('data_ortu', 'data_siswa.nisn', '=', 'data_ortu.id_siswa')
        ->join('data_ortu_ibu', 'data_siswa.nisn', '=', 'data_ortu_ibu.id_siswa_ibu')
        ->join('data_ortu_wali', 'data_siswa.nisn', '=', 'data_ortu_wali.id_siswa_wali')
        ->select('data_siswa.*', 'data_ortu.*', 'data_ortu_ibu.*' , 'data_ortu_wali.*')
        ->where('data_siswa.id_users', $id)
        ->get();
        
        return response()->json($data); 
    }
}