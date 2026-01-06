<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as LumenBaseController;
use App\ModelPpdb;
use App\ModelOrtu;
use App\ModelOrtuIbu;
use App\ModelOrtuWali;
use Exception;
use PhpParser\Node\Stmt\TryCatch;
use Carbon\Carbon;

class PpdbController extends LumenBaseController
{


    public function insert(Request $request)
    {

        //membuat kode unik
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 4; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
   $idAcak= "2425OL".$randomString;
   $now = Carbon::now();
   // insert data siswa, ayah dan ibu
try{
      $data = new ModelPpdb();

   

            //input data Siswa

                $data->insert([

                    //'nama filed tabel DB' => 'nama endpoint'
                    'id_users'=>$idAcak,
                    'email' => $request->input('email'),
                    'nama_lengkap' => $request->input('namaSiswa'),
                    'jenis_kelamin' => $request->input('jkSiswa'),
                    'jurusan' => $request->input('jurusanSiswa'),
                    'tempat_lahir' => $request->input('tmpLahirSiswa'),
                    'tanggal_lahir' => $request->input('tglLahirSiswa'),
                    'agama' =>$request->input('agamaSiswa'),
                    'alamat' => $request->input('alamatSiswa'),
                    'rt' => $request->input('rtSiswa'),
                    'rw' => $request->input('rwSiswa'),
                    'kota_kab' => $request->input('kotaSiswa'),
                    'kode_pos' => $request->input('kodePosSiswa'),
                    'no_telp' => $request->input('noSiswa'),
                    'anak_ke' => $request->input('anakKeSiswa'),
                    'jmbl_s_kandung' => $request->input('saudaraSiswa'),
                    'jmbl_s_tiri' => $request->input('tiriSiswa'),
                    'bahasa' => $request->input('bahasaSiswa'),
                    'asal_sekolah' => $request->input('asalekolahSSiswa'),
                    'tgl_sttb' => $request->input('tglSttbSiswa'),
                    'no_sttb' =>$request->input('noSttbSiswa'),
                    'lama_belajar' => $request->input('lamaSiswa'),
                    'nisn' => $request->input('nisn'),
                    'referral' => $request->input('referal'),
                    'created_at' => $now,
                    'updated_at' => $now,

                ]);

        //insert data ayah
        $data = new ModelOrtu();

            $data->insert([
            // 'nama filed tabel DB' => 'nama endpoint'
            'id_siswa' => $request->input('idSiswa'),
            'nama_ayah' => $request->input('namaAyah'),
            'tempat_lahir_ayah'=>$request->input('tlAyah'),
            'tgl_lahir_ayah'=>$request->input('tgllAyah'),
            'hidup_mati_ayah'=>$request->input('hmAyah'),
            'wni_wna_ayah'=>$request->input('wwAyah'),
            'agama_ayah'=>$request->input('agamaAyah'),
            'alamat_ayah'=>$request->input('alamatAyah'),
            'rt_ayah'=>$request->input('rtAyah'),
            'rw_ayah'=>$request->input('rwAyah'),
            'kota_kab_ayah'=>$request->input('kotaAyah'),
            'kode_pos_ayah'=>$request->input('posAyah'),
            'no_telp_ayah'=>$request->input('noAyah'),
            'pend_terakhir_ayah'=>$request->input('ptAyah'),
            'pekerjaan_ayah'=>$request->input('kerjaAyah'),
            'penghasilan_ayah'=>$request->input('pengAyah'),
            'created_at' => $now,
            'updated_at' => $now,


            ]);

           //insert data ibu


        $data = new ModelOrtuIbu();

        $data->insert([
            //'nama filed tabel DB' => 'nama endpoint'
             'id_siswa_ibu' => $request->input('idSiswaIbu'),
             'nama_ibu' => $request->input('namaIbu'),
             'tempat_lahir_ibu'=>$request->input('tlIbu'),
             'tgl_lahir_ibu'=>$request->input('tgllIbu'),
             'hidup_mati_ibu'=>$request->input('hmIbu'),
             'wni_wna_ibu'=>$request->input('wwIbu'),
             'agama_ibu'=>$request->input('agamaIbu'),
             'alamat_ibu'=>$request->input('alamatIbu'),
             'rt_ibu'=>$request->input('rtIbu'),
             'rw_ibu'=>$request->input('rwIbu'),
             'kota_kab_ibu'=>$request->input('kotaIbu'),
             'kode_pos_ibu'=>$request->input('posIbu'),
             'no_telp_ibu'=>$request->input('noIbu'),
             'pend_terakhir_ibu'=>$request->input('ptIbu'),
             'pekerjaan_ibu'=>$request->input('kerjaIbu'),
             'penghasilan_ibu'=>$request->input('pengIbu'),
             'created_at' => $now,
             'updated_at' => $now,


        ]);

        $data = new ModelOrtuWali();

        $data->insert([
        //      //'nama filed tabel DB' => 'nama endpoint'
             'id_siswa_wali'=> $request->input('idSiswaWali'),
             'nama_wali'=> $request->input('namaWali'),
             'tempat_lahir_wali'=>$request->input('tlWali'),
             'tgl_lahir_wali'=>$request->input('tglWali'),
             'agama_wali'=>$request->input('agamaWali'),
             'alamat_wali'=>$request->input('alamatWali'),
             'hubungan_wali'=>$request->input('hubWali'),
             'pend_terakhir_wali'=>$request->input('ptWali'),
             'pekerjaan_wali'=>$request->input('kerjaWali'),
             'penghasilan_wali'=>$request->input('pengWali'),
             'created_at'=> $now,
             'updated_at'=> $now,
        ]);

        return response()->json([
            'message' => 'ok',
            'id_users'=>$idAcak,
            'nama_lengkap' => $request->input('namaSiswa'),


        ],200);
    }catch(Exception $e){
        return response()->json([
            'message' => 'not ok'
        ],500);
    }



    }
}