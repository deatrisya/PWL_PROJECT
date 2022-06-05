@extends('layout.app')
@section('title')
    Tambah Data Barang
@endsection
@section('content')
    <div class="mt-2 col-md-12">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Data Barang</h5>
            <div class="card-body">
              <form method="POST" action="{{route('barang.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" name="kode_barang">
                        </div>
                        <div class="form-group">
                            <label for="foto_barang">Foto Barang</label>
                            <input type="file" class="form-control" placeholder="Foto Barang" name="foto_barang" >
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" name="stok">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <select class="form-control" name="kategori_id" id="kategori_id" required>
                                <option value="">--Pilih Kategori--</option>
                                @foreach ($kategori as $ktg)
                                    <option value="{{$ktg->id}}" {{old('kategori_id') == $ktg->id ? 'selected' : ''}}>{{$ktg->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('barang.index')}}">Cancel</a>
            </form>
         </div>
        </div>
    </div>
@endsection
