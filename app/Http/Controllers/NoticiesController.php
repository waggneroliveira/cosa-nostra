<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Noticies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\NoticiesRequestStore;
use App\Http\Requests\NoticiesRequestUpdate;
use App\Repositories\SettingThemeRepository;
use App\Http\Controllers\Helpers\HelperArchive;

class NoticiesController extends Controller
{
    protected $pathUpload = 'admin/uploads/files/noticies/';
  
    public function index()
    {
        $settingTheme = (new SettingThemeRepository())->settingTheme();

        // Verificação de permissões
        if (!Auth::user()->hasRole('Super') && 
            !Auth::user()->can('usuario.tornar usuario master') &&
            !Auth::user()->hasPermissionTo('editais.visualizar')) {
            return view('admin.error.403', compact('settingTheme'));
        }

        // Início da query
        $query = Noticies::query();

        // Ordenação padrão
        $query->sorting();

        // Filtros
        if ($title = request('title')) {
            $query->where('title', 'like', "%{$title}%");
        }

        if ($year = request('date')) {
            $query->whereYear('date', $year);
        }

        // Obter os resultados
        $noticies = $query->get();

        // Agrupar por ano para o select
        $groupedNoticies = Noticies::all()->groupBy(function($item) {
            return \Carbon\Carbon::parse($item->date)->format('Y');
        });

        return view('admin.blades.noticies.index', compact('noticies', 'groupedNoticies'));
    }

    public function store(NoticiesRequestStore $request)
    {
        $data = $request->all();
        $data['active'] = $request->active?1:0;

        try {
            DB::beginTransaction();
                Noticies::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('error', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function update(NoticiesRequestUpdate $request, Noticies $noticies)
    {
        $data = $request->all();
        $data['active'] = $request->active?1:0;

        try {
            DB::beginTransaction();
                $noticies->fill($data)->save();
                DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('error', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(Noticies $noticies)
    {
        $noticies->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $noticiesId) {
            $noticies = Noticies::find($noticiesId);
    
            if ($noticies) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($noticies)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $noticiesId,
                            'title' => $noticies->title,
                            'hours' => $noticies->hours,
                            'sorting' => $noticies->sorting,
                            'active' => $noticies->active,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $noticiesId não encontrado.");
            }
        }
    
        $deleted = Noticies::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $noticies = Noticies::find($id);
    
            if ($noticies) {
                $noticies->sorting = $sorting;
                $noticies->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($noticies) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($noticies)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $noticies->title,
                            'hours' => $noticies->hours,
                            'sorting' => $noticies->sorting,
                            'active' => $noticies->active,
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
