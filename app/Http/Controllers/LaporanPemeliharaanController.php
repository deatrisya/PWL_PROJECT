<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;

class LaporanPemeliharaanController extends Controller
{
    public function pemeliharaan(Request $request)
    {
        $pagination = 5;
        $pemeliharaan = Pemeliharaan::when($request->keyword, function ($query) use ($request){
            $query
            ->where('tgl_pemeliharaan','like',"%{$request->keyword}%")
            ->orWhere('jumlah','like',"%{$request->keyword}%")
            ->orWhereHas('user', function (Builder $pemeliharaan) use ($request){
                $pemeliharaan->where('nama','like',"%{$request->keyword}%");
            })
            ->orWhereHas('barang', function (Builder $pemeliharaan) use ($request){
                $pemeliharaan->where('nama_barang','like',"%{$request->keyword}%");
            });
        })->orderBy('id')
        ->paginate($pagination);

        return view('laporan.pemeliharaan.laporanPemeliharaanIndex',compact('pemeliharaan'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    public function cetak_pdf(){
        $pemeliharaan = Pemeliharaan::all();
        $pdf = PDF::loadview('laporan.pemeliharaan.pemeliharaan_cetakPdf',['pemeliharaan'=>$pemeliharaan])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
