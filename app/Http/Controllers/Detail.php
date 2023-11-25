<?php

namespace App\Http\Controllers;

use App\Models\mPenawarans;
use Illuminate\Http\Request;

class Detail extends Controller
{
    public function index()
    {
        $data = mPenawarans::all();

        $d = [
            'data' => $data,
        ];
        dd($d);
        return view('content.edit', $d);
    }
}
