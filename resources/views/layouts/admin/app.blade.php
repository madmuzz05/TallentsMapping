<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from laravel.pixelstrap.com/viho/widgets/general-widget by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Apr 2022 03:43:37 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities. laravel/framework: ^8.40">
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>@yield('title') | Talents Mapping
</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify.css')}}">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css')}}">
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/feather-icon.css')}}">
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owlcarousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/whether-icon.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}">
<!-- Plugins css Ends-->
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
<link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
            <div class="theme-loader">
                <div class="loader-p"></div>
            </div>
        </div>
        <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-sidebar" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
  <div class="main-header-right row m-0">
    <div class="main-header-left">
      <div class="logo-wrapper"><a href="{{route('admin.index')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo.png')}}" alt=""></a></div>
      <div class="dark-logo-wrapper"><a href="{{route('admin.index')}}"><img class="img-fluid" src="{{asset('assets/images/logo/dark-logo.png')}}" alt=""></a></div>
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">    </i></div>
    </div>
    {{-- <div class="left-menu-header col">
      <ul>
        <li>
          <form class="form-inline search-form">
            <div class="search-bg"><i class="fa fa-search"></i>
              <input class="form-control-plaintext" placeholder="Search here.....">
            </div>
          </form>
          <span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
        </li>
      </ul>
    </div> --}}
    <div class="nav-right col pull-right right-menu p-0">
      <ul class="nav-menus">
        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
        <li>
            <div class="mode"><i class="fa fa-moon-o"></i></div>
        </li>
        <li class="onhover-dropdown p-0">
          <a href="{{ url('/logout')}}" class="btn btn-primary-light" type="button"><i data-feather="log-out"></i>Log out</a>
        </li>
      </ul>
    </div>
    <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
  </div>
</div>
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{asset('assets/images/dashboard/1.png')}}" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">New</span></div>
        @foreach ($getUser as $item)
        <h6 class="mt-3 f-14 f-w-600">{{ $item->nama }}</h6>
        <p class="mb-0 font-roboto">
          {{ $item->jabatan->kategori_jabatan }}  {{ $item->unit_kerja->nama_unit_kerja }} 
        </p>
        @endforeach
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    
                    <li class="dropdown">
                        <a class="nav-link menu-title {{  request()->is('admin*') ? 'active' : '' }}" href="javascript:void(0)"><i data-feather="home"></i><span>Beranda</span></a>                  
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="{{route('admin.index')}}" class="{{ request()->routeIs('admin.index') ? 'active' : ''}}">Dashboard</a></li>
                        </ul>
                    </li>                 
                    <li class="dropdown">
                        <a class="nav-link menu-title {{  request()->is('user*') ? 'active' : '' }}" href="javascript:void(0)"><i data-feather="box"></i><span>Master Data</span></a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="{{route('user.index')}}" class="{{ request()->routeIs('user.index') ? 'active' : ''}}">User</a></li>
                            <li><a href="../ui-kits/typography.html" class="">Pernyataan</a></li>
                            <li><a href="../ui-kits/avatars.html" class="">Jabatan</a></li>
                            <li><a href="../ui-kits/avatars.html" class="">Tema Bakat</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title " href="javascript:void(0)"><i data-feather="folder-plus"></i><span>Simulasi</span></a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="../bonus-ui/scrollable.html" class="">Scrollable</a></li>
                            <li><a href="../bonus-ui/tree.html" class="">Tree view</a></li>
                            <li><a href="../bonus-ui/bootstrap-notify.html" class="">Bootstrap Notify</a></li>
                            <li><a href="../bonus-ui/rating.html" class="">Rating</a></li>
                            <li><a href="../bonus-ui/dropzone.html" class="">dropzone</a></li>
                            <li><a href="../bonus-ui/tour.html" class="">Tour</a></li>
                            <li><a href="../bonus-ui/sweet-alert2.html" class="">SweetAlert2</a></li>
                            <li><a href="../bonus-ui/modal-animated.html" class="">Animated Modal</a></li>
                            <li><a href="../bonus-ui/owl-carousel.html" class="">Owl Carousel</a></li>
                            <li><a href="../bonus-ui/ribbons.html" class="">Ribbons</a></li>
                            <li><a href="../bonus-ui/pagination.html" class="">Pagination</a></li>
                            <li><a href="../bonus-ui/steps.html" class="">Steps</a></li>
                            <li><a href="../bonus-ui/breadcrumb.html" class="">Breadcrumb</a></li>
                            <li><a href="../bonus-ui/range-slider.html" class="">Range Slider</a></li>
                            <li><a href="../bonus-ui/image-cropper.html" class="">Image cropper</a></li>
                            <li><a href="../bonus-ui/sticky.html" class="">Sticky </a></li>
                            <li><a href="../bonus-ui/basic-card.html" class="">Basic Card</a></li>
                            <li><a href="../bonus-ui/creative-card.html" class="">Creative Card</a></li>
                            <li><a href="../bonus-ui/tabbed-card.html" class="">Tabbed Card</a></li>
                            <li><a href="../bonus-ui/dragable-card.html" class="">Draggable Card</a></li>
                            <li>
                                <a class="submenu-title " href="javascript:void(0)">
                                    Timeline<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span>
                                </a>
                                <ul class="nav-sub-childmenu submenu-content" style="display: none;">
                                    <li><a href="../bonus-ui/timeline-v-1.html" class="">Timeline 1</a></li>
                                    <li><a href="../bonus-ui/timeline-v-2.html" class="">Timeline 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          @yield('content')
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2022-23 © viho All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/js/config.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- Plugins JS start-->
    
        <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
        <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
        <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
        <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
        <script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
        <script src="{{asset('assets/js/owlcarousel/owl.carousel.js')}}"></script>
        <script src="{{asset('assets/js/general-widget.js')}}"></script>
        <script src="{{asset('assets/js/height-equal.js')}}"></script>
        <script src="{{asset('assets/js/tooltip-init.js')}}"></script>
        <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
        <script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>
<!-- Plugin used-->  
@stack('js')
</body>

<!-- Mirrored from laravel.pixelstrap.com/viho/widgets/general-widget by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Apr 2022 03:43:41 GMT -->
</html>