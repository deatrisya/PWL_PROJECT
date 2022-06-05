@extends('layout.app')
@section('title')
Detail User
@endsection
@section('content')
<div class="mt-2 col-md-12 mx-auto ">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Detail Data User</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Foto</label><br>
                        <img width="120px" height="180px" src="{{ asset('storage/' . $user->foto) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$user->nama}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="username" name="username" readonly
                            value="{{$user->username}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{$user->tgl_lahir}}"
                            readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{$user->tempat_lahir}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kelamin</label>
                        @if ($user->jenis_kelamin == 'L')
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                value="Laki-laki" readonly>
                        @else
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                value="Perempuan" readonly>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" readonly
                            value="{{$user->alamat}}">
                    </div>
                </div>
            </div>
            <a class="btn btn-secondary" href="{{ route('user.index')}}">Back</a>
        </div>
    </div>
</div>
@endsection
