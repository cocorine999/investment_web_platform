@extends('billion.dashboard.include.header')

@section('title','Dashboard')

@section("content")

<div class="nk-content nk-content-fluid">
                <div class="container-xl wide-xl">
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
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Administration Dashboard</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Welcome {{ Auth::user()->name }} {{ Auth::user()->l_name }}.</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle"><a href="#"
                                                class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                                data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li><a href="#"
                                                            class="btn btn-white btn-dim btn-outline-primary"><em
                                                                class="icon ni ni-download-cloud"></em><span>Export</span></a>
                                                    </li>
                                                    <li><a href="#"
                                                            class="btn btn-white btn-dim btn-outline-primary"><em
                                                                class="icon ni ni-reports"></em><span>Reports</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt">
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-primary"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-plus"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-user-add-fill"></em><span>Add
                                                                                User</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-coin-alt-fill"></em><span>Add
                                                                                Order</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-note-add-fill-c"></em><span>Add
                                                                                Page</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-md-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-0">
                                                    <div class="card-title">
                                                        <h6 class="subtitle">Total Investment</h6>
                                                    </div>
                                                    <div class="card-tools"><em class="card-hint icon ni ni-help-fill"
                                                            data-toggle="tooltip" data-placement="left"
                                                            title="Total Investment"></em></div>
                                                </div>
                                                <div class="card-amount"><span class="amount">  {{number_format($total_invested,2,'.',',')}}  <span
                                                            class="currency currency-usd">USD</span></span><!-- <span
                                                        class="change up text-danger"><em
                                                            class="icon ni ni-arrow-long-up"></em>1.93%</span> --></div>
                                                <div class="invest-data">
                                                    <div class="invest-data-amount g-2">
                                                        <div class="invest-data-history">
                                                            <div class="title">This Month</div>
                                                            <div class="amount"> {{number_format($musp,2,'.',',')}} <span
                                                                    class="currency currency-usd">USD</span></div>
                                                        </div>
                                                        <div class="invest-data-history">
                                                            <div class="title">This Week</div>
                                                            <div class="amount"> {{number_format($wusp,2,'.',',')}} <span
                                                                    class="currency currency-usd">USD</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="invest-data-ck"><canvas class="iv-data-chart"
                                                            id="totalDeposit"></canvas></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-0">
                                                    <div class="card-title">
                                                        <h6 class="subtitle">Total Deposit</h6>
                                                    </div>
                                                    <div class="card-tools"><em class="card-hint icon ni ni-help-fill"
                                                            data-toggle="tooltip" data-placement="left"
                                                            title="Total Deposit"></em></div>
                                                </div>
                                                <div class="card-amount"><span class="amount">  {{number_format($deposited,2,'.',',')}}  <span
                                                            class="currency currency-usd">USD</span></span><!-- <span
                                                        class="change down text-danger"><em
                                                            class="icon ni ni-arrow-long-down"></em>1.93%</span> --></div>
                                                <div class="invest-data">
                                                    <div class="invest-data-amount g-2">
                                                        <div class="invest-data-history">
                                                            <div class="title">This Month</div>
                                                            <div class="amount"> {{number_format($mdp,2,'.',',')}} <span
                                                                    class="currency currency-usd">USD</span></div>
                                                        </div>
                                                        <div class="invest-data-history">
                                                            <div class="title">This Week</div>
                                                            <div class="amount"> {{number_format($wdp,2,'.',',')}}  <span
                                                                    class="currency currency-usd">USD</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="invest-data-ck"><canvas class="iv-data-chart"
                                                            id="totalWithdraw"></canvas></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-0">
                                                    <div class="card-title">
                                                        <h6 class="subtitle">Total Withdraw</h6>
                                                    </div>
                                                    <div class="card-tools"><em class="card-hint icon ni ni-help-fill"
                                                            data-toggle="tooltip" data-placement="left"
                                                            title="Total Withdraw"></em></div>
                                                </div>
                                                <div class="card-amount"><span class="amount">  {{number_format($total_withdrawals,2,'.',',')}}  <span
                                                            class="currency currency-usd">USD</span></span><!-- <span
                                                        class="change down text-danger"><em
                                                            class="icon ni ni-arrow-long-down"></em>1.93%</span> --></div>
                                                <div class="invest-data">
                                                    <div class="invest-data-amount g-2">
                                                        <div class="invest-data-history">
                                                            <div class="title">This Month</div>
                                                            <div class="amount"> {{number_format($mwd,2,'.',',')}}  <span
                                                                    class="currency currency-usd">USD</span></div>
                                                        </div>
                                                        <div class="invest-data-history">
                                                            <div class="title">This Week</div>
                                                            <div class="amount"> {{number_format($wwd,2,'.',',')}} <span
                                                                    class="currency currency-usd">USD</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="invest-data-ck"><canvas class="iv-data-chart"
                                                            id="totalWithdraw"></canvas></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 col-xxl-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group mb-1">
                                                    <div class="card-title">
                                                        <h6 class="title">Investment Overview</h6>
                                                        <p>The investment overview of your platform. <a href="#">All
                                                                Investment</a></p>
                                                    </div>
                                                </div>
                                                <ul class="nav nav-tabs nav-tabs-card nav-tabs-xs">
                                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                            href="#overview">Overview</a></li>
                                                    <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                            href="#thisyear">This Year</a></li>
                                                    <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                            href="#alltime">All Time</a></li>
                                                </ul>
                                                <div class="tab-content mt-0">
                                                    <div class="tab-pane active" id="overview">
                                                        <div class="invest-ov gy-2">
                                                            <div class="subtitle">Currently Actived Investment</div>
                                                            <div class="invest-ov-details">
                                                                <div class="invest-ov-info">
                                                                    <div class="amount">49,395.395 <span
                                                                            class="currency currency-usd">USD</span>
                                                                    </div>
                                                                    <div class="title">Amount</div>
                                                                </div>
                                                                <div class="invest-ov-stats">
                                                                    <div><span class="amount">56</span><span
                                                                            class="change up text-danger"><em
                                                                                class="icon ni ni-arrow-long-up"></em>1.93%</span>
                                                                    </div>
                                                                    <div class="title">Plans</div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov-details">
                                                                <div class="invest-ov-info">
                                                                    <div class="amount">49,395.395 <span
                                                                            class="currency currency-usd">USD</span>
                                                                    </div>
                                                                    <div class="title">Paid Profit</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-ov gy-2">
                                                            <div class="subtitle">Investment in this Month</div>
                                                            <div class="invest-ov-details">
                                                                <div class="invest-ov-info">
                                                                    <div class="amount">49,395.395 <span
                                                                            class="currency currency-usd">USD</span>
                                                                    </div>
                                                                    <div class="title">Amount</div>
                                                                </div>
                                                                <div class="invest-ov-stats">
                                                                    <div><span class="amount">23</span><span
                                                                            class="change down text-danger"><em
                                                                                class="icon ni ni-arrow-long-down"></em>1.93%</span>
                                                                    </div>
                                                                    <div class="title">Plans</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="thisyear">
                                                        <div class="invest-ov gy-2">
                                                            <div class="subtitle">Currently Actived Investment</div>
                                                            <div class="invest-ov-details">
                                                                <div class="invest-ov-info">
                                                                    <div class="amount">89,395.395 <span
                                                                            class="currency currency-usd">USD</span>
                                                                    </div>
                                                                    <div class="title">Amount</div>
                                                                </div>
                                                                <div class="invest-ov-stats">
                                                                    <div><span class="amount">96</span><span
                                                                            class="change up text-danger"><em
                                                                                class="icon ni ni-arrow-long-up"></em>1.93%</span>
                                                                    </div>
                                                                    <div class="title">Plans</div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov-details">
                                                                <div class="invest-ov-info">
                                                                    <div class="amount">99,395.395 <span
                                                                            class="currency currency-usd">USD</span>
                                                                    </div>
                                                                    <div class="title">Paid Profit</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-ov gy-2">
                                                            <div class="subtitle">Investment in this Month</div>
                                                            <div class="invest-ov-details">
                                                                <div class="invest-ov-info">
                                                                    <div class="amount">149,395.395 <span
                                                                            class="currency currency-usd">USD</span>
                                                                    </div>
                                                                    <div class="title">Amount</div>
                                                                </div>
                                                                <div class="invest-ov-stats">
                                                                    <div><span class="amount">83</span><span
                                                                            class="change down text-danger"><em
                                                                                class="icon ni ni-arrow-long-down"></em>1.93%</span>
                                                                    </div>
                                                                    <div class="title">Plans</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="alltime">
                                                        <div class="invest-ov gy-2">
                                                            <div class="subtitle">Currently Actived Investment</div>
                                                            <div class="invest-ov-details">
                                                                <div class="invest-ov-info">
                                                                    <div class="amount">249,395.395 <span
                                                                            class="currency currency-usd">USD</span>
                                                                    </div>
                                                                    <div class="title">Amount</div>
                                                                </div>
                                                                <div class="invest-ov-stats">
                                                                    <div><span class="amount">556</span><span
                                                                            class="change up text-danger"><em
                                                                                class="icon ni ni-arrow-long-up"></em>1.93%</span>
                                                                    </div>
                                                                    <div class="title">Plans</div>
                                                                </div>
                                                            </div>
                                                            <div class="invest-ov-details">
                                                                <div class="invest-ov-info">
                                                                    <div class="amount">149,395.395 <span
                                                                            class="currency currency-usd">USD</span>
                                                                    </div>
                                                                    <div class="title">Paid Profit</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="invest-ov gy-2">
                                                            <div class="subtitle">Investment in this Month</div>
                                                            <div class="invest-ov-details">
                                                                <div class="invest-ov-info">
                                                                    <div class="amount">249,395.395 <span
                                                                            class="currency currency-usd">USD</span>
                                                                    </div>
                                                                    <div class="title">Amount</div>
                                                                </div>
                                                                <div class="invest-ov-stats">
                                                                    <div><span class="amount">223</span><span
                                                                            class="change down text-danger"><em
                                                                                class="icon ni ni-arrow-long-down"></em>1.93%</span>
                                                                    </div>
                                                                    <div class="title">Plans</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xxl-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner d-flex flex-column h-100">
                                                <div class="card-title-group mb-3">
                                                    <div class="card-title">
                                                        <h6 class="title">Top Invested Plan</h6>
                                                        <p>In last 30 days top invested schemes.</p>
                                                    </div>
                                                    <div class="card-tools mt-n4 mr-n1">
                                                        <div class="drodown"><a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><span>15 Days</span></a></li>
                                                                    <li><a href="#" class="active"><span>30
                                                                                Days</span></a></li>
                                                                    <li><a href="#"><span>3 Months</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="progress-list gy-3">
                                                    <div class="progress-wrap">
                                                        <div class="progress-text">
                                                            <div class="progress-label">Strater Plan</div>
                                                            <div class="progress-amount">58%</div>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar" data-progress="58"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-wrap">
                                                        <div class="progress-text">
                                                            <div class="progress-label">Silver Plan</div>
                                                            <div class="progress-amount">18.49%</div>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar bg-orange" data-progress="18.49">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-wrap">
                                                        <div class="progress-text">
                                                            <div class="progress-label">Dimond Plan</div>
                                                            <div class="progress-amount">16%</div>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar bg-teal" data-progress="16"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-wrap">
                                                        <div class="progress-text">
                                                            <div class="progress-label">Platinam Plan</div>
                                                            <div class="progress-amount">29%</div>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar bg-pink" data-progress="29"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-wrap">
                                                        <div class="progress-text">
                                                            <div class="progress-label">Vibranium Plan</div>
                                                            <div class="progress-amount">33%</div>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar bg-azure" data-progress="33"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="invest-top-ck mt-auto"><canvas class="iv-plan-purchase"
                                                        id="planPurchase"></canvas></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xxl-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner border-bottom">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Recent Activities</h6>
                                                    </div>
                                                    <div class="card-tools">
                                                        <ul class="card-tools-nav">
                                                            <li><a href="#"><span>Cancel</span></a></li>
                                                            <li class="active"><a href="#"><span>All</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nk-activity">
                                                <li class="nk-activity-item">
                                                    <div class="nk-activity-media user-avatar bg-success"><img
                                                            src="{{asset('billion/images/c-sm.jpg')}}" alt=""></div>
                                                    <div class="nk-activity-data">
                                                        <div class="label">Keith Jensen requested to Widthdrawl.</div>
                                                        <span class="time">2 hours ago</span>
                                                    </div>
                                                </li>
                                                <li class="nk-activity-item">
                                                    <div class="nk-activity-media user-avatar bg-warning">HS</div>
                                                    <div class="nk-activity-data">
                                                        <div class="label">Harry Simpson placed a Order.</div><span
                                                            class="time">2 hours ago</span>
                                                    </div>
                                                </li>
                                                <li class="nk-activity-item">
                                                    <div class="nk-activity-media user-avatar bg-azure">SM</div>
                                                    <div class="nk-activity-data">
                                                        <div class="label">Stephanie Marshall got a huge bonus.</div>
                                                        <span class="time">2 hours ago</span>
                                                    </div>
                                                </li>
                                                <li class="nk-activity-item">
                                                    <div class="nk-activity-media user-avatar bg-purple"><img
                                                            src="{{asset('billion/images/d-sm.jpg')}}" alt=""></div>
                                                    <div class="nk-activity-data">
                                                        <div class="label">Nicholas Carr deposited funds.</div><span
                                                            class="time">2 hours ago</span>
                                                    </div>
                                                </li>
                                                <li class="nk-activity-item">
                                                    <div class="nk-activity-media user-avatar bg-pink">TM</div>
                                                    <div class="nk-activity-data">
                                                        <div class="label">Timothy Moreno placed a Order.</div><span
                                                            class="time">2 hours ago</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xxl-4">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner border-bottom">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Notifications</h6>
                                                    </div>
                                                    <div class="card-tools"><a href="#" class="link">View All</a></div>
                                                </div>
                                            </div>
                                            <div class="card-inner">
                                                <div class="timeline">
                                                    <h6 class="timeline-head">November, 2019</h6>
                                                    <ul class="timeline-list">
                                                        <li class="timeline-item">
                                                            <div class="timeline-status bg-primary is-outline"></div>
                                                            <div class="timeline-date">13 Nov <em
                                                                    class="icon ni ni-alarm-alt"></em></div>
                                                            <div class="timeline-data">
                                                                <h6 class="timeline-title">Submited KYC Application</h6>
                                                                <div class="timeline-des">
                                                                    <p>Re-submitted KYC form.</p><span
                                                                        class="time">09:30am</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-item">
                                                            <div class="timeline-status bg-primary"></div>
                                                            <div class="timeline-date">13 Nov <em
                                                                    class="icon ni ni-alarm-alt"></em></div>
                                                            <div class="timeline-data">
                                                                <h6 class="timeline-title">Submited KYC Application</h6>
                                                                <div class="timeline-des">
                                                                    <p>Re-submitted KYC form.</p><span
                                                                        class="time">09:30am</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-item">
                                                            <div class="timeline-status bg-pink"></div>
                                                            <div class="timeline-date">13 Nov <em
                                                                    class="icon ni ni-alarm-alt"></em></div>
                                                            <div class="timeline-data">
                                                                <h6 class="timeline-title">Submited KYC Application</h6>
                                                                <div class="timeline-des">
                                                                    <p>Re-submitted KYC form.</p><span
                                                                        class="time">09:30am</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-xl-12 col-xxl-8">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner border-bottom">
                                                <div class="card-title-group">
                                                    <div class="card-title">
                                                        <h6 class="title">Recent Investment</h6>
                                                    </div>
                                                    <div class="card-tools"><a href="{{ route('myplans') }}" class="link">View All</a></div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-list">
                                                <div class="nk-tb-item nk-tb-head">
                                                    <div class="nk-tb-col"><span>Plan</span></div>
                                                    <div class="nk-tb-col tb-col-sm"><span>Who</span></div>
                                                    <div class="nk-tb-col tb-col-lg"><span>Date</span></div>
                                                    <div class="nk-tb-col"><span>Amount</span></div>
                                                    <div class="nk-tb-col"><span>Profit</span></div>
                                                    <div class="nk-tb-col tb-col-sm"><span>&nbsp;</span></div>
                                                    <div class="nk-tb-col"><span>&nbsp;</span></div>
                                                </div>
                                                @foreach ($new_investment as $invest)
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <div class="align-center">
                                                                <div class="user-avatar user-avatar-sm bg-light">
                                                                    <span>P{{ $invest->dplan->id }}</span></div><span class="tb-sub ml-2"> {{ $invest->dplan->name }}
                                                                <span class="d-none d-md-inline">- {{ $invest->dplan->plan }} {{round((($invest->dplan->increment_amount * 100) / (($invest->dplan->price * $invest->dplan->gift)/100)),2)}}% for {{ $invest->dplan->expiration }}
                                                                    Days</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-sm">
                                                            <div class="user-card">
                                                                <div class="user-avatar user-avatar-xs bg-teal-dim">
                                                                    <span>{{ $invest->userplan->l_name['0'] }}{{ $invest->userplan->name['0'] }}</span></div>
                                                                <div class="user-name"><span class="tb-lead">{{ $invest->userplan->l_name }} {{ $invest->userplan->name }}</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-lg"><span
                                                                class="tb-sub">{{ $invest->activated_at->format('d/m/Y') }}</span></div>
                                                        <div class="nk-tb-col"><span class="tb-sub tb-amount">{{ number_format($invest->amount,2,'.',',') }}
                                                                <span>USD</span></span></div>
                                                        <div class="nk-tb-col"><span class="tb-sub tb-amount">{{ $invest->amount }}
                                                                <span>USD</span></span></div>
                                                        <div class="nk-tb-col tb-col-sm"><span
                                                                class="tb-sub text-success">{{ $invest->status }}</span></div>
                                                        <div class="nk-tb-col nk-tb-col-action">
                                                            <div class="dropdown"><a
                                                                    class="text-soft dropdown-toggle btn btn-sm btn-icon btn-trigger"
                                                                    data-toggle="dropdown"><em
                                                                        class="icon ni ni-chevron-right"></em></a>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push(js)
<script src="{{asset('billion/js/charts/gd-invest.js?ver=2.5.0')}}"></script>
@endpush