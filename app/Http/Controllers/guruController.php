<?php

namespace App\Http\Controllers;

use App\guru;
use App\sosmed;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;


class guruController extends Controller
{
   public function insert(Request $request)
    {
        try{
        // tes
        $enf = $request->input('gambar');
        $filed = base64_decode($enf);
        $filename = 'profile-'.uniqid().'.webp';
        $filep = base_path().'/public/profile/'.$filename;
        file_put_contents($filep, $filed);
        // $gambar = url('/profile/'.$filename);
        
        $guru = new guru;
            // $guru
            $guru->niy_nip = $request->input('niy_nip');
            $guru->nama = $request->input('nama');
            $guru->url = Str::slug($request->input('nama'), '-');
            $guru->alamat = $request->input('alamat');
            $guru->ttl = $request->input('ttl');
            $guru->pend = $request->input('pend');
            $guru->jabatan = $request->input('jabatan');
            $guru->motto = $request->input('motto');
            $guru->gambar = 'https://api.smkbudimuliapakisaji.sch.id/profile/'.$filename.'';
            $guru->created_at = Carbon::now();
            $guru->updated_at = Carbon::now();
            $guru->save();
            
            // sosmed
        $sosmed = new sosmed;
            $sosmed->niy = $request->input('niy_nip');
            $sosmed->facebook = $request->input('fb');
            $sosmed->instagram = $request->input('ig');
            $sosmed->twitter = $request->input('tw');
            $sosmed->tiktok = $request->input('tk');
            $sosmed->linkedin = $request->input('ln');
            $sosmed->email = $request->input('em');
            $sosmed->created_at = Carbon::now();
            $sosmed->updated_at = Carbon::now();
            $sosmed->save();
            // return response()->json($guru);
            return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        }
    }
    
    public function update(Request $request, $id){
        try{
            $guru = guru::where('url','=', $id)->first();
        $filenew = $request->input('gambar');
        $image= base64_decode($request->input('gambar'));
        $f = finfo_open();
        $mime_type = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
        finfo_close($f);
        if(strpos($mime_type, 'image/') === 0){
            // hapus gambar lama
            $gambar = guru::where('url','=', $id)->first();
            $path = base_path().'/public/profile/'.$gambar->gambar;
            if(file_exists($path)){
                unlink($path);
            }
            // tes
            $enf = $request->input('gambar');
            $filed = base64_decode($enf);
            $filename = 'profile-'.uniqid().'.webp';
            $filep = base_path().'/public/profile/'.$filename;
            file_put_contents($filep, $filed);
            // $gambar = url('/upload/'.$filename);
            $filenew = 'https://api.smkbudimuliapakisaji.sch.id/profile/'.$filename.'';
            
        }
        
            // $guru
            // $guru
            $guru->niy_nip = $request->input('niy_nip');
            $guru->nama = $request->input('nama');
            $guru->url = Str::slug($request->input('nama'), '-');
            $guru->alamat = $request->input('alamat');
            $guru->ttl = $request->input('ttl');
            $guru->pend = $request->input('pend');
            $guru->jabatan = $request->input('jabatan');
            $guru->motto = $request->input('motto');
            $guru->gambar = $filenew;
            $guru->created_at = Carbon::now();
            $guru->updated_at = Carbon::now();
            $guru->save();
            
            // sosmed
            
        $sosmed = sosmed::where('niy','=',$request->input('niy_nip'))->first();
            $sosmed->niy = $request->input('niy_nip');
            $sosmed->facebook = $request->input('fb');
            $sosmed->instagram = $request->input('ig');
            $sosmed->twitter = $request->input('tw');
            $sosmed->tiktok = $request->input('tk');
            $sosmed->linkedin = $request->input('ln');
            $sosmed->email = $request->input('em');
            $sosmed->created_at = Carbon::now();
            $sosmed->updated_at = Carbon::now();
            $sosmed->save();
       
            // return response()->json($guru);
            return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        }
    }
    public function hapus($id){
        try{
            $gambar = guru::where('niy_nip','=', $id)->first();
            $path = base_path().'/public/profile/'.$gambar->gambar;
            if(file_exists($path)){
                unlink($path);
            }
            guru::where('niy_nip','=', $id)->delete();
            sosmed::where('niy','=', $id)->delete();
            return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        
        }
    }
    public function show($id){
        
        $data = guru::with('sosmed')->where('url','=', $id)->first();
        return response()->json($data);
        
    }
     public function all(){
        $guru = guru::with('sosmed')->get();
        return response()->json($guru);
    }
    
    
    
    
}