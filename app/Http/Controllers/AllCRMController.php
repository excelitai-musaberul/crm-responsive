<?php

namespace App\Http\Controllers;

use App\Models\AllCRM;
use App\Models\Crm;
use Illuminate\Http\Request;

class AllCRMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crms = Crm::all();               
        return view('allcrm.allcrm', compact('crms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crmDashboard()
    {
        session()->put('status' , "crm");
        return view('crm_dashboard.crm_dashboard');
    }

    public function settingsSuperAdmin()
    {        
        return view('settings.super_admin');
    }
    public function settingsAdmin()
    {        
        return view('settings.admin');
    }
    public function settingsEmployee()
    {        
        return view('settings.employee');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AllCRM  $allCRM
     * @return \Illuminate\Http\Response
     */
    public function show(AllCRM $allCRM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AllCRM  $allCRM
     * @return \Illuminate\Http\Response
     */
    public function edit(AllCRM $allCRM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AllCRM  $allCRM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllCRM $allCRM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AllCRM  $allCRM
     * @return \Illuminate\Http\Response
     */
    public function destroy(AllCRM $allCRM)
    {
        //
    }
}
