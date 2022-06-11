<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengadaan;
use App\Models\Ruangan;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination =5;
        $pengadaan = Pengadaan::when($request->keyword, function ($query) use ($request){
            $query
            ->where('tgl_masuk','like',"%{$request->keyword}%")
            ->orWhere('jumlah','like',"%{$request->keyword}%")
            ->orWhere('sumber_dana','like',"%{$request->keyword}%")
            ->orWhereHas('user', function (Builder $pengadaan) use ($request){
                $pengadaan->where('nama','like',"%{$request->keyword}%");
            })
            ->orWhereHas('barang', function (Builder $pengadaan) use ($request){
                $pengadaan->where('nama_barang','like',"%{$request->keyword}%");
            })
            ->orWhereHas('supplier', function (Builder $pengadaan) use ($request){
                $pengadaan->where('nama_perusahaan','like',"%{$request->keyword}%");
            })
            ->orWhereHas('ruangan', function (Builder $pengadaan) use ($request){
                $pengadaan->where('nama_ruangan','like',"%{$request->keyword}%");
            });
        })->orderBy('id')
        ->paginate($pagination);

        return view('transaksi.pengadaan.pengadaanIndex',compact('pengadaan'))
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
        $supplier = Supplier::all();
        $ruangan = Ruangan::all();
        return view('transaksi.pengadaan.pengadaanCreate',
        [
            'user'=>$user,
            'barang'=>$barang,
            'supplier'=>$supplier,
            'ruangan'=>$ruangan
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
        // dd($request->all());
        $request -> validate(
            [
                'tgl_masuk' => 'required|date',
                'jumlah' => 'required|numeric',
                'sumber_dana' => 'required',
                'user_id' => 'required',
                'barang_id' => 'required',
                'ruangan_id' => 'required',
                'supplier_id' => 'required',
            ]
        );

        $pengadaan =  new Pengadaan;
        $pengadaan -> user_id = $request-> user_id;
        $pengadaan -> barang_id = $request -> barang_id;
        $pengadaan -> ruangan_id = $request -> ruangan_id;
        $pengadaan -> supplier_id = $request -> supplier_id;
        $pengadaan -> tgl_masuk = $request-> tgl_masuk;
        $pengadaan -> sumber_dana = $request-> sumber_dana;
        $pengadaan -> jumlah = $request -> jumlah;

        $barang = Barang::where('id',$request->barang_id);
        $value = $barang->value('stok');
        $barang->update(['stok'=>$value +$request->jumlah]);

        $pengadaan -> save();

        Alert::success('Success','Data Pengadaan Berhasil Ditambahkan');
        return redirect()->route('pengadaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengadaan = Pengadaan::find($id);
        return view('transaksi.pengadaan.pengadaanDetail',compact('pengadaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        $user = User::all();
        $barang = Barang::all();
        $supplier = Supplier::all();
        $ruangan = Ruangan::all();
        return view('transaksi.pengadaan.pengadaanEdit',compact('pengadaan','user','barang','supplier','ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate(
            [
                'tgl_masuk' => 'required|date',
                'jumlah' => 'required|numeric',
                'sumber_dana' => 'required',
                'barang_id' => 'required',
                'ruangan_id' => 'required',
                'supplier_id' => 'required',
            ]
        );

        $pengadaan = Pengadaan::findOrFail($id);
        $pengadaan -> barang_id = $request -> barang_id;
        $pengadaan -> ruangan_id = $request -> ruangan_id;
        $pengadaan -> supplier_id = $request -> supplier_id;
        $pengadaan -> tgl_masuk = $request-> tgl_masuk;
        $pengadaan -> sumber_dana = $request -> sumber_dana;
        $pengadaan -> jumlah = $request -> jumlah;

        $barang = Barang::where('id',$request->barang_id);
        $valueBarang = $barang->value('stok');

        $valuePengadaan =Pengadaan::where('id',$id)->value('jumlah');
        // dd($valuePengadaan);

        if ($request->jumlah >= $valuePengadaan) {
            $hitungSelisih = $request->jumlah - $valuePengadaan;
            $barang->update(['stok' => $valueBarang + $hitungSelisih]);

        } elseif($request->jumlah <= $valuePengadaan) {
            $hitungSelisih = $valuePengadaan - $request->jumlah;
            $barang->update(['stok' => $valueBarang - $hitungSelisih]);
        }

        $pengadaan -> save();

        Alert::success('Success','Data Pengadaan Berhasil Diupdate');
        return redirect()->route('pengadaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengadaan  $pengadaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengadaan = Pengadaan::find($id);
        $barang = $pengadaan->barang_id;

        $barang = Barang::where('id',$barang);
        $valueBarang = $barang->value('stok');

        $valuePengadaan =Pengadaan::where('id',$id)->value('jumlah');

        $barang->update(['stok' => $valueBarang - $valuePengadaan]);
        $pengadaan->delete();
        
        Alert::success('Success','Data Pengadaan Berhasil Dihapus');
        return redirect()->route('pengadaan.index');
    }


}
