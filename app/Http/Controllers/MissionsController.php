<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MissionsModel;

class MissionsController extends Controller
{
    public function getMissions()
    {
        $missions = MissionsModel::all();
        return response()->json([
            'status' => true,
            'message' => 'List Semua Missions',
            'data' => $missions
        ]);
    }

    public function index()
    {
        $missions = MissionsModel::all();
        return view('admin.missions.v_missions', compact('missions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_mission' => 'required',
            'description_mission' => 'required'
        ]);

        $missions = MissionsModel::create([
            'title_mission' => $request->title_mission,
            'description_mission' => $request->description_mission,
        ]);

        $missions->save();

        return redirect()->route('missions')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_mission)
    {
        $missions = MissionsModel::find($id_mission);
        $missions->update([
            'title_mission' => $request->title_mission,
            'description_mission' => $request->description_mission,
            'usercreate_mission' => $request->usercreate_mission,
            'updateuser_mission' => $request->updateuser_mission,
        ]);
        return redirect()->route('missions')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id_mission)
    {
        $missions = MissionsModel::find($id_mission);
        $missions->delete();
        return redirect()->route('missions')->with('success', 'Data Berhasil Didelete');
    }
}
