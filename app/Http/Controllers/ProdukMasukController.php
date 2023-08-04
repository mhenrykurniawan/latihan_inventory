<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukKeluar;
use App\Models\ProdukMasuk;
use Illuminate\Http\Request;

class ProdukMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Produk Masuk',
            'produk_masuk' => ProdukMasuk::all()
        ];
        return view('produk_masuk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Produk Keluar',
            'produk' => Produk::all()
        ];
        return view('produk_masuk.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProdukMasuk::create([
            'id_produk' => $request->id_produk,
            'jumlah' => $request->jumlah,
        ]);

        $produk = Produk::where('id', $request->id_produk)->first();
        $total_stok = $produk->stok + $request->jumlah;

        Produk::where('id', $request->id_produk)->update(['stok' => $total_stok]);

        return redirect()->route('produk_masuk.index')->with('success', 'Data berhasil disimpan!');
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
    public function edit($id)
    {
        $data = [
            'title' => 'Produk Masuk',
            'produk' => Produk::all(),
            'produk_masuk' => ProdukMasuk::where('id', $id)->get()
        ];
        return view('produk_masuk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // kurangi dulu stok pada produk dengan jumlah masuk yang diedit
        $produk_masuk = ProdukMasuk::where('id', $id)->first();
        $produk = Produk::where('id', $request->id_produk)->first();

        // kembalikan stok ke semula
        $kurangi_stok = $produk->stok - $produk_masuk->jumlah;

        $result =  Produk::where('id', $request->id_produk)->update(['stok' => $kurangi_stok]);
        if ($result) {
            //simpan perubahan pada produk masuk
            ProdukMasuk::where('id', $id)->update([
                'id_produk' => $request->id_produk,
                'jumlah' => $request->jumlah,
            ]);

            // jumlahkan dengan jumlah stok baru
            $total_stok = $request->jumlah + $kurangi_stok;

            Produk::where('id', $request->id_produk)->update(['stok' => $total_stok]);

            return redirect()->route('produk_masuk.index')->with('success', 'Data berhasil disimpan!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProdukMasuk::destroy($id);

        return redirect()->route('produk_masuk.index')->with('success', 'Data berhasil dihapus!');
    }
}
