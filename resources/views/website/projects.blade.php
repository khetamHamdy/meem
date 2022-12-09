@extends('layout.siteLayout')
@section('title') 88 Clicks Marketing Agency
@endsection
@section('css')

@endsection
@section('content')
<section class="section_head_page head_projects">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="head_team_txt">
                            <h1 class="wow fadeInUp">our <span> Projects</span></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-mobail-head">
                <img src="{{asset('website/images/logo.svg')}}" alt="" />
            </div>
        </section>
        <!--section_home-->
        
        <section class="section_our_projects">
            <div class="container">
                <ul class="list-work wow fadeInUp">
                    <li class="ls-work active" data-filter="all"><p><span>All Projects</span></p></li>
                    <li class="ls-work" data-filter="brand"><p><span>Brand Identity And Brand Building</span></p></li>
                    <li class="ls-work" data-filter="video"><p><span>Video Production</span></p></li>
                    <li class="ls-work" data-filter="creative"><p><span>Creative Department</span></p></li>
                    <li class="ls-work" data-filter="social"><p><span>Social Media Management</span></p></li>
                    <li class="ls-work" data-filter="digital"><p><span>Digital Marketing</span></p></li>
                    <li class="ls-work" data-filter="influencers"><p><span>Influencers And Public Relations</span></p></li>
                    <li class="ls-work" data-filter="website"><p><span>Website Design And Development</span></p></li>
                </ul>
                <div class="select-pj wow fadeInUp">
                    <select class="select-proj">
                        <option data-filter="all">All Projects</option>
                        <option data-filter="brand">Brand Identity And Brand Building</option>
                        <option data-filter="video">Video Production</option>
                        <option data-filter="creative">Creative Department</option>
                        <option data-filter="social">Social Media Management</option>
                        <option data-filter="digital">Digital Marketing</option>
                        <option data-filter="influencers">Influencers And Public Relations</option>
                        <option data-filter="website">Website Design And Development</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-lg-3 brand">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w1.png')}}" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 video">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w2.png')}}" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 creative">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w3.png')}}" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 social">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w4.png')}}" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 brand">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w1.png')}}" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 digital">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w2.png')}}" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 influencers wow fadeInUp">
                        <div class="item-work">
                            <figure>
                                <img src="{{asset('website/images/w3.png')}}" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 influencers">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w4.png')}}" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 video">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w1.png')}} alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 website">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w2.png')}} alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 digital">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w3.png')}}" alt="" />
                            </figure>
                            <div class="txt-work">
                                <h6>PROJECT NAME</h6>
                                <span>Service Name</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 website">
                        <div class="item-work wow fadeInUp">
                            <figure>
                                <img src="{{asset('website/images/w4.png')}}" alt="" />
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
@endsection
@section('quote')
@include('website.quote')
@endsection
@section('js')

@endsection
@section('script')

@endsection