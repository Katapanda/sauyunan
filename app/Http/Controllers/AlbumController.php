<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use yajra\DataTables\Datatables;

use App\Models\Album;
use App\Models\DetailAlbum;

class AlbumController extends Controller
{
    public function index()
    {
        return view('admin.modules.album.index');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        // $data = [
        //     'nama' => $request['nama'],
        //     'nip' => $request['nip'],
        //     'id_so' => $id
        // ];
        Album::create($input);
        

        return response()->json([
            'success' => true,
            'message' => 'SO Created'
        ]);
    }
    public function detailalbum($id)
    {
        $album = Album::find($id);
        $detail = DetailAlbum::where('id_album',$id)->get();
        // $detail = DetailAlbum::select(['id', 'id_album', 'foto'])->where('id_album',$id);
        // $detail = DetailAlbum::find($id);
        // return $detail;
        return view('admin.modules.album.detailalbum', ['data' => $album, 'detail' => $detail]);
    }
    public function uploadfoto(Request $request)
    {
        $file = $request->file('file');

        $filename = '/upload/gambar/'.uniqid().$file->getClientOriginalName();

        $file->move(public_path('/upload/gambar/'), $filename);

        $album = Album::find($request->input('id_album'));
        $image = $album->detailalbum()->create([
        	'id_album' => $request->input('id_album'),
        	'foto' => $filename,
        ]);
        return $image;
    }
    public function edit($id)
    {
        $album = Album::find($id);
        return $album;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $album = Album::find($id);
        $album->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Album Updated'
        ]);
        // return $album;
    }
    public function destroy($id)
    {
        
        $album = Album::findOrFail($id);
        Album::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Album Deleted'
        ]);
    }

    public function apiAlbum(Request $request)
    {
        // $album = Album::all();
        $album = Album::select(['id', 'judul_album', 'keterangan_kegiatan', 'tanggal_publish']);
        // print_r($album);
        return Datatables::of($album)
            ->filter(function ($query) use ($request) {
                if ($request->has('judul_album')) {
                    $query->where('judul_album', 'like', "%{$request->get('judul_album')}%");
                }

                if ($request->has('keterangan_kegiatan')) {
                    $query->where('keterangan_kegiatan', 'like', "%{$request->get('keterangan_kegiatan')}%");
                }
            })
            ->addColumn('keterangan_kegiatan', function($album){
                return $album->keterangan_kegiatan;
            })
            ->addColumn('action', function($album){
                return '<a href="'.url("admin/album/detail",$album->id).'" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Tambah Foto</a>'.
                    '<a onclick="deleteData('. $album->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['keterangan_kegiatan','action'])->make(true);
    }
}
