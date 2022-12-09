@extends('layout.siteLayout')
@section('title') 88 Clicks Marketing Agency
@endsection
@section('css')

@endsection
@section('content')

<section class="section_head_page">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="head_team_txt">
                            <h1 class="wow fadeInUp">our  <span> Partners</span></h1>
                        </div>
                        <div class="thumb-head wow fadeInUp">
                            <img src="{{asset('website/images//img-partners.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-mobail-head">
                <img src="{{asset('website/images//logo.svg')}}" alt="" />
            </div>
        </section>
        <!--section_home-->
        
        <section class="section_partners">
            <div class="container">
                <div class="sec_head sec_head_other wow fadeInUp">
                    <h2>PLEASURE TO WORK WITH</h2>
                    <strong>All lasting business is built on friendship</strong>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="item-partners wow fadeInUp">
                            <figure><img src="{{asset('website/images//samsung.png')}}" alt="" /></figure>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-partners wow fadeInUp">
                            <figure><img src="{{asset('website/images//mitsubishi.png')}}" alt="" /></figure>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-partners wow fadeInUp">
                            <figure><img src="{{asset('website/images//google.png')}}" alt="" /></figure>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-partners wow fadeInUp">
                            <figure><img src="{{asset('website/images//microsoft.png')}}" alt="" /></figure>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-partners wow fadeInUp">
                            <figure><img src="{{asset('website/images//samsung.png')}}" alt="" /></figure>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-partners wow fadeInUp">
                            <figure><img src="{{asset('website/images//mitsubishi.png')}}" alt="" /></figure>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-partners wow fadeInUp">
                            <figure><img src="{{asset('website/images//google.png')}}" alt="" /></figure>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-partners wow fadeInUp">
                            <figure><img src="{{asset('website/images//microsoft.png')}}" alt="" /></figure>
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