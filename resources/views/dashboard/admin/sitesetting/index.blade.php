@extends('dashboard.admin.section.master')
@section('content')
    <div class="row">
        <section class="col-lg-10 col-lg-offset-1" style="margin-top: 4rem">
            <div class="box">
                <div class="box-header mt-5">
                    <h3 class="box-title">تنظیمات سایت</h3>
                    <div class="pull-left box-tools">
                        @if ($sitesetting->count() >= 1 )
                            
                        @else
                        <a href="{{ route('sitesetting.create')  }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                        </a>
                        @endif
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام شرکت / کمپانی</th>
                            <th>ایمیل</th>
                            <th>لوگو</th>
                            <th>تاریخ ایجاد</th>
                            <th>تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sitesetting as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->company_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td><img src="{{ asset($item->logo) }}" width="60" height="60"></td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at )->diffForHumans() }}</td>
                                <td>
                                    <a style="margin-left: 0.5rem" href="{{ route('sitesetting.edit',$item->slug) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
