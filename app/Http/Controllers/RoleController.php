<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log; 
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {

        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can('grupo.visualizar')){
            return view('admin.error.403'); 
        }

        $roles = Role::get();
        $permissions = Permission::get(); 

        return view('admin.blades.group.index', [
            'roles'=>$roles,
            'permissions'=>$permissions
        ]);
    }
    public function store(Request $request)
    {   
        $data = $request->all();

        try {
            DB::beginTransaction();
                $role = Role::create($data);
                $role->syncPermissions($request->permissions);
                Session::flash('success',__('dashboard.response_item_create'));
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('error',__('dashboard.response_item_error_create'));
            return redirect()->back();
        }

    }

    public function update(Request $request,Role $role)
    {
        try{
            DB::beginTransaction();
            $role->update([
                'name'=>$request->name,
            ]);
            $role->syncPermissions($request->permissions);

            DB::commit();
            Session::flash('success',__('dashboard.response_item_update'));
            return redirect()->back();
        }catch (\Exception $exception){
            DB::rollBack();
            Session::flash('success',__('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(Request $request,Role $role)
    {
        if(!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['grupo.visualizar','grupo.remover'])){
            return view('admin.error.403');
        } 

        $role->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
    public function destroySelected(Request $request)
    {

        if (!Auth::user()->hasRole('Super') && !Auth::user()->can('usuario.tornar usuario master') && !Auth::user()->can(['usuario.visualizar', 'usuario.remover'])) {
            return view('admin.error.403');
        }
    
        foreach ($request->deleteAll as $userId) {
            $user = Role::find($userId);
    
            if ($user) {
                // Log para verificar os dados do usuário
                \Log::info('Dados do grupo antes da exclusão:', [
                    'id' => $user->id,
                    'name' => $user->name,
                    'guard_name' => $user->guard_name,
                ]);
    
                activity()
                    ->causedBy(Auth::user())
                    ->performedOn($user)
                    ->event('multiple_deleted')
                    ->withProperties([
                        'attributes' => [
                            'id' => $user->id,
                            'name' => $user->name,
                            'guard_name' => $user->guard_name,
                            'event' => 'multiple_deleted',
                        ]
                    ])
                    ->log('multiple_deleted');
            } else {
                \Log::warning("Item com ID $userId não encontrado.");
            }
        }
    
        $deleted = Role::whereIn('id', $request->deleteAll)->delete();
    
        if ($deleted) {
            return Response::json(['status' => 'success', 'message' => $deleted . __('dashboard.response_item_delete')]);
        }
    
        return Response::json(['status' => 'error', 'message' => __('dashboard.response_item_error_delete')], 500);
    }
}
