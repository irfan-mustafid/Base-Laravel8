<?php

namespace App\Http\Controllers;

use App\Models\mPenawarans;
use Illuminate\Http\Request;

use function Psy\debug;

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

    public function getEditDetail(Request $request)
    {
        $id = $request->segment(3);
        $data = mPenawarans::find($id);
        $d = [
            'data' => $data,
        ];
        return view('content.edit', $d);
    }
}
