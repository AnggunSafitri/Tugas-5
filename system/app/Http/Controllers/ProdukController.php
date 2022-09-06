<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $data['list_produk'] = Produk::all();
        return view('backview.produk.index', $data);
    }

    public function create()
    {
        return view('backview.produk.create');
    }

    public function store(Request $request)
    {
        $kategori = New Produk;
        $kategori->nama_produk = request('nama_produk');
        $kategori->warna = request('warna');
        $kategori->stok = request('stok');
        $kategori->harga = request('harga');
        $kategori->save();

        return redirect('admin/produk')->with('success', 'Data Berhasil Di simpan');
    }

    public function show(Produk $produk)
    {
        $data['produk'] = $produk;
        return view('backview.produk.show', $data);
    }

    public function edit(Produk $produk)
    {
        $data['produk'] = $produk;
        return view('backview.produk.edit', $data);
    }

    public function update(Produk $produk)
    {
        $produk->nama_produk= request('nama_produk');
        $produk->warna= request('warna');
        $produk->stok= request('stok');
        $produk->harga= request('harga');
        $produk->save();

        return redirect('admin/produk')->with('success', 'Data Berhasil Di simpan');
    }

    public function destroy($produk)
    {
        Produk::destroy($produk);

        return back()->with('danger', 'Data Berhasil Di simpan');
    }
}
