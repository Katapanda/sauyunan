<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Berita;
use App\Models\Artikel;
use App\Models\Sambutan;
use App\Models\Video;
use App\Models\Album;

class HomeController extends Controller
{
    
    public function index()
    {
    	$tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));
    	$breaking_news = Berita::limit(5)->offset(0)->get(['id','judul_berita']);
    	$sliders = Berita::limit(3)->offset(0)->get();
    	$slider_sides = Berita::limit(2)->offset(1)->get();
        $artikel_paling_terbaru = Artikel::limit(1)->get();
        // $artikel_page_1 = Artikel::limit(4)->offset(1)->get();
        $artikel_page_1 = Artikel::limit(7)->offset(0)->get();
        $artikel_page_2 = Artikel::limit(4)->offset(4)->get();
        $sambutans = Sambutan::limit(1)->offset(0)->get();
        $videos = Video::limit(1)->offset(0)->get();
        $photos = Album::limit(1)->offset(0)->get();

    	// return $sliders;
    	return view('modules.home', compact(
    		'sambutans',
            'tanggal_sekarang', 
    		'breaking_news', 
    		'sliders', 
    		'slider_sides',
            'artikel_paling_terbaru',
            'artikel_page_1',
            'artikel_page_2',
            'videos',
            'photos'
    	));
    }

    public function sejarah()
    {
        
    }

    public function struktur_organisasi()
    {
        
    }

    public function tupoksi()
    {
        
    }

    public function visi_misi()
    {
        
    }

    public function berita()
    {
        
    }

    public function artikel()
    {
        
    }

    public function agenda()
    {
        
    }

    public function pengumuman()
    {
        
    }

    public function foto()
    {
        
    }

    public function video()
    {
        
    }

    public function peta()
    {
        
    }

    public function kontak()
    {
        
    }

    public function tes()
    {
        $artikel_paling_terbaru = Artikel::limit(1)->get();

        return $artikel_paling_terbaru;
    }
}
