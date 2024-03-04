<?php

namespace App\Http\Controllers;

use App\Models\ServicesModel;
use Illuminate\Http\Request;
use App\Models\PortofolioModel;
use Illuminate\Support\Facades\File;

class PortofolioController extends Controller
{
    public function getPortofolio()
    {
        $portofolio = PortofolioModel::all();
        return response()->json([
            'status' => true,
            'message' => 'List Semua Portofolio',
            'data' => $portofolio
        ]);
    }

    public function index()
    {
        $portofolio = PortofolioModel::all();
        $services = ServicesModel::all();
        return view('admin.portofolio.v_portofolio', compact('portofolio', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_portofolio' => 'required|mimes:png,jpg,jpe',
            'title_portofolio' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'description_portofolio' => 'required'
        ]);

        if ($request->hasFile('image_portofolio')) {
            $file_portofolio = $request->file('image_portofolio');
            $portofolio_extensions = $file_portofolio->extension();
            $image_portofolio = $request->title_portofolio . "." . $portofolio_extensions;
            $file_portofolio->move(public_path('Image/Portofolio'), $image_portofolio);

            $portofolio = PortofolioModel::create([
                'id_service' => $request->id_service,
                'image_portofolio' => $image_portofolio,
                'title_portofolio' => $request->title_portofolio,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'description_portofolio' => $request->description_portofolio,
            ]);

            $portofolio->save();
        }

        return redirect()->route('portofolio')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_portofolio)
    {
        $request->validate([
            'image_portofolio' => 'mimes:png,jpg,jpe'
        ]);
        $portofolio = PortofolioModel::find($id_portofolio);

        if ($request->hasFile('image_portofolio')) {
            if (File::exists('Image/Portofolio' . '/' . $portofolio->image_portofolio)) {
                File::delete('Image/Portofolio' . '/' . $portofolio->image_portofolio);
            }
            $file_portofolio = $request->file('image_portofolio');
            $portofolio_extensions = $file_portofolio->extension();
            $image_portofolio = $request->title_portofolio . "." . $portofolio_extensions;
            $file_portofolio->move(public_path('Image/Portofolio'), $image_portofolio);

            $portofolio->update([
                'id_service' => $request->id_service,
                'image_portofolio' => $image_portofolio,
                'title_portofolio' => $request->title_portofolio,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'description_portofolio' => $request->description_portofolio,
            ]);
        } else {
            $portofolio->update([
                'id_service' => $request->id_service,
                'title_portofolio' => $request->title_portofolio,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                'description_portofolio' => $request->description_portofolio,
            ]);
        }
        return redirect()->route('portofolio')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id_portofolio)
    {
        $portofolio = PortofolioModel::find($id_portofolio);
        if (File::exists('Image/Portofolio' . '/' . $portofolio->image_portofolio)) {
            File::delete('Image/Portofolio' . '/' . $portofolio->image_portofolio);
        }
        $portofolio->delete();
        return redirect()->route('portofolio')->with('success', 'Data Berhasil Didelete');
    }
}
