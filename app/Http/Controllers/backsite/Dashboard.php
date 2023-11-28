<?php

namespace App\Http\Controllers\backsite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    public function index(){
        // sum of stock in table tbl_stock
        $stock = DB::table('tbl_stock')->sum('qty_beli');
        $hutang = DB::table('tbl_hutang')->sum('total_hutang');
       
        return view('pages.backsite.dashboard.index', compact('stock', 'hutang'));
    }
}
