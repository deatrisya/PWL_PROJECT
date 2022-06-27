@extends('layout.app')
@section('title')
Data Barang Keluar
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Barang Keluar</h4>
            <div class="button">
                <div class="row">
                <div class="col-md-6 float-left">
                    <a class="btn btn-success" href="{{route('penyusutan.create')}}">+ Tambah Data</a>
                </div>
                <div class="col-md-6">
                    <div class="d-flex float-right">
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
                            <th scope="col">Tanggal Keluar</th>
                            <th scope="col">Penanggung Jawab</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Aksi</th>
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
                            <td>
                                <form action="{{ route('penyusutan.destroy',  $data->id) }}" method="POST">
                                    <a class="btn btn-icons btn-primary" href="{{route('penyusutan.show', $data->id)}}"><i
                                            class="mdi mdi-eye"></i></a>
                                    <a class="btn btn-icons btn-warning" href="{{route('penyusutan.edit', $data->id)}}"><i
                                            class="mdi mdi-pencil"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-icons btn-danger text-white show_confirm" data-toggle="tooltip" title='Delete'><i
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
                            <p>Page : {!! $penyusutan->currentPage() !!} <br />
                                Jumlah Data : {!! $penyusutan->total() !!} <br />
                                Data Per Halaman : {!! $penyusutan->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="paginate-button float-right">
                                {!! $penyusutan->links() !!}
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
      $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
    </script>
@endsection
