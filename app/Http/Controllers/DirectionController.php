<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\SettingThemeRepository;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class DirectionController extends Controller
{
    protected $pathUpload = 'admin/uploads/images/direction/';
    public function index()
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();
        if(!Auth::user()->hasRole('Super') && 
            !Auth::user()->can('usuario.tornar usuario master') && 
            !Auth::user()->hasPermissionTo('a direcao.visualizar')){
            return view('admin.error.403', compact('settingTheme'));
        }
        $directions = Direction::sorting()->get();

        return view('admin.blades.direction.index', compact('directions'));
    }

    public function store(Request $request)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
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

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            Direction::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
        }

        return redirect()->back();
    }

    public function update(Request $request, Direction $direction)
    {
        $data = $request->except('path_image');
        $manager = new ImageManager(GdDriver::class);

        $request->validate([
            'path_image' => ['nullable', 'file', 'image', 'max:2048', 'mimes:jpg,jpeg,png,gif']
        ]);

        // direction desktop
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

            Storage::delete(isset($direction->path_image)??$direction->path_image);
            $data['path_image'] = $this->pathUpload . $filename;
        }

        if (isset($request->delete_path_image)) {
            Storage::delete(isset($direction->path_image)??$direction->path_image);
            $data['path_image'] = null;
        }

        $data['active'] = $request->active ? 1 : 0;

        try {
            DB::beginTransaction();
            $direction->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
        }

        return redirect()->back();
    }

    public function destroy(Direction $direction)
    {
        Storage::delete(isset($direction->path_image)??$direction->path_image);
        $direction->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

        public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $directionId) {
            $direction = Direction::find($directionId);
    
            if ($direction) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($direction)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $directionId,
                            'title' => $direction->title,
                            'description' => $direction->description,
                            'sorting' => $direction->sorting,
                            'active' => $direction->active,
                            'event' => 'multiple_deleted',
                            'path_image' => $direction->path_image,
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $directionId não encontrado.");
            }
        }
    
        $deleted = Direction::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $direction = Direction::find($id);
    
            if ($direction) {
                $direction->sorting = $sorting;
                $direction->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($direction) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($direction)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $direction->title,
                            'description' => $direction->description,
                            'sorting' => $direction->sorting,
                            'active' => $direction->active,
                            'path_image' => $direction->path_image,
                            'event' => 'order_updated',
                        ]
                    ])
                    ->log('order_updated');
            } else {
                \Log::warning("Item com ID $id não encontrado.");
            }
        }
    
        return Response::json(['status' => 'success']);
    }
}
