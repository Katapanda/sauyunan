<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use yajra\DataTables\Datatables;

use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        return view('admin.modules.kontak.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Kontak::create($input);
        return response()->json([
            'success' => true,
            'message' => 'Kontak Created'
        ]);
    }
    public function edit($id)
    {
        $kontak = Kontak::find($id);
        return $kontak;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $kontak = Kontak::findOrFail($id);
        $kontak->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Kontak Updated'
        ]);
    }
    public function destroy($id)
    {
        Kontak::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Kontak Deleted'
        ]);
    }
    public function apiKontak(Request $request)
    {
        // $kontak = Kontak::where('id', $id)->get();
        $kontak = Kontak::select(['id', 'telepon', 'fax', 'email', 'lokasi', 'status_aktif']);
        // print_r($agenda);
        return Datatables::of($kontak)
            ->addColumn('action', function($kontak){
                return '<a onclick="editForm('. $kontak->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $kontak->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);
    }
}
