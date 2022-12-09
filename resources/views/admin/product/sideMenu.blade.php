@extends('layout.adminLayout')
@section('title')
    {{ucwords(__('cp.products'))}}
@endsection
@section('css')

    <style>
        a:link {
            text-decoration: none;
        }
    </style>

@endsection
@section('content')

    <div class="container">
        <!--begin::Profile Overview-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                <!--begin::Profile Card-->
                <div class="card card-custom card-stretch">
                    <!--begin::Body-->
                    <div class="card-body pt-4">

                        <div class="d-flex align-items-center">
                            <div
                                class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center symbol symbol-35 symbol-light-success">
                                <div
                                    class="symbol-label font-size-h5 font-weight-bold">{{mb_substr($item->title,0,1,'utf-8')}}</div>
                                <!--<i class="symbol-badge bg-success"></i>-->
                            </div>
                            <div>
                                <a href="#"
                                   class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{$item->title}}</a>
                                <div class="text-muted"><span id="label-{{$item->id}}" class="badge badge-pill badge-{{($item->status == "active")
															? "info" : "danger"}}" id="label-{{$item->id}}">
															{{__('cp.'.$item->status)}}
														</span></div>
                            </div>
                        </div>
                        <!--end::User-->
                        <!--begin::Contact-->
                        <div class="py-9">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('cp.price')}}:</span>
                                <span class="text-muted">{{$item->price}}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('cp.type')}}:</span>
                                <span class="text-muted">{{$item->type}}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('cp.count_views')}}:</span>
                                <span class="text-muted">{{$item->count_views}}</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('cp.title')}}:</span>
                                <a class="text-muted text-hover-primary">{{$item->title}}</a>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="font-weight-bold mr-2">{{__('cp.description')}}:</span>
                                <a class="text-muted text-hover-primary">{!! $item->description !!}</a>
                            </div>
                        </div>
                        <!--end::Contact-->
                        <!--begin::Nav-->
                        <div class="navi navi-bold navi-hover navi-active navi-link-rounded">

                            <div class="navi-item mb-2">
                                <a href="" class="navi-link py-4 click_action_product" data-req="home">
															<span class="navi-icon mr-2">
																<span class="svg-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"/>
																			<path
                                                                                d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                                                fill="#000000" fill-rule="nonzero"/>
																			<path
                                                                                d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                                                fill="#000000" opacity="0.3"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
															</span>
                                    <span
                                        class="navi-text font-size-lg">{{__(' home') }}</span>
                                </a>
                            </div>


                            <div class="navi-item mb-2">

                                <a href=""
                                   class="navi-link py-4 @if(Route::currentRouteName() == "admin.comments") active  @endif click_action_product"
                                   data-req="comments">
															<span class="navi-icon mr-2">
																<span class="svg-icon">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24"
                                                                             version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"/>
																			<path
                                                                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                                                fill="#000000" fill-rule="nonzero"
                                                                                opacity="0.3"/>
																			<path
                                                                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                                                fill="#000000" fill-rule="nonzero"/>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->
																</span>
															</span>
                                    <span class="navi-text font-size-lg">{{__('cp.comments')}}</span>
                                </a>
                            </div>

                            <div class="navi-item mb-2">
                                <a href=""
                                   class="navi-link py-4 @if(Route::currentRouteName() == "admin.reports") active  @endif click_action_product"
                                   data-req="reports">
                                                            <span class="navi-icon mr-2">
                                                                <span class="svg-icon">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path
                                                                                d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                                                fill="#000000" opacity="0.3"/>
                                                                            <path
                                                                                d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                                                fill="#000000"/>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                            </span>
                                    <span class="navi-text font-size-lg">{{__('cp.report')}}</span>
                                </a>
                            </div>


                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Profile Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->


                <div class="container item_box_product" id="item_box_product">


                </div>


            <!--end::Content-->
        </div>
        <!--end::Profile Overview-->
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            var mvar = $('.click_action_product')[0];

            mvar.click();
        });

        $(document).on('click', '.click_action_product', function (e) {
            e.preventDefault();
            var req = $(this).data('req');
            $('.item_box_product').html('<div class="spinner-border text-success" role="status"> <span class="sr-only">Loading...</span> </div>');

            $.ajax({
                type: 'get',
                headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                url: "{{url('admin/getItems/')}}/" + req + "/" + {{$item->id}},
                success: function (response) {
                    $('.item_box_product').html(response.items);
                    if ($(document).height() > 1500) {
                        window.scrollTo({top: 0, behavior: 'smooth'});
                    }
                },
                error: function (jqXHR, error, errorThrown) {
                    $('.item_box_product').html(errorBox);
                }
            });

        });
    </script>
@endsection
