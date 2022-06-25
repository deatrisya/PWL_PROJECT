<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanPengadaanController extends Controller
{
    public function index(Request $request){
        $pengadaan = Pengadaan::where('id', '!=', null);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        if($request->start_date || $request->end_date){
            $pengadaan->whereBetween('tgl_masuk',[$startDate , $endDate]);
        }

        $pengadaan = $pengadaan->orderBy('tgl_masuk')->paginate(5);

        return view('laporan.pengadaan.laporanPengadaanIndex',compact('pengadaan'))
        ->with('i',(request()->input('page',1)-1));

    }

    public function cetak_pdf(Request $request){
        $pengadaan = Pengadaan::where('id', '!=', null);

        $startDate = Carbon::parse($request->start_date)->toDateString();
        $endDate = Carbon::parse($request->end_date)->toDateString();

        if($request->start_date || $request->end_date){
            $pengadaan->whereBetween('tgl_masuk',[$startDate , $endDate]);
        }
        $pengadaan = $pengadaan->orderBy('tgl_masuk')->get();

        $pdf = PDF::loadview('laporan.pengadaan.pengadaan_cetakPdf',['pengadaan'=>$pengadaan,'startDate'=>$startDate,'endDate'=>$endDate])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
