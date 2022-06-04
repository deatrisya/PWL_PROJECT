@extends('layout.app')
@section('title')
Tambah Data Supplier
@endsection
@section('content')
<div class="mt-2 col-md-8 mx-auto">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Tambah Data Supplier</h5>
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
            <form method="POST" action="{{route('supplier.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="logo">Logo Perusahaan</label>
                            <input type="file" class="form-control" placeholder="Logo Perusahaan" name="logo" >
                        </div>
                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama_perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('supplier.index')}}">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
