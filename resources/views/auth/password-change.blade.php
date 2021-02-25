@extends('dashboard.admin.section.master')
@section('content')
<div class="row">
    <section class="col-lg-12 col-md-12">
        @include('layouts.errors.error')
    
        @if (session()->has('errChangePassword'))
            <div class="alert alert-danger">
                <button type="button" class="close text-left" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
               <h5 class="text-center">
                  {{ session('errChangePassword') }}
               </h5>
            </div>

        @endif

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> تغییر رمز عبور</h3>
            </div>
         

        <form role="form" method="POST" action="{{ route('password.change.update') }}">
                
            @csrf

            <div class="box-body">
                <div class="form-group">
                  <label for="oldPassword">رمز عبور جاری</label>
                  <input type="password" class="form-control" name="oldpassword" id="oldPassword" placeholder="رمز عبور جاری">
                </div>
                
                <div class="form-group">
                  <label for="newPassword">رمز عبور جدید</label>
                  <input type="password" class="form-control" name="password" id="newPassword" placeholder="رمز عبور جدید">
                </div>

                <div class="form-group">
                    <label for="confirmation_newPassword">تکرار رمز عبور</label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirmation_newPassword" placeholder="تکرار رمز عبور جدید">
                </div>

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">ثبت</button>
              </div>
            </form>
          </div>
    </section>
  </div>

  @endsection