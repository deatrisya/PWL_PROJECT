@extends('layout.app')
@section('title')
User Data
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data User</h4>
            <div class="button">
                <div class="row">
                <div class="col-md-12">
                    <div class="d-flex float-right">
                        <div class="ml-3">
                                <form class="form-inline my-2 my-lg-0" action="{{url()->current()}}" method="GET">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                        aria-label="Search" name="keyword" value="{{request('keyword')}}">
                                    <button class="btn btn-icons btn-orange" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $data)
                        <tr>
                            <td scope="row">{{++$i}}</td>
                            <td><img src="{{asset('storage/'.$data->foto)}}" alt="foto" width="50px" height="50px"
                                    class="border-0"></td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->username}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{date('d-m-Y',strtotime($data->tgl_lahir))}}</td>
                            <td>{{$data->tempat_lahir}}</td>
                            @if ($data->jenis_kelamin == 'P')
                                <td>Perempuan</td>
                                @else
                                <td>Laki-laki</td>
                            @endif
                            <td>{{$data->alamat}}</td>
                            <td>
                                <form action="{{ route('user.destroy',  $data->id) }}" method="POST">
                                    <a class="btn btn-icons btn-primary" href="{{route('user.show', $data->id)}}"><i
                                            class="mdi mdi-eye"></i></a>
                                    <a class="btn btn-icons btn-warning" href="{{route('user.edit', $data->id)}}"><i
                                            class="mdi mdi-pencil"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-icons btn-danger"><i
                                            class="mdi mdi-delete"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="paginate">
                <div class="container">
                    <div class="row">
                        <div class="detail-data col-md-12">
                            <p>Page : {!! $user->currentPage() !!} <br />
                                Jumlah Data : {!! $user->total() !!} <br />
                                Data Per Halaman : {!! $user->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="paginate-button float-right">
                                {!! $user->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
