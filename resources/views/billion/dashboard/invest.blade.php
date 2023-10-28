@extends('billion.dashboard.include.header')

@section('title','Investments Plans')

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
                            <div class="nk-block-head text-center">
                                <div class="nk-block-head-content">
                                    <div class="nk-block-head-sub"><span>Choose an Option</span></div>
                                    <div class="nk-block-head-content">
                                        <h2 class="nk-block-title fw-normal">Investment Plan</h2>
                                        <div class="nk-block-des">
                                            <p>Choose your investment plan and start earning.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <form method="POST" action="{{route('joinplan')}}" class="plan-iv">
                                    {{csrf_field()}}
                                    @if(Auth::user()->type!=0)
                                        <div class="plan-iv-currency text-center">
                                            <ul class="nav nav-switch nav-tabs bg-white">
                                                <li class="nav-item"><a href="#" data-toggle="modal" data-target="#manage_invest" class="nav-link active">New Plan</a></li><!-- 
                                                <li class="nav-item"><a href="#" class="nav-link">EUR</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">BTC</a></li>
                                                <li class="nav-item"><a href="#" class="nav-link">ETH</a></li> -->
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="plan-iv-list nk-slider nk-slider-s2">
                                        <ul class="plan-list slider-init"
                                            data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite":false, "responsive":[						{"breakpoint": 992,"settings":{"slidesToShow": 2}},						{"breakpoint": 768,"settings":{"slidesToShow": 1}}					]}'>
                                            
						                    @foreach($plans as $plan)
                                            <!-- <form style="padding:3px;" id="form" method="POST" action="{{route('joinplan')}}"> -->
                                            
                                            <li class="plan-item">
                                                <input type="radio" id="plan-iv-{{$plan->id}}" name="id" value="{{$plan->id}}"
                                                    class="plan-control" required>
                                                <div class="plan-item-card">
                                                    <div class="plan-item-head">
                                                        <div class="plan-item-heading">
                                                            <h4 class="plan-item-title card-title title">${{$plan->price}}</h4>
                                                            <p class="sub-text">{{$plan->name}} </p>
                                                        </div>
                                                        <div class="plan-item-summary card-text">
                                                            <div class="row">
                                                                <div class="col-6"><span
                                                                        class="lead-text">${{round($plan->increment_amount,2)}}</span><span
                                                                        class="sub-text">{{$plan->increment_interval}} Profit</span></div>
                                                                <div class="col-6"><span
                                                                        class="lead-text">{{$plan->expiration}}</span><span
                                                                        class="sub-text">Term Days</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="plan-item-body">
                                                        <div class="plan-item-desc card-text">
                                                            <ul class="plan-item-desc-list">
                                                                <li><span class="desc-label">Daily Profit (%) </span> - <span
                                                                        class="desc-data">{{round((($plan->increment_amount * 100) / (($plan->price * $plan->gift)/100)),2)}}%</span></li>
                                                                <li><span class="desc-label">Monthly Interest</span> - <span
                                                                        class="desc-data">${{round(((($plan->price * $plan->gift)/100)/($plan->expiration/30)),2)}}</span></li>
                                                                <li><span class="desc-label">Expect Return</span> -
                                                                    <span class="desc-data">${{$plan->expected_return}}</span></li>
                                                                <li><span class="desc-label">Total Return</span> - <span
                                                                        class="desc-data">{{$plan->gift+100}}%</span></li>
                                                            </ul>
                                                            <div class="plan-item-action"><label for="plan-iv-{{$plan->id}}"
                                                                    class="plan-label"><span
                                                                        class="plan-label-base">Choose this
                                                                        plan</span><span
                                                                        class="plan-label-selected">Join this plan</span></label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @if(count($plans) != 0)
                                    <div class="plan-iv-actions text-center"><button class="btn btn-primary btn-lg">
                                            <span>Purchase Plan</span> <em
                                                class="icon ni ni-arrow-right"></em></button></div>
                                                @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="manage_invest{{$id}}">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em
                                class="icon ni ni-cross-sm"></em></a>
                                
                        <div class="modal-body modal-body-lg">
                            <h5 class="title"> {{$id  != null ? 'Update' : 'Add New'}} Pack</h5>
                            <ul class="nk-nav nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal">Pack Information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                            <form style="padding:3px;" id="pack_form" method="{{$id  != null ? PUT : POST}}" action="{{route('addplan')}}">
                            {{csrf_field()}}
                                <div class="tab-pane active" id="personal">
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                            <div class="form-group"><label class="form-label" for="name">Plan
                                                    Name</label><input type="text" class="form-control form-control-lg"
                                                    id="name" name="name" value="{{old('name')}}" placeholder="Enter plan name"></div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group"><label class="form-label" for="price"> Plan price</label><input type="text" class="form-control form-control-lg"
                                                    id="price" name="price" value="{{old('price')}}" placeholder="Enter plan price"></div>
                                        </div> 

                                        <!--<div class="col-md-6">
                                            <div class="form-group"><label class="form-label" for="min_price"> Plan MIN price</label><input type="text" class="form-control form-control-lg"
                                                    id="min_price" name="min_price" value="{{old('min_price')}}" placeholder="Enter minimum plan price"></div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="form-label" for="max_price"> Plan MAX price</label><input type="text" class="form-control form-control-lg"
                                                    id="max_price" name="max_price" value="{{old('max_price')}}" placeholder="Enter maximum plan price"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group"><label class="form-label" for="minr"> Plan minimun return</label><input type="text" class="form-control form-control-lg"
                                                    id="minr" name="minr" value="{{old('minr')}}" placeholder="Enter minimum return"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group"><label class="form-label" for="maxr"> Plan maximum return</label><input type="text" class="form-control form-control-lg"
                                                    id="maxr" name="maxr" value="{{old('maxr')}}" placeholder="Enter maximum return"></div>
                                        </div> -->



                                        <!-- <div class="col-md-6">
                                            <div class="form-group"><label class="form-label" for="gift"> Plan return profit</label><input type="text" class="form-control form-control-lg"
                                                    id="maxr" name="gift" value="{{old('gift')}}" placeholder="Enter maximum return"></div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="t_interval"> Top Up Interval</label>
                                                <select name="t_interval" class="form-control form-control-lg" id="t_interval" value="{{old('t_interval')}}" >
                                                    <option>Yearly</option>
                                                    <option>Monthly</option>
                                                    <option>Daily</option>
                                                    <option>Weekly</option>
                                                </select>
                                            </div>
                                        </div> -->

                                        <div class="col-md-12">
                                            <div class="form-group"><label class="form-label" for="expiration"> Duration</label><input type="number" class="form-control form-control-lg"
                                                    id="expiration" readonly="true" name="expiration" value="300" placeholder="Enter top up interval"></div>
                                        </div>                                        

                                        <div class="col-12">
                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('pack_form').submit();" class="btn btn-lg btn-primary">Submit</a></li>
                                                <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                            </ul>
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