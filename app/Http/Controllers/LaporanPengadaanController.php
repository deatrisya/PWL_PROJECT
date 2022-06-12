<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanPengadaanController extends Controller
{
    public function pengadaan(Request $request){
        $pengadaan = Pengadaan::all();
        $pagination =5;
        return view('laporan.pengadaan.laporanPengadaanIndex',compact('pengadaan'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    public function cetak_pdf(){

        $pengadaan = Pengadaan::all();
        $pdf = PDF::loadview('laporan.pengadaan.pengadaan_cetakPdf',['pengadaan'=>$pengadaan])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
