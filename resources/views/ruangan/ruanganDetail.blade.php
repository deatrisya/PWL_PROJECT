@extends('layout.app')
@section('title')
    Detail Data Ruangan
@endsection
@section('content')
    <div class="mt-2 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Ruangan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">ID</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$ruangan->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Ruangan</label>
                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" readonly value="{{$ruangan->nama_ruangan}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('ruangan.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection
