<?php

namespace App\Http\Controllers;

use App\Models\Penyusutan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class LaporanPenyusutanController extends Controller
{
    public function penyusutan(Request $request)
    {
        $penyusutan = Penyusutan::where('id', '!=', null);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        if($request->start_date || $request->end_date){
            $penyusutan->whereBetween('tgl_keluar',[$startDate , $endDate]);
        }

        $penyusutan = $penyusutan->orderBy('tgl_keluar')->paginate(5);

        return view('laporan.penyusutan.laporanpenyusutanIndex',compact('penyusutan'))
            ->with('i',(request()->input('page',1)-1));
    }

    public function cetak_pdf(Request $request){
        $penyusutan = Penyusutan::where('id', '!=', null);

        $startDate = Carbon::parse($request->start_date)->toDateString();
        $endDate = Carbon::parse($request->end_date)->toDateString();

        if($request->start_date || $request->end_date){
            $penyusutan->whereBetween('tgl_keluar',[$startDate , $endDate]);
        }
        $penyusutan = $penyusutan->orderBy('tgl_keluar')->get();
        $pdf = PDF::loadview('laporan.penyusutan.penyusutan_cetakPdf',['penyusutan'=>$penyusutan,'startDate'=>$startDate,'endDate'=>$endDate])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
