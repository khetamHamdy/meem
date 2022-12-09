@extends('layout.siteLayout')
@section('title') 88 Clicks Marketing Agency
@endsection
@section('css')

@endsection
@section('content')
<section class="section_head_page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="home_txt">
                            <h1 class="wow fadeInUp">{!! __('web.WhoWeAre') !!}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb-head wow fadeInUp">
                            <img src="{{asset('website/images/head-about.png')}}" alt="88CLICKS about" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-mobail-head">
                <img src="{{asset('website/images/logo.svg')}}" alt="88CLICKS logo" />
            </div>
        </section>
        <!--section_home-->
        
        <section class="section_content_about">
            <div class="dt-about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="thumb-abt wow fadeInUp">
                                <img src="{{$page->familiarize_image}}" alt="get familiarize" />
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="txt-abt wow fadeInUp">
                                <span>{!! __('web.GetFamiliarize') !!}</span>
                               {!! @$page->get_familiarize !!}  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dt-about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="thumb-abt wow fadeInUp">
                                <img src="{{$page->vision_image}}" alt="Our vision" />
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="txt-abt wow fadeInUp">
                                <span>{!! __('web.OurVision') !!}</span>
                                {!! @$page->our_vision !!}  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dt-about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="thumb-abt wow fadeInUp">
                                <img src="{{$page->mission_image}}" alt="Our mission" />
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="txt-abt wow fadeInUp">
                                <span>{!! __('web.OurMission') !!}</span>
                                {!! @$page->our_mission !!}  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('quote')
@include('website.quote')
@endsection
@section('js')

@endsection
@section('script')

@endsection