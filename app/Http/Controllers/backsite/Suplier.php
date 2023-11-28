<?php

namespace App\Http\Controllers\backsite;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class Suplier extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
             
        $supliers = \App\Models\Suplier::orderBy('id', 'desc')->get();
        return view('pages.backsite.suplier.index', compact('supliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.backsite.suplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // buat validasi dari form input yang di kirim
        $request->validate([
            'kodesuplier' => 'required',
            'namasuplier' => 'required'
        ]);

        // buat variabel untuk menampung data yang di kirim
        $data = [
            'kode_suplier' => $request->kodesuplier,
            'nama_suplier' => $request->namasuplier
        ];

        // buat query untuk insert data ke table barang
        \App\Models\Suplier::create($data);
        Alert::success('Success', 'Data Berhasil Di Tambahkan');
        return redirect()->route('suplier.index');
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
        $suplier = \App\Models\Suplier::findOrFail($id);
        return view('pages.backsite.suplier.edit', compact('suplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // buat validasi dari form input yang di kirim
        $request->validate([
            'kodesuplier' => 'required',
            'namasuplier' => 'required'
        ]);

        // buat variabel untuk menampung data yang di kirim
        $data = [
            'kode_suplier' => $request->kodesuplier,
            'nama_suplier' => $request->namasuplier
        ];

        // buat query untuk insert data ke table barang
        \App\Models\Suplier::findOrFail($id)->update($data);
        Alert::success('Success', 'Data Berhasil Di Update');
        return redirect()->route('suplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        \App\Models\Suplier::findOrFail($id)->delete();
        Alert::success('Success', 'Data Berhasil Di Hapus');
        return redirect()->route('suplier.index');
    }
}
