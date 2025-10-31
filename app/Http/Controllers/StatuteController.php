<?php

namespace App\Http\Controllers;

use App\Models\Statute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\SettingThemeRepository;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class StatuteController extends Controller
{

    protected $pathUpload = 'admin/uploads/images/statute/';
    public function index()
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        if(!Auth::user()->hasRole('Super') && 
          !Auth::user()->can('usuario.tornar usuario master') && 
          !Auth::user()->hasPermissionTo('estatuto.visualizar')){
            return view('admin.error.403', compact('settingTheme'));
        }
       $statute = Statute::first();

        return view('admin.blades.statute.index', compact('statute'));
    }

    public function store(Request $request)
    {
        $data = $request->except('path_file');
        $manager = new ImageManager(GdDriver::class);
        $data['active'] = $request->active ? 1 : 0;
        $request->validate([
            'path_file' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

            $data['path_file'] = $this->pathUpload . $filename;
        }

        try {
            DB::beginTransaction();
            Statute::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

    public function update(Request $request, Statute $statute)
    {
        $data = $request->except('path_file');
        $manager = new ImageManager(GdDriver::class);
        $data['active'] = $request->active?1:0;
        $request->validate([
            'path_file' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

                if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
            $mime = $file->getMimeType();
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';

            if ($mime === 'image/svg+xml') {
                Storage::putFileAs($this->pathUpload, $file, $filename);
            } else {
                $image = $manager->read($file)
                    ->resize(null, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->toWebp(quality: 95)
                    ->toString();

                Storage::put($this->pathUpload . $filename, $image);
            }

            Storage::delete(isset($statute->path_file)??$statute->path_file);
            $data['path_file'] = $this->pathUpload . $filename;
        }

        try {
            DB::beginTransaction();
            $statute->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }

    public function destroy(Statute $statute)
    {
        Storage::delete(isset($statute->path_file)??$statute->path_file);
        $statute->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
