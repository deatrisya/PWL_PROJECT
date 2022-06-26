@extends('layout.app')
@section('title')
Data Barang Keluar
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Laporan Data Barang Keluar</h4>
            <div class="button">
                <div class="row">
                    <div class="col-md-6 float-left">
                        <form action="{{url()->current()}}" method="GET">
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="start_date" id="start_date" required
                                    value="{{request('start_date')}}">
                                <input type="date" class="form-control" name="end_date" id="end_date" required
                                    value="{{request('end_date')}}">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex float-right">
                            <div class="d-flex flex-row-reverse float-right px-2">
                                <button onclick="cetakData()" target="_blank" type="submit" class="btn btn-danger"> <i
                                        class="mdi mdi-file-document"></i> Cetak Data</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Keluar</th>
                                <th scope="col">Penanggung Jawab</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penyusutan as $data)
                            <tr>
                                <td scope="row">{{++$i}}</td>
                                <td>{{date('d-m-Y',strtotime($data->tgl_keluar))}}</td>
                                <td>{{$data->user->nama}}</td>
                                <td>{{$data->barang->nama_barang}}</td>
                                <td>{{$data->ruangan->nama_ruangan}}</td>
                                <td>{{$data->jumlah}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginate">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="paginate-button float-right">
                                    {{$penyusutan->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function cetakData() {
        var start_date = document.getElementById('start_date').value;
        var end_date = document.getElementById('end_date').value;
        window.open('{{route("laporanPenyusutan.cetakPdf")}}?start_date=' + start_date + '&end_date=' + end_date);
    }

</script>
@endsection
