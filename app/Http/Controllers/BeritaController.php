<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\Berita;
use App\Models\KategoriBerita;

class BeritaController extends Controller
{
    public function index()
    {
        $kategori = KategoriBerita::all();
        // die($kategori);
        return view('admin.modules.berita.index', compact('kategori'));
    }
    public function editisi($id)
    {
        $kategori = KategoriBerita::all();
        $berita = Berita::find($id);
        return view('admin.modules.berita.editberita', ['isi' => $berita, 'kategori' => $kategori]);
    }
    public function ajax_tampil($id)
    {
        $berita = Berita::find($id);
        return view('admin.modules.berita.ajaxtampil', ['isi' => $berita]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $input['foto_berita'] = null;

        // return $input;
        if ($request->hasFile('foto_berita')){
            $input['foto_berita'] = '/upload/foto_berita/'.str_slug($input['judul_berita'], '-').'.'.$request->foto_berita->getClientOriginalExtension();
            $request->foto_berita->move(public_path('/upload/foto_berita/'), $input['foto_berita']);
        }
        Berita::create($input);

        return redirect()->action('BeritaController@index')->with(['success' => 'Berhasil Tambah Data']);
    }
    public function edit($id)
    {
        $berita = Berita::find($id);
        return $berita;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $berita = Berita::find($id);

        $input['foto_berita'] = $berita->foto_berita;

        if ($request->hasFile('foto_berita')){
            if (!$berita->foto_berita == NULL){
                unlink(public_path($berita->foto_berita));
            }
            $input['foto_berita'] = '/upload/foto_berita/'.str_slug($input['judul_berita'], '-').'.'.$request->foto_berita->getClientOriginalExtension();
            $request->foto_berita->move(public_path('/upload/foto_berita/'), $input['foto_berita']);
        }

        if ($berita->update($input)) {
            return redirect()->action('BeritaController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('BeritaController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil DI Ubah']);
        }
        // return $berita;
    }
    public function ubah(Request $request, $id)
    {
        $input = $request->all();
        $berita = Berita::find($id);

        $input['foto_berita'] = $berita->foto_berita;

        if ($request->hasFile('foto_berita')){
            if (!$berita->foto_berita == NULL){
                unlink(public_path($berita->foto_berita));
            }
            $input['foto_berita'] = '/upload/foto_berita/'.str_slug($input['judul_berita'], '-').'.'.$request->foto_berita->getClientOriginalExtension();
            $request->foto_berita->move(public_path('/upload/foto_berita/'), $input['foto_berita']);
        }

        if ($berita->update($input)) {
            return redirect()->action('BeritaController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('BeritaController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil DI Ubah']);
        }
    }
    public function destroy($id)
    {
        
        $berita = Berita::findOrFail($id);

        if (!$berita->foto_berita == NULL){
            unlink(public_path($berita->foto_berita));
        }

        Berita::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Berita Deleted'
        ]);
    }

    public function apiBerita(Request $request)
    {
        $berita = Berita::select(['id', 'judul_berita', 'isi_berita', 'sumber', 'foto_berita', 'tanggal_publish']);
        // print_r($agenda);
        return Datatables::of($berita)
            ->filter(function ($query) use ($request) {
                if ($request->has('judul_berita')) {
                    $query->where('judul_berita', 'like', "%{$request->get('judul_berita')}%");
                }

                if ($request->has('isi_berita')) {
                    $query->where('isi_berita', 'like', "%{$request->get('isi_berita')}%");
                }
            })
            ->addColumn('isi_berita', function($berita){
                return $berita->isi_berita;
            })
            ->addColumn('foto_berita', function($berita){
                if ($berita->foto_berita == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($berita->foto_berita) .'" alt="">';
            })
            ->addColumn('action', function($berita){
                return '<a href="'.url("admin/berita/editisi",$berita->id).'" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $berita->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['isi_berita','foto_berita','action'])->make(true);
    }
}
