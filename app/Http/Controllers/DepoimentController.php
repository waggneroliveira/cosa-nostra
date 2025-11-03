<?php

namespace App\Http\Controllers;

use App\Models\Depoiment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;

class DepoimentController extends Controller
{
    public function index()
    {
        $depoiments = Depoiment::sorting()->get();

        return view('admin.blades.depoiment.index', compact('depoiments'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['active'] = $request->active?1:0;

        try {
            DB::beginTransaction();
                Depoiment::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function update(Request $request, Depoiment $depoiment)
    {
        $data = $request->all();
        $data['active'] = $request->active?1:0;
        try {
            DB::beginTransaction();
                $depoiment->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(Depoiment $depoiment)
    {
        $depoiment->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }

    public function destroySelected(Request $request)
    {    
        foreach ($request->deleteAll as $depoimentId) {
            $depoiment = Depoiment::find($depoimentId);
    
            if ($depoiment) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($depoiment)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $depoimentId,
                            'title' => $depoiment->title,
                            'text' => $depoiment->text,
                            'details' => $depoiment->details,
                            'sorting' => $depoiment->sorting,
                            'active' => $depoiment->active,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $depoimentId não encontrado.");
            }
        }
    
        $deleted = Depoiment::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . ' '.__('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => 'Nenhum item foi deletado.'], 500);
    }

    public function sorting(Request $request)
    {
        foreach($request->arrId as $sorting => $id) {
            $depoiment = Depoiment::find($id);
    
            if ($depoiment) {
                $depoiment->sorting = $sorting;
                $depoiment->save();
            } else {
                Log::warning("Item com ID $id não encontrado.");
            }

            if($depoiment) {
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($depoiment)
                    ->event('order_updated')
                    ->withProperties([
                        'attributes' => [
                            'id' => $id,
                            'title' => $depoiment->title,
                            'text' => $depoiment->text,
                            'details' => $depoiment->details,
                            'sorting' => $depoiment->sorting,
                            'active' => $depoiment->active,
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
