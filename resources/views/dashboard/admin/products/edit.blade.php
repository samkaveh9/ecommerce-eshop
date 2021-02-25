@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-6 col-lg-offset-3">
            @include('layouts.errors.error')
        </div>
        <section class="col-lg-10 col-lg-offset-1" style="margin-top: 4rem">
            <div class="box">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">ویرایش محصول  {{ $product->product_name }}</h3>
                        <div class="pull-left box-tools">
                            <a href="{{ route('products.index')  }}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form role="form" action="{{ route('products.update',$product->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="product_name">نام محصول</label>
                                        <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}"
                                               placeholder="نام محصول را وارد کنید...">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="code">کد محصول</label>
                                        <input type="text" class="form-control" name="code" value="{{ $product->code }}"
                                               placeholder="کد محصول را وارد کنید...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="category_id">دسته اصلی</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">انتخاب کنید...</option>
                                            @foreach(\App\Category::all() as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="subcategory_id">زیر دسته</label>
                                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                                            <option value="">انتخاب کنید...</option>
                                            @foreach(\App\Subcategory::all() as $subcategory)
                                                <option value="{{ $subcategory->id }}"
                                                    {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}
                                                >{{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="size">اندازه</label>
                                        <input type="text" data-role="tagsinput" class="form-control" name="size" value="{{ $product->size }}"
                                               placeholder="اندازه محصول را وارد کنید...">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="color">رنگ</label>
                                        <input type="text" data-role="tagsinput" class="form-control" name="color" value="{{ $product->color }}"
                                               placeholder="رنگ های محصول را وارد کنید...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="brand_id">برند محصول</label>
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            <option value="">انتخاب کنید...</option>
                                            @foreach(\App\Brand::all() as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                                                >{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="quantity">تعداد</label>
                                        <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}"
                                               placeholder="تعداد محصول را وارد کنید...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="selling_price">قیمت محصول</label>
                                        <input type="text" class="form-control" name="selling_price" value="{{ $product->selling_price }}"
                                               placeholder="قیمت محصول را وارد کنید...">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="discount_price">تخفیف</label>
                                        <input type="text" class="form-control" name="discount_price" value="{{ $product->discount_price }}"
                                               placeholder="تخفیف محصول را وارد کنید...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file-3">تصاویر محصول</label>
                            <div class="box-body">
                                @php
                                    $images = json_decode($product->images);
                                @endphp
                                @foreach($images as $file)
                                    <img src="{{ asset('upload/products/'.$file) }}" width="120" height="120">
                                @endforeach
                            </div>
                            <br><hr>
                            <div class="file-loading">
                                <input id="file-3" type="file" name="images[]" multiple>
                            </div>
                        </div>

                        <div class="box-body">
                            <label for="detail">توضیحات محصول</label>
                            <textarea id="detail" name="detail" rows="10" cols="80">{{ $product->detail }}</textarea>
                        </div>

                        <section class="content">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="special_offers"
                                                {{ $product->special_offers == 1 ? 'checked' : '' }}>
                                        </label>
                                        {{--                                                <p class="info-box-text">پیشنهادهای ویژه</p>--}}
                                        <span>پیشنهادهای ویژه</span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" {{ $product->main_slider == 1 ? 'checked' : '' }}
                                            class="flat-red" name="main_slider">
                                        </label>
                                        <span class="info-box-text">اسلایدر اصلی</span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="mid_slider"
                                                {{ $product->mid_slider == 1 ? 'checked' : '' }}>
                                        </label>
                                        <span class="info-box-text">اسلایدر میانی</span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="amazing_offer"
                                                {{ $product->amazing_offer == 1 ? 'checked' : '' }}>
                                        </label>
                                        {{--                                            <span class="info-box-text">پیشنهاد شگفت انگیز</span>--}}
                                        <p>پیشنهاد شگفت انگیز</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="best_sellers"
                                                {{ $product->best_sellers == 1 ? 'checked' : '' }}>
                                        </label>
                                        {{--                                            <span class="info-box-text">بهترین فروشندگان</span>--}}
                                        <p>بهترین فروشندگان</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="selected_products"
                                                {{ $product->selected_products == 1 ? 'checked' : '' }}>
                                        </label>
                                        {{--                                            <span class="info-box-text">کالاهای منتخب</span>--}}
                                        <p>کالاهای منتخب</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="most_visited"
                                                {{ $product->most_visited == 1 ? 'checked' : '' }}>
                                        </label>
                                        <p>بیشترین بازدیدها</p>
                                        {{--                                            <span class="info-box-text">بیشترین بازدیدها</span>--}}
                                        {{--                                            <span class="info-box-text">محصولات پربازدید اخیر</span>--}}
                                    </div>
                                </div>

                            </div>
                        </section>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
@extends('dashboard.admin.section.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/bootstrap-fileinput/css/fileinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/bootstrap-fileinput/css/fileinput-rtl.min.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/bootstrap-fileinput/css/all.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/bootstrap-fileinput/themes/explorer-fas/theme.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/tagsinput/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/tagsinput/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/dropzone/dropzone.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/dropzone/basic.min.css')  }}">
@endsection
@section('scripts')
    <script src="{{ asset('vendor/admin/plugins/tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/plugins/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/plugins/dropzone/dropzone-amd-module.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/admin/plugins/iCheck/icheck.min.js') }}"></script>

    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/js/plugins/piexif.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/js/locales/fa.js') }}js/locales/fr.js" type="text/javascript"></script>
    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
    <script>
        // var myDropzone = new Dropzone("div#myId", { url: "/file/post"});

        // CKEDITOR
        $(function () {
            CKEDITOR.replace('detail')
            $('.textarea').wysihtml5()
        })

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        // File input
        $("#file-3").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [],
            initialPreviewConfig: []
        });
        $(".btn-info").on('click', function () {
            $("#file-4").fileinput('refresh', {previewClass: 'bg-info'});
        });
        $(document).ready(function () {
            $("#test-upload").fileinput({
                'theme': 'fas',
                'showPreview': false,
                'allowedFileExtensions': ['png','jpeg','jpg','bmp', 'gif', 'svg','webp'],
                'elErrorContainer': '#errorBlock'
            });
            $("#kv-explorer").fileinput({
                'theme': 'explorer-fas',
                'uploadUrl': '#',
                overwriteInitial: false,
                initialPreviewAsData: true,
                initialPreview: [],
                initialPreviewConfig: []
            });
        });
    </script>
@endsection
