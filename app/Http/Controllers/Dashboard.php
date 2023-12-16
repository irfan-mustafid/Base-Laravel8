<?php

namespace App\Http\Controllers;

use App\Models\mPenawarans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


    public function getDataJaminan()
    {
        $data = mPenawarans::all();
        return response(['aaData' => $data]);
    }

    public function simpan(Request $request)
    {
        try {
            DB::beginTransaction();
            $post = $request->all();
            $setUpdateOrCreate = [
                'project_name' => $post['project_name'],
            ];
            mPenawarans::updateOrCreate(['tender_id' => $post['id']], $setUpdateOrCreate);

            DB::commit();
            return response([
                "status" => true,
                "pesan" => "Success",
            ]);
        } catch (\Throwable $th) {
            return response([
                "status" => false,
                "pesan" => $th->getMessage(),

            ], 400);
        }
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
