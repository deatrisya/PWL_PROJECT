@extends('layout.app')
@section('title')
Data Kategori
@endsection
@section('content')
<div class="col-lg-12 grid-martin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Kategori</h4>
            <div class="button">
                <div class="row">
                    <div class="col-md-6">
                        <div class="float-left">
                            <a class="btn btn-success" href="{{route('kategori.create')}}">+ Tambah Data</a>
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

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $data)
                            <tr>
                                <td scope="row">{{ ++$i}}</td>
                                <td>{{$data->nama_kategori}}</td>
                                <td>
                                    <form action="{{ route('kategori.destroy',  $data->id) }}" method="POST">
                                        <a class="btn btn-icons btn-primary"
                                            href="{{route('kategori.show', $data->id)}}"><i class="mdi mdi-eye"></i></a>
                                        <a class="btn btn-icons btn-warning"
                                            href="{{route('kategori.edit', $data->id)}}"><i
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
                <br><br>
                <div class="paginate">
                    <div class="container">
                        <div class="row">
                            <div class="detail-data col-md-12">
                                <p>Page : {!! $kategori->currentPage() !!} <br />
                                    Jumlah Data : {!! $kategori->total() !!} <br />
                                    Data Per Halaman : {!! $kategori->perPage() !!} <br />
                                </p>
                            </div>
                            <div class="col-md-12">
                                <div class="paginate-button float-right">
                                    {!! $kategori->links() !!}
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
