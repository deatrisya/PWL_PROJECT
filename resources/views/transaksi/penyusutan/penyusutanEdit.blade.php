@extends('layout.app')
@section('title')
Edit Barang Keluar
@endsection
@section('content')
<div class="mt-2 col-md-12">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Edit Data Barang Keluar</h5>
        <div class="card-body">
            <form method="POST" action="{{route('penyusutan.update',$penyusutan->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Penanggung Jawab</label>
                            <input type="text" class="form-control" name="user_id" readonly
                                value="{{Auth::user()->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Keluar</label>
                            <input type="date" class="form-control" name="tgl_keluar" required
                                value="{{$penyusutan->tgl_keluar}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Barang</label>
                            <input type="hidden" name="barang_id" value="{{$penyusutan->barang_id}}">
                            <input type="text" class="form-control" value="{{$penyusutan->barang->nama_barang}}" readonly>
                            @if ($errors->has('barang_id'))
                            <div class="error">{{ $errors->first('barang_id') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ruangan</label>
                            <select class="form-control" name="ruangan_id" id="ruangan_id" required>
                                <option value="">--Pilih Ruangan--</option>
                                @foreach ($ruangan as $data)
                                <option value="{{$data->id}}" @if ($data->id == $penyusutan->ruangan_id) selected
                                    @endif>{{$data->nama_ruangan}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('ruangan_id'))
                            <div class="error">{{ $errors->first('ruangan_id') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah"
                                value="{{$penyusutan->jumlah}}" placeholder="Jumlah Unit" required>
                            @if ($errors->has('jumlah_unit'))
                            <div class="error">{{ $errors->first('jumlah_unit') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-secondary" href="{{ route('penyusutan.index')}}">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
