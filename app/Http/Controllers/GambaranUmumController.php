<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use yajra\DataTables\Datatables;

use App\Models\GambaranUmum;

class GambaranUmumController extends Controller
{
    public function index()
    {
        return view('admin.modules.gambaranumum.index');
    }
    public function ajax_tampil($id)
    {
        $gambaranumum = GambaranUmum::find($id);
        return view('admin.modules.gambaranumum.ajaxtampil', ['isi' => $gambaranumum]);
    }
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'isi_gambaran_umum' => 'required'
        // ]);
        $input = $request->all();
        GambaranUmum::create($input);
        
        // return response()->json([
        //     'success' => true,
        //     'message' => 'GambaranUmum Created'
        // ]);

        return redirect()->action('GambaranUmumController@index')->with(['success' => 'Berhasil Tambah Data']);
        // $data = [
        //     'isi_gambaran_umum'     => $request['isi_gambaran_umum'],
        //     'nama_kegiatan'     => $request['nama_kegiatan'],
        //     'perihal'     => $request['perihal'],
        //     'lokasi'     => $request['lokasi'],
        //     'hadirin'     => $request['hadirin'],
        //     'tanggal'     => $request['tanggal'],
        //     'waktu'     => $request['waktu'],
        //     'keterangan_kegiatan'     => $request['keterangan_kegiatan']
        // ];

        // return GambaranUmum::create($data);
    }
    public function editisi($id)
    {
        $gambaranumum = GambaranUmum::find($id);
        return view('admin.modules.gambaranumum.editgambaranumum', ['isi' => $gambaranumum]);
    }
    public function ubah(Request $request, $id)
    {

        $this->validate($request,[
            'isi_gambaran_umum' => 'required'
        ]);
        $input = $request->all();
        $gambaranumum = GambaranUmum::find($id);
        if ($gambaranumum->update($input)) {
            return redirect()->action('GambaranUmumController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('GambaranUmumController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil DI Ubah']);
        }

    }
    public function edit($id)
    {
        $gambaranumum = GambaranUmum::find($id);
        return $gambaranumum;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $gambaranumum = GambaranUmum::find($id);
        if ($gambaranumum->update($input)) {
            return redirect()->action('GambaranUmumController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('GambaranUmumController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil DI Ubah']);
        }
    }
    public function destroy($id)
    {
        
        $gambaranumum = GambaranUmum::findOrFail($id);
        GambaranUmum::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'GambaranUmum Deleted'
        ]);
    }

    public function apiGambaranUmum(Request $request)
    {
        // $gambaranumum = GambaranUmum::all();
        $gambaranumum = GambaranUmum::select(['id', 'isi_gambaran_umum']);
        // print_r($gambaranumum);
        return Datatables::of($gambaranumum)
            ->filter(function ($query) use ($request) {
                if ($request->has('isi_gambaran_umum')) {
                    $query->where('isi_gambaran_umum', 'like', "%{$request->get('isi_gambaran_umum')}%");
                }
            })
            ->addColumn('isi_gambaran_umum', function($gambaranumum){
                return $gambaranumum->isi_gambaran_umum;
            })
            ->addColumn('action', function($gambaranumum){
                return '<a onclick="editForm('. $gambaranumum->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $gambaranumum->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['isi_gambaran_umum','action'])->make(true);
    }
}
