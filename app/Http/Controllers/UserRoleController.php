<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;

use App\Models\UserRole;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.modules.user_role.index');
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
        $data = [
            'role_name'     => $request['role_name'],
            'description'   => $request['description']
        ];

        return UserRole::create($data);
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
        $user_role = UserRole::find($id);
        return $user_role;
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
        $user_role = UserRole::find($id);
        $user_role->role_name = $request['role_name'];
        $user_role->description = $request['description'];

        $user_role->update();

        return $user_role;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserRole::destroy($id);
    }

    public function apiUserRole(Request $request)
    {
        $user_role = UserRole::select(['id', 'role_name', 'description', 'created_at', 'updated_at']);
        // $user_role = UserRole::all();

        return DataTables::of($user_role)
            ->filter(function ($query) use ($request) {
                if ($request->has('role_name')) {
                    $query->where('role_name', 'like', "%{$request->get('role_name')}%");
                }

                if ($request->has('description')) {
                    $query->where('description', 'like', "%{$request->get('description')}%");
                }
            })
            ->removeColumn('created_at')
            ->addColumn('action', function($user_role){
                return  '<a onclick="editForm('. $user_role->id .')" class="btn btn-inverse-warning waves-effect waves-light btn-sm">
                            <i class="icofont icofont-edit-alt"></i> Edit</a>'.
                        '<a onclick="deleteData('. $user_role->id .')" class="btn btn-inverse-danger waves-effect waves-light btn-sm">
                            <i class="icofont icofont-delete-alt"></i> Delete</a>'; 
            })->make(true);
    }
}
