@extends('billion.dashboard.include.header')

@section('title','Plans')

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
                        <div class="nk-block-head-sub"><span> @if (Auth::user()->type == "0") My @endif Plans</span></div>
                        <div class="nk-block-between-md g-4">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title fw-normal">Invested Schemes</h2>
                                <div class="nk-block-des">
                                    <p>Here is your current balance and your active investement plans.</p>
                                </div>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="nk-block-tools gx-3">
                                    <li><a href="{{route('withdrawal_form')}}" class="btn btn-primary"><span>Withdraw</span> <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></a>
                                    </li>
                                    <li><a href="{{route('plans')}}" class="btn btn-white btn-light"><span>Invest to plan</span>
                                            <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="row gy-gs">
                                    <div class="col-lg-5">
                                        <div class="nk-iv-wg3">
                                            <div class="nk-iv-wg3-title">Total Balance</div>
                                            <div class="nk-iv-wg3-group  flex-lg-nowrap gx-4">
                                                <div class="nk-iv-wg3-sub">
                                                    <div class="nk-iv-wg3-amount">
                                                        <div class="number">
                                                            {{ number_format($available_balance - $locked_balance, 2, '.', ',') }} 
                                                            <small class="currency currency-usd">USD</small>
                                                        </div>
                                                    </div>
                                                    <div class="nk-iv-wg3-subtitle">Available Balance</div>
                                                </div>
                                                <div class="nk-iv-wg3-sub"><span class="nk-iv-wg3-plus text-soft"><em class="icon ni ni-plus"></em></span>
                                                    <div class="nk-iv-wg3-amount">
                                                        <div class="number-sm">{{ number_format($locked_balance, 2, '.', ',') }}</div>
                                                    </div>
                                                    <div class="nk-iv-wg3-subtitle">Locked Balance <em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="You can't use"></em></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="nk-iv-wg3">
                                            <div class="nk-iv-wg3-title">This Month <em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="Current Month Profit"></em></div>
                                            <div class="nk-iv-wg3-group flex-md-nowrap g-4">
                                                <div class="nk-iv-wg3-sub-group gx-4">
                                                    <div class="nk-iv-wg3-sub">
                                                        <div class="nk-iv-wg3-amount">
                                                            <div class="number">{{ number_format($monthlyfee_balance - $dailyfee_balance, 2, '.', ',') }}</div>
                                                        </div>
                                                        <div class="nk-iv-wg3-subtitle">Total Profit</div>
                                                    </div>
                                                    <div class="nk-iv-wg3-sub"><span class="nk-iv-wg3-plus text-soft"><em class="icon ni ni-plus"></em></span>
                                                        <div class="nk-iv-wg3-amount">
                                                            <div class="number-sm">{{ number_format($dailyfee_balance, 2, '.', ',') }}</div>
                                                        </div>
                                                        <div class="nk-iv-wg3-subtitle">Today Profit</div>
                                                    </div>
                                                </div>
                                                <div class="nk-iv-wg3-sub flex-grow-1 ml-md-3">
                                                    <div class="nk-iv-wg3-ck"><canvas class="chart-profit" id="profitCM"></canvas></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner">
                                <ul class="nk-iv-wg3-nav">
                                    <li><a href="{{ route('transactions') }}"><em class="icon ni ni-notes-alt"></em> <span>Go to
                                                Transaction</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-growth"></em> <span>Analytic
                                                Reports</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-report-profit"></em> <span>Monthly
                                                Statement</span></a></li>
                                    <li><a href="#"><em class="icon ni ni-help"></em> <span>Investment
                                                Tips</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @if(Auth::user()->type == 0)

                @if(count($plans) != 0)
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head-sm">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Active Plan <span class="count text-base">({{count($active_plans)}})</span>
                            </h5>
                        </div>
                    </div>
                    <div class="nk-iv-scheme-list">
                        @foreach($active_plans as $active_plan)
                        <div class="nk-iv-scheme-item">
                            <div class="nk-iv-scheme-icon is-running">
                                <em class="icon ni ni-update"></em>
                            </div>
                            <div class="nk-iv-scheme-info">
                                <div class="nk-iv-scheme-name">{{ $active_plan->dplan->name }} - {{ $active_plan->dplan->increment_interval }} {{number_format((($active_plan->dplan->increment_amount * 100) / (($active_plan->dplan->price * $active_plan->dplan->gift)/100)), 2, '.', ',')}}% for {{ $active_plan->inv_duration }} Days</div>
                                <div class="nk-iv-scheme-desc">Invested Amount - <span class="amount">${{ number_format($active_plan->amount, 2, '.', ',') }}</span></div>
                            </div>
                            <div class="nk-iv-scheme-term">
                                <div class="nk-iv-scheme-start nk-iv-scheme-order">
                                    <span class="nk-iv-scheme-label text-soft">Start Date</span>
                                    <span class="nk-iv-scheme-value date">{{$active_plan->activated_at->format('M d, Y')}}</span>
                                </div>
                                <div class="nk-iv-scheme-end nk-iv-scheme-order">
                                    <span class="nk-iv-scheme-label text-soft">End Date</span>
                                    <span class="nk-iv-scheme-value date">{{$active_plan->activated_at->addDays($active_plan->inv_duration+1)->format('M d, Y')}}</span>
                                </div>
                            </div>
                            <div class="nk-iv-scheme-amount">
                                <div class="nk-iv-scheme-amount-a nk-iv-scheme-order">
                                    <span class="nk-iv-scheme-label text-soft">Total Return</span>
                                    <span class="nk-iv-scheme-value amount">$ {{ number_format($active_plan->dplan->expected_return, 2, '.', ',') }}</span>
                                </div>
                                <div class="nk-iv-scheme-amount-b nk-iv-scheme-order">
                                    <span class="nk-iv-scheme-label text-soft">Net Profit Earn</span>
                                    <span class="nk-iv-scheme-value amount">$ {{number_format( \App\tp_transactions::latest()->where('user_plan',$active_plan->id)->where("type","ROI")->sum('amount'), 2, '.', ',')}} <span class="amount-ex">~ ${{ (($active_plan->dplan->price * $active_plan->dplan->gift)/100) }} </span>
                                </div>
                            </div>
                            <div class="nk-iv-scheme-more">
                                <a class="btn btn-icon btn-lg btn-round btn-trans" href="{{route('investmentdetails',$active_plan->id)}}"><em class="icon ni ni-forward-ios"></em></a>
                            </div>
                            <div class="nk-iv-scheme-progress">
                                <div class="progress-bar" data-progress="{{ ( (\App\tp_transactions::latest()->where('user_plan',$active_plan->id)->where('type','ROI')->sum('amount') * 100 ) / (($active_plan->dplan->price * $active_plan->dplan->gift)/100) ) }}"></div>
                            </div>
                        </div><!-- .nk-iv-scheme-item -->
                        @endforeach
                    </div><!-- .nk-iv-scheme-list -->
                </div><!-- .nk-block -->
                @endif
                @if(count($expired_plans) != 0)
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">Recently End <span class="count text-base">(1)</span></h5>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="#"><em class="icon ni ni-dot-box"></em> Go to Archive</a>
                            </div>
                        </div>
                    </div>
                    <div class="nk-iv-scheme-list">

                        @foreach($expired_plans as $expired_plan)
                        <div class="nk-iv-scheme-item">
                            <div class="nk-iv-scheme-icon is-done">
                                <em class="icon ni ni-offer"></em>
                            </div>
                            <div class="nk-iv-scheme-info">
                                <div class="nk-iv-scheme-name">{{ $expired_plan->dplan->name }} - {{ $expired_plan->dplan->increment_interval }} {{number_format((($expired_plan->dplan->increment_amount * 100) / (($expired_plan->dplan->price * $expired_plan->dplan->gift)/100)), 2, '.', ',')}}% for {{ $expired_plan->inv_duration }} Days</div>
                                <div class="nk-iv-scheme-desc">Invested Amount - <span class="amount">${{ number_format($expired_plan->amount, 2, '.', ',') }}</span></div>
                            </div>
                            <div class="nk-iv-scheme-term">
                                <div class="nk-iv-scheme-start nk-iv-scheme-order">
                                    <span class="nk-iv-scheme-label text-soft">Start Date</span>
                                    <span class="nk-iv-scheme-value date">{{$expired_plan->activated_at->format('M d, Y')}}</span>
                                </div>
                                <div class="nk-iv-scheme-end nk-iv-scheme-order">
                                    <span class="nk-iv-scheme-label text-soft">End Date</span>
                                    <span class="nk-iv-scheme-value date">{{$expired_plan->activated_at->addDays($expired_plan->inv_duration+1)->format('M d, Y')}}</span>
                                </div>
                            </div>
                            <div class="nk-iv-scheme-amount">
                                <div class="nk-iv-scheme-amount-a nk-iv-scheme-order">
                                    <span class="nk-iv-scheme-label text-soft">Total Return</span>
                                    <span class="nk-iv-scheme-value amount">$ {{ number_format($expired_plan->dplan->expected_return, 2, '.', ',') }}</span>
                                </div>
                                <div class="nk-iv-scheme-amount-b nk-iv-scheme-order">
                                    <span class="nk-iv-scheme-label text-soft">Net Profit Earn</span>
                                    <span class="nk-iv-scheme-value amount">$ {{number_format( \App\tp_transactions::latest()->where('user_plan',$expired_plan->id)->where("type","ROI")->sum('amount'), 2, '.', ',')}} <span class="amount-ex">~ ${{ (($expired_plan->dplan->price * $expired_plan->dplan->gift)/100) }}</span></span>
                                </div>
                            </div>
                            <div class="nk-iv-scheme-more">
                                <a class="btn btn-icon btn-lg btn-round btn-trans" href="{{route('investmentdetails',$expired_plan->id)}}"><em class="icon ni ni-forward-ios"></em></a>
                            </div>
                        </div><!-- .nk-iv-scheme-item -->
                        @endforeach
                    </div><!-- .nk-iv-scheme-list -->
                </div><!-- .nk-block -->
                @endif
                @else

                <div class="nk-block nk-block-lg">

                    <div class="nk-block-head-sm">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">All Investments <span class="count text-base"></span>
                            </h5>
                        </div>
                    </div>
                    <div class="col-xl-12 col-xxl-8" style="padding-left:0px!important;padding-right:0px!important;">
                        <div class="card card-bordered card-full">
                            <div class="card-inner border-bottom">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Investments</h6>
                                    </div>
                                    <div class="card-tools"><a href="#" class="link">View All</a></div>
                                </div>
                            </div>
                            <div class="nk-tb-list">
                                <div class="nk-tb-item nk-tb-head">
                                    <div class="nk-tb-col"><span>Plan</span></div>
                                    <div class="nk-tb-col tb-col-sm"><span>Who</span></div>
                                    <div class="nk-tb-col tb-col-lg"><span>Date</span></div>
                                    <div class="nk-tb-col"><span>Amount</span></div>
                                    <div class="nk-tb-col"><span>Profit</span></div>
                                    <div class="nk-tb-col"><span>Status</span></div>
                                    <div class="nk-tb-col tb-col-sm"><span>&nbsp;</span></div>
                                    <div class="nk-tb-col"><span>&nbsp;</span></div>
                                </div>
                                @foreach ($plans as $invest)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col">
                                        <div class="align-center">
                                            <div class="user-avatar user-avatar-sm bg-light">
                                                <span>P{{ $invest->dplan->id }}</span>
                                            </div><span class="tb-sub ml-2"> {{ $invest->dplan->name }}
                                                <span class="d-none d-md-inline">- {{ $invest->dplan->plan }} {{round((($invest->dplan->increment_amount * 100) / (($invest->dplan->price * $invest->dplan->gift)/100)),2)}}% for {{ $invest->dplan->expiration }}
                                                    Days</span></span>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col tb-col-sm">
                                        <div class="user-card">
                                            <div class="user-avatar user-avatar-xs bg-teal-dim">
                                                <span>{{ $invest->userplan->l_name['0'] }}{{ $invest->userplan->name['0'] }}</span>
                                            </div>
                                            <div class="user-name"><span class="tb-lead">{{ $invest->userplan->l_name }} {{ $invest->userplan->name }}</span></div>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg"><span class="tb-sub">{{ $invest->activated_at->format('d/m/Y') }}</span></div>
                                    <div class="nk-tb-col"><span class="tb-sub tb-amount">{{ number_format($invest->amount,2,'.',',') }}
                                            <span>USD</span></span></div>
                                    <div class="nk-tb-col"><span class="tb-sub tb-amount">{{ number_format((($invest->amount* $invest->dplan->gift)  / 100),2,'.',',') }}
                                            <span>USD</span></span></div>
                                    @if($invest->active == "yes")
                                    <div class="nk-tb-col tb-col-sm"><span class="tb-sub text-success">Running</span></div>
                                    @else

                                    <div class="nk-tb-col tb-col-sm"><span class="tb-sub text-danger">Expired</span></div>
                                    @endif
                                    <div class="nk-tb-col tb-col-sm"><span class="tb-sub text-info"></span></div>
                                    <div class="nk-tb-col nk-tb-col-action">
                                        <div class="dropdown"><a class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-chevron-right"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                <ul class="link-list-plain">
                                                    <li><a href="{{route('investmentdetails',$invest->id)}}">View</a></li>
                                                    <li><a href="#">Invoice</a></li>
                                                    <li><a href="#">Print</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="new-invest">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">New Investment</h5>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="row gy-4">
                            <form style="padding:3px;" id="update_form">
                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="name">plan</label><input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ Auth::user()->name}}" placeholder="Enter your first name"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="l_name">Last
                                            Name</label><input type="text" class="form-control form-control-lg" id="l_name" name="l_name" value="{{ Auth::user()->l_name }}" placeholder="Enter your last name"></div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="display-name"> Email Address</label><input type="text" class="form-control form-control-lg" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Enter your email address"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><label class="form-label" for="phone-no">Phone
                                            Number</label><input type="text" class="form-control form-control-lg" id="phone_number" value="{{ Auth::user()->phone_number}}" placeholder="Enter your phone number"></div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li><a href="#" class="btn btn-lg btn-primary" onclick="event.preventDefault(); document.getElementById('update_form').submit();">Purchase plan</a></li>
                                        <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection