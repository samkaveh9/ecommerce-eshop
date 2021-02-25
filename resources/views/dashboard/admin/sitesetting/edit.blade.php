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
                        <h3 class="box-title">افزودن تنظیمات</h3>
                        <div class="pull-left box-tools">
                            <a href="{{ route('brands.index')  }}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form role="form" action="{{ route('sitesetting.update',$sitesetting->slug) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                         @method('PUT')   
                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="company_name">نام شرکت</label>
                                        <input type="text" class="form-control" name="company_name" value="{{ $sitesetting->company_name }}"
                                               placeholder="نام شرکت را وارد کنید...">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="email">ایمیل</label>
                                        <input type="text" class="form-control" name="email" value="{{ $sitesetting->email }}"
                                               placeholder="ایمیل شرکت را وارد کنید...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="company_address">آدرس شرکت</label>
                                <input type="text" class="form-control" name="company_address" id="company_address" value="{{ $sitesetting->company_address }}"
                                       placeholder="آدرس شرکت را وارد کنید...">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="first_phonenumber">تلفن اول شرکت</label>
                                        <input type="text" class="form-control" name="first_phonenumber" value="{{ $sitesetting->first_phonenumber }}"
                                               id="first_phonenumber" placeholder="تلفن اول شرکت را وارد کنید...">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="second_phonenumber">تلفن دوم شرکت</label>
                                        <input type="text" class="form-control" name="second_phonenumber" value="{{ $sitesetting->second_phonenumber }}"
                                               placeholder="تلفن دوم شرکت را وارد کنید...">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>آدرس فیسبوک (facebook) شرکت</label>
                                        <input type="text" name="facebook" class="form-control" value="{{ $sitesetting->facebook }}"
                                               placeholder="آدرس فیسبوک (facebook) شرکت را وارد کنید...">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>آدرس یوتیوب (youtube)</label>
                                        <input type="text" class="form-control" name="youtube" value="{{ $sitesetting->youtube }}"
                                               placeholder="آدرس یوتیوب (youtube) را وارد کنید...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label>آدرس تویتر (twitter) شرکت</label>
                                        <input type="text" name="twitter" class="form-control" value="{{ $sitesetting->twitter }}"
                                               placeholder="آدرس تویتر (twitter) شرکت را وارد کنید...">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>آدرس اینستاگرام (instagram)</label>
                                        <input type="text" class="form-control" name="instagram" value="{{ $sitesetting->instagram }}"
                                               placeholder="آدرس اینستاگرام (instagram) را وارد کنید...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="logo">لوگو</label>
                                <input type="file" class="form-control" name="logo" id="logo">
                                <img src="{{ asset($sitesetting->logo) }}" alt="" width="60" height="60">
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
