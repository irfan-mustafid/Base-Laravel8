<?php

namespace App\Http\Controllers;

use App\Models\mPenawarans;

class Dashboard extends Controller
{
    public function index()
    {
        $data = mPenawarans::all();

        $d = [
            'data' => $data,
        ];
        // dd($d);
        return view('content.dashboard', $d);
    }
}
