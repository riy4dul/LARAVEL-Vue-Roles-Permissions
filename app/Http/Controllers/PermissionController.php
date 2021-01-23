<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        $this->middleware(['auth', 'role_or_permission:admin|create role|create permission']);
        
    }

    public function index()
    {
        $permissions = $this->permission::all();

        return view("permission.index", ['permissions' => $permissions]);

    }

    public function getAllPermissions(){
        $permissions = $this->permission::all();

        return response()->json([
            'permissions' => $permissions
        ], 200);
    }

    
    public function getAll(){
        $permissions = $this->permission->all();
        return response()->json([
            'permissions' => $permissions
        ], 200);
    }

    
}