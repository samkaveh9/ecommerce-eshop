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
                        <h3 class="box-title">ایجاد دسته جدید</h3>
                        <div class="pull-left box-tools">
                            <a href="{{ route('categories.index')  }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                    <form role="form" action="{{ route('categories.update',$category->slug) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">نام دسته</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="نام دسته را وارد کنید..." value="{{ $category->name }}">
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



