<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\Berita;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('admin.modules.pengumuman.index');
    }
    public function editisi($id)
    {
        $pengumuman = Berita::find($id);
        return view('admin.editpengumuman', ['menu' => 'pengumuman', 'isi' => $pengumuman]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $input['foto_pamflet'] = null;
        $input['file_pendukung'] = null;

        if ($request->hasFile('foto_pamflet')){
            $input['foto_pamflet'] = '/upload/foto_pamflet/'.str_slug($input['judul_pengumuman'], '-').'.'.$request->foto_pamflet->getClientOriginalExtension();
            $request->foto_pamflet->move(public_path('/upload/foto_pamflet/'), $input['foto_pamflet']);
        }
        if ($request->hasFile('file_pendukung')){
            $input['file_pendukung'] = '/upload/file_pendukung/'.str_slug($input['judul_pengumuman'], '-').'.'.$request->file_pendukung->getClientOriginalExtension();
            $request->file_pendukung->move(public_path('/upload/file_pendukung/'), $input['file_pendukung']);
        }

        Berita::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Contact Created'
        ]);
    }
    public function edit($id)
    {
        $pengumuman = Berita::find($id);
        return $pengumuman;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $pengumuman = Berita::find($id);

        $input['foto_pamflet'] = $pengumuman->foto_pamflet;

        if ($request->hasFile('foto_pamflet')){
            if (!$pengumuman->foto_pamflet == NULL){
                unlink(public_path($pengumuman->foto_pamflet));
            }
            $input['foto_pamflet'] = '/upload/foto_pamflet/'.str_slug($input['judul_pengumuman'], '-').'.'.$request->foto_pamflet->getClientOriginalExtension();
            $request->foto_pamflet->move(public_path('/upload/foto_pamflet/'), $input['foto_pamflet']);
        }

        $pengumuman->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Berita Updated'
        ]);
        // return $pengumuman;
    }
    public function ubah(Request $request, $id)
    {
        $input = $request->all();
        $pengumuman = Berita::find($id);

        $input['foto_pamflet'] = $pengumuman->foto_pamflet;

        if ($request->hasFile('foto_pamflet')){
            if (!$pengumuman->foto_pamflet == NULL){
                unlink(public_path($pengumuman->foto_pamflet));
            }
            $input['foto_pamflet'] = '/upload/foto_pamflet/'.str_slug($input['judul_pengumuman'], '-').'.'.$request->foto_pamflet->getClientOriginalExtension();
            $request->foto_pamflet->move(public_path('/upload/foto_pamflet/'), $input['foto_pamflet']);
        }

        $pengumuman->update($input);

        return redirect()->action('BeritaController@index');
    }
    public function destroy($id)
    {
        
        $pengumuman = Berita::findOrFail($id);

        if (!$pengumuman->foto_pamflet == NULL){
            unlink(public_path($pengumuman->foto_pamflet));
        }

        Berita::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Berita Deleted'
        ]);
    }

    public function apiBerita(Request $request)
    {
        $pengumuman = Berita::select(['id', 'judul_pengumuman', 'isi_pengumuman', 'sumber', 'foto_pamflet', 'tanggal_publish']);
        // print_r($agenda);
        return Datatables::of($pengumuman)
            ->filter(function ($query) use ($request) {
                if ($request->has('judul_pengumuman')) {
                    $query->where('judul_pengumuman', 'like', "%{$request->get('judul_pengumuman')}%");
                }

                if ($request->has('isi_pengumuman')) {
                    $query->where('isi_pengumuman', 'like', "%{$request->get('isi_pengumuman')}%");
                }
            })
            ->addColumn('isi_pengumuman', function($pengumuman){
                return $pengumuman->isi_pengumuman;
            })
            ->addColumn('foto_pamflet', function($pengumuman){
                if ($pengumuman->foto_pamflet == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($pengumuman->foto_pamflet) .'" alt="">';
            })
            ->addColumn('action', function($pengumuman){
                return '<a href="'.url("admin/pengumuman/editisi",$pengumuman->id).'" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Detail</a>'.
                    '<a onclick="editForm('. $pengumuman->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $pengumuman->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['isi_pengumuman','foto_pamflet','action'])->make(true);
    }
}
