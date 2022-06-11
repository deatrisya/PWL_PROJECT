@extends('layout.app')
@section('title')
    Tambah Data Pengadaan
@endsection
@section('content')
<div class="mt-2 col-md-12">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Tambah Data Pengadaan</h5>
        <div class="card-body">
          <form method="POST" action="{{route('pengadaan.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="foto_barang">Penanggung Jawab</label>
                        <input type="hidden" value="{{Auth::id()}}" name="user_id">
                        <input type="text" class="form-control" value="{{Auth::user()->nama}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tgl_masuk" required value="{{old('tgl_masuk')}}">
                        @if ($errors->has('tgl_masuk'))
                            <div class="error">{{ $errors->first('tgl_masuk') }}</div>
                        @endif
                    </div>
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
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier</label>
                        <select class="form-control" name="supplier_id" id="supplier_id" required>
                            <option value="">--Pilih Supplier--</option>
                            @foreach ($supplier as $data)
                                <option value="{{$data->id}}" @if (old('supplier_id')== $data->id) selected @endif>{{$data->nama_perusahaan}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('supplier_id'))
                            <div class="error">{{ $errors->first('supplier_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ruangan</label>
                        <select class="form-control" name="ruangan_id" id="ruangan_id" required>
                            <option value="">--Pilih Ruangan--</option>
                            @foreach ($ruangan as $data)
                                <option value="{{$data->id}}" @if (old('ruangan_id')== $data->id) selected @endif>{{$data->nama_ruangan}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('ruangan_id'))
                            <div class="error">{{ $errors->first('ruangan_id') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{old('jumlah')}}" placeholder="Jumlah Unit" required>
                        @if ($errors->has('jumlah_unit'))
                            <div class="error">{{ $errors->first('jumlah_unit') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="sumberdana">Sumber Dana</label>
                        <select name="sumber_dana" id="sumber_dana" class="form-control" required>
                            <option value="">--Pilih Sumber Dana--</option>
                            <option value="Bantuan Operasional Sekolah">Bantuan Operasional Sekolah</option>
                            <option value="Swadaya">Swadaya</option>
                            <option value="Masyarakat">Masyarakat</option>
                        </select>
                        @if ($errors->has('sumber_dana'))
                            <div class="error">{{ $errors->first('sumber_dana') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="{{ route('pengadaan.index')}}">Cancel</a>
        </form>
     </div>
    </div>
</div>
@endsection
