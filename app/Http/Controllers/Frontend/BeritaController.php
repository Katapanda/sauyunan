<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Berita;
use App\Models\Kontak;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::get();
        $kontak = Kontak::limit(1)->offset(0)->get();
        $tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));

    	return view('modules.berita.index', compact(
            'berita',
    		'kontak'
    	));
    }

    public function detail($id)
    {
        $berita = Berita::get();
        $berita_detail = Berita::find($id);
        $kontak = Kontak::limit(1)->offset(0)->get();
        $tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));
        
    	return view('modules.berita.detail', compact(
            'berita',
            'berita_detail',
    		'kontak'
    	));
    }
}
