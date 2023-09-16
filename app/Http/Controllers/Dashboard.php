<?php

namespace App\Http\Controllers;

use App\Models\mPenawaran;

class Dashboard extends Controller
{
    public function index()
    {
        $data = mPenawaran::all();
        dd($data);
        return view('content/dashboard', $data);
    }
}
