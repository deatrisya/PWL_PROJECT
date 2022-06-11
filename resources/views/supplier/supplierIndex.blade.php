@extends('layout.app')
@section('title')
Data Supplier
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Supplier</h4>
            <div class="button">
                <div class="row">
                    <div class="col-md-6">
                        <div class="float-left">
                            <a class="btn btn-success" href="{{route('supplier.create')}}">+ Tambah Data</a>
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
                            <th scope="col">Logo Perusahaan</th>
                            <th scope="col">Nama Perusahaan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $data)
                        <tr>
                            <td scope="row">{{ ++$i}}</td>
                            <td><img width="100px" height="100px" src="{{ asset('storage/' . $data->logo) }}" class="rounded-0 img-table"></td>
                            <td>{{$data->nama_perusahaan}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>
                                <form action="{{ route('supplier.destroy',  $data->id) }}" method="POST">
                                    <a class="btn btn-icons btn-primary" href="{{route('supplier.show', $data->id)}}"><i
                                            class="mdi mdi-eye"></i></a>
                                    <a class="btn btn-icons btn-warning" href="{{route('supplier.edit', $data->id)}}"><i
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
                            <p>Page : {!! $supplier->currentPage() !!} <br />
                                Jumlah Data : {!! $supplier->total() !!} <br />
                                Data Per Halaman : {!! $supplier->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="paginate-button float-right">
                                {!! $supplier->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
