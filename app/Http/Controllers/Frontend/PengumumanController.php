<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Kontak;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $kontak = Kontak::limit(1)->offset(0)->get();
        $pengumuman = Pengumuman::limit(4)->offset(0)->get();
        $tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));
        
    	return view('modules.pengumuman.index', compact(
    		'kontak',
            'pengumuman',
            'tanggal_sekarang'
    	));
    }

    public function detail($id)
    {
    	$tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));
        $kontak = Kontak::limit(1)->offset(0)->get();
        $pengumuman = Pengumuman::get();
        $pengumuman_detail = Pengumuman::find($id);
        
    	return view('modules.pengumuman.detail', compact(
            'kontak',
            'pengumuman',
            'pengumuman_detail',
            'tanggal_sekarang'
    	));
    }
}
