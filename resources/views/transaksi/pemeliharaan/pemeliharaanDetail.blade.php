@extends('layout.app')
@section('title')
Detail Pemeliharaan Barang
@endsection
@section('content')
<div class="mt-2 col-md-12">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Detail Data Pemeliharaan Barang</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Penanggung Jawab</label>
                        <input type="text" class="form-control" readonly
                            value="{{Auth::user()->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Pemeliharaan</label>
                        <input type="date" class="form-control" name="tgl_pemeliharaan" readonly
                            value="{{$pemeliharaan->tgl_pemeliharaan}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Barang</label>
                        <input type="hidden" value="{{$pemeliharaan->barang_id}}" name="barang_id">
                        <input type="text" class="form-control" readonly value="{{$pemeliharaan->barang->nama_barang}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah"
                            value="{{$pemeliharaan->jumlah}}" placeholder="Jumlah Unit" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                       <input type="text" class="form-control" value="{{$pemeliharaan->status}}" readonly>
                    </div>
                </div>
            </div>
                <a class="btn btn-secondary" href="{{ route('pemeliharaan.index')}}">Cancel</a>
        </div>
    </div>
</div>
@endsection
