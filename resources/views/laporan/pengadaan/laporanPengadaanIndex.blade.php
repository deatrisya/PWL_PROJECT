@extends('layout.app')
@section('title')
Laporan Pengadaan Barang
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Laporan Data Pengadaan Barang</h4>
            <div class="button">
                <div class="row">
                <div class="col-md-6 float-left">
                </div>
                <div class="col-md-12">
                    <div class="d-flex float-right">
                        <div class="d-flex flex-row-reverse float-right px-2">
                            <a href=" {{route('laporanPengadaan.cetakPdf')}} " target="_blank" class="btn btn-icons btn-danger"> <i class="mdi mdi-file-document"></i> </a>
                        </div>
                        <div class="ml-3">
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
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Penanggung Jawab</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Sumber Dana</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengadaan as $data)
                        <tr>
                            <td scope="row">{{++$i}}</td>
                            <td>{{date('d-m-Y',strtotime($data->tgl_masuk))}}</td>
                            <td>{{$data->user->nama}}</td>
                            <td>{{$data->barang->nama_barang}}</td>
                            <td>{{$data->supplier->nama_perusahaan}}</td>
                            <td>{{$data->ruangan->nama_ruangan}}</td>
                            <td>{{$data->jumlah}}</td>
                            <td>{{$data->sumber_dana}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
