<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function admin()
    {
        $dataAll = [
            "totalPelayanan" => Customers::count(),
            "totalValue" => Paket::sum('harga_paket')

        ];

        $name = auth()->user()->username;
        toast('Selamat Datang di Halaman Admin ' . $name, 'info');

        return view('admin.dashboard', $dataAll);
    }
    public function karyawan()
    {
        $name = auth()->user()->username;
        toast('Selamat Datang di halaman Karyawan ' . $name, 'info');

        return view('admin.dashboard');
    }
}
