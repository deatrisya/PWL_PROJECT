@extends('layout.app')
@section('title')
    Detail Data Kategori
@endsection
@section('content')
    <div class="mt-2 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Kategori</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">ID</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$kategori->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" readonly value="{{$kategori->nama_kategori}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('kategori.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection
