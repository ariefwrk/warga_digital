<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\KegiatanWarga;
use App\Models\RekapitulasiTransaksi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalWarga = Warga::count();
        $totalKegiatan = KegiatanWarga::count();
        $totalSaldo = RekapitulasiTransaksi::sum('dana_masuk') - RekapitulasiTransaksi::sum('dana_keluar');
       
        $totalPengguna = User::count();

        return view('dashboard', compact('totalWarga', 'totalKegiatan','totalSaldo'));
    }
}