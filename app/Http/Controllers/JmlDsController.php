<?php

namespace App\Http\Controllers;

use App\Data;

class JmlDsController extends Controller
{
    public function getLastDataId()
    {
        $last_id = Data::orderBy('id', 'desc')->first()->id;
        return response()->json(['last_id' => $last_id]);
    }
}