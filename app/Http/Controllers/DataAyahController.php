<?php

namespace App\Http\Controllers;

use App\ModelLihatDataAyah;
use Illuminate\Http\Request;

class DataAyahController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel yang terkait dengan model
        $data = ModelLihatDataAyah::all();

        // Kembalikan data dalam bentuk JSON
        return response()->json($data);
    }
}