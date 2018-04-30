<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\Sejarah;

class SejarahController extends Controller
{
    public function index()
    {
        return view('admin.modules.sejarah.index');
    }
    public function ajax_tampil($id)
    {
        $sejarah = Sejarah::find($id);
        return view('admin.modules.sejarah.ajaxtampil', ['isi' => $sejarah]);
    }
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'isi_sejarah' => 'required'
        // ]);
        $input = $request->all();
        Sejarah::create($input);

        return redirect()->action('SejarahController@index')->with(['success' => 'Berhasil Tambah Data']);
        
    }
    public function edit($id)
    {
        $sejarah = Sejarah::find($id);
        return $sejarah;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $sejarah = Sejarah::find($id);
        if ($sejarah->update($input)) {
            return redirect()->action('SejarahController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('SejarahController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil DI Ubah']);
        }
    }
    public function destroy($id)
    {
        
        $sejarah = Sejarah::findOrFail($id);
        Sejarah::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Sejarah Deleted'
        ]);
    }

    public function apiSejarah(Request $request)
    {
        // $sejarah = Sejarah::all();
        $sejarah = Sejarah::select(['id', 'isi_sejarah']);
        // print_r($sejarah);
        return Datatables::of($sejarah)
            ->filter(function ($query) use ($request) {
                if ($request->has('isi_sejarah')) {
                    $query->where('isi_sejarah', 'like', "%{$request->get('isi_sejarah')}%");
                }
            })
            ->addColumn('isi_sejarah', function($sejarah){
                return $sejarah->isi_sejarah;
            })
            ->addColumn('action', function($sejarah){
                return '<a onclick="editForm('. $sejarah->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $sejarah->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['isi_sejarah','action'])->make(true);
    }
}
