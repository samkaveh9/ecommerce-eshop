@extends('dashboard.admin.section.master')
@section('content')
    <div class="row">
        <section class="col-lg-10 col-lg-offset-1" style="margin-top: 4rem">
            <div class="box">
                <div class="box-header mt-5">
                    <h3 class="box-title">زیر دسته ها</h3>
                    <div class="pull-left box-tools">
                        <a href="{{ route('subcategories.create')  }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام زیر دسته</th>
                            <th>نام دسته اصلی</th>
                            <th>تاریخ ایجاد</th>
                            <th>تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->categoryName }}</td>
                            <td>{{ \Carbon\Carbon::parse($subcategory->created_at)->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('subcategories.destroy',[$subcategory->slug]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="pull-left box-tools">
                                        <a style="margin-left: 0.5rem" href="{{ route('subcategories.edit',$subcategory->slug) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $subcategories->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection
