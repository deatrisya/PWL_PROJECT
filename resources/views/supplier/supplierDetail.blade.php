@extends('layout.app')
@section('title')
    Detail Data Supplier
@endsection
@section('content')
    <div class="mt-2 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Supplier</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Logo</label><br>
                            <img width="120px" height="180px" src="{{ asset('storage/' . $supplier->logo) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" readonly value="{{$supplier->nama_perusahaan}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" readonly value="{{$supplier->alamat}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('supplier.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection
