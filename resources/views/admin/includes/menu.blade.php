<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-search">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            <!-- /input-group -->
        </li>
        <li>
            <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li>
            <a href="#"><i class="fas fa-user"></i> User Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('/user/add')}}"><i class="fas fa-user-plus"></i> Add User</a>
                </li>
                <li>
                    <a href="{{url('/user/manage')}}"><i class="fas fa-users"></i> Manage User</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fas fa-user"></i> Customer Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('/customer/manage')}}"><i class="fas fa-users"></i> Manage Customer</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fas fa-tags"></i> Category Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('/category/add')}}"><i class="fas fa-plus"></i> Add Category</a>
                </li>
                <li>
                    <a href="{{url('/category/manage')}}"><i class="fas fa-eye"></i> Manage Category</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="far fa-list-alt"></i> Subcategory Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('/subcategory/add')}}"><i class="fas fa-plus"></i> Add Subcategory</a>
                </li>
                <li>
                    <a href="{{url('/subcategory/manage')}}"><i class="fas fa-eye"></i> Manage Subcategory</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fas fa-industry"></i> Manufacturer Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('/manufacturer/add')}}"><i class="fas fa-plus"></i> Add Manufacturer</a>
                </li>
                <li>
                    <a href="{{url('/manufacturer/manage')}}"><i class="fas fa-eye"></i> Manage Manufacturer</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fab fa-sellcast"></i> Product Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('/product/add')}}"><i class="fas fa-plus"></i> Add Product</a>
                </li>
                <li>
                    <a href="{{url('/product/manage')}}"><i class="fas fa-eye"></i> Manage Product</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
         <li>
            <a href="#"><i class="fab fa-slideshare"></i> Slider Info<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="{{url('/slider/add')}}"><i class="fas fa-plus"></i> Add Primary Slider</a>
                </li>
                <li>
                    <a href="{{url('/slider2/add')}}"><i class="fas fa-plus"></i> Add Secondary Slider</a>
                </li>
                <li>
                    <a href="{{url('/slider/manage')}}"><i class="fas fa-eye"></i> Manage Primary Slider</a>
                </li>
                <li>
                    <a href="{{url('/slider2/manage')}}"><i class="fas fa-eye"></i> Manage Secondary Slider</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
        </li>
        <li>
            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="panels-wells.html">Panels and Wells</a>
                </li>
                <li>
                    <a href="buttons.html">Buttons</a>
                </li>
                <li>
                    <a href="notifications.html">Notifications</a>
                </li>
                <li>
                    <a href="typography.html">Typography</a>
                </li>
                <li>
                    <a href="icons.html"> Icons</a>
                </li>
                <li>
                    <a href="grid.html">Grid</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="#">Second Level Item</a>
                </li>
                <li>
                    <a href="#">Second Level Item</a>
                </li>
                <li>
                    <a href="#">Third Level <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level Item</a>
                        </li>
                    </ul>
                    <!-- /.nav-third-level -->
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
        <li>
            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="blank.html">Blank Page</a>
                </li>
                <li>
                    <a href="login.html">Login Page</a>
                </li>
            </ul>
            <!-- /.nav-second-level -->
        </li>
    </ul>
</div>