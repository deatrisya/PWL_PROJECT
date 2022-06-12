@extends('layout.app')
@section('title')
Edit Pemeliharaan Barang
@endsection
@section('content')
<div class="mt-2 col-md-12">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Edit Data Pemeliharaan Barang</h5>
        <div class="card-body">
            <form method="POST" action="{{route('pemeliharaan.update',$pemeliharaan->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Penanggung Jawab</label>
                            <input type="text" class="form-control" readonly
                                value="{{Auth::user()->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Pemeliharaan</label>
                            <input type="date" class="form-control" name="tgl_pemeliharaan" required
                                value="{{$pemeliharaan->tgl_pemeliharaan}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Barang</label>
                            <input type="hidden" value="{{$pemeliharaan->barang_id}}" name="barang_id">
                            <input type="text" class="form-control" readonly value="{{$pemeliharaan->barang->nama_barang}}">
                            @if ($errors->has('barang_id'))
                            <div class="error">{{ $errors->first('barang_id') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah"
                                value="{{$pemeliharaan->jumlah}}" placeholder="Jumlah Unit" required>
                            @if ($errors->has('jumlah_unit'))
                            <div class="error">{{ $errors->first('jumlah_unit') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="Sedang Perbaikan" @if ($pemeliharaan->status == "Sedang Perbaikan") selected @endif>Sedang Perbaikan</option>
                                <option value="Selesai Perbaikan" @if ($pemeliharaan->status == "Selesai Perbaikan") selected @endif>Selesai Perbaikan</option>
                            </select>
                            @if ($errors->has('status'))
                            <div class="error">{{ $errors->first('status') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pemeliharaan.index')}}">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
