<?php

namespace App\Http\Controllers;

use App\Models\AboutsModel;
use Illuminate\Http\Request;

class AboutsController extends Controller
{
    public function getAbouts()
    {
        $abouts = AboutsModel::all();
        return response()->json([
            'status' => true,
            'message' => 'List Semua Abouts',
            'data' => $abouts
        ]);
    }

    public function index()
    {
        $abouts = AboutsModel::all();
        return view('admin.about.v_about', compact('abouts'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_about' => 'required',
            'description_about' => 'required',
        ]);

        $about = AboutsModel::create([
            'title_about' => $request->title_about,
            'description_about' => $request->description_about,
        ]);

        $about->save();

        return redirect()->route('about')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_about)
    {
        $about = AboutsModel::find($id_about);
        $about->update([
            'title_about' => $request->title_about,
            'description_about' => $request->description_about,
            'usercreate_about' => $request->usercreate_about,
            'updateuser_about' => $request->updateuser_about,
        ]);
        return redirect()->route('about')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id_about)
    {
        $about = AboutsModel::findOrFail($id_about);
        $about->delete();
        return redirect()->route('about')->with('success', 'Data Berhasil Didelete');
    }
}
