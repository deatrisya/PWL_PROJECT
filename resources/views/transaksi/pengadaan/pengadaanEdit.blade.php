@extends('layout.app')
@section('title')
Edit Barang Masuk
@endsection
@section('content')
<div class="mt-2 col-md-12">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Edit Data Barang Masuk</h5>
        <div class="card-body">
            <form method="POST" action="{{route('pengadaan.update',$pengadaan->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Penanggung Jawab</label>
                            <input type="text" class="form-control" name="user_id" readonly
                                value="{{Auth::user()->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Masuk</label>
                            <input type="date" class="form-control" name="tgl_masuk" required
                                value="{{$pengadaan->tgl_masuk}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Barang</label>
                            <select class="form-control" name="barang_id" id="barang_id" disabled>
                                <option value="">--Pilih Barang--</option>
                                @foreach ($barang as $data)
                                <option value="{{$data->id}}" @if ($data->id == $pengadaan->barang_id) selected
                                    @endif>{{$data->nama_barang}}</option>
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
                                <option value="{{$data->id}}" @if ($data->id == $pengadaan->supplier_id) selected
                                    @endif>{{$data->nama_perusahaan}}</option>
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
                                <option value="{{$data->id}}" @if ($data->id == $pengadaan->ruangan_id) selected
                                    @endif>{{$data->nama_ruangan}}</option>
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
                            <input type="number" class="form-control" name="jumlah" id="jumlah"
                                value="{{$pengadaan->jumlah}}" placeholder="Jumlah Unit" required>
                            @if ($errors->has('jumlah_unit'))
                            <div class="error">{{ $errors->first('jumlah_unit') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="sumberdana">Sumber Dana</label>
                            <select name="sumber_dana" id="sumber_dana" class="form-control" required>
                                <option value="">--Pilih Sumber Dana--</option>
                                <option value="Bantuan Operasional Sekolah" @if ($pengadaan->sumber_dana == "Bantuan Operasional Sekolah") selected @endif>Bantuan Operasional Sekolah</option>
                                <option value="Swadaya" @if ($pengadaan->sumber_dana == "Swadaya") selected @endif>Swadaya</option>
                                <option value="Masyarakat" @if ($pengadaan->sumber_dana == "Masyarakat") selected @endif>Masyarakat</option>
                            </select>
                            @if ($errors->has('sumber_dana'))
                            <div class="error">{{ $errors->first('sumber_dana') }}</div>
                            @endif
                        </div>

                    </div>

                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pengadaan.index')}}">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
