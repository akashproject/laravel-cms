<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AssignRoleController extends Controller
{
    //
    public function index($id)
    {
        try {
            $user = User::findOrFail($id);
            $roles = Role::all();
            return view('administrator.users.assign-role',compact('user','roles'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
			
            $validatedData = $request->validate([
                'roles' => 'required',
            ]);
            $user = User::findOrFail($data['user_id']);
            $user->assignRole($data['roles']);
            return redirect()->back()->with('message', 'User role updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }
}
