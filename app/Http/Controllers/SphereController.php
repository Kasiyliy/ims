<?php

namespace App\Http\Controllers;

use App\Sphere;
use Illuminate\Http\Request;
use Validator;
use Session;

class SphereController extends Controller
{
    public function index()
    {
        $spheres = Sphere::all();
        return view('admin.spheres.index' , compact("spheres"));
    }

    public function create()
    {
        return view('admin.spheres.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' =>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $sphere =  new Sphere();
            $sphere->name = $request->name;
            $sphere->save();
            Session::flash('success' , 'Сфера успешно добавлена!');
            return redirect()->back();
        }
    }

    public function delete($id){
        $sphere = Sphere::find($id);
        if($sphere){
            $sphere->delete();
            Session::flash('success' , 'Сфера успешно удалена!');
        }else{
            Session::flash('error' , 'Сфера не существует!');
        }
        return redirect()->back();
    }

    public function edit($id){
        $sphere = Sphere::find($id);
        if(!$sphere){
            Session::flash('error' , 'Сфера не существует!');
            return redirect()->back();
        }

        return view('admin.spheres.edit', compact('sphere'));
    }

    public function update(Request $request, $id){
        $sphere = Sphere::find($id);
        if(!$sphere){
            Session::flash('error' , 'Сфера не существует!');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'name' =>'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error' , 'Ошибка!');
            return redirect()->back()->withErrors($validator);
        }else{
            $sphere->name = $request->name;
            $sphere->save();
            Session::flash('success' , 'Сфера успешно обновлена!');
            return redirect()->back();
        }
    }



}
