<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\Tupoksi;

class TupoksiController extends Controller
{
    public function index()
    {
        return view('admin.modules.tupoksi.index');
    }
    public function ajax_tampil($id)
    {
        $tupoksi = Tupoksi::find($id);
        return view('admin.modules.tupoksi.ajaxtampil', ['isi' => $tupoksi]);
    }
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'isi_tupoksi' => 'required'
        // ]);
        $input = $request->all();
        Tupoksi::create($input);
        
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Tupoksi Created'
        // ]);

        return redirect()->action('TupoksiController@index')->with(['success' => 'Berhasil Tambah Data']);
        // $data = [
        //     'isi_tupoksi'     => $request['isi_tupoksi'],
        //     'nama_kegiatan'     => $request['nama_kegiatan'],
        //     'perihal'     => $request['perihal'],
        //     'lokasi'     => $request['lokasi'],
        //     'hadirin'     => $request['hadirin'],
        //     'tanggal'     => $request['tanggal'],
        //     'waktu'     => $request['waktu'],
        //     'keterangan_kegiatan'     => $request['keterangan_kegiatan']
        // ];

        // return Tupoksi::create($data);
    }
    public function editisi($id)
    {
        $tupoksi = Tupoksi::find($id);
        return view('admin.modules.tupoksi.edittupoksi', ['isi' => $tupoksi]);
    }
    public function ubah(Request $request, $id)
    {

        $this->validate($request,[
            'isi_tupoksi' => 'required'
        ]);
        $input = $request->all();
        $tupoksi = Tupoksi::find($id);
        if ($tupoksi->update($input)) {
            return redirect()->action('TupoksiController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('TupoksiController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil DI Ubah']);
        }

    }
    public function edit($id)
    {
        $tupoksi = Tupoksi::find($id);
        return $tupoksi;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $tupoksi = Tupoksi::find($id);
        $tupoksi->update($input);

        return redirect()->action('TupoksiController@index');
        // return $tupoksi;
    }
    public function destroy($id)
    {
        
        $tupoksi = Tupoksi::findOrFail($id);
        Tupoksi::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Tupoksi Deleted'
        ]);
    }

    public function apiTupoksi(Request $request)
    {
        // $tupoksi = Tupoksi::all();
        $tupoksi = Tupoksi::select(['id', 'isi_tupoksi']);
        // print_r($tupoksi);
        return Datatables::of($tupoksi)
            ->filter(function ($query) use ($request) {
                if ($request->has('isi_tupoksi')) {
                    $query->where('isi_tupoksi', 'like', "%{$request->get('isi_tupoksi')}%");
                }
            })
            ->addColumn('isi_tupoksi', function($tupoksi){
                return $tupoksi->isi_tupoksi;
            })
            ->addColumn('action', function($tupoksi){
                return '<a href="'.url("admin/tupoksi/editisi",$tupoksi->id).'" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a> <a onclick="editForm('. $tupoksi->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $tupoksi->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['isi_tupoksi','action'])->make(true);
    }
}
