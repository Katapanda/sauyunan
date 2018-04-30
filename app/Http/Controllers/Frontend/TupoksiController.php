<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Kontak;
use App\Models\Tupoksi;

class TupoksiController extends Controller
{
    public function index()
    {
        $kontak = Kontak::limit(1)->offset(0)->get();
        $tupoksi = Tupoksi::limit(1)->offset(0)->get();
        $tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));
        
    	return view('modules.tupoksi', compact(
            'kontak',
    		'tupoksi',
            'tanggal_sekarang'
    	));
    }
}
