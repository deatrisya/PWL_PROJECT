<?php

namespace App\Http\Controllers;

use App\Models\Penyusutan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;

class LaporanPenyusutanController extends Controller
{
    public function penyusutan(Request $request)
    {
        $pagination = 5;
        $penyusutan = Penyusutan::when($request->keyword, function ($query) use ($request){
            $query
            ->where('tgl_keluar','like',"%{$request->keyword}%")
            ->orWhere('jumlah','like',"%{$request->keyword}%")
            ->orWhereHas('user', function (Builder $penyusutan) use ($request){
                $penyusutan->where('nama','like',"%{$request->keyword}%");
            })
            ->orWhereHas('barang', function (Builder $penyusutan) use ($request){
                $penyusutan->where('nama_barang','like',"%{$request->keyword}%");
            })
            ->orWhereHas('ruangan', function (Builder $penyusutan) use ($request){
                $penyusutan->where('nama_ruangan','like',"%{$request->keyword}%");
            });
        })->orderBy('id')
        ->paginate($pagination);

        return view('laporan.penyusutan.laporanpenyusutanIndex',compact('penyusutan'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    public function cetak_pdf(){
        $penyusutan = Penyusutan::all();
        $pdf = PDF::loadview('laporan.penyusutan.penyusutan_cetakPdf',['penyusutan'=>$penyusutan])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
