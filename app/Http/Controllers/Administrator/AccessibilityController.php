<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AccessibilityController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $roles = Role::all();
            return view('administrator.accessibility.index',compact('roles'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function createAccessibility()
    {
        try {
            
            return view('administrator.accessibility.create');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function show($id) {
        try {
            $role = Role::findOrFail($id);
            $rolePermisson = $role->permissions->pluck('name', 'id')->toArray();
            $permissions = Permission::pluck('name')->toArray();
            return view('administrator.accessibility.show',compact('role','permissions','rolePermisson'));
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

    public function saveAccessibility(Request $request)
    {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'name' => 'required',
                'permissions' => 'required',
            ]);
           
            if($data['role_id'] <= 0){
                $role = Role::create($data);
            } else {
                $role = Role::findOrFail($data['role_id']);
                $role->update($data);
            }

            $role->syncPermissions([]);

            foreach ($data['permissions'] as $key => $value) {
                $role->givePermissionTo($value);
            }
            return redirect()->back()->with('message', 'New role has been created successfully'); 

        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage());
        }
    }

}
