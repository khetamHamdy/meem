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
                            <h1 class="wow fadeInUp">{!!__('web.MeetOurChairman')!!}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb-head wow fadeInUp">
                            <img src="{{asset('website/images/chairman.png')}}" alt="88 Clicks" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-mobail-head">
                <img src="i{{asset('website/mages/logo.svg')}}" alt="88 Clicks" />
            </div>
        </section>
        <!--section_home-->
        
        <section class="section_content_chairman">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="thumb-chairm wow fadeInUp">
                            <img src="{{$item->image}}" alt="{{$item->title}}" />
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="txt-chairm wow fadeInUp">
                            <h4>{{__('web.MessageFromChairman_page')}}</h4>
                            {!! @$item->description !!}
                            <figure class="signature"><img src="{{asset('website/images/signature.png')}}" alt="88 Clicks" /></figure>
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