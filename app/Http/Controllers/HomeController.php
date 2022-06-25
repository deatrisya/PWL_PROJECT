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

        // $month = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];

        // foreach ($month as $key => $value) {
        //     $barangMasuk[] = Pengadaan::whereMonth('created_at', '=', $value)->sum('jumlah');
        //     $barangPemeliharaan[] = Pemeliharaan::whereMonth('created_at', '=', $value)->sum('jumlah');
        //     $barangPenyusutan[] = Penyusutan::whereMonth('created_at', '=', $value)->sum('jumlah');
        // }

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

            // 'barangMasuk' => json_encode($barangMasuk, JSON_NUMERIC_CHECK),
            // 'barangPemeliharaan' => json_encode($barangPemeliharaan, JSON_NUMERIC_CHECK),
            // 'barangPenyusutan' => json_encode($barangPenyusutan, JSON_NUMERIC_CHECK),
        ];

        return view('index', $data);
    }
}
