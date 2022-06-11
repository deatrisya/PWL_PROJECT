@extends('layout.app')
@section('title')
Data Ruangan
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Ruangan</h4>
            <div class="button">
                <div class="row">
                    <div class="col-md-6">
                        <div class="float-left">
                            <a class="btn btn-success" href="{{route('ruangan.create')}}">+ Tambah Data</a>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="float-right">
                            <form class="form-inline my-2 my-lg-0" action="{{url()->current()}}" method="GET">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                    aria-label="Search" name="keyword" value="{{request('keyword')}}">
                                <button class="btn btn-icons btn-primary" type="submit"><i
                                        class="mdi mdi-magnify"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Ruangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ruangan as $data)
                        <tr>
                            <td scope="row">{{ ++$i}}</td>
                            <td>{{$data->nama_ruangan}}</td>
                            <td>
                                <form action="{{ route('ruangan.destroy',  $data->id) }}" method="POST">
                                    <a class="btn btn-icons btn-primary" href="{{route('ruangan.show', $data->id)}}"><i
                                            class="mdi mdi-eye"></i></a>
                                    <a class="btn btn-icons btn-warning" href="{{route('ruangan.edit', $data->id)}}"><i
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
            <br><br>
            <div class="paginate">
                <div class="container">
                    <div class="row">
                        <div class="detail-data col-md-12">
                            <p>Page : {!! $ruangan->currentPage() !!} <br />
                                Jumlah Data : {!! $ruangan->total() !!} <br />
                                Data Per Halaman : {!! $ruangan->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="paginate-button float-right">
                                {!! $ruangan->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
