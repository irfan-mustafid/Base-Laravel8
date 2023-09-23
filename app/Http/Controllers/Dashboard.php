<?php

namespace App\Http\Controllers;

use App\Models\mPenawarans;
use Illuminate\Http\Request;

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

    public function simpan(Request $request)
    {
        $post = $request->all();
        // dd($post['project_name']);
        $setUpdateOrCreate = [
            'project_name' => $post['project_name'],
        ];
        mPenawarans::updateOrCreate(['tender_id' => $post['id']], $setUpdateOrCreate);
    }
}
