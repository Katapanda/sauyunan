<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\DasarHukum;
use App\Models\Kontak;

class DasarHukumController extends Controller
{
    public function index()
    {
    	$dasar_hukum = DasarHukum::limit(1)->offset(0)->get();
        $kontak = Kontak::limit(1)->offset(0)->get();
        $tanggal_sekarang = date('Y-m-d', strtotime(DB::raw(now())));
        
    	return view('modules.dasar_hukum', compact(
    		'dasar_hukum',
    		'kontak',
            'tanggal_sekarang'
    	));
    }
}
