<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use PHPUnit\TextUI\CliArguments\Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(8);
        return view('dashboard.admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       
        try {
            $images = [];
            if ($request->hasFile('images')){
                $i = 0;
                foreach ($request->file('images') as $file){
                    $fileExt = $file->getClientOriginalExtension();
                    $fileName = date('Ymdhis') . $i .'.'. $fileExt;
                    Image::make($file)->resize(500,500)
                        ->save(public_path('upload/products/'). $fileName);
                    $images[] = $fileName;
                    $i++;
                }
            }
            Product::create(array_merge($request->all(),['images' => json_encode($images)]));
        }catch (Exception $exception){
           dd($exception);
        }

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        try {
            $oldImages = json_decode($product->images);
            foreach ($oldImages as $file){
                unlink(public_path('upload/products/'). $file);
            }
            $images = [];
            if ($request->hasFile('images')){
                $i = 0;
                foreach ($request->file('images') as $file){
                    $fileExt = $file->getClientOriginalExtension();
                    $fileName = date('Ymdhis') . $i .'.'. $fileExt;
                    Image::make($file)->resize(500,500)
                        ->save(public_path('upload/products/'). $fileName);
                    $images[] = $fileName;
                    $i++;
                }
            }
            $product->update(array_merge($request->all(),['images' => json_encode($images)]));
        }catch (Exception $exception){
            dd($exception);
        }

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $images = json_decode($product->images);
            foreach ($images as $file){
                    unlink(public_path('upload/products/'). $file);
            }
            $product->delete();
        }catch (Exception $exception){
            dd($exception);
        }
        return redirect(route('products.index'));
    }
}
