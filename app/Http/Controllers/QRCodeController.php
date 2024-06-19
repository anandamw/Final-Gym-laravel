<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'token' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:15',
        ]);

        $data = [
            'token' => $request->token,
            'nama' => $request->nama,
            'whatsapp' => $request->whatsapp,
        ];

        $qrcode = QrCode::size(300)->generate(json_encode($data));

        return view('generate_qrcode', compact('qrcode'));
    }
}
