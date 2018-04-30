<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\DasarHukum;

class DasarHukumController extends Controller
{
    public function index()
    {
        return view('admin.modules.dasar_hukum.index');
    }
    public function ajax_tampil($id)
    {
        $dasar_hukum = DasarHukum::find($id);
        return view('admin.modules.dasar_hukum.ajaxtampil', ['isi' => $dasar_hukum]);
    }
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'isi_dasar_hukum' => 'required'
        // ]);
        $input = $request->all();
        DasarHukum::create($input);

        return redirect()->action('DasarHukumController@index')->with(['success' => 'Berhasil Tambah Data']);
        
    }
    public function edit($id)
    {
        $dasar_hukum = DasarHukum::find($id);
        return $dasar_hukum;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $dasar_hukum = DasarHukum::find($id);
        if ($dasar_hukum->update($input)) {
            return redirect()->action('DasarHukumController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('DasarHukumController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil Di Ubah']);
        }
    }
    public function destroy($id)
    {
        
        $dasar_hukum = DasarHukum::findOrFail($id);
        DasarHukum::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Dasar Hukum Deleted'
        ]);
    }

    public function apidasar_hukum(Request $request)
    {
        // $dasar_hukum = DasarHukum::all();
        $dasar_hukum = DasarHukum::select(['id', 'isi_dasar_hukum']);
        // print_r($dasar_hukum);
        return Datatables::of($dasar_hukum)
            ->filter(function ($query) use ($request) {
                if ($request->has('isi_dasar_hukum')) {
                    $query->where('isi_dasar_hukum', 'like', "%{$request->get('isi_dasar_hukum')}%");
                }
            })
            ->addColumn('isi_dasar_hukum', function($dasar_hukum){
                return $dasar_hukum->isi_dasar_hukum;
            })
            ->addColumn('action', function($dasar_hukum){
                return '<a onclick="editForm('. $dasar_hukum->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $dasar_hukum->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['isi_dasar_hukum','action'])->make(true);
    }
}
