<?php

namespace App\Http\Controllers;

use App\Models\GoalsModel;
use Illuminate\Http\Request;

class GoalsController extends Controller
{
    public function getGoals()
    {
        $goals = GoalsModel::all();
        return response()->json([
            'status' => true,
            'message' => 'List Semua Goals',
            'data' => $goals
        ]);
    }

    public function index()
    {
        $goals = GoalsModel::all();
        return view('admin.goals.v_goals', compact('goals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_goals' => 'required',
            'description_goals' => 'required'
        ]);

        $goals = GoalsModel::create([
            'title_goals' => $request->title_goals,
            'description_goals' => $request->description_goals,
        ]);

        $goals->save();

        return redirect()->route('goals')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_goals)
    {
        $goals = GoalsModel::find($id_goals);
        $goals->update([
            'title_goals' => $request->title_goals,
            'description_goals' => $request->description_goals,
            'usercreate_goals' => $request->usercreate_goals,
            'updateuser_goals' => $request->updateuser_goals,
        ]);
        return redirect()->route('goals')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id_goals)
    {
        $goals = GoalsModel::find($id_goals);
        $goals->delete();
        return redirect()->route('goals')->with('success', 'Data Berhasil Didelete');
    }
}
