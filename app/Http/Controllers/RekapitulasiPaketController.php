<?php

namespace App\Http\Controllers;

use App\Models\Rekapitulasi;
use Illuminate\Http\Request;
// use BaconQrCode\Encoder\QrCode;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class RekapitulasiPaketController extends Controller
{
    public function index()
    {
        $dataRekap =  Rekapitulasi::all();

        return view('admin.rekapitulasi-pakets.rekapitulasi-paket', compact('dataRekap'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'kategori_paket' => 'required|string|max:255',
            'nomer_whatsapp' => 'required|string|max:15',
        ]);



        // Create a new Data instance and save it to the database
        $data = new Rekapitulasi();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->kategori_paket = $request->input('kategori_paket');
        $data->nomer_whatsapp = $request->input('nomer_whatsapp');
        $data->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Data has been saved successfully.');
    }


    public function update()
    {




        return view('admin.rekapitulasi-pakets.rekapitulasi-paket_update');
    }
}
