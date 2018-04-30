<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\Sambutan;

class SambutanController extends Controller
{
    public function index()
    {
        return view('admin.modules.sambutan.index');
    }
    public function ajax_tampil($id)
    {
        $sambutan = Sambutan::find($id);
        return view('admin.modules.sambutan.ajaxtampil', ['isi' => $sambutan]);
    }
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'isi_sambutan' => 'required'
        // ]);
        $input = $request->all();
        Sambutan::create($input);
        return redirect()->action('SambutanController@index')->with(['success' => 'Berhasil Tambah Data']);
    }
    public function edit($id)
    {
        $sambutan = Sambutan::find($id);
        return $sambutan;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $sambutan = Sambutan::find($id);

        if ($sambutan->update($input)) {
            return redirect()->action('SambutanController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('SambutanController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil DI Ubah']);
        }
        // return $sambutan;
    }
    public function destroy($id)
    {
        
        $sambutan = Sambutan::findOrFail($id);
        Sambutan::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Sambutan Deleted'
        ]);
    }

    public function apiSambutan(Request $request)
    {
        // $sambutan = Sambutan::all();
        $sambutan = Sambutan::select(['id', 'isi_sambutan']);
        // print_r($sambutan);
        return Datatables::of($sambutan)
            ->filter(function ($query) use ($request) {
                if ($request->has('isi_sambutan')) {
                    $query->where('isi_sambutan', 'like', "%{$request->get('isi_sambutan')}%");
                }
            })
            ->addColumn('isi_sambutan', function($sambutan){
                return $sambutan->isi_sambutan;
            })
            ->addColumn('action', function($sambutan){
                return '<a onclick="editForm('. $sambutan->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $sambutan->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['isi_sambutan','action'])->make(true);
    }
}
