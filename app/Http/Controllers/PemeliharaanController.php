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
        $pemeliharaan = Pemeliharaan::when($request->keyword, function($query) use ($request){
            $query
            ->where('tgl_pemeliharaan','like',"%{$request->keyword}%")
            ->orWhere('jumlah','like',"%{$request->keyword}%")
            ->orWhere('status','like',"%{$request->keyword}%")
            ->orWhereHas('user',function(Builder $namauser) use ($request){
                $namauser->where('nama','like',"%{$request->keyword}%");
            })
            ->orWhereHas('barang',function(Builder $namabarang) use ($request){
                $namabarang->where('nama_barang','like',"%{$request->keyword}%");
            })
            ;
        })->orderBy('id')
        ->paginate($pagination);

        return view('transaksi.pemeliharaanIndex',compact('pemeliharaan'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $user = User::all();
        return view('transaksi.pemeliharaanCreate',['barang', 'user'=>$barang , $user]);
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
                'status' => 'required',
                'user_id' => 'required',
                'barang_id' => 'required'
            ]
        );

        $pemeliharaan = new Pemeliharaan;
        $pemeliharaan -> tgl_pemeliharaan = $request->tgl_pemeliharaan;
        $pemeliharaan -> jumlah = $request->jumlah;
        $pemeliharaan -> status = $request->status;
        $pemeliharaan -> user_id = $request->user_id;
        $pemeliharaan -> barang_id = $request->barang_id;

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
        return view('pemeliharaan.pemeliharaanDetail',compact('pemeliharaan'));
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
        return view('pemeliharaan.pemeliharaanEdit',compact('pemeliharaan','user','barang'));
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
        $request -> validate(
            [
                'tgl_pemeliharaan' => 'required|date',
                'jumlah' => 'required',
                'status' => 'required',
                'user_id' => 'required',
                'barang_id' => 'required'
            ]
        );

        $pemeliharaan = Pemeliharaan::findOrFail($id);
        $pemeliharaan -> tgl_pemeliharaan = $request->tgl_pemeliharaan;
        $pemeliharaan -> jumlah = $request->jumlah;
        $pemeliharaan -> status = $request->status;
        $pemeliharaan -> user_id = $request->user_id;
        $pemeliharaan -> barang_id = $request->barang_id;

        $pemeliharaan -> save();

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
        Pemeliharaan::find($id)->delete();
        Alert::success('Success','Data Pemeliharaan Berhasil Dihapus');
        return redirect()->route('pemeliharaan.index');
    }
}
