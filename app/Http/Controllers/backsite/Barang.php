<?php

namespace App\Http\Controllers\backsite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class Barang extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $barangs = \App\Models\Barang::orderBy('id', 'desc')->get();
        return view('pages.backsite.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backsite.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // buat validasi dari form input yang di kirim
        $request->validate([
            'kodebarang' => 'required',
            'namabarang' => 'required',
            'satuan' => 'required',
            'hargabeli' => 'required|numeric',
        ]);

        // buat variabel untuk menampung data yang di kirim
        $data = [
            'kode_barang' => $request->kodebarang,
            'nama_barang' => $request->namabarang,
            'satuan' => $request->satuan,
            'harga_beli' => $request->hargabeli,
        ];

        // buat query untuk insert data ke table barang
        \App\Models\Barang::create($data);
        Alert::success('Success', 'Data Berhasil Di Tambahkan');
        return redirect()->route('barang.index');
       

      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = \App\Models\Barang::findOrFail($id);
        return view('pages.backsite.barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // buat validasi dari form input yang di kirim
        $request->validate([
            'kodebarang' => 'required',
            'namabarang' => 'required',
            'satuan' => 'required',
            'hargabeli' => 'required|numeric',
        ]);

        // buat variabel untuk menampung data yang di kirim
        $data = [
            'kode_barang' => $request->kodebarang,
            'nama_barang' => $request->namabarang,
            'satuan' => $request->satuan,
            'harga_beli' => $request->hargabeli,
        ];

        // buat query untuk insert data ke table barang
        \App\Models\Barang::findOrFail($id)->update($data);
        Alert::success('Success', 'Data Berhasil Di Update');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \App\Models\Barang::findOrFail($id)->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus');
        return redirect()->route('barang.index');
    }
}
