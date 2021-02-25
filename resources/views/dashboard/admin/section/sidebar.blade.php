<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{ asset('vendor/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="جستجو">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">منو</li>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>داشبورد</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>دسته بندی ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i>دسته ها</a></li>
                    <li><a href="{{ route('subcategories.index') }}"><i class="fa fa-circle-o"></i>زیر دسته ها</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('brands.index') }}">
                    <i class="fa fa-certificate"></i> <span>برند ها</span>
                </a>
            </li>
            <li>
                <a href="{{ route('coupons.index') }}">
                    <i class="fa fa-ticket"></i> <span>کد های تخفیف</span>
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-shopping-cart"></i> <span>محصولات</span>
                </a>
            </li>

            <li>
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users"></i> <span>کاربران</span>
                </a>
            </li>

            <li>
                <a href="{{ route('blog.index') }}">
                    <i class="fa fa-newspaper-o"></i> <span>بلاگ</span>
                </a>
            </li>

            <li>
                <a href="{{ route('sitesetting.index') }}">
                    <i class="fa fa-sliders"></i> <span>تنظیمات سایت</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
