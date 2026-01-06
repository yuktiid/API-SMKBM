<?php

namespace App\Http\Controllers;

use App\logo;
use App\media;
use Exception;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    // media
        // show
        public function media(){
            $media = media::all();
            return response()->json($media);
        }
        // upload
        public function mediaup(Request $request){
            try{
            $enf = $request->input('gambar');
            $filed = base64_decode($enf);
            $filename = 'media-'.uniqid().'.jpg';
            $filep = base_path().'/public/media/'.$filename;
            file_put_contents($filep, $filed);
            
            
            $media = new media;
            $media->nama = $request->input('nama');
            $media->url = 'https://api.smkbudimuliapakisaji.sch.id/media/'.$filename.'';
            $media->gambar = 'https://api.smkbudimuliapakisaji.sch.id/media/'.$filename.'';
            $media->save();
            return response()->json([
                    'message' => 'ok',
                ],200);
            }catch(Exception $e){
                return response()->json([
                    'message' => 'not ok'
                ]);
            }
        }

    // logo
        // show
    public function logo(){
        $logo = logo::all();
        return response()->json($logo);
    }
    public function logos(Request $request){
        try{
        $enf = $request->input('gambar');
        $filed = base64_decode($enf);
        $filename = 'logo-'.uniqid().'.jpg';
        $filep = base_path().'/public/logo/'.$filename;
        file_put_contents($filep, $filed);
        
        
        $logo = new logo;
        $logo->nama = $request->input('nama');
        $logo->url = $request->input('url');
        $logo->gambar = 'https://api.smkbudimuliapakisaji.sch.id/logo/'.$filename.'';
        $logo->save();
        return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        }
    }
    
    public function logou(Request $request){
        try{
        $id = $request->input('id');
        $logo = logo::findOrFail($id);
        $filenew = $request->input('gambar');
        $image= base64_decode($request->input('gambar'));
        $f = finfo_open();
        $mime_type = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
        finfo_close($f);
        if(strpos($mime_type, 'image/') === 0){
            // hapus gambar lama
            $gambar = logo::find($id);
            $path = base_path().'/public/logo/'.$gambar->gambar;
            if(file_exists($path)){
                unlink($path);
            }
            // tes
            $enf = $request->input('gambar');
            $filed = base64_decode($enf);
            $filename = 'logo-'.uniqid().'.jpg';
            $filep = base_path().'/public/logo/'.$filename;
            file_put_contents($filep, $filed);
            $gambar = url('/logo/'.$filename);
            $filenew = 'https://api.smkbudimuliapakisaji.sch.id/logo/'.$filename.'';
        }
        $logo->nama = $request->input('nama');
        $logo->url = $request->input('url');
        $logo->gambar = $filenew;
        $logo->save();
        return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        }
        
    }
    public function logoh($id){
         try{
        // hapus
            $logo = logo::find($id);
            $logo->delete();
        return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        }
    }
    // coba
        public function getImages()
    {
        // Mengambil daftar gambar dari folder "public/upload"
        $imagePath = base_path('public/upload'); // Path ke folder "public/upload"
        $images = scandir($imagePath);

        // Filter dan hapus "." dan ".." dari daftar gambar
        $images = array_diff($images, ['.', '..']);
        
        // Fungsi usort untuk mengurutkan berdasarkan tanggal pembuatannya
        usort($images, function($a, $b) use ($imagePath) {
            return filemtime($imagePath . DIRECTORY_SEPARATOR . $b) - filemtime($imagePath . DIRECTORY_SEPARATOR . $a);
        });


        // Anda juga bisa menambahkan informasi tambahan atau mengatur format data lain yang sesuai
        // return response()->json(['images' => $images]);
        return response()->json($images);
    }
}





