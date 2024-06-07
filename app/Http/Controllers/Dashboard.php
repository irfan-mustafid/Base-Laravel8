<?php

namespace App\Http\Controllers;

use App\Models\mAllJaminan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Psy\debug;

class Dashboard extends Controller
{
    public function index()
    {
        $data = mAllJaminan::all();

        $d = [
            'data' => $data,
        ];
        // dd($d);
        return view('content.dashboard', $d);
    }


    public function getDataJaminan()
    {
        $statusArray = ['0', '4'];
        $data = mAllJaminan::whereIn('status', $statusArray)->whereProject_vendor_id('1')->get();
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
            mAllJaminan::updateOrCreate(['tender_id' => $post['id']], $setUpdateOrCreate);

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
        $data = mAllJaminan::find($id);
        $d = [
            'data' => $data,
        ];
        return view('content.edit', $d);
    }
}
