<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Supplier;

class ProdukController extends Controller
{
    public function create(Request $request)
    {
        // dd($request->all());
        $supplier            = new Supplier;
        $supplier->nama_supplier      = $request->nama_supplier;
        $supplier->alamat    = $request->alamat;
        $supplier->no_telp   = $request->no_telp;
        $supplier->jns_klamin = $request->jns_klamin;
        $supplier->save();

        foreach ($request->list_produk as $key => $value) {
            $produk = array(
                'nama_barang' => $value['nama_barang'],
                'harga' => $value['harga'],
                'stok' => $value['stok'],
                'id_supplier' => $supplier->id
            );
            $produk = Produk::create($produk);
        }

        return response()->json([
                'message'       => 'success'
            ], 200);
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return response()->json([
                'message'       => 'success',
                'data_Produk'  => $produk
            ], 200);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        $supplier            = new Supplier;
        $supplier->nama_supplier      = $request->nama_supplier;
        $supplier->alamat    = $request->alamat;
        $supplier->no_telp   = $request->no_telp;
        $supplier->jns_klamin = $request->jns_klamin;
        $supplier->save();

        foreach ($request->list_produk as $key => $value) {
            $produk = array(
                'nama_barang' => $value['nama_barang'],
                'harga' => $value['harga'],
                'stok' => $value['stok'],
                'id_supplier' => $supplier->id
            );
        }
        return response()->json([
                'message'       => 'success',
                'data_Supplier'  => $supplier
            ], 200);
    }

    public function delete($id)
    {
        $produk = Produk::find($id)->delete();

        return response()->json([
                'message'       => 'data Supplier berhasil dihapus'
            ], 200);
    }
}
