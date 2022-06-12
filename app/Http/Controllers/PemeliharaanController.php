<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemeliharaan;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

        return view('transaksi.pemeliharaan.pemeliharaanIndex',compact('pemeliharaan'))
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
        return view('transaksi.pemeliharaan.pemeliharaanCreate',[
            'barang' => $barang,
            'user' => $user,
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
                'tgl_pemeliharaan' => 'required|date',
                'jumlah' => 'required',
                'user_id' => 'required',
                'barang_id' => 'required'
            ]
        );

        $pemeliharaan = new Pemeliharaan;
        $pemeliharaan -> tgl_pemeliharaan = $request->tgl_pemeliharaan;
        $pemeliharaan -> jumlah = $request->jumlah;
        $pemeliharaan -> status = 'Sedang Perbaikan';
        $pemeliharaan -> user_id = $request->user_id;
        $pemeliharaan -> barang_id = $request->barang_id;

        $barang = Barang::where('id',$request->barang_id);
        $valueBarang = $barang->value('stok');
        $barang->update(['stok' => $valueBarang - $request->jumlah]);

        $pemeliharaan -> save();

        Alert::success('Success','Data Pemeliharaan Berhasil Ditambahkan');
        return redirect()->route('pemeliharaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemeliharaan = Pemeliharaan::find($id);
        return view('transaksi.pemeliharaan.pemeliharaanDetail',compact('pemeliharaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemeliharaan = Pemeliharaan::findOrFail($id);
        $user = User::all();
        $barang = Barang::all();
        return view('transaksi.pemeliharaan.pemeliharaanEdit',compact('pemeliharaan','user','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request -> validate(
            [
                'tgl_pemeliharaan' => 'required|date',
                'jumlah' => 'required',
                'status' => 'required',
                'barang_id' => 'required'
            ]
        );

        $pemeliharaan = Pemeliharaan::findOrFail($id);
        $pemeliharaan -> tgl_pemeliharaan = $request->tgl_pemeliharaan;
        $pemeliharaan -> jumlah = $request->jumlah;
        $pemeliharaan -> status = $request->status;
        $pemeliharaan -> barang_id = $request->barang_id;

        $pemeliharaan -> save();

        if ($request->status == 'Sedang Perbaikan') {
            $barang = Barang::where('id',$request->barang_id);
            $valueBarang = $barang->value('stok');
            $barang->update(['stok' => $valueBarang - $request->jumlah]);
        } else {
            $barang = Barang::where('id',$request->barang_id);
            $valueBarang = $barang->value('stok');
            $barang->update(['stok' => $valueBarang + $request->jumlah]);
        }


        Alert::success('Success','Data Pemeliharaan Berhasil Diupdate');
        return redirect()->route('pemeliharaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemeliharaan = Pemeliharaan::find($id);
        $barang = $pemeliharaan->barang_id;
        $barang = Barang::where('id',$barang);
        $valueBarang = $barang->value('stok');

        $valuePengadaan =Pemeliharaan::where('id',$id)->value('jumlah');

        if($pemeliharaan->status == "Sedang Perbaikan" ) {
            $barang->update(['stok' => $valueBarang + $valuePengadaan]);
        } else {
            $pemeliharaan->delete();
        }
        $pemeliharaan->delete();

        Alert::success('Success','Data Pemeliharaan Berhasil Dihapus');
        return redirect()->route('pemeliharaan.index');
    }
}
