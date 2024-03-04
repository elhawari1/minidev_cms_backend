<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServicesModel;

class ServicesController extends Controller
{
    public function getServices()
    {
        $services = ServicesModel::all();
        return response()->json([
            'status' => true,
            'message' => 'List Semua Services',
            'data' => $services
        ]);
    }

    public function index()
    {
        $services = ServicesModel::all();
        return view('admin.services.v_services', compact('services'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_service' => 'required',
        ]);
        $services = ServicesModel::create([
            'name_service' => $request->name_service,
        ]);

        $services->save();

        return redirect()->route('services')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_service)
    {
        $services = ServicesModel::find($id_service);
        $services->update([
            'name_service' => $request->name_service,
            'usercreate_services' => $request->usercreate_services,
            'updateuser_services' => $request->updateuser_services,
        ]);
        return redirect()->route('services')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id_service)
    {
        $services = ServicesModel::findOrFail($id_service);
        $services->delete();
        return redirect()->route('services')->with('success', 'Data Berhasil Didelete');
    }
}
