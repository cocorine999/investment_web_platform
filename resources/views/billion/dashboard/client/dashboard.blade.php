@extends('billion.dashboard.include.header')

@section('title','Dashboard')

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
                            <div class="alert alert-fill alert-info alert-icon alert-dismissible">
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
                                <div class="nk-block-between-md g-3">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub"><span>Welcome!</span></div>
                                        <div class="align-center flex-wrap pb-2 gx-4 gy-3">
                                            <div>
                                                <h2 class="nk-block-title fw-normal">{{ Auth::user()->name }} {{ Auth::user()->l_name }}</h2>
                                            </div>
                                            <div><a href="{{route('deposit_form')}}" class="btn btn-white btn-light">Deposit Funds<em class="icon ni ni-arrow-long-right ml-2"></em></a></div>
                                        </div>
                                        <div class="nk-block-des">
                                            <p>At a glance summary of your investment account. Have fun!</p>
                                        </div>
                                    </div><!-- 
                                    <div class="nk-block-head-content d-none d-md-block">
                                        <div class="nk-slider nk-slider-s1">
                                            <div class="slider-init"
                                                data-slick='{"dots": true, "arrows": false, "fade": true}'>
                                                        <div class="slider-item">
                                                            <div class="nk-iv-wg1">
                                                                <div class="nk-iv-wg1-sub sub-text">My Active Plans</div>
                                                                <h6 class="nk-iv-wg1-info title">{{$plan_active->name}} - {{$plan_active->plan->increment_amount}}% for 21 Days</h6>
                                                                <a href="#" class="nk-iv-wg1-link link link-light"><em
                                                                        class="icon ni ni-trend-up"></em> <span>Check
                                                                        Details</span></a>
                                                                <div class="nk-iv-wg1-progress">
                                                                    <div class="progress-bar bg-primary" data-progress="80">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>   
                                            </div>
                                            <div class="slider-dots"></div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="nk-news card card-bordered">
                                    <div class="card-inner">
                                        <div class="nk-news-list"><a class="nk-news-item" href="#">
                                                <div class="nk-news-icon"><em class="icon ni ni-card-view"></em></div>
                                                <div class="nk-news-text">
                                                    <p>Refer Us & Earns<span> Use the bellow link to invite your friends.</span></p><em
                                                        class="icon ni ni-external"></em>
                                                </div>
                                            </a>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="row gy-gs">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="nk-wg-card is-dark card card-bordered">
                                            <div class="card-inner">
                                                <div class="nk-iv-wg2">
                                                    <div class="nk-iv-wg2-title">
                                                        <h6 class="title">Available Balance <em
                                                                class="icon ni ni-info"></em></h6>
                                                    </div>
                                                    <div class="nk-iv-wg2-text">
                                                        <div class="nk-iv-wg2-amount"> ${{ number_format(Auth::user()->account_bal, 2, '.', ',')}}<!--  <span
                                                                class="change up"><span class="sign"></span>3.4%</span> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="nk-wg-card is-s1 card card-bordered">
                                            <div class="card-inner">
                                                <div class="nk-iv-wg2">
                                                    <div class="nk-iv-wg2-title">
                                                        <h6 class="title">Total Invested <em
                                                                class="icon ni ni-info
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Total of your current investments"></em></h6>
                                                    </div>
                                                    <div class="nk-iv-wg2-text">
                                                        <div class="nk-iv-wg2-amount"> ${{number_format($total_invested,2,'.',',')}} <!-- <span
                                                                class="change up"><span class="sign"></span>2.8%</span> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="nk-wg-card is-s3 card card-bordered">
                                            <div class="card-inner">
                                                <div class="nk-iv-wg2">
                                                    <div class="nk-iv-wg2-title">
                                                        <h6 class="title">Total Profits <em
                                                                class="icon ni ni-info
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Your total earnings"></em></h6>
                                                    </div>
                                                    <div class="nk-iv-wg2-text">
                                                        <div class="nk-iv-wg2-amount">${{ number_format(Auth::user()->roi, 2, '.', ',')}}<span
                                                                class="change down"><!-- <span
                                                                    class="sign"></span>1.4%</span> --></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="nk-block">
                                <div class="row gy-gs">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="nk-wg-card card card-bordered h-100">
                                            <div class="card-inner h-100">
                                                <div class="nk-iv-wg2">
                                                    <div class="nk-iv-wg2-title">
                                                        <h6 class="title">Balance in Account</h6>
                                                    </div>
                                                    <div class="nk-iv-wg2-text">
                                                        <div class="nk-iv-wg2-amount ui-v2">${{ number_format(Auth::user()->account_bal + $total_invested, 2, '.', ',')}}</div>
                                                        <ul class="nk-iv-wg2-list">
                                                            <li><span class="item-label">Available Funds</span><span
                                                                    class="item-value">${{ number_format(Auth::user()->account_bal - Auth::user()->roi - Auth::user()->ref_bonus, 2, '.', ',')}}</span></li>
                                                                    <li><span class="item-label">Profits</span><span
                                                                    class="item-value">${{ number_format(Auth::user()->roi, 2, '.', ',')}}</span></li>
                                                            <li><span class="item-label">Referrals</span><span
                                                                    class="item-value">${{ number_format(Auth::user()->ref_bonus, 2, '.', ',')}}</span></li>
                                                            <li><span class="item-label">Invested Funds</span><span
                                                                    class="item-value">${{number_format($total_invested,2,'.',',')}}</span></li>
                                                            <li class="total"><span class="item-label">Total</span><span
                                                                    class="item-value">${{ number_format(($total_invested+Auth::user()->account_bal), 2, '.', ',')}}</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="nk-iv-wg2-cta"><a href="{{route('withdrawal_form')}}"
                                                            class="btn btn-primary btn-lg btn-block">Withdraw
                                                            Funds</a><a href="{{route('deposit_form')}}" class="btn btn-trans btn-block">Deposit
                                                            Funds</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="nk-wg-card card card-bordered h-100">
                                            <div class="card-inner h-100">
                                                <div class="nk-iv-wg2">
                                                    <div class="nk-iv-wg2-title">
                                                        <h6 class="title">This Month Gain <em
                                                                class="icon ni ni-info text-primary"></em></h6>
                                                    </div>
                                                    <div class="nk-iv-wg2-text">
                                                        <div class="nk-iv-wg2-amount ui-v2">${{ number_format($mgain + $mbonus, 2, '.', ',')}}<span
                                                                class="change up">
                                                        </div>
                                                        <ul class="nk-iv-wg2-list">
                                                            <li><span class="item-label">Profits</span><span
                                                                    class="item-value">${{ number_format($mgain, 2, '.', ',')}}</span></li>
                                                            <li><span class="item-label">Bonus</span><span
                                                                    class="item-value">${{ number_format($mbonus, 2, '.', ',')}}</span></li>
                                                            <!--<li><span class="item-label">Rewards</span><span
                                                                    class="item-value">200.00</span></li>-->
                                                            <li class="total"><span class="item-label">Total
                                                                    Gain</span><span
                                                                    class="item-value">${{ number_format(($mgain+$mbonus), 2, '.', ',')}}</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="nk-iv-wg2-cta"><a href="{{route('plans')}}"
                                                            class="btn btn-primary btn-lg btn-block">Invest & Earn</a>
                                                        <div class="cta-extra">Earn up to 10% <a href="#"
                                                                class="link link-dark">Refer friend!</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <div class="nk-wg-card card card-bordered h-100">
                                            <div class="card-inner h-100">
                                                <div class="nk-iv-wg2">
                                                    <div class="nk-iv-wg2-title">
                                                        <h6 class="title">My Investment</h6>
                                                    </div>
                                                    <div class="nk-iv-wg2-text">
                                                        <div class="nk-iv-wg2-amount ui-v2">{{count($user_plan_active)}} <span
                                                                class="sub"></span> Active</div>
                                                        <ul class="nk-iv-wg2-list">
                                                            @foreach($user_plan_active as $plan_active)
                                                            <li><span class="item-label"><a href="{{ route('investmentdetails',$plan_active->id) }}">{{$plan_active->dplan->name}}</a> <small>-
                                                                         ${{number_format($plan_active->dplan->increment_amount,3, '.', ',')}}  for {{$plan_active->dplan->expiration}} Days</small></span><span
                                                                    class="item-value"> ${{ number_format($plan_active->amount, 2, '.', ',')}}</span></li>
                                                                    @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="nk-iv-wg2-cta"><a href="{{route('myplans')}}"
                                                            class="btn btn-light btn-lg btn-block">See all
                                                            Investment</a>
                                                        <!--<div class="cta-extra">Check out <a href="#"
                                                                class="link link-dark">Analytic Report</a></div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="nk-refwg">
                                        <div class="nk-refwg-invite card-inner">
                                            <div class="nk-refwg-head g-3">
                                                <div class="nk-refwg-title">
                                                    <h5 class="title">Refer Us & Earn</h5>
                                                    <div class="title-sub">Use the bellow link to invite your friends.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-refwg-url">
                                                <div class="form-control-wrap">
                                                    <div class="form-clip clipboard-init"
                                                        data-clipboard-target="#refUrl" data-success="Copied"
                                                        data-text="Copy Link"><em
                                                            class="clipboard-icon icon ni ni-copy"></em> <span
                                                            class="clipboard-text">Copy Link</span></div>
                                                    <div class="form-icon"><em class="icon ni ni-link-alt"></em></div>
                                                    <input type="text" class="form-control copy-text" id="refUrl"
                                                        value="{{ Auth::user()->ref_link }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-refwg-stats card-inner bg-lighter">
                                            <div class="nk-refwg-group g-3">
                                                <div class="nk-refwg-name">
                                                    <h6 class="title">My Referral <em class="icon ni ni-info"
                                                            data-toggle="tooltip" data-placement="right"
                                                            title="Referral Informations"></em></h6>
                                                </div>
                                                <div class="nk-refwg-info g-3">
                                                    <div class="nk-refwg-sub">
                                                        <div class="title">{{$nbre_ref}}</div>
                                                        <div class="sub-text">Total Joined</div>
                                                    </div>
                                                    <div class="nk-refwg-sub">
                                                        <div class="title">
							                                ${{ number_format(\App\tp_transactions::where('type', 'Refer Bonus')->where('user', Auth::user()->id)->sum('amount'), 2, '.', ',')}}</div>
                                                        <div class="sub-text">Referral Earn</div>
                                                    </div>
                                                </div><!-- 
                                                <div class="nk-refwg-more dropdown mt-n1 mr-n1"><a href="#"
                                                        class="btn btn-icon btn-trigger" data-toggle="dropdown"><em
                                                            class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                        <ul class="link-list-plain sm">
                                                            <li><a href="#">7 days</a></li>
                                                            <li><a href="#">15 Days</a></li>
                                                            <li><a href="#">30 Days</a></li>
                                                        </ul>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="nk-refwg-ck"><canvas class="chart-refer-stats"
                                                    id=""></canvas></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

@push('js')
<script src="{{asset('assets/assets/js/charts/gd-invest.js')}}"></script>
@endpush