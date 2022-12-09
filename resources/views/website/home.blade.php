@extends('layout.siteLayout')
@section('title') 88 Clicks Marketing Agency
@endsection
@section('css')
@endsection
@section('content')
<section class="section_home">
            <div class="container">
                <div class="home_txt">
                    <h1 class="wow fadeInUp">{!! @$settings->banner_text !!}</h1>
                </div>
            </div>
            <div class="thumb-home wow fadeInUp">
                <img src="{{asset('website/images/Home-Banner.png')}}" alt="88 Clicks" />
            </div>
            <div class="logo-mobail-head">
                <img src="{{asset('website/images/logo.svg')}}" alt="88 Clicks" />
            </div>
        </section>
        <!--section_home-->

        <section class="section_we_are">
            <div class="cont-we-are">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="thumb-we wow fadeInUp">
                                <img src="{{asset('website/images/thumb-we-are.png')}}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="sec_head wow fadeInUp">
                                <h2>{!!__('web.WhoWeAre_home') !!}</h2>
                                {!! @$settings->who_we_are_description !!}
                                <a href="{{route('about')}}" class="btn-site"><span>{{__('web.KnowMore')}}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section_we_are-->

        <section class="section_what_do">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="sec_head wow fadeInUp">
                            <h2>{!!__('web.WhatWEDo')!!}</h2>
                            {!! @$settings->what_we_do_description !!}
                            <a href="{{route('product')}}" class="btn-site"><span>{{__('web.SeeMore')}}</span></a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="owl-carousel coloum4">
                        @foreach($services as $one)
                        <div class="item">
                                <div class="item-do">
                                    <figure><img src="{{@$one->image}}" alt="{{@$one->name}}" /></figure>
                                    <div class="txt-do">
                                        <p>{{@$one->name}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section_what_do-->

        <section class="section_partners">
            <div class="cont-partners">
                <div class="container">
                    <div class="sec_head wow fadeInUp">
                        <h2>{!!__('web.OurPartners_home')!!}</h2>
                        <span>{{__('web.WehaveTheBestPartners')}}</span>
                    </div>
                    <div class="ds-partners wow fadeInUp">
                        <div class="item-partners">
                            <figure><img src="{{asset('website/images/p1.png')}}" alt="" /></figure>
                        </div>
                    </div>
                    <div class="seeMore">
                        <a href="{{route('partners')}}" class="btn-site"><span>{{__('web.SeeMore')}}</span></a>
                    </div>
                </div>
            </div>
        </section>
        <!--section_partners-->

        <section class="section_clients">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="ds-clients wow fadeInUp">
                            <div class="item-clients">
                                <figure><img src="{{asset('website/images/c5.png')}}" alt="Image Clients" /></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="sec_head wow fadeInUp">
                            <h2>{!!__('web.OurClients')!!}</h2>
                            <span>{{__('web.MeetOurClientAroundTheWorld')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--section_clients-->

        <section class="section_location">
            <div class="container">
                <div class="sec_head wow fadeInUp">
                    <h2>{!!__('web.OurLocation')!!}</h2>
                    <span>{!!__('web.WeHaveMultipleLocationsAroundTheWorld')!!}</span>
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
