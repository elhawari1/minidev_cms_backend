<?php

namespace App\Http\Controllers;

use App\Models\BannersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function getBanner()
    {
        $banner = BannersModel::all();
        return response()->json([
            'status' => true,
            'message' => 'List Semua Banner',
            'data' => $banner
        ]);
    }

    public function index()
    {
        $banners = BannersModel::all();
        return view('admin.banner.v_banner', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_banner' => 'required',
            'description_banner' => 'required'
        ]);

        if ($request->hasFile('image_banner')) {
            $file_banner = $request->file('image_banner');
            $banner_extensions = $file_banner->extension();
            $image_banner = $request->title_banner . "." . $banner_extensions;
            $file_banner->move(public_path('Image/Banner'), $image_banner);

            $banner = BannersModel::create([
                'image_banner' => $image_banner,
                'title_banner' => $request->title_banner,
                'description_banner' => $request->description_banner,
            ]);

            $banner->save();
        }

        return redirect()->route('banner')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update(Request $request, $id_banner)
    {
        $banner = BannersModel::find($id_banner);

        if ($request->hasFile('image_banner')) {
            if (File::exists('Image/Banner' . '/' . $banner->image_banner)) {
                File::delete('Image/Banner' . '/' . $banner->image_banner);
            }
            $file_banner = $request->file('image_banner');
            $banner_extensions = $file_banner->extension();
            $image_banner = $request->title_banner . "." . $banner_extensions;
            $file_banner->move(public_path('Image/Banner'), $image_banner);
            $banner->update([
                'image_banner' => $image_banner,
                'title_banner' => $request->title_banner,
                'description_banner' => $request->description_banner,
                'usercreate_banner' => $request->usercreate_banner,
                'updateuser_banner' => $request->updateuser_banner,
            ]);
        } else {
            $banner->update([
                'title_banner' => $request->title_banner,
                'description_banner' => $request->description_banner,
                'usercreate_banner' => $request->usercreate_banner,
                'updateuser_banner' => $request->updateuser_banner,
            ]);
        }
        return redirect()->route('banner')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id_banner)
    {
        $banner = BannersModel::find($id_banner);
        if (File::exists('Image/Banner' . '/' . $banner->image_banner)) {
            File::delete('Image/Banner' . '/' . $banner->image_banner);
        }
        $banner->delete();
        return redirect()->route('banner')->with('success');
    }
}
