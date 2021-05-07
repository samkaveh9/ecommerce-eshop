@extends('layouts.master')
@section('main')
@include('layouts.slider')
<section>
    <div class="container">
        <div class="row">
            
            <div class="recommended_items"><!--NewProduct_items-->
                    <h2 class="title text-center">پر فروش ترین محصولات</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">	
                                
                            @foreach ($bestsellers as $item)
                            @php
                            $image = json_decode($item->images);                        
                            @endphp
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('upload/products/'.$image[0]) }}" alt="{{ $item->product_name }}" />
                                            <h2>{{ $item->selling_price }}</h2>
                                            <a href="{{ route('product.single',$item->slug) }}" style="color:white">{{ $item->product_name }}</a>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>افزودن به سبـد خرید</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                            </a>			
                    </div>
                </div><!--/NewProduct_items-->
            
            <div class="col-sm-12 padding-right">
                <div class="features_items"><!--RetailSale_items-->
                    <a href="shop-2.html"><h2 class="title text-center">محبوب ترین محصولات</h2></a>
                    <div id="new-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <div class="item active">
                        @foreach ($mostPopular as $item)  
                        @php
                        $image = json_decode($item->images);                        
                        @endphp       
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('upload/products/'.$image[0]) }}" alt="{{ $item->product_name }}" />
                                            <h2>{{ $item->selling_price }}</h2>
                                            <p>{{ $item->product_name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>افزودن به سبـد خریـد</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{ $item->selling_price }}</h2>
                                                <p>{{ $item->product_name }}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>افزودن به سبـد خریـد</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-plus-square"></i>لیست علاقه مندی ها
                                            </a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>مقایسه</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                        <a class="left recommended-item-control" href="#new-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#new-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                            </a>
                </div>
                </div><!--RetailSale_items-->					
                
                <div class="features_items"><!--WholeSale_items-->
                    <a href="shop.html"><h2 class="title text-center">آخرین محصولات</h2></a>
                    <div id="major-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <div class="item active">
                     @foreach ($latestProducts as $item)
                     @php
                        $image = json_decode($item->images);                        
                     @endphp
                     <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset('upload/products/'.$image[0]) }}" alt="{{ $item->product_name }}" />
                                        <h2>{{ $item->selling_price }}</h2>
                                        <p>{{ $item->product_name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>افزودن به سبـد خریـد</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ $item->selling_price }}</h2>
                                            <p>{{ $item->product_name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>افزودن به سبـد خریـد</a>
                                        </div>
                                    </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-plus-square"></i>لیست علاقه مندی ها
                                        </a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>مقایسه</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     @endforeach   
                    </div>
                </div>
                        <a class="left recommended-item-control" href="#major-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#major-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                            </a>
                </div>
                </div><!--WholeSale_items-->
                
                {{--  --}}
            </div>
            
        </div>			
    </div>
</section>
@endsection