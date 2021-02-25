@extends('dashboard.admin.section.master')
@section('content')
    <div class="row">
        <section class="col-lg-10 col-lg-offset-1" style="margin-top: 4rem">
            <div class="box">
                <div class="box-header mt-5">
                    <h3 class="box-title">محصولات</h3>
                    <div class="pull-left box-tools">
                        <a href="{{ route('products.create')  }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>تصاویر محصول</th>
                            <th>تاریخ ایجاد</th>
                            <th>تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->product_name }}</td>

                            <td>
{{--                               @foreach($product->filenames as $file)--}}
{{--                                    <img src="{{ asset('upload/files/'.$file[0]) }}" width="60" height="60">--}}
{{--                               @endforeach--}}

                                @php
                                $images = json_decode($product->images);
                                @endphp
{{--                                <img src="{{ asset('upload/products/'.$images[0]) }}" width="60" height="60">--}}
                                    @foreach($images as $file)
                                        <img src="{{ asset('upload/products/'.$file) }}" width="60" height="60">
                                    @endforeach
                            </td>
                            <td>{{  \Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('products.destroy',$product->slug) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="pull-left box-tools">
                                        <a style="margin-left: 0.5rem" href="{{ route('products.edit',$product->slug) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection
