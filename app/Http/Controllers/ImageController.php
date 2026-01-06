<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ModelNews;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use App\kategori;
use Illuminate\Support\Facades\DB;



class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //  insert
    public function insert(Request $request)
    {
        try{
        // tes
        $enf = $request->input('gambar');
        $filed = base64_decode($enf);
        $filename = 'news-'.uniqid().'.jpg';
        $filep = base_path().'/public/upload/'.$filename;
        file_put_contents($filep, $filed);
        $gambar = url('/upload/'.$filename);
        
        $news = new ModelNews;
            // $news
            $news->judul = $request->input('judul');
            $news->url = Str::slug($request->input('judul'), '-');
            $news->deskripsi = $request->input('deskripsi');
            $news->id_kategori = $request->input('idKat');
            $news->tag = $request->input('tag');
            $news->author = $request->input('author');
            $news->gambar = 'https://api.smkbudimuliapakisaji.sch.id/upload/'.$filename.'';
            $news->views = 0;
            $news->created_at = Carbon::now();
            $news->updated_at = Carbon::now();
            $news->save();
            // return response()->json($news);
            return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        }
    }
    
    // update
    public function update(Request $request, $id)
    {
        try{
            $news = ModelNews::findOrFail($id);
        $filenew = $request->input('gambar');
        $image= base64_decode($request->input('gambar'));
        $f = finfo_open();
        $mime_type = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
        finfo_close($f);
        if(strpos($mime_type, 'image/') === 0){
            // hapus gambar lama
            $gambar = ModelNews::find($id);
            $path = base_path().'/public/upload/'.$gambar->gambar;
            if(file_exists($path)){
                unlink($path);
            }
            // tes
            $enf = $request->input('gambar');
            $filed = base64_decode($enf);
            $filename = 'news-'.uniqid().'.jpg';
            $filep = base_path().'/public/upload/'.$filename;
            file_put_contents($filep, $filed);
            $gambar = url('/upload/'.$filename);
            $filenew = 'https://api.smkbudimuliapakisaji.sch.id/upload/'.$filename.'';
        }
        
            // $news
            $news->judul = $request->input('judul');
            $news->url = Str::slug($request->input('judul'), '-');
            $news->deskripsi = $request->input('deskripsi');
            $news->id_kategori = $request->input('idKat');
            $news->tag = $request->input('tag');
            $news->author = $request->input('author');
            $news->gambar = $filenew;
            $news->views = $request->input('views');
            $news->created_at = Carbon::now();
            $news->updated_at = Carbon::now();
            $news->save();  
       
            // return response()->json($news);
            return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        }
    }
    //all
    public function shown(){
        $news = ModelNews::with('kateg')->orderBy('id', 'DESC')->get();
        return response()->json($news);
    }
    // per nama terbaru
    public function showjudul(){
        $news1 = Modelnews::select('id')->orderBy('id', 'desc')->take('1')->get()[0];
        
        $news = ModelNews::with('kateg')->orderBy('created_at', 'desc')->take(3)->get();
        return response()->json([$news, $news1]);
    }


    // per id
    public function data($id){
        $news = ModelNews::with('kateg')->where('url','=', $id)->first();
        $date = Carbon::parse($news->created_at);
        $userTimezone = 'Asia/Jakarta';
        $convertedDate = $date->timezone($userTimezone);

        $news->increment('views');
        $news->created_at = $convertedDate;
        $news->updated_at = $convertedDate;
        // rekom
        $rekom = ModelNews::where('id_kategori','=', $news->id_kategori)->where('id', '!=', $news->id)->select('url','judul','gambar','views','updated_at')->take(6)->orderBy('id','desc')->get();
        foreach ($rekom as &$item) {
            $item->updated_at = Carbon::parse($item->created_at)->timezone('Asia/Jakarta');
        }
        // terkait
        
        $terkait = ModelNews::orderBy('views','desc')
        ->take(5)
        ->get();
        return response()->json([$news,$rekom,$terkait]);
    }
    
    // satu data
    public function datax($id){
    $news = ModelNews::with('kateg')->where('id','=',$id)->first();
        $date = Carbon::parse($news->created_at);
        $userTimezone = 'Asia/Jakarta';
        $convertedDate = $date->timezone($userTimezone);
            
        $news->created_at = $convertedDate;
        $news->updated_at = $convertedDate;
        
        $kat = kategori::where('id','!=', $news->id_kategori)->get();
        
     return response()->json([$news,$kat]);
    }
    
    public function hapusb($id){
        try{
        // hapus gambar lama
            $gambar = ModelNews::where('id','=',$id)->get()[0];
            $path = base_path().'/public/upload/'.$gambar->gambar;
            if(file_exists($path)){
                unlink($path);
            }
            $gambar->delete();
        return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        }    
    }
    
    // KATEGORI
    
    //all
    public function kategori(){
        $news = kategori::all();
        return response()->json($news);
    }
    // tambah
    public function inputkategori(Request $request){
         try{
             
        $kat = new kategori;
        
        $kat->kategori = $request->input('kategori');
        $kat->author = $request->input('author');
        $kat->created_at = Carbon::now();
        $kat->updated_at = Carbon::now();
        $kat->save();
            return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        
        }
    }
    // ubah
    public function updatekategori(Request $request ,$id){
        try{
        $kat = kategori::findOrFail($id);
        
        $kat->kategori = $request->input('kategori');
        $kat->author = $request->input('author');
        $kat->created_at = Carbon::now();
        $kat->updated_at = Carbon::now();
        $kat->save();
            return response()->json([
                'message' => 'ok',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message' => 'not ok'
            ]);
        
        }
    }
    // hapus
    public function hapuskategori($id) {
        try {
            $berita = ModelNews::where('id_kategori', '=' , $id)->select('id_kategori')->first();
            if ($berita) {
                return response()->json([
                    'message' => 'data masih digunakan',
                ], 200);
            } else {
                $kat = Kategori::findOrFail($id);
                $kat->delete();
                return response()->json([
                    'message' => 'ok',
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'not ok'
            ]);
        }
    }

    // where kategori
    public function kategoriid(){
        $sija = DB::table('news')
        ->where('id_kategori', '3')
        ->take(8)
        ->orderBy('created_at', 'DESC')
        ->get();
        $tkj = DB::table('news')
        ->where('id_kategori', '5')
        ->take(8)
        ->orderBy('created_at', 'DESC')
        ->get();
        $bd = DB::table('news')
        ->where('id_kategori', '7')
        ->orwhere('id_kategori', '8')
        ->take(8)
        ->orderBy('created_at', 'DESC')
        ->get();
        
        $dkv = DB::table('news')
        ->where('id_kategori', '4')
        ->orwhere('id_kategori', '6')
        ->take(8)
        ->orderBy('created_at', 'DESC')
        ->get();
        return response()->json([$sija, $tkj, $dkv, $bd]);
    }
    
    // searcing
        public function key(Request $request)
    {
        $keyword = $request->key;
        $data = ModelNews::orderBy('id', 'DESC')
        ->where('judul', 'LIKE', '%'.$keyword.'%')
        ->get();
        return response()->json($data);
    }
    
}
