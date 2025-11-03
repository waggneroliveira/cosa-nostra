<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationHere;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ReservationHereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservationHere = ReservationHere::first();

        return view('admin.blades.reservationHere.index', compact('reservationHere'));
    }
    public function edit(ReservationHere $reservationHere)
    {
        return view('admin.blades.reservationHere.edit', compact('reservationHere'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['active'] = $request->active?1:0;

        try {
            DB::beginTransaction();
                ReservationHere::create($data);
            DB::commit();
            session()->flash('success', __('dashboard.response_item_create'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_create'));
            return redirect()->back();
        }
    }

    public function update(Request $request, ReservationHere $reservationHere)
    {
        $data = $request->all();
        $data['active'] = $request->active?1:0;
        try {
            DB::beginTransaction();
                $reservationHere->fill($data)->save();
            DB::commit();
            session()->flash('success', __('dashboard.response_item_update'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Erro', __('dashboard.response_item_error_update'));
            return redirect()->back();
        }
    }

    public function destroy(ReservationHere $reservationHere)
    {
        $reservationHere->delete();
        Session::flash('success',__('dashboard.response_item_delete'));
        return redirect()->back();
    }
}
