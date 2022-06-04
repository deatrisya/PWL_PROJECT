<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $ruangan = Ruangan::when($request->keyword, function($query) use ($request){
            $query
            ->where('nama_ruangan','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


        $ruangan->appends($request->only('keyword'));
        return view('ruangan.ruanganIndex',compact('ruangan'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.ruanganCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama_ruangan' => 'required|string'
        ]);

        Ruangan::create($request->all());

        Alert::success('Success','Data Ruangan Berhasil Ditambahkan');
        return redirect()->route('ruangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruangan = Ruangan::find($id);
        return view('ruangan.ruanganDetail', compact('ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruangan = Ruangan::find($id);
        return view('ruangan.ruanganEdit', compact('ruangan'));
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
        $request -> validate([
            'nama_ruangan' => 'required|string'
        ]);

        Ruangan::find($id)->update($request->all());
        Alert::success('Success','Data Ruangan Berhasil Diupdate');
        return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ruangan::find($id)->delete();
        Alert::success('Success','Data Ruangan Berhasil DiHapus');
        return redirect()->route('ruangan.index');
    }
}
