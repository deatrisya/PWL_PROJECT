@extends('layout.app')
@section('title')
Detail Pengadaan
@endsection
@section('content')
<div class="mt-2 col-md-12">
    <div class="card ">
        <h5 class="card-header bg-primary text-white">Detail Data Pengadaan</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Penanggung Jawab</label>
                        <input type="text" class="form-control" name="user_id" readonly value="{{Auth::user()->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tgl_masuk" readonly
                            value="{{$pengadaan->tgl_masuk}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Barang</label>
                        <input type="text" class="form-control" value="{{$pengadaan->barang->nama_barang}}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Supplier</label>
                        <input type="text" class="form-control" value="{{$pengadaan->supplier->nama_perusahaan}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ruangan</label>
                        <input type="text" class="form-control" value="{{$pengadaan->ruangan->nama_ruangan}}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah"
                            value="{{$pengadaan->jumlah}}" placeholder="Jumlah Unit" readonly>
                    </div>
                    <div class="form-group">
                        <label for="sumberdana">Sumber Dana</label>
                        <select name="sumber_dana" id="sumber_dana" class="form-control" disabled>
                            <option value="Bantuan Operasional Sekolah" @if ($pengadaan->sumber_dana == "Bantuan
                                Operasional Sekolah") selected @endif>Bantuan Operasional Sekolah</option>
                            <option value="Swadaya" @if ($pengadaan->sumber_dana == "Swadaya") selected
                                @endif>Swadaya</option>
                            <option value="Masyarakat" @if ($pengadaan->sumber_dana == "Masyarakat") selected
                                @endif>Masyarakat</option>
                        </select>
                    </div>
                </div>
            </div>
            <a class="btn btn-secondary" href="{{ route('pengadaan.index')}}">Back</a>
        </div>
    </div>
</div>
@endsection
