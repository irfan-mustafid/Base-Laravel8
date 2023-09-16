<?php

namespace App\Http\Controllers;

use App\Models\mPenawaran;
use App\Models\mPenawarans;

class Dashboard extends Controller
{
    public function index()
    {
        $data = mPenawarans::all()->toArray();
        dd($data);
        return view('content/dashboard', $data);
    }
}
