<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Rekapitulasi;
// use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
                $token = uniqid(30);

                Rekapitulasi::create([
                    'token_rekap' => $token,
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




    public function delete($id)
    {
        Rekapitulasi::where('rekapitulasi_id', $id)->delete();
        return redirect('/rekapitulasi-paket');
    }


    public function update()
    {
        return view('admin.rekapitulasi-pakets.rekapitulasi-paket_update');
    }
}
