<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class LaporanPemeliharaanController extends Controller
{
    public function pemeliharaan(Request $request)
    {
        $pemeliharaan = Pemeliharaan::where('id', '!=', null);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        if($request->start_date || $request->end_date){
            $pemeliharaan->whereBetween('tgl_pemeliharaan',[$startDate , $endDate]);
        }

        $pemeliharaan = $pemeliharaan->orderBy('tgl_pemeliharaan')->paginate(5);

        return view('laporan.pemeliharaan.laporanPemeliharaanIndex',compact('pemeliharaan'))
            ->with('i',(request()->input('page',1)-1));
    }

    public function cetak_pdf(Request $request){
        $pemeliharaan = Pemeliharaan::where('id', '!=', null);

        $startDate = Carbon::parse($request->start_date)->toDateString();
        $endDate = Carbon::parse($request->end_date)->toDateString();

        if($request->start_date || $request->end_date){
            $pemeliharaan->whereBetween('tgl_pemeliharaan',[$startDate , $endDate]);
        }
        $pemeliharaan = $pemeliharaan->orderBy('tgl_pemeliharaan')->get();

        $pdf = PDF::loadview('laporan.pemeliharaan.pemeliharaan_cetakPdf',['pemeliharaan'=>$pemeliharaan,'startDate'=>$startDate,'endDate'=>$endDate])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
