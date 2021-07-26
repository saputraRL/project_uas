<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class FormController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'jns_klamin' => 'required'
        ]);

        // dd($request->all());
        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->no_telp = $request->no_telp;
        $supplier->alamat = $request->alamat;
        $supplier->jns_klamin = $request->jns_klamin;
        $supplier->save();

        return response()->json([
                'message'       => 'Supplier Berhasil Ditambahkan',
                'data_Supplier'  => $supplier
            ], 200);
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return response()->json([
                'message'       => 'success',
                'data_Supplier'  => $supplier
            ], 200);
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);

        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'jns_klamin' => 'required'
        ]);

        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'jns_klamin' => $request->jns_klamin
        ]);

        return response()->json([
                'message'       => 'success',
                'data_Supplier'  => $supplier
            ], 200);
    }

    public function delete($id)
    {
        $supplier = Supplier::find($id)->delete();

        return response()->json([
                'message'       => 'data Supplier berhasil dihapus'
            ], 200);
    }
}
