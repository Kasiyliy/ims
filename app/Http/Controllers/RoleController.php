<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Validator;
use Session;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index' , compact("roles"));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' =>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $role =  new Role();
            $role->name = $request->name;
            $role->save();
            Session::flash('success' , 'Роль успешно добавлена!');
            return redirect()->back();
        }
    }


    public function delete($id){
        $role = Role::find($id);
        if($role){
            $role->delete();
            Session::flash('success' , 'Роль успешно удалена!');
        }else{
            Session::flash('error' , 'Роль не существует!');
        }
        return redirect()->back();
    }


    public function edit($id){
        $role = Role::find($id);
        if(!$role){
            Session::flash('error' , ' Роль не существует!');
            return redirect()->back();
        }

        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, $id){
        $role = Role::find($id);
        if(!$role){
            Session::flash('error' , 'Роль не существует!');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'name' =>'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error' , 'Ошибка!');
            return redirect()->back()->withErrors($validator);
        }else{
            $role->name = $request->name;
            $role->save();
            Session::flash('success' , 'Роль успешно обновлена!');
            return redirect()->back();
        }
    }

}
