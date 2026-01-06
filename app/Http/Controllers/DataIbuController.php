<?php

namespace App\Http\Controllers;

use App\ModelLihatDataIbu;
use Illuminate\Http\Request;

class DataIbuController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel yang terkait dengan model
        $data = ModelLihatDataIbu::all();

        // Kembalikan data dalam bentuk JSON
        return response()->json($data);
    }
}