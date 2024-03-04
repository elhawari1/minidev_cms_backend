<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VissionsModel;

class VissionsController extends Controller
{
    public function getVissions()
    {
        $vissions = VissionsModel::all();
        return response()->json([
            'status' => true,
            'message' => 'List Semua Vissions',
            'data' => $vissions
        ]);
    }

    public function index()
    {
        $vissions = VissionsModel::all();
        return view('admin.vissions.v_vissions', compact('vissions'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_vission' => 'required',
            'description_vission' => 'required',
        ]);

        $vissions = VissionsModel::create([
            'title_vission' => $request->title_vission,
            'description_vission' => $request->description_vission,
        ]);

        $vissions->save();

        return redirect()->route('vissions')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_vission)
    {
        $vissions = VissionsModel::find($id_vission);
        $vissions->update([
            'title_vission' => $request->title_vission,
            'description_vission' => $request->description_vission,
            'usercreate_vission' => $request->usercreate_vission,
            'updateuser_vission' => $request->updateuser_vission,
        ]);
        return redirect()->route('vissions')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id_vission)
    {
        $vissions = VissionsModel::findOrFail($id_vission);
        $vissions->delete();
        return redirect()->route('vissions')->with('success', 'Data Berhasil Didelete');
    }
}
