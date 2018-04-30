<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use yajra\DataTables\Datatables;

use App\Models\KategoriBerita;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        return view('admin.modules.kategoriberita.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        KategoriBerita::create($input);
        return response()->json([
            'success' => true,
            'message' => 'SO Created'
        ]);
    }
    public function edit($id)
    {
        $kategoriberita = KategoriBerita::find($id);
        return $kategoriberita;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $kategoriberita = KategoriBerita::findOrFail($id);
        $kategoriberita->update($input);

        return response()->json([
            'success' => true,
            'message' => 'StrukturOrganisasi Updated'
        ]);
    }
    public function destroy($id)
    {
        KategoriBerita::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'StrukturOrganisasi Deleted'
        ]);
    }
    public function apiKategoriBerita(Request $request)
    {
        // $kategoriberita = KategoriBerita::where('id', $id)->get();
        $kategoriberita = KategoriBerita::select(['id', 'nama_kategori']);
        // print_r($agenda);
        return Datatables::of($kategoriberita)
            ->filter(function ($query) use ($request) {
                if ($request->has('nama_kategori')) {
                    $query->where('nama_kategori', 'like', "%{$request->get('nama_kategori')}%");
                }
            })
            ->addColumn('action', function($kategoriberita){
                return '<a onclick="editForm('. $kategoriberita->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $kategoriberita->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);
    }
}
