<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Kontak;
use App\Models\StrukturOrganisasi;
use App\Models\SoDetail;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $kontak = Kontak::limit(1)->offset(0)->get();
    	$tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));
        
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

        return view('modules.struktur_organisasi', compact('kepala_dinas', 'kjf', 'kbp', 'kpme', 'kpn', 'kpm', 'usp', 'uss', 'kbkp', 'kpdp', 'kpdpk', 'kmdp', 'sekertaris', 'kppdk', 'kudk', 'kontak'));
    }
}
