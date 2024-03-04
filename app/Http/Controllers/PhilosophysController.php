<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhilosophysModel;

class PhilosophysController extends Controller
{
    public function getPhilosophys()
    {
        $philosophys = PhilosophysModel::all();
        return response()->json([
            'status' => true,
            'message' => 'List Semua Philosophys',
            'data' => $philosophys
        ]);
    }

    public function index()
    {
        $philosophys = PhilosophysModel::all();
        return view('admin.philosophys.v_philosophys', compact('philosophys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_philosophy' => 'required',
            'description_philosophy' => 'required'
        ]);

        $philosophys = PhilosophysModel::create([
            'title_philosophy' => $request->title_philosophy,
            'description_philosophy' => $request->description_philosophy,
        ]);

        $philosophys->save();

        return redirect()->route('philosophys')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_philosophy)
    {
        $philosophys = PhilosophysModel::find($id_philosophy);
        $philosophys->update([
            'title_philosophy' => $request->title_philosophy,
            'description_philosophy' => $request->description_philosophy,
            'usercreate_philosophy' => $request->usercreate_philosophy,
            'updateuser_philosophy' => $request->updateuser_philosophy,
        ]);
        return redirect()->route('philosophys')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id_philosophy)
    {
        $philosophys = PhilosophysModel::find($id_philosophy);
        $philosophys->delete();
        return redirect()->route('philosophys')->with('success', 'Data Berhasil Didelete');
    }
}
