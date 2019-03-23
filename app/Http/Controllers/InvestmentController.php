<?php

namespace App\Http\Controllers;

use App\Investment;
use App\Project;
use Validator;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    public function index()
    {
        $investments = [];
        $user = Auth::user();
        if ($user->isAdmin()) {
            $investments = Investment::all();
        } else if ($user->isInvestor()) {
            $investments = Investment::where('user_id', $user->id)->get();
        }
        return view('admin.investments.index', compact("investments"));
    }

    public function create()
    {
        $projects = Project::all();
        return view('admin.investments.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric',
            'project_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $investment = new Investment();
            $investment->fill($request->all());
            $investment->user_id = $user->id;
            $investment->save();
            Session::flash('success', 'Инвестиция успешно добавлена!');
            return redirect()->back();
        }
    }


    public function delete($id)
    {
        $user = Auth::user();
        $investment = null;
        if ($user->isEnterpreneur()) {
            $investment = $this->myInvestment($user->id, $id);
        } else {
            $investment = Investment::find($id);
        }

        if ($investment) {
            $investment->delete();
            Session::flash('success', 'Инвестиция успешно удалена!');
        } else {
            Session::flash('error', 'Инвестиция не существует!');
        }
        return redirect()->back();
    }


    public function edit($id)
    {
        $user = Auth::user();
        $investment = null;
        if ($user->isEnterpreneur()) {
            $investment = $this->myInvestment($user->id, $id);
        } else {
            $investment = Investment::find($id);
        }
        if (!$investment) {
            Session::flash('error', ' Инвестиция не существует!');
            return redirect()->back();
        }

        return view('admin.investments.edit', compact('investment'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $investment = null;
        if ($user->isEnterpreneur()) {
            $investment = $this->myInvestment($user->id, $id);
        } else {
            $investment = Investment::find($id);
        }
        if (!$investment) {
            Session::flash('error', 'Инвестиция не существует!');
            return redirect()->back();
        }

        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric',
            'project_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $investment->fill($request->all());
            $investment->user_id = $user->id;
            $investment->save();
            Session::flash('success', 'Инвестиция успешно обновлена!');
            return redirect()->back();
        }
    }

    public function myInvestment($investor_id, $investment_id)
    {
        $investment = Investment::where('id', $investment_id)->where('user_id', $investor_id)->first();
        return $investment;
    }

}
