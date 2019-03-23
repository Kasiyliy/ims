<?php

namespace App\Http\Controllers;

use App\Project;
use App\Sphere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;

class ProjectController extends Controller
{
    public function index()
    {
        $data = Project::all();
        return view('admin.projects.index' , compact("data"));
    }

    public function create()
    {
        $spheres = Sphere::all();
        return view('admin.projects.create', compact("spheres"));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title" =>'required',
            "description" =>'required',
            "start_date" =>'required',
            "end_date" =>'required',
            "short_description" =>'required',
            "country" =>'required',
            "city" =>'required',
            "overall_price" =>'required',
            "investment_time" =>'required',
            "year_profit" =>'required',
            "current_description" =>'required',
            "business_plan" =>'boolean',
            "document" =>'boolean',
            "asses_provided" =>'boolean',
            "sphere_id" =>'required'
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }else{
            $project = new Project();
            $project->fill($request->all());
            $project->user_id = Auth::id();
            $project->save();
            Session::flash('success' , 'Проект успешно добавлена!');
            return redirect()->back();
        }
    }



}
