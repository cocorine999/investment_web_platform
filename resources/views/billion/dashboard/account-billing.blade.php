@extends('billion.dashboard.include.header')

@section('title','Withdrawal Account')

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
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <div class="nk-block-head-sub"><span>My Profile</span></div>
                                    <h2 class="nk-block-title fw-normal">Account Info</h2>
                                    <div class="nk-block-des">
                                        <p>You have full control to manage your own account setting. <span
                                                class="text-primary"><em class="icon ni ni-info"></em></span></p>
                                    </div>
                                </div>
                            </div>
                            @include("billion.dashboard.include.profile_header")
                            <div class="nk-block">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h5 class="nk-block-title">Withdrawals Address Settings</h5>
                                                <div class="nk-block-des">
                                                    <p>These settings are helps you keep your account secure.</p>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head -->


                                        <div class="card card-bordered">
                                            <div class="card-inner-group">
                                                <div class="card-inner">
                                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                        <div class="nk-block-text">
                                                            <h6>Bitcoin Wallet - <span class="text-base">Account Address</span></h6>
                                                            <p class="text-soft">{{Auth::user()->btc_address}}</p>
                                                        </div>
                                                        <div class="nk-block-actions flex-shrink-0">
                                                            <a href="#" data-toggle="modal" data-target="#updateaddressBTC"  class="btn btn-primary">Change Address</a>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-card-inner -->
                                                <div class="card-inner">
                                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                        <div class="nk-block-text">
                                                           <!-- <p>Learn more about our <a href="#">withdrawals methods</a>.</p> -->
                                                        </div>
                                                        <div class="nk-block-actions">
                                                            <ul class="align-center gx-3">
                                                                <li>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-card-inner -->
                                            </div>
                                        </div><!-- .card -->

                                        <div class="card card-bordered">
                                            <div class="card-inner-group">
                                                <div class="card-inner">
                                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                        <div class="nk-block-text">
                                                            <h6>Ethereum Wallet - <span class="text-base">Account Address</span></h6>
                                                            <p class="text-soft">{{Auth::user()->eth_address}}</p>
                                                        </div>
                                                        <div class="nk-block-actions flex-shrink-0">
                                                            <a href="#" data-toggle="modal" data-target="#updateaddressETH" class="btn btn-primary">Change Address</a>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-card-inner -->
                                                <div class="card-inner">
                                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                        <div class="nk-block-text"><!--
                                                            <p>Learn more about our <a href="#">withdrawals methods</a>.</p> -->
                                                        </div>
                                                        <div class="nk-block-actions">
                                                            <ul class="align-center gx-3">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-card-inner -->
                                            </div>
                                        </div><!-- .card -->

                                    </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" tabindex="-1" role="dialog" id="updateaddressBTC">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em
                                class="icon ni ni-cross-sm"></em></a>
                        <div class="modal-body modal-body-lg">
                            <h5 class="title">Update Withdrawal Address</h5>
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal">

                                <form style="padding:3px;" id="update_form" method="POST" action="{{route('update_withdrawal_address')}}">
                                    {{csrf_field()}}
                                    <div class="row gy-4">
                                        
                                        
                                        <div class="col-md-12">
                                                <div class="form-group"><label class="form-label" for="l_name">Bitcoin Address</label><input type="text" class="form-control form-control-lg"
                                                        id="btc_address" name="btc_address" value="{{ old('btc_address') }}" placeholder="Enter your bitcoin wallet address" required autofocus></div>
                                        </div>

                                                
                                                <input type="hidden" class="form-control form-control-lg"
                                                      id="eth_address" name="eth_address" value="{{ Auth::user()->eth_address }}"></div>

                                                <input type="hidden" class="form-control form-control-lg"
                                                      id="id" name="id" value="{{ Auth::user()->id }}"></div>

                                        <div class="col-12">
                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                <li><a href="#" class="btn btn-lg btn-primary" onclick="event.preventDefault(); document.getElementById('update_form').submit();">Update</a></li>
                                                <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                 </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="updateaddressETH">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em
                                class="icon ni ni-cross-sm"></em></a>
                        <div class="modal-body modal-body-lg">
                            <h5 class="title">Update Withdrawal Address</h5>
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal">

                                <form style="padding:3px;" id="updateEth_form" method="POST" action="{{route('update_withdrawal_address')}}">
                                    {{csrf_field()}}
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                                <div class="form-group"><label class="form-label" for="l_name">Ethereum Address</label><input type="text" class="form-control form-control-lg"
                                                        id="eth_address" name="eth_address" value="{{ old('eth_address') }}" placeholder="Enter your ethereum wallet address"></div>
                                                        
                                                <input type="hidden" class="form-control form-control-lg"
                                                      id="btc_address" name="btc_address" value="{{ Auth::user()->btc_address }}"></div>
                                                      
                                                <input type="hidden" class="form-control form-control-lg"
                                                      id="id" name="id" value="{{ Auth::user()->id }}"></div>
                                        </div>

                                        <div class="col-12">
                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                <li><a href="#" class="btn btn-lg btn-primary" onclick="event.preventDefault(); document.getElementById('updateEth_form').submit();">Update</a></li>
                                                <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                 </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection