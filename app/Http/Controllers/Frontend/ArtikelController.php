<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Artikel;
use App\Models\Kontak;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::get();
        $artikel_detail = Artikel::find(1);
        $kontak = Kontak::limit(1)->offset(0)->get();
        $tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));

    	return view('modules.artikel.index', compact(
            'artikel',
            'artikel_detail',
            'kontak',
            'tanggal_sekarang'
    	));
    }

    public function detail($id)
    {
        $artikel = Artikel::get();
        $artikel_detail = Artikel::find($id);
        $kontak = Kontak::limit(1)->offset(0)->get();
        $tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));
        
    	return view('modules.artikel.detail', compact(
            'artikel',
            'artikel_detail',
            'kontak',
            'tanggal_sekarang'
    	));
    }
}
