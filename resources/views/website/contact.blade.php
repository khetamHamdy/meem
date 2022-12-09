@extends('layout.siteLayout')
@section('title') 88 Clicks Marketing Agency
@endsection
@section('css')

@endsection
@section('content')
<section class="section_head_page height1Full">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="home_txt">
                            <h1 class="wow fadeInUp">{!!__('web.GetInTouch')!!}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb-head wow fadeInUp">
                            <img src="{{asset('website/images/contact.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-mobail-head">
                <img src="{{asset('website/images/logo.svg')}}" alt="" />
            </div>
        </section>
        <!--section_home-->


        <section class="section_contact">
            <div class="container">
                <div class="sec_head sec_head_other wow fadeInUp">
                    <h2>{{__('web.ContactUs')}}</h2>
                    <strong>{{__('web.FeelFreeToVisitUsAtOurLocation')}}</strong>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="thumb-location wow fadeInUp">
                            <figure><img src="{{$setting->location_image}}" alt="Image Location" /></figure>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cont-location wow fadeInUp">
                            <div class="data-loc">
                                <div>
                                    <figure><i class="fa-solid fa-phone"></i></figure>
                                    <a href="tel:+{{$setting->mobile}}" taget=_blank ><p>+{{$setting->mobile}}</p></a>
                                </div>
                                <div>
                                    <figure><i class="fa-solid fa-envelope"></i></figure>
                                    <a href="mailto:{{$setting->info_email}}" taget=_blank ><p>{{$setting->info_email}}</p></a>
                                </div>
                                <div>
                                    <figure><i class="fa-solid fa-location-dot"></i></figure>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{$setting->lat}},{{$setting->long}}" taget=_blank ><p>{{$setting->address}}</p></a>
                                </div>
                                <div>
                                    <figure><i class="fa-solid fa-clock"></i></figure>
                                    <p>{{__('web.workingHours')}} : {{$setting->working_hours}}</p>
                                </div>
                                <div>
                                    <figure><i class="fa-solid fa-location-arrow"></i></figure>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{$setting->lat}},{{$setting->long}}" taget=_blank ><p>{{$setting->find_us}}</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section_location-->
@endsection
@section('quote')
@include('website.quote')
@endsection
@section('js')

@endsection
@section('script')

@endsection