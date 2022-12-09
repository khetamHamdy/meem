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
                            <h1 class="wow fadeInUp">our  <span> Team</span></h1>
                        </div>
                        <div class="thumb-head wow fadeInUp">
                            <img src="{{asset('website/images/team.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-mobail-head">
                <img src="{{asset('website/images/logo.svg')}}" alt="" />
            </div>
        </section>
        <!--section_home-->
        
        <section class="section_content_team">
            <div class="container">
                <div class="sec_head sec_head_other wow fadeInUp">
                    <h2>we stand for team</h2>
                    <strong>we love working here, we think you’ll too</strong>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="item-team wow fadeInUp">
                            <figure><img src="{{asset('website/images/t1.png')}}" alt="" /></figure>
                            <div class="txt-team">
                                <span>CO FOUNDER | CHAIRMAN</span>
                                <h5>Fareed Rahman</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-team wow fadeInUp">
                            <figure><img src="{{asset('website/images/t2.png')}}" alt="" /></figure>
                            <div class="txt-team">
                                <span>FOUNDER | GROUP CEO</span>
                                <h5>Ahmed Ali Azzar</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="item-team wow fadeInUp">
                            <figure><img src="{{asset('website/images/t3.png')}}" alt="" /></figure>
                            <div class="txt-team">
                                <span>UI | UX Designer</span>
                                <h5>Ahmed Ali Mustaq</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-team wow fadeInUp">
                            <figure><img src="{{asset('website/images/t4.png')}}" alt="" /></figure>
                            <div class="txt-team">
                                <span>Full Stack Developer</span>
                                <h5>Jane Junaid</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-team wow fadeInUp">
                            <figure><img src="{{asset('website/images/t5.png')}}" alt="" /></figure>
                            <div class="txt-team">
                                <span>Project Manager</span>
                                <h5>Stazy Thomson Villiams</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-team wow fadeInUp">
                            <figure><img src="{{asset('website/images/t2.png')}}" alt="" /></figure>
                            <div class="txt-team">
                                <span>FOUNDER | GROUP CEO</span>
                                <h5>Ahmed Ali Azzar</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-team wow fadeInUp">
                            <figure><img src="{{asset('website/images/t1.png')}}" alt="" /></figure>
                            <div class="txt-team">
                                <span>Front-End Developer</span>
                                <h5>Ala Nasrallah </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-team wow fadeInUp">
                            <figure><img src="{{asset('website/images/t3.png')}}" alt="" /></figure>
                            <div class="txt-team">
                                <span>asp.net Developer</span>
                                <h5>Ahmed Saeed </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-team wow fadeInUp">
                            <figure><img src="{{asset('website/images/t2.png')}}" alt="" /></figure>
                            <div class="txt-team">
                                <span>Back-End Developer</span>
                                <h5>Hani Abdallah</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="item-team wow fadeInUp">
                            <figure><img src="{{asset('website/images/t5.png')}}" alt="" /></figure>
                            <div class="txt-team">
                                <span>UI</span>
                                <h5>Ahmed Ali Azzar</h5>
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