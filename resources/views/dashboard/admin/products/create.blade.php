@extends('dashboard.admin.section.master')
@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-lg-6 col-lg-offset-3">
            @include('layouts.errors.error')
        </div>
        <section class="col-lg-10 col-lg-offset-1" style="margin-top: 4rem">
            <div class="box">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">افزودن محصول</h3>
                        <div class="pull-left box-tools">
                            <a href="{{ route('products.index')  }}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form role="form" action="{{ route('products.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="product_name">نام محصول</label>
                                        <input type="text" class="form-control" name="product_name"
                                               placeholder="نام محصول را وارد کنید...">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="code">کد محصول</label>
                                        <input type="text" class="form-control" name="code"
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
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="subcategory_id">زیر دسته</label>
                                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                                            <option value="">انتخاب کنید...</option>
                                            @foreach(\App\Subcategory::all() as $subcategory)
                                                {{--                                            @if($subcategory->id == $subcategory->category_id)--}}
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                {{--                                            @endif--}}
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
                                        <input type="text" data-role="tagsinput" class="form-control" name="size"
                                               placeholder="اندازه محصول را وارد کنید...">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="color">رنگ</label>
                                        <input type="text" data-role="tagsinput" class="form-control" name="color"
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
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="quantity">تعداد</label>
                                        <input type="text" class="form-control" name="quantity"
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
                                        <input type="text" class="form-control" name="selling_price"
                                               placeholder="قیمت محصول را وارد کنید...">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="discount_price">تخفیف</label>
                                        <input type="text" class="form-control" name="discount_price"
                                               placeholder="تخفیف محصول را وارد کنید...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file-3">تصاویر محصول</label>
                            <div class="file-loading">
                                <input id="file-3" type="file" name="images[]" multiple>
                            </div>
                        </div>

                        <div class="box-body">
                            <label for="detail">توضیحات محصول</label>
                            <textarea id="detail" name="detail" rows="10" cols="80"></textarea>
                        </div>

                        <section class="content">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="special_offers">
                                        </label>
                                        {{--                                                <p class="info-box-text">پیشنهادهای ویژه</p>--}}
                                        <span>پیشنهادهای ویژه</span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="main_slider">
                                        </label>
                                        <span class="info-box-text">اسلایدر اصلی</span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="mid_slider">
                                        </label>
                                        <span class="info-box-text">اسلایدر میانی</span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="amazing_offer">
                                        </label>
                                        {{--                                            <span class="info-box-text">پیشنهاد شگفت انگیز</span>--}}
                                        <p>پیشنهاد شگفت انگیز</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="best_sellers">
                                        </label>
                                        {{--                                            <span class="info-box-text">بهترین فروشندگان</span>--}}
                                        <p>پرفروش ترین ها</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="selected_products">
                                        </label>
                                        {{--                                            <span class="info-box-text">کالاهای منتخب</span>--}}
                                        <p>کالاهای منتخب</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box-content">
                                        <label>
                                            <input type="checkbox" value="1" class="flat-red" name="most_visited">
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
@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/bootstrap-fileinput/css/fileinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/bootstrap-fileinput/css/fileinput-rtl.min.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/bootstrap-fileinput/css/all.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/bootstrap-fileinput/themes/explorer-fas/theme.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/tagsinput/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/tagsinput/css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/dropzone/dropzone.min.css')  }}">
    <link rel="stylesheet" href="{{ asset('vendor/admin/plugins/dropzone/basic.min.css')  }}">
@endpush
@push('scripts')
    <script src="{{ asset('vendor/admin/plugins/tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/plugins/dropzone/dropzone-amd-module.min.js') }}"></script>
    <script src="{{ asset('vendor/admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/admin/plugins/iCheck/icheck.min.js') }}"></script>

    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/js/plugins/piexif.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/js/plugins/sortable.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/js/fileinput.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/js/locales/fa.js') }}js/locales/fr.js"
            type="text/javascript"></script>
    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/themes/fas/theme.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('vendor/admin/plugins/bootstrap-fileinput/themes/explorer-fas/theme.js') }}"
            type="text/javascript"></script>
    <script>

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
                'allowedFileExtensions': ['png', 'jpeg', 'jpg', 'bmp', 'gif', 'svg', 'webp'],
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
@endpush
