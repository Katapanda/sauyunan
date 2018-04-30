<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use yajra\DataTables\Datatables;

use App\Http\Requests;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        return view('admin.produk', ['menu' => 'produk']);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $input['gambar'] = null;

        if ($request->hasFile('gambar')){
            $input['gambar'] = '/upload/gambar/'.str_slug($input['nama_produk'], '-').'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('/upload/gambar/'), $input['gambar']);
        }

        Produk::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Contact Created'
        ]);
    }
    public function edit($id)
    {
        $produk = Produk::find($id);
        return $produk;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $produk = Produk::findOrFail($id);

        $input['gambar'] = $produk->gambar;

        if ($request->hasFile('gambar')){
            if (!$produk->gambar == NULL){
                unlink(public_path($produk->gambar));
            }
            $input['gambar'] = '/upload/gambar/'.str_slug($input['nama_produk'], '-').'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('/upload/gambar/'), $input['gambar']);
        }

        $produk->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Produk Updated'
        ]);
        // return $produk;
    }
    public function destroy($id)
    {
        
        $produk = Produk::findOrFail($id);

        if (!$produk->gambar == NULL){
            unlink(public_path($produk->gambar));
        }

        Produk::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Produk Deleted'
        ]);
    }

    public function apiProduk()
    {
        $produk = Produk::all();
        return Datatables::of($produk)
            ->addColumn('gambar', function($produk){
                if ($produk->gambar == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($produk->gambar) .'" alt="">';
            })
            ->addColumn('action', function($produk){
                return '<button class="btn btn-default btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#ubah" onclick="editForm('.$produk->id.')"> <i class="material-icons">mode_edit</i></button> <button class="btn btn-danger btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#hapus" onclick="deleteData('.$produk->id.')"> <i class="material-icons">delete</i></button>';
            })
            ->rawColumns(['gambar','action'])->make(true);
    }
}
