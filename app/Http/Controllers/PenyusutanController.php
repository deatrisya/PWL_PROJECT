<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penyusutan;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenyusutanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

        return view('transaksi.penyusutan.penyusutanIndex',compact('penyusutan'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $barang = Barang::all();
        $ruangan = Ruangan::all();

        return view('transaksi.penyusutan.penyusutanCreate',
        [
            'user' => $user,
            'barang' => $barang,
            'ruangan' => $ruangan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate(
            [
                'tgl_keluar' => 'required|date',
                'jumlah' => 'required|numeric',
                'user_id' => 'required',
                'barang_id' => 'required',
                'ruangan_id' => 'required'
            ]
        );

        $penyusutan = new Penyusutan;
        $penyusutan -> user_id = $request-> user_id;
        $penyusutan -> barang_id = $request -> barang_id;
        $penyusutan -> ruangan_id = $request -> ruangan_id;
        $penyusutan -> tgl_keluar = $request-> tgl_keluar;
        $penyusutan -> jumlah = $request -> jumlah;

        $barang = Barang::where('id',$request->barang_id);
        $valueBarang = $barang->value('stok');
        $barang->update(['stok' => $valueBarang - $request->jumlah]);

        $penyusutan -> save();
        Alert::success('Success','Barang Keluar Berhasil Ditambahkan');
        return redirect()->route('penyusutan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyusutan  $penyusutan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penyusutan = Penyusutan::find($id);
        return view ('transaksi.penyusutan.penyusutanDetail',compact('penyusutan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyusutan  $penyusutan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penyusutan = Penyusutan::findOrFail($id);
        $user = User::all();
        $barang = Barang::all();
        $ruangan = Ruangan::all();
        return view('transaksi.penyusutan.penyusutanEdit',compact('penyusutan','user','barang','ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penyusutan  $penyusutan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate(
            [
                'tgl_keluar' => 'required|date',
                'jumlah' => 'required|numeric',
                'barang_id' => 'required',
                'ruangan_id' => 'required',
            ]
        );

        $penyusutan= Penyusutan::findOrFail($id);
        $penyusutan-> barang_id = $request -> barang_id;
        $penyusutan-> ruangan_id = $request -> ruangan_id;
        $penyusutan-> tgl_keluar = $request-> tgl_keluar;
        $penyusutan-> jumlah = $request -> jumlah;

        $barang = Barang::where('id',$request->barang_id);
        $valueBarang = $barang->value('stok');

        $valuePenyusutan =Penyusutan::where('id',$id)->value('jumlah');

        if ($request->jumlah >= $valuePenyusutan) {
            $hitungSelisih = $request->jumlah - $valuePenyusutan;
            $barang->update(['stok' => $valueBarang - $hitungSelisih]);

        } elseif($request->jumlah <= $valuePenyusutan) {
            $hitungSelisih = $valuePenyusutan - $request->jumlah;
            $barang->update(['stok' => $valueBarang + $hitungSelisih]);
        }

        $penyusutan -> save();

        Alert::success('Success','Barang Keluar Berhasil Diupdate');
        return redirect()->route('penyusutan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyusutan  $penyusutan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penyusutan = Penyusutan::find($id);
        $barang = $penyusutan->barang_id;

        $barang = Barang::where('id',$barang);
        $valueBarang = $barang->value('stok');

        $valuePengadaan =Penyusutan::where('id',$id)->value('jumlah');

        $barang->update(['stok' => $valueBarang + $valuePengadaan]);
        $penyusutan->delete();

        Alert::success('Success','Barang Keluar Berhasil Dihapus');
        return redirect()->route('penyusutan.index');
    }
}
