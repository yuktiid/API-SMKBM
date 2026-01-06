<?php

namespace App\Http\Controllers;

use App\ModelLihatDataWali;
use Illuminate\Http\Request;

class DataWaliController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel yang terkait dengan model
        $data = ModelLihatDataWali::all();

        // Kembalikan data dalam bentuk JSON
        return response()->json($data);
    }
}