<?php

namespace App\Http\Controllers;

use App\Models\mAllJaminan;
use App\Models\mDraftSurety;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Psy\debug;

class Dashboard extends Controller
{
    public function index()
    {
        // $session = Auth::user();
        // dd($session->username);
        $data = mAllJaminan::all();

        $d = [
            'data' => $data,
        ];
        // dd($d);
        return view('content.dashboard', $d);
    }


    public function getDataJaminan()
    {
        $tableProses = [];
        $session = Auth::user();
        $statusArray = ['0', '4'];
        $data = mAllJaminan::with(['toBowheerList'])
            // ->whereIn('status', $statusArray)
            ->whereProject_vendor_id($session->company_id)
            ->get();
        foreach ($data as $key => $value) {
            if ($value->type_jaminan == 'down_payment') {
                $spk_no = $value->contract_no;
            } else {
                $spk_no = $value->spk_no;
            }

            $counDraftSurety = $this->getDataDraftSurety($value->id, $value->type_jaminan)->count();

            if ($value->status == '0' && $counDraftSurety != '1') {
                $status = 'Menunggu Verifikasi Asuransi';
            } elseif ($value->status == '2') {
                $status = 'Asuransi Meminta Revisi (Kurang Dokumen)';
            } elseif ($value->status == '3') {
                $status = 'Ditolak Asuransi';
            } elseif ($value->status == '4') {
                $status = 'Menunggu pembayaran';
            } elseif ($value->status == '8') {
                $status = 'Surety Bond diterima';
            } elseif ($value->status == '11') {
                $status = 'Menunggu ACC Asuransi';
            } elseif ($value->status == '0' && $counDraftSurety == '1') {
                $status = 'Verifikasi Vendor (Draft Surety)';
            }


            $tableProses[] = [
                'id' => $value->id,
                'spk_no' => $spk_no,
                'project_name' => $value->project_name,
                'bond_value' => $value->bond_value,
                'status' => $status,
                'bowheer_list_name' => $value->toBowheerList['bowheer_list_name'],

            ];
        }
        return response(['aaData' => $tableProses]);
    }

    private function getDataDraftSurety()
    {
        $data = mDraftSurety::all();
        return $data;
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
