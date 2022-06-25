<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemeliharaan;
use App\Models\Pengadaan;
use App\Models\Penyusutan;
use App\Models\Ruangan;
use App\Models\Supplier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::now()->format('l');
        $date = Carbon::now()->format("d F, Y");

        $barang = Barang::sum('stok');
        $ruangan = Ruangan::count();
        $supplier = Supplier::count();
        $user = User::count();

        $barangMasuk = Pengadaan::count();
        $barangPemeliharaan = Pemeliharaan::count();
        $barangPenyusutan = Penyusutan::count();

        $perbaikan = Pemeliharaan::where('status','Sedang Perbaikan')->count();
        $percentPerbaikan = $perbaikan / $barangPemeliharaan*100;

        $sl_Perbaikan = Pemeliharaan::where('status','Selesai Perbaikan')->count();
        $percentSls = $sl_Perbaikan / $barangPemeliharaan*100;

        $dataBarang = [];
        $jenisBarang = Barang::all();
        foreach ($jenisBarang as $key => $value) {
            $jumlahBarang = Barang::where('id',$value->id)->sum('stok');
            array_push($dataBarang,$jumlahBarang);
        }
        // dd($dataBarang);
        $data = [
            'today' => $today,
            'date' => $date,
            'barang' => $barang,
            'ruangan' => $ruangan,
            'supplier' => $supplier,
            'user' => $user,
            'barangMasuk' => $barangMasuk,
            'barangPemeliharaan' => $barangPemeliharaan,
            'barangPenyusutan' => $barangPenyusutan,
            'percentPerbaikan' => $percentPerbaikan,
            'percentSls' => $percentSls,
            'dataBarang' => json_encode($dataBarang,JSON_NUMERIC_CHECK),
            'labelBarang' => Barang::pluck('nama_barang')->toArray(),
        ];

        return view('index', $data);
    }
}
