<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use yajra\DataTables\Datatables;

use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        return view('admin.modules.video.index');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Video::create($input);

        return response()->json([
            'success' => true,
            'message' => 'SO Created'
        ]);
        
    }
    public function edit($id)
    {
        $video = Video::find($id);
        return $video;
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $video = Video::find($id);
        return response()->json([
            'success' => true,
            'message' => 'SO Created'
        ]);
    }
    public function destroy($id)
    {
        
        $video = Video::findOrFail($id);
        Video::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Video Deleted'
        ]);
    }

    public function apiVideo(Request $request)
    {
        // $video = Video::all();
        $video = Video::select(['id', 'nama_kegiatan', 'keterangan', 'link_video']);
        // print_r($video);
        return Datatables::of($video)
            ->filter(function ($query) use ($request) {
                if ($request->has('nama_kegiatan')) {
                    $query->where('nama_kegiatan', 'like', "%{$request->get('nama_kegiatan')}%");
                }
            })
            ->addColumn('link_video', function($video){
            	return '<iframe width="560" height="315" src="'.$video->link_video.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
            	// return $video->link_video;
            })
            ->addColumn('action', function($video){
                return '<a onclick="editForm('. $video->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm"> <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                    '<a onclick="deleteData('. $video->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>';
            })
            ->rawColumns(['link_video','action'])->make(true);
    }
}
