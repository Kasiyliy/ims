<?php

namespace App\Http\Controllers;

use App\Project;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('home', compact('projects'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }


    public function profileUpdate(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'phone_number' =>'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error' , 'Ошибка!');
            return redirect()->back()->withErrors($validator);
        }else{
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->save();
            Session::flash('success' , 'Пользователь успешно обновлен!');
            return redirect()->back();
        }
    }

    public function profileUpdatePassword(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'password' =>'required',
            'repassword' =>'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error' , 'Ошибка!');
            return redirect()->back()->withErrors($validator);
        }else if($request->password != $request->repassword){
            Session::flash('warning' , 'Пароли не совпадают!');
            return redirect()->back();
        }else{
            $user->fill($request->all());
            $user->password = bcrypt($user->password);
            $user->save();
            Session::flash('success' , 'Пользователь успешно обновлен!');
            return redirect()->back();
        }
    }
}
