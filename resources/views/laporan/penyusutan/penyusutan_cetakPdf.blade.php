<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Penyusutan Barang</title>
</head>
<body>
    <div style="overflow: border: 1px solid #000; margin: 20px ; padding: 20px; width: 80%; background-color: none;">
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 10pt;
            }

        </style>
        <table align="center" style="border-collapse:collapse;">
            <td style="border-bottom:2px solid #000; text-align: left;padding-bottom: 2px; width: 100px; width:100px">
                <img src="{{ public_path("admin/images/PNG.png") }}" alt="" style="width: 110px; height: 110px;">
            </td>
            <td style="border-bottom:2px solid #000; text-align: center;padding: 2px; width: 200px; width:670px">
                <h3 align="center">POLITEKNIK NEGERI MALANG <br> LAPORAN INVENTORY JURUSAN TEKNOLOGI INFORMASI </h3>
                <p align="center">Jl. Soekarno Hatta No.9, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141
                    <br>
                    Telepon: (0341) 404424, Email : cs@polinema.ac.id, Website : www.polinema.ac.id
                </p>
            </td>
            <td style="border-bottom:2px solid #000; text-align: right;padding-top: 5px; width: 100px; width:100px">
                <img src="{{ public_path("admin/images/logo JTI.png") }}" alt="" style="width: 100px; height: 100px;">
            </td>

        </table>

        <h4 style="text-align: center;" > LAPORAN DATA PENYUSUTAN BARANG</h4>
        <p style="text-indent :5em;"> <b>Tanggal </b> &nbsp; :
            @php
                echo date(' d F Y');
            @endphp </p>

        <p style="text-indent :5em;"> <b>Waktu </b> &nbsp;&nbsp;&nbsp;  :
        @php
            date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
            echo date('h:i:s a'); // menampilkan jam sekarang
        @endphp </p>
        <table align="center" style="border-collapse:collapse;">
            <thead>
                <tr>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">NO</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">TANGGAL KELUAR</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">PENANGGUNG JAWAB</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">BARANG</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">RUANGAN</th>
                  <th style="border:1px solid #000; text-align: center;padding: 3px; width: 20px; background-color: rgb(197, 197, 197);">JUMLAH</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($penyusutan as $data)
                   <tr>

                      <td style="border:1px solid #000; text-align: center;padding: 2px; width: 40px;">{{$loop->iteration}}</td>
                      <td style="border:1px solid #000; text-transform: uppercase; text-align: left;padding-left: 12px; width: 150px;">{{date('d F Y',strtotime($data->tgl_keluar))}}</td>
                      <td style="border:1px solid #000; text-transform: uppercase; text-align: left;padding-left: 12px; width: 180px;">{{$data->user->nama}}</td>
                      <td style="border:1px solid #000; text-transform: uppercase; text-align: left;padding-left: 12px; width: 160px;">{{$data->barang->nama_barang}}</td>
                      <td style="border:1px solid #000; text-transform: uppercase; text-align: left;padding-left: 12px; width: 180px;">{{$data->ruangan->nama_ruangan}}</td>
                      <td style="border:1px solid #000; text-transform: uppercase; text-align: center;padding: 2px; width: 100px;">{{$data->jumlah}} pcs </td>
                   </tr>
                  @endforeach
              </tbody>
            </table>
    </div>
</body>
</html>
