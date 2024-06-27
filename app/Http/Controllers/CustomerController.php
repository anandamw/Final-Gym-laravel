<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Customers;
use App\Mail\CustomerMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\ViewFinderInterface;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\WhatsappController;

class CustomerController extends Controller
{

    protected $WhatsappControllers;
    public function __construct(WhatsappController $WhatsappControllers)
    {
        $this->WhatsappControllers = $WhatsappControllers;
    }

    public function index()
    {

        $dataCustomer = Customers::all(); // Ambil semua data pelanggan




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
        // ddd($request->all());

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
            'status' =>  $request->status
        ];

        $constCustomer = Customers::create($data);

        $paket = Paket::find($request->pakets_id);

        $target = $constCustomer->nomer_whatsapp;

        // $token = Customers::where('token_customer');
        $massage = "Haii $request->name, Selamat Datang Di MAXGYM, kamu telah terdaftar di Aplikasi Kami. 
        
        Waktu Dibuat : " .  date("Y-m-d h:i:sa ") . "
        Nama : $request->name
        Email : $request->email
        Paket : $paket->kategori_paket  
        Harga : $paket->harga_paket
        Link QrCode :  $token

              ";


        $this->WhatsappControllers->inject($target, $massage);
        Alert::success('Success', 'Data Berhasil ditambahkan');

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
        Alert::success('Success', 'Data Berhasil dihapus');

        return redirect('/customer');
    }


    public function details($id)
    {
        $dataCustomer = Customers::select('customers.*', 'pakets.kategori_paket')
            ->join('pakets', 'customers.pakets_id', '=', 'pakets.id')
            ->where('customers.id', $id)
            ->firstOrFail();
        // Menambahkan QR Code untuk customer
        $dataCustomer->qrCode = QrCode::size(150)->generate(json_encode([
            'name' => $dataCustomer->name,
            'nomer_whatsapp' => $dataCustomer->nomer_whatsapp,
            'email' => $dataCustomer->email,
            'kategori_paket' => $dataCustomer->kategori_paket,
        ]));

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('admin.customers.customer_detail', compact('dataCustomer')));
        $mpdf->Output();


        // Kirim data ke view 'admin.customers.customer_detail'
        // return view('admin.customers.customer_detail', compact('dataCustomer'));
    }

    public function update_notice_action($id)
    {
    }
}
