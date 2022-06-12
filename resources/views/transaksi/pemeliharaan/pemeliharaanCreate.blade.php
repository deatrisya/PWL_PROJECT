@extends('layout.app')
@section('title')
    Tambah Data Pemeliharaan
@endsection
@section('content')
<div class="mt-2 col-md-12">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Tambah Data Pemeliharaan</h5>
        <div class="card-body">
          <form method="POST" action="{{route('pemeliharaan.store')}}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="foto_barang">Penanggung Jawab</label>
                        <input type="hidden" value="{{Auth::id()}}" name="user_id">
                        <input type="text" class="form-control" value="{{Auth::user()->nama}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Pemeliharaan</label>
                        <input type="date" class="form-control" name="tgl_pemeliharaan" required value="{{old('tgl_pemeliharaan')}}">
                        @if ($errors->has('tgl_pemeliharaan'))
                            <div class="error">{{ $errors->first('tgl_pemeliharaan') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Barang</label>
                        <select class="form-control" name="barang_id" id="barang_id" required>
                            <option value="">--Pilih Barang--</option>
                            @foreach ($barang as $data)
                                <option value="{{$data->id}}" @if (old('barang_id')== $data->id) selected @endif>{{$data->nama_barang}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('barang_id'))
                            <div class="error">{{ $errors->first('barang_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{old('jumlah')}}" placeholder="Jumlah Unit" required>
                        @if ($errors->has('jumlah_unit'))
                            <div class="error">{{ $errors->first('jumlah_unit') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="{{ route('pemeliharaan.index')}}">Cancel</a>
        </form>
     </div>
    </div>
</div>
@endsection
