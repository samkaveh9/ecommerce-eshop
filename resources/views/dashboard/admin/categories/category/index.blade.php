@extends('dashboard.admin.section.master')
@section('content')
    <div class="row">
        <section class="col-lg-10 col-lg-offset-1" style="margin-top: 4rem">
            <div class="box">
                <div class="box-header mt-5">
                    <h3 class="box-title">دسته بندی ها</h3>
                    <div class="pull-left box-tools">
                        <a href="{{ route('categories.create')  }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسته</th>
                            <th>تاریخ ایجاد</th>
                            <th>تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{  \Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('categories.destroy',[$category->slug]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="pull-left box-tools">
                                        <a style="margin-left: 0.5rem" href="{{ route('categories.edit',$category->slug) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection
