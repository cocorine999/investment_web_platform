@extends('billion.dashboard.include.header')

@section('title','Withdrawal')

@section("content")

            <div class="nk-content nk-content-lg nk-content-fluid">
                <div class="container-xl wide-lg">
                    @if(Session::has('message'))
                        
                        <div class="example-alert" style="margin-bottom:30px;">
                            <div class="alert alert-fill alert-info alert-icon alert-dismissible">
                                <em class="icon ni ni-alert-circle"></em> {{ Session::get('message') }} <button class="close" data-dismiss="alert"></button>
                            </div>
                        </div>
                    @endif

                    @if(count($errors) > 0)
                        <div class="example-alert" style="margin-bottom:30px;">
                            <div class="alert alert-fill alert-danger alert-icon alert-dismissible">
                                <button class="close" data-dismiss="alert"></button>
                                @foreach ($errors->all() as $error)
                                <em class="icon ni ni-cross-circle"></em> {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-head-content">
                                    <div class="nk-block-head-sub"><a href="{{route('withdrawalsdeposits')}}"
                                            class="back-to"><em class="icon ni ni-arrow-left"></em><span>Back to
                                                Withdrawals</span></a></div>
                                    <div class="nk-block-head-content">
                                        <h2 class="nk-block-title fw-normal">Payment will be sent through your selected method</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block invest-block">
                                <form method="POST" id="deposit-form"  action="{{route('withdrawal')}}">
                                    {{csrf_field()}}	
                                    <div class="row g-gs">

                                        <div class="col-lg-12">
                                            <div class="plan-iv-list nk-slider nk-slider-s2">
                                                <ul class="plan-list slider-init"
                                                    data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite":false, "responsive":[						{"breakpoint": 992,"settings":{"slidesToShow": 2}},						{"breakpoint": 768,"settings":{"slidesToShow": 1}}					]}'>
                                                    
                                                    @foreach($wmethods as $plan)
                                                        @if($plan->name=="Bitcoin" || $plan->name=="Ethereum")
                                                            <li class="plan-item">
                                                                <input type="radio" id="plan-iv-{{$plan->id}}" name="method_id" value="{{$plan->id}}"
                                                                    class="plan-control" required>
                                                                    
                                                                <div class="plan-item-card">
                                                                    <div class="plan-item-head">
                                                                        <div class="plan-item-heading">
                                                                            <h4 class="plan-item-title card-title title">{{$plan->name}}</h4>
                                                                        </div>
                                                                        <div class="plan-item-summary card-text">
                                                                        </div>
                                                                    </div>
                                                                    <div class="plan-item-body">
                                                                        <div class="plan-item-desc card-text">
                                                                            <ul class="plan-item-desc-list">
                                                                                <li><span class="desc-label">Charges (Fixed)</span> -
                                                                                    <span class="desc-data">{{$settings->currency}}{{$plan->charges_fixed}}</span></li>
                                                                                <li><span class="desc-label">Duration</span> - <span
                                                                                        class="desc-data">3 Days</span></li>
                                                                            </ul>
                                                                            <div class="plan-item-action"><label for="plan-iv-{{$plan->id}}"
                                                                                    class="plan-label"><span
                                                                                        class="plan-label-base">Request withdrawal</span><span
                                                                                        class="plan-label-selected">Request withdrawal</span></label></div>

                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                        @endif

                                                        <input type="hidden" value="{{$plan->name}}" name="payment_mode"> 
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="buysell-field form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="buysell-amount">Enter Your Amount</label>

                                                    <div class="dropdown"><a href="#" class="link py-1"
                                                                data-toggle="dropdown">Change Currency</a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-xxs dropdown-menu-right">
                                                                <ul class="link-list-plain sm text-center">
                                                                    <li><a href="#">USD</a></li>
                                                                    <li><a href="#">ETH</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="form-control-group">
                                                    
                                                    <input type="text" class="form-control form-control-lg form-control-number" id="amount" name="amount" placeholder="0.055960" value="{{ old('amount') }}" required>
                                                    <div class="form-info">US</div>
                                                </div>
                                                <div class="form-note-group">
                                                    <span class="buysell-min form-note-alt">Minimum: 10.00 USD</span>
                                                    <span class="buysell-rate form-note-alt">1 USD = 0.000016 BTC</span>
                                                </div>
                                            </div><!-- .buysell-field -->

                                            <div class="invest-field form-group" style="text-align: right;">
                                                <div class="custom-control custom-control-xs custom-checkbox"><input
                                                        type="checkbox" class="custom-control-input"
                                                        id="checkbox"><label class="custom-control-label"
                                                        for="checkbox" required>I agree the <a href="#">terms and &amp;
                                                            conditions.</a></label></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 offset-xl-12">
                                            <div class="card card-bordered ml-lg-4 ml-xl-0" style="background-color:null;border:0px;">
                                                <div class="nk-iv-wg4">
                                                    <div class="nk-iv-wg4-sub text-center bg-lighter"><a href="#"  onclick="event.preventDefault(); document.getElementById('deposit-form').submit();"
                                                            class="btn btn-lg btn-primary ttu" data-toggle=""
                                                            data-target="#">Confirm &amp; proceed</a></div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection