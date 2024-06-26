<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpParser\Node\Expr\FuncCall;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $guarded = ['id'];

    public static function CustomersJoin__()
    {
        $query = DB::table('customers')->join('pakets', 'customers.pakets_id', '=', 'pakets.id');
        return $query;
    }

    public static function TokenCustomer__($token)
    {
        $query = DB::table('customers')->where('token_customer', $token);
        return $query;
    }
}
