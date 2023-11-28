<?php

namespace App\Http\Controllers\backsite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class Pembelian extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $notransaksilast = DB::table('tbl_beli')->latest()->first();
        if($notransaksilast){
            $notransaksi = $notransaksilast->notransaksi;
            $notransaksi = substr($notransaksi, 7, 9);
            $notransaksi = $notransaksi + 1;
            $notransaksi = 'B'.date('Ym').sprintf('%03s', $notransaksi);
      
        }else{
            $notransaksi = 'B'.date('Ym').'001';
        }
        // suplier
        $supliers = \App\Models\Suplier::orderBy('id', 'desc')->get();
        // barang
        $barangs = \App\Models\Barang::orderBy('id', 'desc')->get();

        return view('pages.backsite.beli.create', compact('notransaksi', 'supliers', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        DB::beginTransaction();
        try {
          
        // buat validasi dari form input yang di kirim
        $request->validate([
            'notransaksi' => 'required',
            'suplier' => 'required|not_in:0',
            'tanggal_beli' => 'required',
            'namabarang' => 'required|not_in:0',
            'hargabeli' => 'required|numeric',
            'qty' => 'required|numeric',
            'diskon' => 'required|numeric',
        ]);

        $databeli = [
            'notransaksi' => $request->notransaksi,
            'kode_suplier' => $request->suplier,
            'tanggal_beli' => $request->tanggal_beli
        ];
        \App\Models\Beli::create($databeli);

        $datadetailbeli = [
            'notransaksi' => $request->notransaksi,
            'kode_barang' => $request->namabarang,
            'harga_beli' => $request->hargabeli,
            'qty' => $request->qty,
            'diskon' => $request->diskon,
            'diskon_rp' => $request->total,
            'total' => $request->subtotal
        ];
        \App\Models\DetailBeli::create($datadetailbeli);

        $datahutang = [
            'notransaksi' => $request->notransaksi,
            'kode_supplier' => $request->suplier,
            'tanggal_beli' => $request->tanggal_beli,
            'total_hutang' => $request->total
            
        ];
        \App\Models\Hutang::create($datahutang);

    
        // cek kode barang di table stok
        $cekstok = DB::table('tbl_stock')->where('kode_barang', $request->namabarang)->first();
        if($cekstok){
            // jika ada maka update qty
            $qty = $cekstok->qty_beli + $request->qty;
            $datastok = [
                'qty_beli' => $qty,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            DB::table('tbl_stock')->where('kode_barang', $request->namabarang)->update($datastok);
        }else{
            // jika tidak ada maka insert data
            $datastok = [
                'kode_barang' => $request->namabarang,
                'qty_beli' => $request->qty,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            DB::table('tbl_stock')->insert($datastok);
        }
    
        DB::commit();
        Alert::success('Success', 'Data Berhasil Di Tambahkan');
        return redirect()->route('beli.create');
        } catch (\Exception $e) {
            DB::rollback();
            // dd($e);
            Alert::error('Error', 'Data Gagal Di Tambahkan');
            return redirect()->route('beli.create');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
