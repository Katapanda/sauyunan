<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        return view('admin.modules.agenda.index');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Agenda::create($input);
        
        return redirect()->action('AgendaController@index')->with(['success' => 'Berhasil Tambah Data']);

        // $data = [
        //     'jenis_kegiatan'     => $request['jenis_kegiatan'],
        //     'nama_kegiatan'     => $request['nama_kegiatan'],
        //     'perihal'     => $request['perihal'],
        //     'lokasi'     => $request['lokasi'],
        //     'hadirin'     => $request['hadirin'],
        //     'tanggal'     => $request['tanggal'],
        //     'waktu'     => $request['waktu'],
        //     'keterangan_kegiatan'     => $request['keterangan_kegiatan']
        // ];

        // return Agenda::create($data);
    }
    public function editisi($id)
    {
        $agenda = Agenda::find($id);
        return view('admin.modules.agenda.editagenda', ['isi' => $agenda]);
    }
    public function ubah(Request $request, $id)
    {
        $input = $request->all();
        $agenda = Agenda::find($id);
        $agenda->update($input);

        return redirect()->action('AgendaController@index')->with(['success' => 'Berhasil Tambah Data']);
    }
    public function edit($id)
    {
        $agenda = Agenda::find($id);
        return $agenda;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $agenda = Agenda::find($id);
        $agenda->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Agenda Updated'
        ]);
        // return $agenda;
    }
    public function destroy($id)
    {
        
        $agenda = Agenda::findOrFail($id);
        Agenda::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Agenda Deleted'
        ]);
    }

    public function apiAgenda(Request $request)
    {
        // $agenda = Agenda::all();
        $agenda = Agenda::select(['id', 'jenis_kegiatan', 'nama_kegiatan', 'lokasi', 'keterangan_kegiatan']);
        // print_r($agenda);
        return Datatables::of($agenda)
            ->filter(function ($query) use ($request) {
                if ($request->has('jenis_kegiatan')) {
                    $query->where('jenis_kegiatan', 'like', "%{$request->get('jenis_kegiatan')}%");
                }

                if ($request->has('nama_kegiatan')) {
                    $query->where('nama_kegiatan', 'like', "%{$request->get('nama_kegiatan')}%");
                }
            })
            ->addColumn('keterangan_kegiatan', function($agenda){
                return $agenda->keterangan_kegiatan;
            })
            ->addColumn('action', function($agenda){
                return '<a href="'.url("admin/agenda/editisi",$agenda->id).'" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $agenda->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['keterangan_kegiatan','action'])->make(true);
    }
}
