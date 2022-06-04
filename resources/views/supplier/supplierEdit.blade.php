@extends('layout.app')
@section('title')
Edit Data Supplier
@endsection
@section('content')
<div class="mt-2 col-md-8 mx-auto">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Edit Data Supplier</h5>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong>There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

            @endif
            <form method="POST" action="{{route('supplier.update',$supplier->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="logo">Logo Perusahaan</label>
                            <input type="file" class="form-control" placeholder="Logo Perusahaan" name="logo"
                                value="{{$supplier->logo}}">
                            <img width="150px" src="{{asset('storage/'. $supplier->logo)}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama_perusahaan" required
                                value="{{$supplier->nama_perusahaan}}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"
                                required>{{$supplier->alamat}}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('barang.index')}}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
