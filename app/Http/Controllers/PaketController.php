<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index(){
        $dataPakets = [
            'pakets' => Paket::all()
        ];

        return view('admin.pakets.paket', $dataPakets);
    }
    public function create(){
        return view('admin.pakets.paket_create');
    }
    public function create_action(Request $request){

        // dd($request->all());
        $request->validate([
            'kategori_paket' => 'required',
            'harga_paket' => 'required'
         ]);

         $token = uniqid();

         $data = [
            'token_paket' => $token,
            'kategori_paket' => $request->kategori_paket,
            'harga_paket' => $request->harga_paket,
         ];

         Paket::create($data);
        return redirect('/paket');
    }
    public function update($id){

       $getPakets = Paket::getTokenPaket( $id);

        return view('admin.pakets.paket_update', compact('getPakets'));
    }
    public function update_action(Request $request, $id){

        // dd($request->all());
        $request->validate([
            'kategori_paket' => 'required',
            'harga_paket' => 'required'
         ]);

         $token = uniqid();

         $data = [
            'token_paket' => $token,
            'kategori_paket' => $request->kategori_paket,
            'harga_paket' => $request->harga_paket,
         ];

         Paket::where('token_paket',$id)->update($data);
        return redirect('/paket');
    }

    public function delete($id){
        Paket::where('token_paket',$id)->delete();
        return redirect('/paket');
    }
}
