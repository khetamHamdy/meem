<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8"/>
    <title>
        @yield('title')
    </title>
    <meta name="description" content="Base form control examples"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('/admin_assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('/admin_assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/admin_assets/plugins/custom/uppy/uppy.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/admin_assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/admin_assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap"
          rel="stylesheet">

    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('/admin_assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/admin_assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/admin_assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/admin_assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/admin_assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    @yield('css')
    <link rel="shortcut icon" href="{{asset(@$setting->favicon)}}"/>

    <style>
        .box-filter-collapse {
            display: none;
        }

        .back {
            background: #ff9900 !important;
        }

        .form-control {
            width: 100%;
            height: 34px;
            padding: 2px 12px;
        }

        .has-error .form-control {
            border-color: #e73d4a;
        }

        .has-error .select2-selection {
            border-color: #e73d4a;
        }

        /* .no-error .form-control {
   border-color: #3de762;
           } */
        div.dt-top-container {
            display: grid;
            grid-template-columns: auto auto auto;
        }

        div.dt-center-in-div {
            margin: 0 auto;
        }

        div.dt-filter-spacer {
            margin: 10px 0;
        }

        legend {
            display: block;
            width: 100%;
            margin-bottom: 20px;
            font-size: 21px;
            line-height: inherit;
            color: #34495e;
            border-bottom: 1px solid #e5e5e5;
        }
    </style>


    @if(app()->getLocale() == 'ar')
        <link href="{{asset('/admin_assets/plugins/global/fonts/keenthemes-icons/ki.rtl.css')}}" rel="stylesheet"
              type="text/css"/>
        <link href="{{asset('/admin_assets/css/rtl.css')}}" rel="stylesheet" type="text/css"/>
    @endif

</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <a href="{{url(getLocal().'/admin')}}">
        <img alt="Logo" src="{{asset(@$setting->favicon)}}"/>
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <!--end::Header Menu Mobile Toggle-->
        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"/>
								<path
                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								<path
                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero"/>
							</g>
						</svg>
                        <!--end::Svg Icon-->
					</span>
        </button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->


<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            <!--begin::Brand-->
            <div class="brand flex-column-auto" id="kt_brand">
                <!--begin::Logo-->
                <a href="{{ url(app()->getLocale().'/admin/home') }}" class="brand-logo">
                    <img alt="Logo" src="{{asset(@$setting->favicon)}}" style="max-width: 60px;"/>
                </a>
                <!--end::Logo-->
                <!--begin::Toggle-->
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"/>
										<path
                                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
										<path
                                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
									</g>
								</svg>
                                <!--end::Svg Icon-->
							</span>
                </button>
                <!--end::Toolbar-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <!--begin::Menu Container-->
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                     data-menu-dropdown-timeout="500">
                    <!--begin::Menu Nav-->
                    <ul class="menu-nav">


                        <li class="menu-item {{(explode("/", request()->url())[5] == "home") ? "menu-item-here" : ''}}"
                            aria-haspopup="true">
                            <a href="{{url(getLocal().'/admin/home')}}" class="menu-link">
                                            <span class="svg-icon menu-icon">
                                               <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Home.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                <span class="menu-text">{{__('cp.home')}}</span>
                            </a>
                        </li>
                        @if(can(['admins-show' , 'admins-create' , 'admins-edit' , 'admins-delete']))
                            <li class="menu-item {{(explode("/", request()->url())[5] == "admins") ? "menu-item-here back" : ''}}"
                                aria-haspopup="true">
                                <a href="{{url(getLocal().'/admin/admins')}}" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path
                                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path
                                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">{{__('cp.admins')}}</span>
                                </a>
                            </li>
                        @endif


                        @if(can(['product-show' , 'product-create' , 'product-edit' , 'product-delete']))
                            <li class="menu-item {{(explode("/", request()->url())[5] == "product") ? "menu-item-here" : ''}}"
                                aria-haspopup="true">
                                <a href="{{url(getLocal().'/admin/product')}}" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Commode2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">{{__('cp.product')}}</span>
                                </a>
                            </li>
                        @endif

                        @if(can(['users-show' , 'users-create' , 'users-edit' , 'users-delete']))
                            <li class="menu-item {{(explode("/", request()->url())[5] == "users") ? "menu-item-here" : ''}}"
                                aria-haspopup="true">
                                <a href="{{url(getLocal().'/admin/users')}}" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Commode2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">{{__('cp.users')}}</span>
                                </a>
                            </li>
                        @endif

                        @if(can(['categories-show' , 'categories-create' , 'categories-edit' , 'categories-delete']))
                            <li class="menu-item {{(explode("/", request()->url())[5] == "category") ? "menu-item-here" : ''}}"
                                aria-haspopup="true">
                                <a href="{{url(getLocal().'/admin/category')}}" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Commode2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">{{__('cp.categories')}}</span>
                                </a>
                            </li>
                        @endif

                        @if(can(['contacts-show' , 'contacts-edit' , 'contacts-delete']))
                            <li class="menu-item {{(explode("/", request()->url())[5] == "contacts") ? "menu-item-here" : ''}}"
                                aria-haspopup="true">
                                <a href="{{url(getLocal().'/admin/contacts')}}" class="menu-link">
											  <span class="svg-icon menu-icon">
												<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Mail.svg--><svg
                                                      xmlns="http://www.w3.org/2000/svg"
                                                      xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                      height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path
                                                            d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                            fill="#000000"/>
                                                    </g>
                                                </svg>
                                                  <!--end::Svg Icon-->
											  </span>
                                    <span class="menu-text">{{__('cp.contacts')}}</span>

                                    @php
                                        $contacts_count=\App\Models\Contact::query()->where('is_read','0')->count();
                                    @endphp
                                    @if($contacts_count>0)
                                        <span class="label label-rounded label-danger">{{$contacts_count}}</span>
                                    @endif


                                </a>
                            </li>
                        @endif

                        @if(can(['pages-show', 'pages-edit']))
                            <li class="menu-item {{(explode("/", request()->url())[5] == "pages") ? "menu-item-here" : ''}}"
                                aria-haspopup="true">
                                <a href="{{url(getLocal().'/admin/pages')}}" class="menu-link">
											<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/File.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path
                                                        d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                                    <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                                </g>
                                            </svg>
											 </span>
                                    <span class="menu-text">{{__('cp.pages')}}</span>
                                </a>
                            </li>
                        @endif


                        @if(can(['logs-show','logs-delete']))
                            <li class="menu-item {{(explode("/", request()->url())[5] == "logs") ? "menu-item-here" : ''}}"
                                aria-haspopup="true">
                                <a href="{{url(getLocal().'/admin/logs')}}" class="menu-link">
											<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Archive.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
											 </span>
                                    <span class="menu-text">{{__('cp.logs')}}</span>
                                </a>
                            </li>
                        @endif

                        @if(can(['fqa-show','fqa-delete']))
                            <li class="menu-item {{(explode("/", request()->url())[5] == "fqa") ? "menu-item-here" : ''}}"
                                aria-haspopup="true">
                                <a href="{{url(getLocal().'/admin/fqa')}}" class="menu-link">
											<span class="svg-icon menu-icon">
										<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Archive.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z"
                                                        fill="#000000"/>
                                                </g>
                                            </svg>
											 </span>
                                    <span class="menu-text">{{__('cp.fqa')}}</span>
                                </a>
                            </li>
                        @endif

                        @if(can(['roles-show' , 'roles-create' , 'roles-edit' , 'roles-delete']))
                            <li class="menu-item {{(explode("/", request()->url())[5] == "roles") ? "menu-item-here" : ''}}"
                                aria-haspopup="true">
                                <a href="{{url(getLocal().'/admin/roles')}}" class="menu-link">
												<span class="svg-icon menu-icon">
																<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Bookmark.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path
                                                                d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z"
                                                                fill="#000000"/>
                                                        </g>
                                                    </svg>
												</span>
                                    <span class="menu-text">{{__('cp.roles')}}</span>
                                </a>
                            </li>
                        @endif

{{--                        <li class="menu-item {{(explode("/", request()->url())[5] == "permissions") ? "menu-item-here" : ''}}--}}
{{--                                                  @if(app()->getLocale() == 'ar')--}}
{{--                                                {{(explode("/", request()->url())[5] == "permissions") ? "menu-item-here" : ''}}--}}
{{--                                                  @endif">--}}
{{--                            <a href="{{route('admin.permissions.index')}}" class="menu-link menu-toggle">--}}
{{--                        										<span class="svg-icon menu-icon">--}}
{{--                        											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->--}}
{{--                        									<svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"--}}
{{--                                                                 width="24px" height="24px" viewBox="0 0 24 24"--}}
{{--                                                                 version="1.1">--}}
{{--                        												<g stroke="none" stroke-width="1" fill="none"--}}
{{--                                                                           fill-rule="evenodd">--}}
{{--                        													<rect x="0" y="0" width="24"--}}
{{--                                                                                  height="24"></rect>--}}
{{--                        													<path--}}
{{--                                                                                d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z"--}}
{{--                                                                                fill="#000000"></path>--}}
{{--                        													<rect fill="#000000" opacity="0.3" x="2"--}}
{{--                                                                                  y="4" width="5" height="16"--}}
{{--                                                                                  rx="1"></rect>--}}
{{--                        												</g>--}}
{{--                        											</svg>--}}
{{--                                                                    <!--end::Svg Icon-->--}}
{{--                        										</span>--}}
{{--                                <span class="menu-text">{{__('permissions')}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

                        @if(can(['settings-show'  , 'settings-edit']))
                            <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path
                                                    d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                    fill="#000000"/>
                                            </g>
                                        </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">{{__('cp.setting')}}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">

                                    <ul class="menu-subnav">

                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{url(getLocal().'/admin/settings')}}" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cp.general_setting')}}</span>
                                            </a>
                                        </li>
                                        <li class="menu-item" aria-haspopup="true">
                                            <a href="{{url(getLocal().'/admin/system_maintenance')}}"
                                               class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{__('cp.system_maintenance')}} </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        @endif


                    </ul>
                    <!--end::Menu Nav-->
                </div>
                <!--end::Menu Container-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->


        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <!--begin::Header Nav-->
                            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                <li class="breadcrumb-item">
                                    <a href="{{url(app()->getLocale().'/admin/home')}}"
                                       class="text-dark font-weight-bold">{{__('cp.home')}}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url(app()->getLocale().'/admin/')}}@yield('title')"
                                       class="text-muted">@yield('title')</a>
                                </li>
                            </ul>


                            <!--end::Header Nav-->
                        </div>
                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    <div class="topbar">

                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                    @if(app()->getLocale() == 'en')
                                        <?php
                                        $lang = LaravelLocalization::getSupportedLocales()['ar']
                                        ?>
                                        <img class="h-20px w-20px rounded-sm"
                                             src="{{asset('admin_assets/media/svg/flags/008-saudi-arabia.svg')}}"
                                             alt="">
                                    @else
                                        <?php
                                        $lang = LaravelLocalization::getSupportedLocales()['en']
                                        ?>
                                        <img class="h-20px w-20px rounded-sm"
                                             src="{{asset('admin_assets/media/svg/flags/012-uk.svg')}}" alt="">
                                    @endif
                                </div>
                            </div>
                            <!--end::Toggle-->
                            <!--begin::Dropdown-->
                            <div
                                class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Nav-->
                                <ul class="navi navi-hover py-4">
                                    <!--begin::Item-->
                                    <li class="navi-item active">
                                        <?php
                                        $lang = LaravelLocalization::getSupportedLocales()['en']
                                        ?>
                                        <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                                           class="navi-link">
                                            <span class="symbol symbol-20 mr-3"><img
                                                    src="{{url('admin_assets/media/svg/flags/012-uk.svg')}}"
                                                    alt=""></span>
                                            <span class="navi-text">{{ $lang['native'] }}</span>
                                        </a>


                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="navi-item">
                                        <?php
                                        $lang = LaravelLocalization::getSupportedLocales()['ar']
                                        ?>
                                        <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
                                           class="navi-link">
                                            <span class="symbol symbol-20 mr-3"><img
                                                    src="{{url('admin_assets/media/svg/flags/008-saudi-arabia.svg')}}"
                                                    alt=""></span>
                                            <span class="navi-text">{{ $lang['native'] }}</span>
                                        </a>
                                    </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Nav-->
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Languages-->
                        <!--begin::User-->
                        <div class="topbar-item">
                            <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                 id="kt_quick_user_toggle">
                                {{-- <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"></span> --}}
                                <span
                                    class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->guard('admin')->user()->name}}</span>
                                <span class="symbol symbol-35 symbol-light-success">
											<span
                                                class="symbol-label font-size-h5 font-weight-bold">{{mb_substr(auth()->guard('admin')->user()->name,0,1,'utf-8')}}</span>
										</span>
                            </div>
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            @if (count($errors) > 0)
                <div class="container pt30">
                    <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
                        <div class="alert-icon">
								<span class="svg-icon svg-icon-primary svg-icon-xl">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"></rect>
											<path
                                                d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z"
                                                fill="#000000" opacity="0.3"></path>
											<path
                                                d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
										</g>
									</svg>
                                    <!--end::Svg Icon-->
								</span>
                        </div>
                        <div class="alert-text" style="color:red">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }} </p>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endif
            @if (session('status'))
                <div class="container pt30">
                    <div class="alert alert-custom alert-white alert-shadow gutter-b" style="border-color:green"
                         role="alert">
                        <div class="alert-icon">
								<span class="svg-icon svg-icon-primary svg-icon-xl">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"></rect>
											<path
                                                d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z"
                                                fill="#000000" opacity="0.3"></path>
											<path
                                                d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
										</g>
									</svg>
                                    <!--end::Svg Icon-->
								</span>
                        </div>
                        <div class="alert-text" style="color:green">
                            <p>{{  session('status')  }} </p>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
            <!--end::Content-->
            <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted font-weight-bold mr-2">{{date("Y")}}'&copy; Powered By'</span>
                        <a href=" " target="_blank" class="text-dark-75 text-hover-primary">LINE</a>
                    </div>
                </div>
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->


<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <!--<h3 class="font-weight-bold m-0">User Profile-->
        <!--<small class="text-muted font-size-sm ml-2">12 messages</small></h3>-->
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="d-flex flex-column">
                <a href="#"
                   class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{auth()->guard('admin')->user()->name}}</a>
                <!--<div class="text-muted mt-1">Admin</div>-->
                <div class="navi mt-2">
                    <a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path
                                                        d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                        fill="#000000"/>
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
									</span>
									<span
                                        class="navi-text text-muted text-hover-primary">{{auth()->guard('admin')->user()->email}}</span>
								</span>
                    </a>
                    <a href="{{url(getLocal().'/admin/logout')}}"
                       class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">{{__('cp.logout')}}</a>

                </div>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator separator-dashed mt-8 mb-5"></div>
        <!--end::Separator-->
        <!--begin::Nav-->
        <div class="navi navi-spacer-x-0 p-0">
            <!--begin::Item-->
            <a href="{{url(getLocal().'/admin/editMyProfile')}}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-success">
										<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
										<svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path
                                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                    fill="#000000"/>
												<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
											</g>
										</svg>
                                        <!--end::Svg Icon-->
									</span>
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">{{__('cp.edit_my_profile')}}</div>
                    </div>
                </div>

            </a>
            <!--end:Item-->
            <!--begin::Item-->
            <a href="{{url(getLocal().'/admin/changeMyPassword')}}" class="navi-item">
                <div class="navi-link">
                    <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                            <i class="la la-key"></i>
                            {{-- <span class="svg-icon svg-icon-md svg-icon-warning">

                            </span> --}}
                        </div>
                    </div>
                    <div class="navi-text">
                        <div class="font-weight-bold">{{__('cp.Change_Password')}}</div>
                    </div>
                </div>
            </a>
        </div>
        <!--end::Nav-->

    </div>
    <!--end::Content-->
</div>

<div id="deleteAll" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">{{__('cp.delete')}}</h4>
            </div>
            <div class="modal-body">
                <p>{{__('cp.confirmDeleteAll')}} </p>
            </div>
            <div class="modal-footer">
                <button class="btn default" data-dismiss="modal" aria-hidden="true">{{__('cp.cancel')}}</button>
                <a href="#" class="confirmAll" data-action="delete">
                    <button class="btn btn-danger">{{__('cp.delete')}}</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="activation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">{{__('cp.activation')}}</h4>
            </div>
            <div class="modal-body">
                <p>{{__('cp.confirmActiveAll')}} </p>
            </div>
            <div class="modal-footer">
                <button class="btn default" data-dismiss="modal" aria-hidden="true">{{__('cp.cancel')}}</button>
                <a href="#" class="confirmAll" data-action="active">
                    <button class="btn btn-success">{{__('cp.Yes')}}</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="cancel_activation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">{{__('cp.cancel_activation')}}</h4>
            </div>
            <div class="modal-body">
                <p>{{__('cp.confirmNotActiveAll')}} </p>
            </div>
            <div class="modal-footer">
                <button class="btn default" data-dismiss="modal" aria-hidden="true">{{__('cp.cancel')}}</button>
                <a href="#" class="confirmAll" data-action="not_active">
                    <button class="btn btn-success">{{__('cp.Yes')}}</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('/admin_assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('/admin_assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('/admin_assets/js/scripts.bundle.js')}}"></script>

<script src="{{asset('/admin_assets/js/pages/crud/forms/widgets/bootstrap-switch.js')}}"></script>
<script src="{{asset('/admin_assets/js/pages/crud/forms/widgets/bootstrap-touchspin.js')}}"></script>
<script src="{{asset('/admin_assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('/admin_assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js')}}"></script>
<script src="{{asset('/admin_assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('/admin_assets/js/pages/crud/forms/widgets/ion-range-slider.js')}}"></script>
<script src="{{asset('/admin_assets/js/pages/crud/forms/editors/summernote.js')}}"></script>
<script src="{{asset('/admin_assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
<script src="{{asset('/admin_assets/plugins/jquery-validation/js/jquery.validate.js')}}"></script>
<script src="{{asset('/admin_assets/plugins/jquery-validation/js/additional-methods.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{-- <script src="{{asset('/admin_assets/js/pages/crud/file-upload/image-input.js')}}"></script> --}}
{{-- <script src="{{asset('/admin_assets/plugins/custom/uppy/uppy.bundle.js')}}"></script>
<script src="{{asset('/admin_assets/js/pages/crud/file-upload/uppy.js')}}"></script> --}}
<script src="{{asset('/admin_assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
{{-- <script src="{{asset('/admin_assets/js/pages/crud/datatables/data-sources/html.js')}}"></script> --}}

<script>
    var table_btns = [
        {
            extend: 'copy',
            //   text: '<i class="fa fa-copy"></i>',
            className: 'btn btn-outline-primary',
            exportOptions: {
                columns: ':not(.notExport)'
            }
        },
        {
            extend: 'excel',
            className: 'btn btn-outline-primary',
            exportOptions: {
                columns: ':not(.notExport)'
            }
        },
        {
            extend: 'pdf',
            className: 'btn btn-outline-primary',
            exportOptions: {
                columns: ':not(.notExport)'
            }
        },
        {
            extend: 'print',
            className: 'btn btn-outline-primary',
            exportOptions: {
                columns: ':not(.notExport)'
            }
        },

    ];


</script>
@yield('js')
@yield('script')
<script>
    var FormValidation = function () {

// basic validation
        var handleValidation1 = function () {
            // for more info visit the official plugin documentation:
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error text-danger', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: ".ignore",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected"),
                    },
                },
                rules: {
                    // name: {
                    //     minlength: 2,
                    //     required: true
                    // },
                    // email: {
                    //     required: true,
                    //     email: true
                    // },

                    // mobile: {
                    //     required: true,
                    //     minlength: 8
                    // },

                    password: {required: true},
                    confirm_password: {required: true, equalTo: '[name="password"]'},
                    admin_type: {
                        required: true
                    },
                    @yield('validation')


                    // title: {required: true},

                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    success1.hide();
                    error1.show();
                    scrollTo(error1, -200);
                    // App.scrollTo(error1, -200);
                },


                //     errorPlacement: function (error, element) { // render error placement for each input typeW
                //     if (element.parent(".input-group").size() > 0)
                //     {
                //         error.insertAfter(element.parent(".input-group"));
                //     }
                //     else if (element.attr("data-error-container"))
                //     {
                //         error.appendTo(element.attr("data-error-container"));
                //     }
                //     else
                //     {
                //         error.insertAfter(element); // for other inputs, just perform default behavior
                //     }
                // },

                highlight: function (element) { // hightlight error inputs

                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide
                    e.submit()
                }
            });


        };

        return {
            //main function to initiate the module
            init: function () {

                handleValidation1();

            }

        };

    }();

    jQuery(document).ready(function () {
        FormValidation.init();
    });


    $r = '{{app()->getLocale()}}';
    if ($r == 'ar') {


//overright messsages
        $.extend($.validator, {

            defaults: {
                messages: {},
                groups: {},
                rules: {},
                errorClass: "error",
                validClass: "valid",
                errorElement: "label",
                focusCleanup: false,
                focusInvalid: true,
                errorContainer: $([]),
                errorLabelContainer: $([]),
                onsubmit: true,
                ignore: ":hidden",
                ignoreTitle: false,
                onfocusin: function (element) {
                    this.lastActive = element;

                    // Hide error label and remove error class on focus if enabled
                    if (this.settings.focusCleanup) {
                        if (this.settings.unhighlight) {
                            this.settings.unhighlight.call(this, element, this.settings.errorClass, this.settings.validClass);
                        }
                        this.hideThese(this.errorsFor(element));
                    }
                },
                onfocusout: function (element) {
                    if (!this.checkable(element) && (element.name in this.submitted || !this.optional(element))) {
                        this.element(element);
                    }
                },
                onkeyup: function (element, event) {
                    // Avoid revalidate the field when pressing one of the following keys
                    // Shift       => 16
                    // Ctrl        => 17
                    // Alt         => 18
                    // Caps lock   => 20
                    // End         => 35
                    // Home        => 36
                    // Left arrow  => 37
                    // Up arrow    => 38
                    // Right arrow => 39
                    // Down arrow  => 40
                    // Insert      => 45
                    // Num lock    => 144
                    // AltGr key   => 225
                    var excludedKeys = [
                        16, 17, 18, 20, 35, 36, 37,
                        38, 39, 40, 45, 144, 225
                    ];

                    if (event.which === 9 && this.elementValue(element) === "" || $.inArray(event.keyCode, excludedKeys) !== -1) {

                    } else if (element.name in this.submitted || element === this.lastElement) {
                        this.element(element);
                    }
                },
                onclick: function (element) {
                    // click on selects, radiobuttons and checkboxes
                    if (element.name in this.submitted) {
                        this.element(element);

                        // or option elements, check parent select in that case
                    } else if (element.parentNode.name in this.submitted) {
                        this.element(element.parentNode);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    if (element.type === "radio") {
                        this.findByName(element.name).addClass(errorClass).removeClass(validClass);
                    } else {
                        $(element).addClass(errorClass).removeClass(validClass);
                    }
                },
                unhighlight: function (element, errorClass, validClass) {
                    if (element.type === "radio") {
                        this.findByName(element.name).removeClass(errorClass).addClass(validClass);
                    } else {
                        $(element).removeClass(errorClass).addClass(validClass);
                    }
                }
            },

            // http://jqueryvalidation.org/jQuery.validator.setDefaults/
            setDefaults: function (settings) {
                $.extend($.validator.defaults, settings);
            },


            messages: {

                required: "هذا الحقل مطلوب",
                remote: "Please fix this field.",
                email: "الرجاء ادخال عنوان بريد الكتروني صحيح .",
                date: "الرجاء ادخال تاريخ صحيح.",
                dateISO: "Please enter a valid date ( ISO ).",
                number: "Please enter a valid number.",
                digits: "Please enter only digits.",
                creditcard: "Please enter a valid credit card number.",
                equalTo: "الرجاء ادخال نفس قيمة الباسوورد.",
                maxlength: $.validator.format("Please enter no more than {0} characters."),
                minlength: $.validator.format("Please enter at least {0} characters."),
                rangelength: $.validator.format("Please enter a value between {0} and {1} characters long."),
                range: $.validator.format("Please enter a value between {0} and {1}."),
                max: $.validator.format("الرجاء ادخال قيمة اقل او تساوي {0}."),
                min: $.validator.format("الرجاء ادخال قيمة اكبر او تساوي {0}."),
                category_id: "حقل التصنيف مطلوب"
            },

        });
    }
    $('.select2').select2({}).on("change", function (e) {
        $(this).valid()
    });
</script>
<script>

    var IDArray = [];
    $("input:checkbox[name=chkBox]:checked").each(function () {
        IDArray.push($(this).val());
    });

    $("[name=checkAll]").click(function () {
        $('.event').removeAttr('disabled');
        $('.checkboxes').not(this).prop('checked', this.checked);
    });

    if (IDArray.length == 0) {
        $('.event').attr('disabled', 'disabled');
    }
    // $('.chkBox').on('change', function () {
    $(document).on("change", ".chkBox", function () {
        var IDArray = [];
        $("input:checkbox[name=chkBox]:checked").each(function () {
            IDArray.push($(this).val());
        });
        if (IDArray.length == 0) {
            $('.event').attr('disabled', 'disabled');
        } else {
            $('.event').removeAttr('disabled');
        }
    });
    $('.confirmAll').on('click', function (e) {
        e.preventDefault();
        var action = $(this).data('action');

        var url = "{{ url(getLocal().'/admin/changeStatus/'.Request::segment(3)) }}";
        var csrf_token = '{{csrf_token()}}';
        var IDsArray = [];
        $("input:checkbox[name=chkBox]:checked").each(function () {
            IDsArray.push($(this).val());
        });

        if (IDsArray.length > 0) {
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': csrf_token},
                url: url,
                data: {action: action, IDsArray: IDsArray, _token: csrf_token},
                success: function (response) {
                    if (response === 'active') {
                        //alert('fsvf');
                        $.each(IDsArray, function (index, value) {
                            $('#label-' + value).removeClass('badge-danger');
                            $('#label-' + value).addClass('badge-info');
                            $r = '{{app()->getLocale()}}';
                            if ($r == 'ar') {
                                $('#label-' + value).text('فعال ');
                            } else {
                                $('#label-' + value).text('Active');

                            }
                        });
                        $('#activation').modal('hide');
                    } else if (response === 'not_active') {
                        //alert('fg');
                        $.each(IDsArray, function (index, value) {
                            $('#label-' + value).removeClass('badge-info');
                            $('#label-' + value).addClass('badge-danger');
                            $r = '{{app()->getLocale()}}';
                            if ($r == 'ar') {
                                $('#label-' + value).text('غير فعال');
                            } else {
                                $('#label-' + value).text('Not Active');

                            }
                        });
                        $('#cancel_activation').modal('hide');
                    } else if (response === 'delete') {
                        $.each(IDsArray, function (index, value) {
                            $('#tr-' + value).hide(2000);
                        });
                        $('#deleteAll').modal('hide');
                    }

                    IDArray = [];
                    $("input:checkbox[name=chkBox]:checked").each(function () {
                        $(this).prop('checked', false);
                    });
                    $('.event').attr('disabled', 'disabled');

                },
                fail: function (e) {
                    alert(e);
                }
            });
        } else {
            alert('{{__('cp.not_selected')}}');
        }
    });

</script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>

    function readURL(input, target) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                target.attr('src', e.target.result);
                // add inut val base 64
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURLMultiple(input, target) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (var i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    target.append('<div class="imageBox text-center" style="width:150px;height:190px;margin:5px"><img src="' + event.target.result + '" style="width:150px;height:150px"><button class="btn btn-danger deleteImage" type="button">{{__("cp.remove")}}</button><input class="attachedValues" type="hidden" name="filename[]" value="' + event.target.result + '"></div>');
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    }

    $(document).on("click", ".deleteImage", function () {
        $(this).parent().remove();
    });

    $(function () {

        $('#kt_quick_user_toggle').click(function (e) {
            if ($('.offcanvas-right').hasClass('offcanvas-on')) {
                $('.offcanvas-right').removeClass('offcanvas-on');
            } else {
                $('.offcanvas-right').addClass('offcanvas-on');
            }
// 			event.stopPropagation();
        });
    });

    $(function () {

        $('#kt_quick_user_close').click(function (e) {
            $('.offcanvas-right').removeClass('offcanvas-on');
        });
    });

    $('.select2').select2({
        width: '100%'
    });


    $('.btn--filter').click(function () {
        $('.box-filter-collapse').slideToggle(500);
    });


    $(function () {
        $('.number-only').keypress(function (e) {
            if (isNaN(this.value + "" + String.fromCharCode(e.charCode))) return false;
        })
            .on("cut copy paste", function (e) {
                e.preventDefault();
            });
    });


    $('#basicModal').on('hidden.bs.modal', function () {
        $(".create_form").find("input, textarea ,select").val("");
    });


    $(document).on('click', 'input,select,textarea,.select2', function () {
        //   jQuery.noConflict();
        $(this).attr('style', "").next('span.errorSpan').remove();//
    });

    function validatiomForCreate(e) {
        $('.create_form').find('select, textarea, input').each(function () {
            if ($(this).prop('required') && !$(this).val() && !$(this).is(":hidden")) {
                $(this).css("border", "#ff0000 solid 1px").next('span.errorSpan').remove(); //
                $(this).css("border", "#bd1616 solid 1px").after('<span style="color:#bd1616" class="errorSpan">{{__("website.requiredField")}}</span>');
                preventSubmit = true;
                e.preventDefault();
            }
        });
        if (preventSubmit) {
            preventSubmit = false;
            return false;

        }
    }


    var table_language =
        @if(app()->getLocale() =='ar')
        // {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"}
        {
            "sProcessing": "جاري التحميل...",
            "sLengthMenu": "أظهر مُدخلات _MENU_",
            "sZeroRecords": "لم يُعثر على أية سجلات",
            "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مُدخل",
            "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجلّ",
            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
            "sInfoPostFix": "",
            "sSearch": "ابحث:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "الأول",
                "sPrevious": "السابق",
                "sNext": "التالي",
                "sLast": "الأخير"
            }
        }
        @else
    {
        "sEmptyTable"
    :
        "No data available in table",
            "sInfo"
    :
        "Showing _START_ to _END_ of _TOTAL_ entries",
            "sInfoEmpty"
    :
        "Showing 0 to 0 of 0 entries",
            "sInfoFiltered"
    :
        "(filtered from _MAX_ total entries)",
            "sInfoPostFix"
    :
        "",
            "sInfoThousands"
    :
        ",",
            "sLengthMenu"
    :
        "Show _MENU_ entries",
            "sLoadingRecords"
    :
        "Loading...",
            "sProcessing"
    :
        "Processing...",
            "sSearch"
    :
        "Search:",
            "sZeroRecords"
    :
        "No matching records found",
            "oPaginate"
    :
        {
            "sFirst"
        :
            "First",
                "sLast"
        :
            "Last",
                "sNext"
        :
            "Next",
                "sPrevious"
        :
            "Previous"
        }
    ,
        "oAria"
    :
        {
            "sSortAscending"
        :
            ": activate to sort column ascending",
                "sSortDescending"
        :
            ": activate to sort column descending"
        }
    }
    @endif
</script>
<script>
    $(document).on('click', '#submitButton', function () {
        $('#submitForm').click();
    });
</script>


<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-firestore.js"></script>

<script>
    const firebaseConfig = {
        apiKey: "AIzaSyCCOMQNa77DPhrCxmqGfTIQkDeR_l6OreU",
        authDomain: "ymmk-d1587.firebaseapp.com",
        databaseURL: "https://ymmk-d1587-default-rtdb.firebaseio.com",
        projectId: "ymmk-d1587",
        storageBucket: "ymmk-d1587.appspot.com",
        messagingSenderId: "444722446209",
        appId: "1:444722446209:web:1214e2facba1a2044e7280"
    };
    firebase.initializeApp(firebaseConfig);
</script>

<script type="text/javascript">
    var statistics = firebase.database().ref("adminOrdersNotifications/1");
    statistics.on('value', function (snapshot) {
        if (snapshot.val() === 0) {
            $('.total_notifications').hide().text('');
        } else {
            $('.total_notifications').show().text(snapshot.val());
            $.ajax({
                type: 'get',
                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                url: '{{url(getLocal().'/admin/getNewOrdersCount/orders/')}}',
                success: function (response) {
                    if (response < snapshot.val()) {
                        const audio = new Audio("{{url('notify.mp3')}}");
                        audio.play();
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "{{getLocal()=='ar'?'toast-bottom-left':'toast-bottom-right'}}",
                            "preventDuplicates": false,
                            "showDuration": "3000",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr.warning("<a href='{{url('admin')}}'>@lang('cp.new_order')</a>");

                        $.ajax({
                            type: 'get',
                            data: {'value': snapshot.val()},
                            headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                            url: '{{url(getLocal().'/admin/changeOrdersCount/orders')}}',
                            success: function (response) {
                                console.log(response);
                            }, error: function (response) {
                                console.log(response);
                            }
                        });
                    }
                },
                error: function (jqXHR, error, errorThrown) {

                }
            });
        }
    });
</script>


</body>
<!--end::Body-->
</html>
