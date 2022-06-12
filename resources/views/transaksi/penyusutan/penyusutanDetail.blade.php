@extends('layout.app')
@section('title')
Detail Barang Keluar
@endsection
@section('content')
<div class="mt-2 col-md-12">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Detail Data Barang Keluar</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Penanggung Jawab</label>
                        <input type="text" class="form-control" name="user_id" readonly value="{{Auth::user()->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Keluar</label>
                        <input type="date" class="form-control" name="tgl_keluar" readonly
                            value="{{$penyusutan->tgl_keluar}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Barang</label>
                        <input type="text" class="form-control" value="{{$penyusutan->barang->nama_barang}}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ruangan</label>
                        <input type="text" class="form-control" value="{{$penyusutan->ruangan->nama_ruangan}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah"
                            value="{{$penyusutan->jumlah}}" placeholder="Jumlah Unit" readonly>
                    </div>
                </div>
            </div>
            <a class="btn btn-secondary" href="{{ route('penyusutan.index')}}">Back</a>
        </div>
    </div>
</div>
@endsection
