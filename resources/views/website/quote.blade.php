<section class="section_quote" id="sectionQuote">
            <div class="cont-quote">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="sec_head wow fadeInUp">
                                <h2>{{__('web.GetQuote')}}</h2>
                                <span>{{__('web.fill the below form and submit, our team will contact you shortly')}}</span>
                            </div>
                            <form class="form-quote form-sty wow fadeInUp" method="post" id="quoteForm" action="{{route('storeQuote')}}">
                                @csrf                                
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="{{__('web.ContactName')}}*" required />
                                </div>
                                <div class="d-flex">
                                    <div class="form-group select--fo">
                                        <select class="form-control" name="country_code" required>
                                            <option value="965">+965</option>
                                            <option value="964">+964</option>
                                            <option value="963">+963</option>
                                            <option value="962">+962</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mobile" placeholder="{{__('web.Mobile')}}*" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="{{__('web.Email')}}*" required />
                                </div>
                                <div class="form-group select--fo">
                                    <select class="form-control" name="service_id[]" multiple="multiple" required>
                                        <option value="">{{__('web.LookingForServices')}} *</option>
                                        @foreach (@$services as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control"  name="message" placeholder="Your Message" ></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn-site btnSt btn-submit" id="send" ><span>{{__('web.Submit')}} <i class="fa-solid fa-paper-plane"></i></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thumb-quote wow fadeInUp">
                <img src="{{asset('website/images/thumb-quote.png')}}" alt="" />
            </div>
        </section>