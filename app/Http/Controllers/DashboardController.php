<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function admin()
    {
        $name = auth()->user()->username;
        toast('Selamat Datang di Halaman Admin ' . $name, 'info');

        return view('admin.dashboard');
    }
    public function karyawan()
    {
        $name = auth()->user()->username;
        toast('Selamat Datang di halaman Karyawan ' . $name, 'info');

        return view('admin.dashboard');
    }
}
