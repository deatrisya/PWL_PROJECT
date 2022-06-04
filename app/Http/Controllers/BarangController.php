<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Katagori;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $barang = Barang::when($request->keyword, function($query) use ($request){
            $query
            ->where('kode_barang','like',"%{$request->keyword}%")
            ->orWhere('nama_barang','like',"%{$request->keyword}%")
            ->orWhere('stok','like',"%{$request->keyword}%")
            ->orWhereHas('nama_katagori',function(Builder $namakategori) use ($request){
                $namakategori->where('nama_kategori','like',"%{$request->keyword}%");
            });
        })->orderBy('id')
        ->paginate($pagination);

        return view('barang.barangIndex',compact('barang'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Katagori::all();
        return view('barang.barangCreate',['kategori'=>$kategori]);
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
                'kode_barang' => 'required|string|max:5',
                'nama_barang' => 'required|string',
                'stok' => 'required',
                'kategori_id' => 'required'
            ]
        );

        $barang = new Barang;
        $barang -> kode_barang = $request->kode_barang;

        if($request->file('foto_barang')){
            $image_name = $request->file('foto_barang')->store('barang', 'public');
        }
        $barang->foto_barang = $image_name;

        $barang -> nama_barang = $request->nama_barang;
        $barang -> stok = $request->stok;
        $barang -> kategori_id = $request->kategori_id;

        $barang -> save();

        Alert::success('Success','Data Barang Berhasil Ditambahkan');
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        return view('barang.barangDetail',compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        return view('barang.barangEdit',compact('barang','kategori'));
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
                'kode_barang' => 'required|string|max:5',
                'nama_barang' => 'required|string',
                'stok' => 'required',
                'kategori_id' => 'required'
            ]
        );

        $barang = Barang::findOrFail($id);
        $barang -> kode_barang = $request->kode_barang;

        if($request->hasFile('foto_barang')){
            if($barang->foto_barang && file_exists(storage_path('app/public/'. $barang->foto_barang))){
                Storage::delete('public/'.$barang->foto_barang);
            }
            $image_name = $request->file('foto_barang')->store('barang', 'public');
            $barang-> foto_barang = $image_name;
        }


        $barang -> nama_barang = $request->nama_barang;
        $barang -> stok = $request->stok;
        $barang -> kategori_id = $request->kategori_id;

        $barang->save();

        Alert::success('Success','Data Barang Berhasil Diupdate');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::find($id)->delete();
        Alert::success('Success','Data Barang Berhasil Dihapus');
        return redirect()->route('barang.index');
    }
}
