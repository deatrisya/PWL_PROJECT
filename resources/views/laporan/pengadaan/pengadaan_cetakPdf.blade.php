<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Barang Masuk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<style>
    .b-bottom {
        border-bottom: 2px solid black;
    }
    .pl-pr {
        padding-left: 50px;
        padding-right: 50px;
    }
    .f-size {
        font-size: 9pt;
    }
    table tr th{
        background-color: rgb(197, 197, 197);
    }
</style>
<body>
    <table style="border-collapse:collapse;" class="mx-auto mt-3">
        <tr>
            <td class="float-left b-bottom pr-5">
                <img src="{{ public_path("admin/images/PNG.png") }}" alt="" style="width: 110px; height: 110px;">
            </td>
            <td class="b-bottom">
                <h5 class="text-center">POLITEKNIK NEGERI MALANG <br> LAPORAN INVENTORY JURUSAN TEKNOLOGI INFORMASI </h5>
                <p class="text-center">Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141
                    <br>
                    Telepon: (0341) 404424, Email : cs@polinema.ac.id, Website : www.polinema.ac.id
                </p>
            </td>
            <td class="b-bottom pl-5" >
                <img src="{{ public_path("admin/images/logo JTI.png") }}" alt="" style="width: 100px; height: 100px;">
            </td>
        </tr>
    </table>
   <div class="title mb-4">
        <div class="text-center text-uppercase mt-4">
            <h5>Laporan Data Barang Masuk</h5>
        </div>
        <p style="text-indent :5em;"> <b>Tanggal </b> &nbsp; :
            @php
                echo date(' d F Y');
            @endphp </p>

        <p style="text-indent :5em;"> <b>Waktu </b> &nbsp;&nbsp;&nbsp;  :
        @php
            date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
            echo date('h:i:s'); // menampilkan jam sekarang
        @endphp </p>
   </div>
   <table class="table table-bordered table-sm pl-pr f-size">
    <thead>
        <tr class="text-center">
            <th class="align-middle">NO</th>
            <th class="align-middle">TANGGAL MASUK</th>
            <th class="align-middle">PENANGGUNG JAWAB</th>
            <th class="align-middle">BARANG</th>
            <th class="align-middle">SUPPLIER</th>
            <th class="align-middle">RUANGAN</th>
            <th class="align-middle">JUMLAH</th>
            <th class="align-middle">SUMBER DANA</th>
          </tr>
    </thead>
    <tbody>
        @foreach ($pengadaan as $data)
            <tr class="text-left text-uppercase">
                <td class="text-center">{{$loop->iteration}}</td>
                <td >{{date('d F Y',strtotime($data->tgl_masuk))}}</td>
                <td >{{$data->user->nama}}</td>
                <td >{{$data->barang->nama_barang}}</td>
                <td >{{$data->supplier->nama_perusahaan}}</td>
                <td >{{$data->ruangan->nama_ruangan}}</td>
                <td class="text-center">{{$data->jumlah}} pcs </td>
                <td >{{$data->sumber_dana}}</td>
            </tr>
        @endforeach

        @forelse ($pengadaan as $data)

        @empty
        <td colspan="8" class="text-center" >Data pada periode {{date('d F Y',strtotime($startDate))}} s/d {{date('d F Y',strtotime($endDate))}} tidak ditemukan</td>
        @endforelse
    </tbody>
   </table>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
