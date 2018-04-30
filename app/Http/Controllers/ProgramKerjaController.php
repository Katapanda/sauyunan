<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\ProgramKerja;

class ProgramKerjaController extends Controller
{
    public function index()
    {
        return view('admin.modules.programkerja.index');
    }
    public function ajax_tampil($id)
    {
        $programkerja = ProgramKerja::find($id);
        return view('admin.modules.programkerja.ajaxtampil', ['isi' => $programkerja]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        ProgramKerja::create($input);

        return redirect()->action('ProgramKerjaController@index')->with(['success' => 'Berhasil Tambah Data']);
    }
    public function edit($id)
    {
        $programkerja = ProgramKerja::find($id);
        return $programkerja;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $programkerja = ProgramKerja::find($id);
        if ($programkerja->update($input)) {
            return redirect()->action('ProgramKerjaController@index')->with(['success' => 'Berhasil Ubah Data']);
        } else {
            return redirect()->action('ProgramKerjaController@index')->with(['error' => 'Mohon Maaf Terjad Kesalahan, Data Tidak Berhasil DI Ubah']);
        }
        // return $programkerja;
    }
    public function destroy($id)
    {
        
        $programkerja = ProgramKerja::findOrFail($id);
        ProgramKerja::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'ProgramKerja Deleted'
        ]);
    }

    public function apiProgramKerja(Request $request)
    {
        // $programkerja = ProgramKerja::all();
        $programkerja = ProgramKerja::select(['id', 'isi_program_kerja']);
        // print_r($programkerja);
        return Datatables::of($programkerja)
            ->filter(function ($query) use ($request) {
                if ($request->has('isi_program_kerja')) {
                    $query->where('isi_program_kerja', 'like', "%{$request->get('isi_program_kerja')}%");
                }
            })
            ->addColumn('isi_program_kerja', function($programkerja){
                return $programkerja->isi_program_kerja;
            })
            ->addColumn('action', function($programkerja){
                return '<a onclick="editForm('. $programkerja->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $programkerja->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['isi_program_kerja','action'])->make(true);
    }
}
