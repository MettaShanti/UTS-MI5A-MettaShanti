<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //panggil model produk
        $result = Produk::all();

        // kirim data $result ke view produk/index.blade.php
        return view('produk.index')->with('produk', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input nama, disamakan dengan tabel didatabase
        $input = $request->validate([
            "namaproduk"        =>"required",
            "jumlahproduk"      =>"required",
            "deskripsiproduk"   =>"required"
        ]);
        

        //simpan
        Produk::create($input);

        //redirect beserta pesan sukses
        return redirect()->route('produk.index')->with('success', $request->nama.' Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }

    public function getProduk(){
        $reponse['data'] = Produk::all();
        $response['message'] = 'List data manajemen produk';
        $response['success'] = true;

        return response()->json($response, 200);
    }
    public function storeProdukpetshop(Request $request){
        $input = $request->validate([
            "nama"          =>"required",
            "kategori"      =>"required",
            "jumlah"        =>"required",
            "tanggal_masuk" =>"required"
        ]);
        $hasil = Produk::create($input);
        if($hasil){// jika berhasil disimpan
            $response['success'] = true;
            $response['message'] = $request->nama. " Berhasil Disimpan";
            return response()->json($response, 201); // 201 create atau sudah berhasil disimpan
        }else{
            $response['success'] = false;
            $response['message'] = $request->nama. " Gagal Disimpan";
            return response()->json($response, 400); //400 bad request
        }
    }
    public function destroyProduk($id){
        // cari data di table produk berdasarkan "id" produk
        $produk = Produk::find($id);
        //dd($produk);
        $hasil = $produk->delete();
        if($hasil){// jika berhasil disimpan
            $response['success'] = true;
            $response['message'] =" Produk Berhasil Dihapus";
            return response()->json($response, 201); // 201 create atau sudah berhasil disimpan
        }else{
            $response['success'] = false;
            $response['message'] =  "Produk gagal dihapus";
            return response()->json($response, 400); //400 bad request
        }
    }
}
