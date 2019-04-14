<?php

namespace App\Http\Controllers;

use App\Investment;
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
        $data = [];
        $user = Auth::user();
        if ($user->isAdmin()) {
            $data = Project::all();
        } else if ($user->isEntrepreneur()) {
            $data = Project::where('user_id', $user->id)->get();
        }
        return view('admin.projects.index' , compact("data"));
    }

    public function search(Request $request)
    {
        $spheres = Sphere::all();
        return view('admin.projects.search' , compact("spheres"));
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

    public function edit($id)
    {
        $user = Auth::user();
        $spheres = Sphere::all();
        $project = null;
        if ($user->isEntrepreneur()) {
            $project = $this->myProject($user->id, $id);
        } else {
            $project = Project::find($id);
        }
        if (!$project) {
            Session::flash('error', ' Проект не существует!');
            return redirect()->back();
        }

        return view('admin.projects.edit', compact('project','spheres'));
    }

    public function details($id)
    {
        $project = Project::find($id);
        if (!$project) {
            Session::flash('error', ' Проект не существует!');
            return redirect()->back();
        }
        $investments = Investment::where('project_id', $project->id)->get();
        return view('admin.projects.details', compact('project','investments'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $project = null;
        if ($user->isEntrepreneur()) {
            $project = $this->myProject($user->id, $id);
        } else {
            $project = Project::find($id);
        }
        if (!$project) {
            Session::flash('error', 'Проект не существует!');
            return redirect()->back();
        }

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
            "sphere_id" =>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $project->fill($request->all());
            $project->user_id = $user->id;
            $project->asses_provided = ($request->asses_provided ? true : false);
            $project->business_plan = ($request->business_plan ? true : false);
            $project->document = ($request->document ? true : false);

            $project->save();
            Session::flash('success', 'Проект успешно обновлена!');
            return redirect()->back();
        }
    }


    public function myProject($enterpreneur_id, $project_id)
    {
        $project = Project::where('id', $project_id)->where('user_id', $enterpreneur_id)->first();
        return $project;
    }

    public function delete($id){
        $project = Project::find($id);
        if($project){
            $project->delete();
            Session::flash('success' , 'Проект успешно удалена!');
        }else{
            Session::flash('error' , 'Проект не существует!');
        }
        return redirect()->back();
    }


}
