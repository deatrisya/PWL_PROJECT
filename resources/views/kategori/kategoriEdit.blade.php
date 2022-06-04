@extends('layout.app')
@section('title')
Edit Data Kategori
@endsection
@section('content')
<div class="mt-2 col-md-8 mx-auto">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Edit Data Kategori</h5>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong>There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>

            @endif
            <form method="POST" action="{{route('kategori.update',$kategori->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" required
                                value="{{$kategori->nama_kategori}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('kategori.index')}}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
