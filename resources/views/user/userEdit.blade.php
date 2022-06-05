@extends('layout.app')
@section('title')
Edit User
@endsection
@section('content')
<div class="mt-2 col-md-12 ">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Edit Data User</h5>
        <div class="card-body">
            <form action="{{route('user.update',$user->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Foto</label><br>
                            <input type="file" name="foto" class="form-control" value="{{old('foto')}}">
                            <img width="120px" height="180px" src="{{ asset('storage/' . $user->foto) }}">
                            @if ($errors->has('foto'))
                                <div class="error">{{ $errors->first('foto') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$user->nama}}" >
                            @if ($errors->has('nama'))
                                <div class="error">{{ $errors->first('nama') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{$user->username}}">
                            @if ($errors->has('username'))
                                <div class="error">{{ $errors->first('username') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}"
                                >
                            @if ($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="example">Ganti Password</label>
                            <input type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="example">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{$user->tgl_lahir}}"
                                >
                            @if ($errors->has('tgl_lahir'))
                                <div class="error">{{ $errors->first('tgl_lahir') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{$user->tempat_lahir}}" >
                                @if ($errors->has('tempat_lahir'))
                                <div class="error">{{ $errors->first('tempat_lahir') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label>
                           <div class="row">
                            <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" {{($user->jenis_kelamin=="L") ? 'checked' : ""}}> Laki-laki
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" {{($user->jenis_kelamin=="P") ? 'checked' : ""}}> Perempuan
                                  </label>
                                </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="5" >{{$user->alamat}}</textarea>
                            @if ($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('user.index')}}">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
