<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\SettingThemeRepository;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class ReportController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/report/';
    public function index()
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        if(!Auth::user()->hasRole('Super') && 
            !Auth::user()->can('usuario.tornar usuario master') && 
            !Auth::user()->hasPermissionTo('secao depoimento.visualizar')){
            return view('admin.error.403', compact('settingTheme'));
        }
        $report = Report::first();

       return view('admin.blades.report.index', compact('report'));
    }

   
    public function store(Request $request)
    {
        $data = $request->except(['path_image', 'path_file']);
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
            'path_file' => ['nullable', 'file', 'mimes:pdf', 'max:3072'] 
        ]);

        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
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

            $data['path_image'] = $this->pathUpload . $filename;
        }

        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.pdf';

            // Salva direto no storage
            Storage::putFileAs($this->pathUpload, $file, $filename);

            $data['path_file'] = $this->pathUpload . $filename;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            Report::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

   
    public function update(Request $request, Report $report)
    {
        $data = $request->except(['path_image', 'path_file']);
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif'],
            'path_file' => ['nullable', 'file', 'mimes:pdf', 'max:3072'] 
        ]);

        // report desktop
        if ($request->hasFile('path_image')) {
            $file = $request->file('path_image');
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

            Storage::delete(isset($report->path_image)??$report->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($report->path_image)??$report->path_image);
            $data['path_image'] = null;
        }

        if ($request->hasFile('path_file')) {
            $file = $request->file('path_file');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.pdf';

            // Apaga o arquivo anterior (se existir)
            if (!empty($report->path_file) && Storage::exists($report->path_file)) {
                Storage::delete($report->path_file);
            }

            // Salva o novo PDF
            Storage::putFileAs($this->pathUpload, $file, $filename);

            $data['path_file'] = $this->pathUpload . $filename;
        }

        if ($request->has('delete_path_file')) {
            if (!empty($report->path_file) && Storage::exists($report->path_file)) {
                Storage::delete($report->path_file);
            }
            $data['path_file'] = null;
        }


        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            $report->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }

    public function destroy(Report $report)
    {
        Storage::delete(isset($report->path_image)??$report->path_image);
        Storage::delete(isset($report->path_file)??$report->path_file);
        $report->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
