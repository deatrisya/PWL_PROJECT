<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $supplier = Supplier::when($request->keyword, function($query) use ($request){
            $query
            ->where('nama_perusahaan','like',"%{$request->keyword}%")
            ->orWhere('alamat','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


        $supplier->appends($request->only('keyword'));
        return view('supplier.supplierIndex',compact('supplier'))
            ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.supplierCreate');
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
            'nama_perusahaan' => 'required|string',
            'alamat' => 'required'
        ]);

        $supplier = new Supplier;
        if($request->file('logo')){
            $image_name = $request->file('logo')->store('logo', 'public');
        }
        $supplier->logo = $image_name;

        $supplier -> nama_perusahaan = $request->nama_perusahaan;
        $supplier -> alamat = $request->alamat;
        $supplier -> save();

        Alert::success('Success','Data Supplier Berhasil Ditambahkan');
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.supplierDetail', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.supplierEdit', compact('supplier'));
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
            'nama_perusahaan' => 'required|string',
            'alamat' => 'required'
        ]);

        $supplier = Supplier::findOrFail($id);

        if($request->hasFile('logo')){
            if($supplier->logo && file_exists(storage_path('app/public/'. $supplier->logo))){
                Storage::delete('public/'.$supplier->logo);
            }
            $image_name = $request->file('logo')->store('logo', 'public');
            $supplier->logo = $image_name;
        }

        $supplier -> nama_perusahaan = $request->nama_perusahaan;
        $supplier -> alamat = $request->alamat;

        $supplier->save();

        Alert::success('Success','Data Supplier Berhasil Diupdate');
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        Alert::success('Success','Data Supplier Berhasil DiHapus');
        return redirect()->route('supplier.index');
    }
}
