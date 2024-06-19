<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CustomerController extends Controller
{
    public function index()
    {

        $dataCustomer = Customers::CustomersJoin__()->get();
        foreach ($dataCustomer as $get) {

            $get->qrCode = QrCode::size(150)->generate(json_encode([
                'name' => $get->name,
                'nomer_whatsapp' => $get->nomer_whatsapp,
                'email' => $get->email,
                'kategori_paket' => $get->kategori_paket,
            ]));
        }

        return view('admin.customers.customer', compact('dataCustomer'));
    }

    public function create()
    {

        $dataCustomer = [
            'datapakets' => Paket::all(),
        ];
        return view('admin.customers.customer_create', $dataCustomer);
    }

    public function create_action(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email',
            'nomer_whatsapp' => 'required|string|max:20',
            'pakets_id' => 'required|integer|exists:pakets,id',
            'status' => 'required|in:success,pending,invalid'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'nomer_whatsapp.required' => 'Nomor WhatsApp tidak boleh kosong',
            'pakets_id.required' => 'Paket harus dipilih',
            'pakets_id.exists' => 'Paket tidak ditemukan',
            'status.required' => 'Status tidak boleh kosong',
            'status.in' => 'Status tidak valid'
        ]);

        $token = uniqid();

        $data = [
            'token_customer' => $token,
            'name' => $request->name,
            'email' => $request->email,
            'nomer_whatsapp' => $request->nomer_whatsapp,
            'pakets_id' => $request->pakets_id,
            'status' => $request->status,
        ];

        Customers::create($data);
        Alert::success('Success Title', 'Success Message');

        return redirect('/customer')->with('success', 'Data berhasil disimpan');
    }

    public function update($id)
    {


        $dataCustomer = [
            'datapakets' => Paket::all(),
            'get' => Customers::where('token_customer', $id)->first(),
        ];


        return view('admin.customers.customer_update', $dataCustomer);
    }
    public function update_action(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'nomer_whatsapp' => 'required|string|max:20',
            'pakets_id' => 'required|integer|exists:pakets,id',
            'status' => 'required|in:success,pending,invalid'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'nomer_whatsapp.required' => 'Nomor WhatsApp tidak boleh kosong',
            'pakets_id.required' => 'Paket harus dipilih',
            'pakets_id.exists' => 'Paket tidak ditemukan',
            'status.required' => 'Status tidak boleh kosong',
            'status.in' => 'Status tidak valid'
        ]);

        $token = uniqid();

        $data = [
            'token_customer' => $token,
            'name' => $request->name,
            'email' => $request->email,
            'nomer_whatsapp' => $request->nomer_whatsapp,
            'pakets_id' => $request->pakets_id,
            'status' => $request->status,
        ];

        Customers::where('token_customer', $id)->update($data);
        Alert::success('Success', 'Data Berhasil Edit');

        return redirect('/customer')->with('success', 'Data berhasil disimpan');
    }


    public function delete($id)
    {
        Customers::where('token_customer', $id)->delete();
        return redirect('/customer');
    }
}
