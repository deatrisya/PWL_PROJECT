@extends('layout.app')
@section('title')
Edit Data Barang
@endsection
@section('content')
<div class="mt-2 col-md-8 mx-auto">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Edit Data Barang</h5>
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
            <form method="POST" action="{{route('barang.update',$barang->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Kode Barang</label>
                            <input type="text" class="form-control" name="kode_barang" required
                                value="{{$barang->kode_barang}}">
                        </div>
                        <div class="form-group">
                            <label for="foto_barang">Foto Barang</label>
                            <input type="file" class="form-control" placeholder="Foto Barang" name="foto_barang"
                                value="{{old('foto_barang')}}">
                            <img width="150px" src="{{asset('storage/'. $barang->foto_barang)}}" alt="foto">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" required
                                value="{{$barang->nama_barang}}">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" name="stok" required value="{{$barang->stok}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <select class="form-control" id="kategori_id" name="kategori_id" required>
                                @foreach ($kategori as $data)
                                <option value="{{$data->id}}" @if ($data->id == $barang->kategori_id) selected
                                    @endif>{{$data->nama_kategori}}</option>
                                @endforeach
                            </select>
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
