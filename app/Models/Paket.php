<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'pakets';
    protected $guarded = ['id'];


    public static function getTokenPaket($token)
    {
        $query = DB::table('pakets')->where('token_paket', $token)->first();
        return $query;
    }

    public function Paket()
    {
        return $this->hasOne(Paket::class, 'pakets_id', 'kategori_paket');
    }
}
