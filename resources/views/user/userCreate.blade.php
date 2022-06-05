@extends('layout.app')
@section('title')
Tambah User
@endsection
@section('content')
<div class="mt-2 col-md-12">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Tambah User</h5>
        <div class="card-body">
            <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" required
                                value="{{old('foto')}}">
                            @if ($errors->has('foto'))
                            <div class="error">{{ $errors->first('foto') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required value="{{old('nama')}}"
                                placeholder="Masukkan nama">
                            @if ($errors->has('nama'))
                            <div class="error">{{ $errors->first('nama') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required value="{{old('username')}}"
                                placeholder="Masukkan Username">
                            @if ($errors->has('username'))
                            <div class="error">{{ $errors->first('username') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required value="{{old('password')}}"
                                placeholder="Masukkan assword">
                            @if ($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required
                                placeholder="Konfirmasi Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required value="{{old('email')}}" placeholder="email@gmail.com">
                            @if ($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required value="{{old('tgl_lahir')}}" >
                            @if ($errors->has('tgl_lahir'))
                                <div class="error">{{ $errors->first('tgl_lahir') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required value="{{old('tempat_lahir')}}" placeholder="Masukkan Tempat Lahir">
                            @if ($errors->has('tempat_lahir'))
                                <div class="error">{{ $errors->first('tempat_lahir') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label >
                           <div class="row">
                            <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki-laki" value="L" checked > Laki-laki
                                  </label>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-radio">
                                  <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan" value="P"> Perempuan
                                  </label>
                                </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="5" class="form-control" required placeholder="Masukkan Alamat">{{old('alamat')}}</textarea>
                            @if ($errors->has('alamat'))
                                <div class="error">{{ $errors->first('alamat') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('user.index')}}">Cancel</a>
            </form>

        </div>
    </div>
</div>
@endsection
