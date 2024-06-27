<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\WhatsappController;

class UsersController extends Controller
{

    protected $WhatsappControllers;
    public function __construct(WhatsappController $WhatsappControllers)
    {
        $this->WhatsappControllers = $WhatsappControllers;
    }
    public function guest()
    {
        $data = [
            "getData" => Paket::all(),

        ];
        return view('users.guest', $data);
    }
    public function customer()
    {

        $data = [
            "getData" => Paket::all(),

        ];
        // Alert::success('Success Title', 'Success Message');

        return view('users.user', $data);
    }

    public function index()
    {

        $getAllDatas = [
            'dataAkses' => User::all(),

        ];

        return view('admin.akses.akses', $getAllDatas);
    }

    public function daftarMember()
    {
        $data = Paket::all();
        return view('users.member', compact('data'));
    }

    public function store_action(Request $request)
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
        Paket : $paket->kategori_paket  
        Harga : $paket->harga_paket
        Link QrCode :  $token
              ";


        $this->WhatsappControllers->inject($target, $massage);
        Alert::success('Success Title', 'Success Message');

        return redirect('/page')->with('success', 'Data berhasil disimpan');
    }

    public function create()
    {
        return view('admin.akses.akses_create');
    }
    public function create_action(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string',
        ]);

        $token_users = uniqid();

        $dataCreate = [
            'token_users' => $token_users,
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ];

        User::create($dataCreate);
        Alert::success('Success', 'Data Berhasil ditambahkan');
        return redirect('/akses');
    }



    public function update($id)
    {

        $getData = User::TokenUsers($id);

        return view('admin.akses.akses_update', compact('getData'));
    }
    public function update_action(Request $request, $id)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string',
        ]);


        $dataUpdate = [
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role ?? 'customer',
        ];

        User::where('token_users', $id)->update($dataUpdate);
        Alert::success('Success', 'Data Berhasil diedit');

        return redirect('/akses');
    }


    public function delete($id)
    {

        User::where('token_users', $id)->delete();
        Alert::success('Success', 'Data Berhasil dihapus');
        return redirect('/akses');
    }
}
