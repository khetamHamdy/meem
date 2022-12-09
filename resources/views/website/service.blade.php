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
                        <div class="home_txt txt-hd-serv">
                            <h1 class="wow fadeInUp">{{__('web.We')}} <span> {{__('web.Do')}} </span> <br />{{@$service->name}}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="thumb-head wow fadeInUp">
                        <img src="{{asset('website/images/product-details.png')}}" alt="services" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-mobail-head">
            <img src="{{asset('website/images/logo.svg')}}" alt="88 Clicks" />
            </div>
        </section>
        <!--section_home-->

        <section class="section_serv_dt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="thumb-serv-dt wow fadeInUp">
                            <img src="{{@$service->image}}" alt="{{@$service->name}}" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="txt-serv-dt wow fadeInUp">
                            <span>{{@$service->name}}</span>
                            <p>{{@$service->details}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section_our_work">
            <div class="container">
                <div class="sec_head sec_head_other wow fadeInUp">
                    <h2>{{__('web.OurWorks')}}</h2>
                    <strong>{{__('web.HaveALookToSomeOfOurWorks')}}</strong>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="images/w1.png" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="images/w2.png" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="images/w3.png" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="images/w4.png" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section_other_services">
            <div class="sec_head sec_head_other wow fadeInUp">
                <h2>{{__('web.OtherServices')}}</h2>
                <strong>{{__('web.WeOfferQualityServiceAndValue')}}</strong>
            </div>
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
        </section>
        <!--section_what_do-->
@endsection
@section('quote')
@include('website.quote')
@endsection
@section('js')

@endsection
@section('script')

@endsection
