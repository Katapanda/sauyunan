<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use yajra\DataTables\Datatables;

use App\Models\SoDetail;

class SoDetailController extends Controller
{
    public function index($id)
    {
        return view('admin.modules.so.detail.index', ['id_so' => $id]);
    }

    public function store(Request $request, $id)
    {
        // $input = $request->all();
        $data = [
            'nama' => $request['nama'],
            'nip' => $request['nip'],
            'id_so' => $id
        ];

        SoDetail::create($data);
        return response()->json([
            'success' => true,
            'message' => 'SO Created'
        ]);
    }
    public function edit($id, $id_detail)
    {
        $so = SoDetail::find($id_detail);
        return $so;
    }
    public function update(Request $request, $id, $id_detail)
    {
        $input = $request->all();
        $so = SoDetail::findOrFail($id_detail);
        $so->update($input);

        return response()->json([
            'success' => true,
            'message' => 'StrukturOrganisasi Updated'
        ]);
    }
    public function destroy($id, $id_detail)
    {
        SoDetail::destroy($id_detail);

        return response()->json([
            'success' => true,
            'message' => 'StrukturOrganisasi Deleted'
        ]);
    }
    public function apiSODetail(Request $request, $id)
    {
        // $so = SoDetail::where('id', $id)->get();
        $so = SoDetail::select(['id', 'nama', 'nip'])->where('id_so',$id);
        // print_r($agenda);
        return Datatables::of($so)
            ->filter(function ($query) use ($request) {
                if ($request->has('nama')) {
                    $query->where('nama', 'like', "%{$request->get('nama')}%");
                }

                if ($request->has('nip')) {
                    $query->where('nip', 'like', "%{$request->get('nip')}%");
                }
            })
            ->addColumn('action', function($so){
                return '<a onclick="editForm('. $so->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $so->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);
    }
}
