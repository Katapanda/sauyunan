<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Agenda;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Kontak;
use App\Models\Pengumuman;
use App\Models\Sambutan;

class BerandaController extends Controller
{
    public function index()
    {
    	$tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));
        $agenda     = Agenda::get();
        $artikel    = Artikel::get();
        $berita     = Berita::get();
        $kontak     = Kontak::limit(1)->offset(0)->get();
        $pengumuman = Pengumuman::get();
        $sambutan   = Sambutan::limit(1)->offset(0)->get();

    	return view('modules.home', compact(
            'agenda',
            'artikel',
            'berita',
            'kontak',
            'pengumuman',
    		'sambutan'
    	));
    }
}
