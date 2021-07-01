<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>@yield('page_title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin') }}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ asset('admin') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ asset('admin') }}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ asset('admin') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin') }}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{ asset('admin') }}/css/theme.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @yield('style')
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('admin') }}/images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('category.index') }}">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li>
                        <li>
                            <a href="{{ route('coupon.index') }}">
                                <i class="fas fa-chart-bar"></i>Coupon</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.logout') }}">
                                <i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
    
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('admin') }}/images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard_select')">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        {{-- <li class="@yield('category_select')">
                            <a href="{{ route('category.index') }}">
                                <i class="fas fa-list"></i>Category</a>
                        </li> --}}
                        <li class="has-sub @yield('category_select')">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-list"></i>Category </a>
                                
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('category.index') }}">Main Category</a>
                                </li>
                                <li>
                                    <a href="{{ route('category.child') }}">Child Category</a>
                                </li>
                            </ul>
                        </li>
                      
                        <li class="@yield('coupon_select')">
                            <a href="{{ route('coupon.index') }}">
                                <i class="fas fa-tags"></i>Coupon</a>
                        </li>
                        <li class="@yield('size_select')">
                            <a href="{{ route('size.index') }}">
                                <i class="fa fa-check-square"></i>Size</a>
                        </li>

                        <li class="@yield('color')">
                            <a href="{{ route('color.index') }}">
                                <i class="fas fa-braille"></i>Color</a>
                        </li>

                        <li class="@yield('brand')">
                            <a href="{{ route('brand.index') }}">
                                <i class="fas fa-box"></i>Brand</a>
                        </li>

                        <li class="@yield('product_attribute')">
                            <a href="{{ route('attribute.index') }}">
                                <i class="fas fa-braille"></i>Product_attribute</a>
                        </li>

                        <li class="@yield('tax')">
                            <a href="{{ route('tax.index') }}">
                                <i class="fas fa-braille"></i>Tax</a>
                        </li>

                        <li class="@yield('product_select')">
                            <a href="{{ route('product.index') }}">
                                <i class="fas fa-cart-plus"></i>Products</a>
                        </li>
                        <li class="@yield('banner')">
                            <a href="{{ route('banner.index') }}">
                                <i class="fas fa-cart-plus"></i>Banners</a>
                        </li>
                        <li class="@yield('customer')">
                            <a href="{{ route('customer.index') }}">
                                <i class="fas fa-users"></i>Customer</a>
                        </li>
                        
                        <li>
                            <a href="{{ route('admin.logout') }}">
                                <i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>

                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages </a>
                                
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
              
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
    
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="@yield('action')" method="POST">
                                @yield('input')
                            </form>
                            <div class="header-button ">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ asset('admin') }}/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ asset('admin') }}/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>

                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('admin.logout') }}">
                                                    <i class="fas fa-sign-out-alt"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
           
            
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @yield('container')
                    </div>
                </div>
            </div>

            <!-- FOOTER SECTION-->
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="#">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    
    </div>

    <!-- Jquery JS-->
    {{-- <script src="{{ asset('admin') }}/vendor/jquery-3.2.1.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin') }}/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('admin') }}/vendor/wow/wow.min.js"></script>
    <!-- Main JS-->
    <script src="{{ asset('admin') }}/js/main.js"></script>
    @yield('script')
    {{-- toster success massage --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

    //   // for success - green box
    //   toastr.success('Success messages');

    // // for errors - red box
    // toastr.error('errors messages');

    // // for warning - orange box
    // toastr.warning('warning messages');
    </script>


</body>

</html>
<!-- end document-->