<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = AppSettings::first();
        
        return view('settings.settings', [
            'settings' => $settings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AppSettings $appSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppSettings $appSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'refferal_comission' => 'required|numeric',
            'second_level_refferal_comission' => 'required|numeric',
            'default_user_bal' => 'required|numeric',
        ]);

        $settings = AppSettings::first();

        $settings->refferal_comission = $request->refferal_comission;
        $settings->second_level_refferal_comission = $request->second_level_refferal_comission;
        $settings->default_user_bal = $request->default_user_bal;
        $settings->save();

        Alert::success('App Settings Updated Successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppSettings $appSettings)
    {
        //
    }
}
