@extends('layout.siteLayout')
@section('title') 88 Clicks Marketing Agency
@endsection
@section('css')

@endsection
@section('content')
<section class="section_head_page head-services">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="head_team_txt">
                            <h1 class="wow fadeInUp">{{__('web.Our')}} <span> {{__('web.Services')}}</span></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thumb-head thumb-services-page wow fadeInUp">
                <img src="{{asset('website/images/bg-product.png')}}" alt="services" />
            </div>
            <div class="logo-mobail-head">
                <img src="{{asset('website/images/logo.svg')}}" alt="services" />
            </div>
        </section>
        <!--section_home-->

        <section class="section_services_page">
            <div class="container">
                <div class="row">
                @foreach($services as $one)
                <div class="col-lg-6">
                        <div class="item-serv wow fadeInUp">
                            <figure><img src="{{@$one->image}}" alt="{{@$one->name}}" /></figure>
                            <div class="txt-serv">
                                <div>
                                    <p><strong>{{@$one->name}}</strong></p>
                                </div>
                                <a href="{{route('service',[$one->id,$one->name])}}" class="btn-site"><span>{{__('web.SeeMore')}}</span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
