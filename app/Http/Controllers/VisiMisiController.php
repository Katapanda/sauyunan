<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    public function index()
    {
        return view('admin.modules.visimisi.index');
    }
    public function ajax_tampil($id)
    {
        $visi_misi = VisiMisi::find($id);
        return view('admin.modules.visi_misi.ajaxtampil', ['isi' => $visi_misi]);
    }
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'isi_visi_misi' => 'required'
        // ]);
        $input = $request->all();
        VisiMisi::create($input);
        
        // return response()->json([
        //     'success' => true,
        //     'message' => 'VisiMisi Created'
        // ]);

        return redirect()->action('VisiMisiController@index')->with(['success' => 'Berhasil Tambah Data']);
        // $data = [
        //     'isi_visi_misi'     => $request['isi_visi_misi'],
        //     'nama_kegiatan'     => $request['nama_kegiatan'],
        //     'perihal'     => $request['perihal'],
        //     'lokasi'     => $request['lokasi'],
        //     'hadirin'     => $request['hadirin'],
        //     'tanggal'     => $request['tanggal'],
        //     'waktu'     => $request['waktu'],
        //     'keterangan_kegiatan'     => $request['keterangan_kegiatan']
        // ];

        // return VisiMisi::create($data);
    }
    public function editisi($id)
    {
        $visi_misi = VisiMisi::find($id);
        return view('admin.modules.visimisi.editvisimisi', ['isi' => $visi_misi]);
    }
    public function ubah(Request $request, $id)
    {

        $this->validate($request,[
            'visi' => 'required',
            'misi' => 'required'
        ]);
        $input = $request->all();
        $visi_misi = VisiMisi::find($id);
        if ($visi_misi->update($input)) {
            return redirect()->action('VisiMisiController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('VisiMisiController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil DI Ubah']);
        }

    }
    public function edit($id)
    {
        $visi_misi = VisiMisi::find($id);
        return $visi_misi;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $visi_misi = VisiMisi::find($id);
        $visi_misi->update($input);

        return redirect()->action('VisiMisiController@index');
        // return $visi_misi;
    }
    public function destroy($id)
    {
        
        $visi_misi = VisiMisi::findOrFail($id);
        VisiMisi::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'VisiMisi Deleted'
        ]);
    }

    public function apiVisiMisi(Request $request)
    {
        // $visi_misi = VisiMisi::all();
        $visi_misi = VisiMisi::select(['id', 'visi', 'misi']);
        // print_r($visi_misi);
        return Datatables::of($visi_misi)
            ->filter(function ($query) use ($request) {
                if ($request->has('visi')) {
                    $query->where('visi', 'like', "%{$request->get('visi')}%");
                }
                if ($request->has('misi')) {
                    $query->where('misi', 'like', "%{$request->get('misi')}%");
                }
            })
            ->addColumn('visi', function($visi_misi){
                return $visi_misi->visi;
            })
            ->addColumn('misi', function($visi_misi){
                return $visi_misi->misi;
            })
            ->addColumn('action', function($visi_misi){
                return '<a href="'.url("admin/visimisi/editisi",$visi_misi->id).'" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a> <a onclick="deleteData('. $visi_misi->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['visi','misi','action'])->make(true);
    }
}
