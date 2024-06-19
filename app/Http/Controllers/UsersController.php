<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function guest()
    {
        return view('users.guest');
    }
    public function customer()
    {
        return view('users.user');
    }

    public function index()
    {

        $getAllDatas = [
            'dataAkses' => User::all(),

        ];

        return view('admin.akses.akses', $getAllDatas);
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

        return redirect('/akses');
    }


    public function delete($id)
    {

        User::where('token_users', $id)->delete();

        return redirect('/akses');
    }
}
