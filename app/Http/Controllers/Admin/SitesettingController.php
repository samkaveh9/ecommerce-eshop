<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sitesetting;
use Illuminate\Http\Request;

class SitesettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sitesetting = Sitesetting::all();
        return view('dashboard.admin.sitesetting.index',compact('sitesetting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.sitesetting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sitesetting = new Sitesetting();
        $logo = $request->file('logo');
        if ($logo) {
            $fileName = time() . $logo->getClientOriginalName();
            $done = $logo->move('upload/sitesetting', $fileName);
        }
        $sitesetting->company_name = $request->input('company_name');
        $sitesetting->company_address = $request->input('company_address');
        $sitesetting->email = $request->input('email');
        $sitesetting->first_phonenumber = $request->input('first_phonenumber');
        $sitesetting->second_phonenumber = $request->input('second_phonenumber');
        $sitesetting->facebook = $request->input('facebook');
        $sitesetting->instagram = $request->input('instagram');
        $sitesetting->youtube = $request->input('youtube');
        $sitesetting->twitter = $request->input('twitter');
        $sitesetting->logo = $done;
        $sitesetting->save();
        return redirect(route('sitesetting.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sitesetting  $sitesetting
     * @return \Illuminate\Http\Response
     */
    public function show(Sitesetting $sitesetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sitesetting  $sitesetting
     * @return \Illuminate\Http\Response
     */
    public function edit(Sitesetting $sitesetting)
    {
        return view('dashboard.admin.sitesetting.edit',compact('sitesetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sitesetting  $sitesetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sitesetting $sitesetting)
    {
        $logo = $request->file('logo');
        if ($logo) {
            $fileName = time() . $logo->getClientOriginalName();
            $done = $logo->move('upload/sitesetting', $fileName);
        }
        $sitesetting->company_name = $request->input('company_name');
        $sitesetting->company_address = $request->input('company_address');
        $sitesetting->email = $request->input('email');
        $sitesetting->first_phonenumber = $request->input('first_phonenumber');
        $sitesetting->second_phonenumber = $request->input('second_phonenumber');
        $sitesetting->facebook = $request->input('facebook');
        $sitesetting->instagram = $request->input('instagram');
        $sitesetting->youtube = $request->input('youtube');
        $sitesetting->twitter = $request->input('twitter');
        $sitesetting->logo = $done;
        $sitesetting->save();
        return redirect(route('sitesetting.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sitesetting  $sitesetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sitesetting $sitesetting)
    {
        //
    }
}
