<?php

namespace App\Http\Controllers;

use App\Models\Rekapitulasi;
use Illuminate\Http\Request;
// use BaconQrCode\Encoder\QrCode;
use App\Http\Controllers\Controller;
use App\Models\Customers;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class RekapitulasiPaketController extends Controller
{
    public function index()
    {
        $dataRekap =  Rekapitulasi::joinTwoTable();

        return view('admin.rekapitulasi-pakets.rekapitulasi-paket', compact('dataRekap'));
    }




    public function scannerStore(Request $request)
    {


        $token = $request->input('customer');

        // Cari customer berdasarkan token
        $customer = Customers::where('token_customer', $token)->first();

        if ($customer) {
            // Cek apakah data sudah ada di rekapitulasi_pakets
            $existingRecord = Rekapitulasi::where('customers_id', $customer->id)
                ->whereDate('tanggal', now()->toDateString())
                ->first();
            toast('Customer Telah direcord', 'warning');


            if (!$existingRecord) {
                // Tambahkan data rekapitulasi paket jika belum ada
                Rekapitulasi::create([
                    'customers_id' => $customer->id,
                    'tanggal' => now(),
                ]);

                toast('Customer Berhasil direcord', 'success');
            }

            // Update status customer
            $customer->status = 'success';
            $customer->save();

            return redirect()->back()->with('success', 'Customer status updated and package recorded successfully.');
        } else {
            return redirect()->back()->with('error', 'Customer not found.');
        }
    }



    public function scann()
    {
    }


    public function update()
    {




        return view('admin.rekapitulasi-pakets.rekapitulasi-paket_update');
    }
}
