<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectStepModel;
use Illuminate\Support\Facades\File;

class ProjectStepController extends Controller
{
    public function getProjectStep()
    {
        $projectStep = ProjectStepModel::all();
        return response()->json([
            'status' => true,
            'message' => 'List Semua ProjectStep',
            'data' => $projectStep
        ]);
    }

    public function index()
    {
        $projectStep = ProjectStepModel::all();
        return view('admin.projectStep.v_projectStep', compact('projectStep'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_projectstep' => 'required|mimes:png,jpg,jpeg',
            'name_projectstep' => 'required'
        ]);

        if ($request->hasFile('image_projectstep')) {
            $file_projectstep = $request->file('image_projectstep');
            $projectstep_extensions = $file_projectstep->extension();
            $image_projectstep = $request->name_projectstep . "." . $projectstep_extensions;
            $file_projectstep->move(public_path('Image/projectStep'), $image_projectstep);

            $projectStep = ProjectStepModel::create([
                'image_projectstep' => $image_projectstep,
                'name_projectstep' => $request->name_projectstep,
            ]);
            $projectStep->save();
        }

        return redirect()->route('projectStep')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_projectstep)
    {
        $projectStep = ProjectStepModel::find($id_projectstep);
        if ($request->hasFile('image_projectstep')) {
            if (File::exists('Image/projectStep' . '/' . $projectStep->image_projectstep)) {
                File::delete('Image/projectStep' . '/' . $projectStep->image_projectstep);
            }
            $file_image_projectstep = $request->file('image_projectstep');
            $projectstep_extensions = $file_image_projectstep->extension();
            $image_projectstep = $request->name_projectstep . "." . $projectstep_extensions;
            $file_image_projectstep->move(public_path('image_image_projectstep'), $image_projectstep);
            $projectStep->update([
                'image_projectstep' => $image_projectstep,
                'name_projectstep' => $request->name_projectstep,
                'usercreate_projectstep' => $request->usercreate_projectstep,
                'userupdate_projectstep' => $request->userupdate_projectstep,
            ]);
        } else {
            $projectStep->update([
                'name_projectstep' => $request->name_projectstep,
                'usercreate_projectstep' => $request->usercreate_projectstep,
                'userupdate_projectstep' => $request->userupdate_projectstep,
            ]);
        }

        return redirect()->route('projectStep')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id_projectstep)
    {
        $projectStep = ProjectStepModel::find($id_projectstep);
        if (File::exists('Image/projectStep' . '/' . $projectStep->image_projectstep)) {
            File::delete('Image/projectStep' . '/' . $projectStep->image_projectstep);
        }
        $projectStep->delete();
        return redirect()->route('projectStep')->with('success');
    }
}
