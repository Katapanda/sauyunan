<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\StrukturOrganisasi;
use App\Models\SoDetail;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {

        $kepala_dinas = StrukturOrganisasi::where('jabatan', 'Kepala Dinas')->first();
        $kjf = StrukturOrganisasi::where('jabatan', 'Kelmpok Jabatan Fungsional')->first();
        $kbp = StrukturOrganisasi::where('jabatan', 'Kepala Bidang Perumahan')->first();
        $kpme = StrukturOrganisasi::where('jabatan', 'Kasii Perencanaan, Monitoring & Evaluasi')->first();
        $kpn = StrukturOrganisasi::where('jabatan', 'Kasi Penyediaan')->first();
        $kpm = StrukturOrganisasi::where('jabatan', 'Kasi Pembiayaan')->first();
        $usp = StrukturOrganisasi::where('jabatan', 'UPT Sangata Utara')->first();
        $uss = StrukturOrganisasi::where('jabatan', 'UPT Sangata Selatan')->first();
        $kbkp = StrukturOrganisasi::where('jabatan', 'Kepla Bidang Kawasan Pemukiman')->first();
        $kpdp = StrukturOrganisasi::where('jabatan', 'Kasi Pendataan Dan Perencanaan')->first();
        $kpdpk = StrukturOrganisasi::where('jabatan', 'Kasi Pencegahan Dan Peningkatan Kualitas')->first();
        $kmdp = StrukturOrganisasi::where('jabatan', 'Kasi Manfaat Dan Pengendalian')->first();
        $sekertaris = StrukturOrganisasi::where('jabatan', 'Sekertaris')->first();
        $kppdk = StrukturOrganisasi::where('jabatan', 'Kasubbag Perencanaan Program Dan Keuangan')->first();
        $kudk = StrukturOrganisasi::where('jabatan', 'Kasubbag Umum Dan Kepegawaian')->first();

        return view('admin.modules.so.index', compact('kepala_dinas', 'kjf', 'kbp', 'kpme', 'kpn', 'kpm', 'usp', 'uss', 'kbkp', 'kpdp', 'kpdpk', 'kmdp', 'sekertaris', 'kppdk', 'kudk'));
    }
    public function so()
    {
        return view('admin.modules.so.so', ['menu' => 'so']);
    } 
    public function detail($jabatan)
    {
        $so = StrukturOrganisasi::where('jabatan', $jabatan)->first(); 
        if ($so) {
            $detail = SoDetail::where('id_so', $so->id)->get();
            return response()->json([
                'so' => $so,
                'data' => $detail,
            ]);
        } else {
            return response()->json([
                'so' => "",
                'data' => "",
            ]);
        }

        // $so = StrukturOrganisasi::find($id);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['foto'] = null;

        if ($request->hasFile('foto')){
            $input['foto'] = '/upload/foto_so/'.str_slug($input['jabatan'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto_so/'), $input['foto']);
        }

        // Artikel::create($input);

        StrukturOrganisasi::create($input);
        return response()->json([
            'success' => true,
            'message' => 'SO Created'
        ]);
    }
    public function edit($id)
    {
        $so = StrukturOrganisasi::find($id);
        return $so;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $so = StrukturOrganisasi::findOrFail($id);

        $input['foto'] = $so->foto;

        if ($request->hasFile('foto')){
            if (!$so->foto == NULL){
                unlink(public_path($so->foto));
            }
            $input['foto'] = '/upload/foto_so/'.str_slug($input['jabatan'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto_so/'), $input['foto']);
        }

        $so->update($input);

        return response()->json([
            'success' => true,
            'message' => 'StrukturOrganisasi Updated'
        ]);
    }
    public function destroy($id)
    {
        $so = StrukturOrganisasi::findOrFail($id);
        if (!$so->foto_so == NULL){
            unlink(public_path($so->foto));
        }
        StrukturOrganisasi::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'StrukturOrganisasi Deleted'
        ]);
    }
    public function apiSO(Request $request)
    {
        // $so = StrukturOrganisasi::all();
        $so = StrukturOrganisasi::select(['id', 'nama', 'nip', 'email', 'jabatan', 'bidang']);
        // print_r($agenda);
        return Datatables::of($so)
            ->filter(function ($query) use ($request) {
                if ($request->has('nama')) {
                    $query->where('nama', 'like', "%{$request->get('nama')}%");
                }

                if ($request->has('email')) {
                    $query->where('email', 'like', "%{$request->get('email')}%");
                }
            })
            ->addColumn('action', function($so){
                return '<a href="'.url("admin/so/detail/".$so->id).'" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Detail</a>'.
                    '<a onclick="editForm('. $so->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $so->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);
    }
}

