<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use yajra\DataTables\Datatables;

use App\Http\Requests;
use App\Models\Multi;

class MultiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.multi', ['menu' => 'multi']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['gambar'] = null;
        $files = [];
        if ($request->file('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $file = $gambar;
                $nama = '/upload/gambar/'.date('YmdHis').str_slug($file->getClientOriginalName(), '-').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('/upload/gambar/'), $nama);
                
                $files[] = [
                    'gambar' => $nama
                ];  
            }
        }

        Multi::insert($files);

        return response()->json([
            'success' => true,
            'message' => 'Multi Created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apiMulti()
    {
        $multi = Multi::all();
        return Datatables::of($multi)
            ->addColumn('gambar', function($multi){
                if ($multi->gambar == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($multi->gambar) .'" alt="">';
            })
            ->addColumn('action', function($multi){
                return '<button class="btn btn-default btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#ubah" onclick="editForm('.$multi->id.')"> <i class="material-icons">mode_edit</i></button> <button class="btn btn-danger btn-circle waves-effect waves-circle waves-float" data-toggle="modal" data-target="#hapus" onclick="deleteData('.$multi->id.')"> <i class="material-icons">delete</i></button>';
            })
            ->rawColumns(['gambar','action'])->make(true);
    }
}
