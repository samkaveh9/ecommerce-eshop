<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(8);
        return view('dashboard.admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $logo = $request->file('logo');
        if ($logo) {
            $fileName = time() . $logo->getClientOriginalName();
            $done = $logo->move('upload/brands', $fileName);
        }
        $brand->name = $request->input('name');
        $brand->logo = $done;
        $brand->save();

        return redirect(route('brands.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('dashboard.admin.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        if(file_exists(public_path($brand->logo))){
            unlink(public_path($brand->logo));
            $brand->delete();
        }else{
            dd('File does not exists.');
        }

        $logo = $request->file('logo');
        if ($logo) {
            $fileName = time() . $logo->getClientOriginalName();
            $done = $logo->move('upload/brands', $fileName);
        }
        $brand->name = $request->input('name');
        $brand->logo = $done;
        $brand->save();

        return redirect(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if(file_exists(public_path($brand->logo))){
            unlink(public_path($brand->logo));
            $brand->delete();
        }else{
            dd('File does not exists.');
        }
        return redirect(route('brands.index'));
    }
}
