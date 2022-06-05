@extends('layout.app')
@section('title')
Detail Data Barang
@endsection
@section('content')
<div class="mt-2 col-md-12">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Detail Data Barang</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Foto Barang</label><br>
                        <img width="120px" height="120px" src="{{ asset('storage/' . $barang->foto_barang) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" readonly
                            value="{{$barang->kode_barang}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly
                            value="{{$barang->nama_barang}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" readonly
                            value="{{$barang->stok}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                        <input type="text" class="form-control" id="kategori_id" name="kategori_id" disabled
                            value="{{$barang->kategori->nama_kategori}}">
                    </div>
                </div>
            </div>
            <a class="btn btn-secondary" href="{{ route('barang.index')}}">Back</a>
        </div>
    </div>
</div>
@endsection
