<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekapitulasi extends Model
{
    use HasFactory;
    protected $table = 'rekapitulasi_pakets';
    protected $guarded = ['id'];



    public static function getToken($token)
    {

        $query = db::table('rekapitulasi_pakets')->where('token_rekap', $token);
        return $query;
    }

    public static function joinTwoTable()
    {
        $query = DB::table('rekapitulasi_pakets')->join('customers', 'rekapitulasi_pakets.customers_id', '=', 'customers.id')->get();
        return $query;
    }

    public function Customers()
    {
        return $this->hasOne(Customers::class, 'token_customer', 'customer');
    }
}
