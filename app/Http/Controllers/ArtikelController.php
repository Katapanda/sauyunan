<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use yajra\DataTables\Datatables;

use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('admin.modules.artikel.index');
    }
    public function editisi($id)
    {
        $artikel = Artikel::find($id);
        return view('admin.modules.artikel.editartikel', ['isi' => $artikel]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $input['foto_artikel'] = null;

        if ($request->hasFile('foto_artikel')){
            $input['foto_artikel'] = '/upload/foto_artikel/'.str_slug($input['judul_artikel'], '-').'.'.$request->foto_artikel->getClientOriginalExtension();
            $request->foto_artikel->move(public_path('/upload/foto_artikel/'), $input['foto_artikel']);
        }

        Artikel::create($input);

        return redirect()->action('ArtikelController@index')->with(['success' => 'Berhasil Tambah Data']);
    }
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return $artikel;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $artikel = Artikel::find($id);

        $input['foto_artikel'] = $artikel->foto_artikel;

        if ($request->hasFile('foto_artikel')){
            if (!$artikel->foto_artikel == NULL){
                unlink(public_path($artikel->foto_artikel));
            }
            $input['foto_artikel'] = '/upload/foto_artikel/'.str_slug($input['judul_artikel'], '-').'.'.$request->foto_artikel->getClientOriginalExtension();
            $request->foto_artikel->move(public_path('/upload/foto_artikel/'), $input['foto_artikel']);
        }

        $artikel->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Artikel Updated'
        ]);
        // return $artikel;
    }
    public function ubah(Request $request, $id)
    {
        $input = $request->all();
        $artikel = Artikel::find($id);

        $input['foto_artikel'] = $artikel->foto_artikel;

        if ($request->hasFile('foto_artikel')){
            if (!$artikel->foto_artikel == NULL){
                unlink(public_path($artikel->foto_artikel));
            }
            $input['foto_artikel'] = '/upload/foto_artikel/'.str_slug($input['judul_artikel'], '-').'.'.$request->foto_artikel->getClientOriginalExtension();
            $request->foto_artikel->move(public_path('/upload/foto_artikel/'), $input['foto_artikel']);
        }

        if ($artikel->update($input)) {
            return redirect()->action('ArtikelController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('ArtikelController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil DI Ubah']);
        }
    }
    public function destroy($id)
    {
        
        $artikel = Artikel::findOrFail($id);

        if (!$artikel->foto_artikel == NULL){
            unlink(public_path($artikel->foto_artikel));
        }

        Artikel::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Artikel Deleted'
        ]);
    }

    public function apiArtikel(Request $request)
    {
        // $artikel = Artikel::all();
        $artikel = Artikel::select(['id', 'judul_artikel', 'isi_artikel', 'sumber_artikel', 'foto_artikel']);
        // print_r($agenda);
        return Datatables::of($artikel)
            ->filter(function ($query) use ($request) {
                if ($request->has('judul_artikel')) {
                    $query->where('judul_artikel', 'like', "%{$request->get('judul_artikel')}%");
                }

                if ($request->has('isi_artikel')) {
                    $query->where('isi_artikel', 'like', "%{$request->get('isi_artikel')}%");
                }
            })
            ->addColumn('isi_artikel', function($artikel){
                return $artikel->isi_artikel;
            })
            ->addColumn('foto_artikel', function($artikel){
                if ($artikel->foto_artikel == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($artikel->foto_artikel) .'" alt="">';
            })
            ->addColumn('action', function($artikel){
                return '<a href="'.url("admin/artikel/editisi",$artikel->id).'" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $artikel->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['isi_artikel','foto_artikel','action'])->make(true);
    }
}
