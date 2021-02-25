@extends('dashboard.admin.section.master')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            @include('layouts.errors.error')
        </div>
        <section class="col-lg-10 col-lg-offset-1" style="margin-top: 4rem">
            <div class="box">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">ویرایش برند  {{  $brand->name }}</h3>
                        <div class="pull-left box-tools">
                            <a href="{{ route('brands.index')  }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form role="form" action="{{ route('brands.update',$brand->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                       @method('PATCH')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">نام برند</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="نام برند را وارد کنید..." value="{{ $brand->name }}">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <img src="{{ asset($brand->logo) }}" width="60" height="60">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="logo">لوگو</label>
                                <input type="file" class="form-control" name="logo" id="logo">
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
