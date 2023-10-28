@extends('billion.dashboard.include.header')

@section('title','Investment')

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
                        <div class="nk-block-head-sub"><a href="{{route('myplans')}}" class="text-soft back-to"><em class="icon ni ni-arrow-left"> </em><span>My
                                    Investment</span></a></div>
                        <div class="nk-block-between-md g-4">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title fw-normal">{{ $invest->dplan->name }} - {{ $invest->dplan->increment_interval }} {{number_format((($invest->dplan->increment_amount * 100) / (($invest->dplan->price * $invest->dplan->gift)/100)), 2, '.', ',')}}% for {{ $invest->inv_duration }} Days</h2>
                                <div class="nk-block-des">
                                    <p>INV-48{{ $invest->id }}P{{ $invest->dplan->id }}38{{ $invest->dplan->name[0] }}
                                        @if($invest->active=="yes")
                                        <span class="badge badge-outline badge-primary">Running</span>
                                        @else
                                        <span class="badge badge-outline badge-danger">Expired</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @if($invest->active!="yes")
                            <div class="nk-block-head-content">
                                <ul class="nk-block-tools gx-3">
                                    <li class="order-md-last"><a href="{{route('plans',$invest->dplan->id)}}" class="btn btn-primary"><em class="icon ni ni-cross"></em> <span>Upgrade this plan</span>
                                        </a></li>
                                    <li><a href="{{route('plans')}}" class="btn btn-icon btn-light"><em class="icon ni ni-reload"></em></a></li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row gy-gs">
                                <div class="col-md-6">
                                    <div class="nk-iv-wg3">
                                        <div class="nk-iv-wg3-group flex-lg-nowrap gx-4">
                                            <div class="nk-iv-wg3-sub">
                                                <div class="nk-iv-wg3-amount">
                                                    <div class="number">{{ number_format($invest->amount, 2, '.', ',') }}</div>
                                                </div>
                                                <div class="nk-iv-wg3-subtitle">Invested Amount</div>
                                            </div>
                                            
                                            <div class="nk-iv-wg3-sub"><span class="nk-iv-wg3-plus text-soft"><em class="icon ni ni-plus"></em></span>
                                                <div class="nk-iv-wg3-amount">
                                                    <div class="number">{{number_format( $transactions->where("type","ROI")->sum('amount'), 2, '.', ',')}}<span class="number-up">{{number_format((($invest->dplan->increment_amount * 100) / (($invest->dplan->price * $invest->dplan->gift)/100)), 2, '.', ',')}}%</span></div>
                                                </div>
                                                <div class="nk-iv-wg3-subtitle">Profit Earned</div>
                                            </div>

                                            <div class="nk-iv-wg3-sub"><span class="nk-iv-wg3-plus text-soft"><em class="icon ni ni-plus"></em></span>
                                                <div class="nk-iv-wg3-amount">
                                                    <div class="number">{{number_format( $transactions->where("type","Bonus")->sum('amount'), 2, '.', ',')}}</div>
                                                </div>
                                                <div class="nk-iv-wg3-subtitle">Bonus Earned</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 offset-lg-2">
                                    <div class="nk-iv-wg3 pl-md-3">
                                        <div class="nk-iv-wg3-group flex-lg-nowrap gx-4">
                                            <div class="nk-iv-wg3-sub">
                                                <div class="nk-iv-wg3-amount">
                                                    <div class="number">{{ number_format($invest->dplan->expected_return, 2, '.', ',') }} <span class="number-down">{{ \App\withdrawals::latest()->where('user_plan',$invest->id)->where('status',"Processed")->sum('amount') }} <em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="Total of withdrawals"></em></span></div>
                                                </div>
                                                <div class="nk-iv-wg3-subtitle">Total Return</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>{{\Carbon\Carbon::today()->subDays(300)->format('Y-m-d')}}
                        <div id="schemeDetails" class="nk-iv-scheme-details">
                            <ul class="nk-iv-wg3-list">
                                <li>
                                    <div class="sub-text">Term</div>
                                    <div class="lead-text">{{ $invest->inv_duration }} Days</div>
                                </li>
                                <li>
                                    <div class="sub-text">Term start at</div>
                                    <div class="lead-text">{{$invest->activated_at->format('M d, Y h:m A')}}</div>
                                </li>
                                <li>
                                    <div class="sub-text">Term end at</div>
                                    <div class="lead-text">{{$invest->activated_at->addDays($invest->inv_duration)->format('M d, Y h:m A')}}</div>
                                </li>
                                <li>
                                    <div class="sub-text">Daily interest</div>
                                    <div class="lead-text">{{number_format((($invest->dplan->increment_amount * 100) / (($invest->dplan->price * $invest->dplan->gift)/100)), 2, '.', ',')}}%</div>
                                </li>
                            </ul>
                            <ul class="nk-iv-wg3-list">
                                <li>
                                    <div class="sub-text">Ordered date</div>
                                    <div class="lead-text">{{$invest->created_at->format('M d, Y h:m A')}}</div>
                                </li>
                                <li>
                                    <div class="sub-text">Approved date</div>
                                    <div class="lead-text">{{$invest->activated_at->format('M d, Y h:m A')}}</div>
                                </li>
                                <li>
                                    <div class="sub-text">Payment method</div>
                                    <div class="lead-text">BillionWallet</div>
                                </li>
                                <li>
                                    <div class="sub-text">Paid <small>(fee include)</small></div>
                                    <div class="lead-text"><span class="currency currency-usd">USD</span>
                                        {{ number_format(0, 2, '.', ',') }}
                                    </div>
                                </li>
                            </ul>
                            <ul class="nk-iv-wg3-list">
                                <li>
                                    <div class="sub-text">Captial invested</div>
                                    <div class="lead-text"><span class="currency currency-usd">USD</span>
                                        {{ number_format($invest->amount, 2, '.', ',') }}
                                    </div>
                                </li>
                                <li>
                                    <div class="sub-text">Daily profit</div>
                                    <div class="lead-text"><span class="currency currency-usd">USD</span>
                                        {{ number_format($invest->dplan->increment_amount, 2, '.', ',') }}
                                    </div>
                                </li>
                                <li>
                                    <div class="sub-text">Net profit</div>
                                    <div class="lead-text"><span class="currency currency-usd">USD</span>
                                        {{number_format((($invest->amount * $invest->dplan->gift)/100), 2, '.', ',')}}
                                    </div>
                                </li>
                                <li>
                                    <div class="sub-text">Total return</div>
                                    <div class="lead-text"><span class="currency currency-usd">USD</span>
                                        {{ number_format($invest->dplan->expected_return, 2, '.', ',') }}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <h5 class="nk-block-title">Graph View</h5>
                    </div>
                    <div class="row g-gs">
                        <div class="col-lg-5">
                            <div class="card card-bordered h-100">
                                <div class="card-inner justify-center text-center h-100">
                                    <div class="nk-iv-wg5">
                                        <div class="nk-iv-wg5-head">
                                            <h5 class="nk-iv-wg5-title">Overview</h5>
                                        </div>
                                        <div class="nk-iv-wg5-ck"><input type="text" class="knob-half" value="{{ ( ($transactions->whereIn('type',['ROI','Bonus'])->sum('amount') * 100 ) / (($invest->dplan->price * $invest->dplan->gift)/100) ) }}" data-fgColor="#6576ff" data-bgColor="#d9e5f7" data-thickness=".06" data-width="300" data-height="155" data-displayInput="false">
                                            <div class="nk-iv-wg5-ck-result">
                                                <div class="text-lead">{{ round( ($transactions->whereIn('type',['ROI','Bonus'])->sum('amount') * 100 ) / (($invest->dplan->price * $invest->dplan->gift)/100) ,1) }}%</div>
                                                <div class="text-sub">{{ $invest->dplan->increment_amount }} / per day</div>
                                            </div>
                                            <div class="nk-iv-wg5-ck-minmax">
                                                <span>{{number_format( $transactions->whereIn('type',['ROI','Investment capital','Bonus'])->sum('amount'), 2, '.', ',')}}</span><span>{{ number_format($invest->dplan->expected_return, 2, '.', ',') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-sm-6">
                            <div class="card card-bordered h-100">
                                <div class="card-inner justify-center text-center h-100">
                                    <div class="nk-iv-wg5">
                                        <div class="nk-iv-wg5-head">
                                            <h5 class="nk-iv-wg5-title">Net Profit</h5>
                                            <div class="nk-iv-wg5-subtitle">Earn so far
                                                <strong>{{number_format( $transactions->where("type","ROI")->sum('amount'), 2, '.', ',')}}</strong> <span class="currency currency-usd">USD</span>
                                            </div>
                                        </div>
                                        <div class="nk-iv-wg5-ck sm"><input type="text" class="knob-half" value="{{ ( ($transactions->where('type','ROI')->sum('amount') * 100 ) / (($invest->dplan->price * $invest->dplan->gift)/100) ) }}" data-fgColor="#33d895" data-bgColor="#d9e5f7" data-thickness=".07" data-width="240" data-height="125" data-displayInput="false">
                                            <div class="nk-iv-wg5-ck-result">
                                                <div class="text-lead sm">{{round(( ($transactions->where('type','ROI')->sum('amount') * 100 ) / (($invest->dplan->price * $invest->dplan->gift)/100) ), 1)}} %</div>
                                                <div class="text-sub">Daily profit</div>
                                            </div>
                                            <div class="nk-iv-wg5-ck-minmax">
                                                <span>{{number_format( $transactions->where("type","ROI")->sum('amount'), 2, '.', ',')}}</span><span>{{number_format((($invest->dplan->price * $invest->dplan->gift)/100), 2, '.', ',')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-sm-6">
                            <div class="card card-bordered h-100">
                                <div class="card-inner justify-center text-center h-100">
                                    <div class="nk-iv-wg5">
                                        <div class="nk-iv-wg5-head">
                                            <h5 class="nk-iv-wg5-title">Day Remain</h5>
                                            <div class="nk-iv-wg5-subtitle">Earn so far 
                                                <strong>{{number_format( $transactions->where("type","ROI")->sum('amount'), 2, '.', ',')}} </strong> <span class="currency currency-usd">USD</span>
                                            </div>
                                        </div>
                                        <div class="nk-iv-wg5-ck sm"><input type="text" class="knob-half" value="{{ $invest->active == 'yes' ? ( $invest->activated_at->diffInDays() * 100 ) / ($invest->inv_duration) : 100}}" data-fgColor="#816bff" data-bgColor="#d9e5f7" data-thickness=".07" data-width="240" data-height="125" data-displayInput="false">
                                            <div class="nk-iv-wg5-ck-result">
                                                <div class="text-lead sm">{{ $invest->active == 'yes' ? $invest->inv_duration - $invest->activated_at->diffInDays() : 0 }} D</div>
                                                <div class="text-sub">day remain</div>
                                            </div>
                                            <div class="nk-iv-wg5-ck-minmax"><span>{{ $invest->active == 'yes' ? $invest->activated_at->diffInDays() : 300 }}</span><span>{{ $invest->inv_duration }} </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <h5 class="nk-block-title">Transactions</h5>
                    </div>
                    <div class="card card-bordered">
                        <table class="table table-iv-tnx">
                            <thead class="thead-light">
                                <tr>
                                    <th class="tb-col-type"><span class="overline-title">Type</span></th>
                                    <th class="tb-col-date"><span class="overline-title">Date</span></th>
                                    <th class="tb-col-time tb-col-end"><span class="overline-title">Amount</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions->whereIn('type',['ROI','Bonus','Investment capital'])->sortByDesc("created_at") as $tp)
                                <tr>
                                    @if($tp->type == "ROI")
                                    <td class="tb-col-type"><span class="sub-text">Profit - {{number_format((($invest->dplan->increment_amount * 100) / (($invest->dplan->price * $invest->dplan->gift)/100)), 2, '.', ',')}} %</span>
                                    </td>
                                    @elseif($tp->type == "Investment capital")
                                    <td class="tb-col-type"><span class="sub-text">Investment Capital</span></td>
                                    @elseif($tp->type == "Bonus")
                                    <td class="tb-col-type"><span class="sub-text">Bonus</span></td>
                                    @endif
                                    <td class="tb-col-date"><span class="sub-text">{{ $tp->created_at->format('d M, Y') }}</span></td>

                                    <td class="tb-col-time tb-col-end">
                                        @if($tp->type == "ROI")
                                        <span class="lead-text">+ ${{ $tp->amount }}</span>
                                        @elseif($tp->type == "Investment capital")
                                        <span class="lead-text text-success">+ ${{ $tp->amount }}</span>
                                        @elseif($tp->type == "Bonus")
                                        <span class="lead-text text-info">+ ${{ $tp->amount }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(Auth::user()->type!=0)

                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <h5 class="nk-block-title">Investor Informations
                        </h5>
                    </div>
                    <div class="card card-bordered">
                        <ul class="data-list is-compact">
                            <li class="data-item">
                                <div class="data-col">
                                    <div class="data-label">First Name</div>
                                    <div class="data-value">{{ $invest->userplan->name }}</div>
                                </div>
                            </li>
                            <li class="data-item">
                                <div class="data-col">
                                    <div class="data-label">Last Name</div>
                                    <div class="data-value">{{ $invest->userplan->l_name }}</div>
                                </div>
                            </li>
                            <li class="data-item">
                                <div class="data-col">
                                    <div class="data-label">Email Address</div>
                                    <div class="data-value">{{ $invest->userplan->email }}</div>
                                </div>
                            </li>
                            <li class="data-item">
                                <div class="data-col">
                                    <div class="data-label">Phone Number</div>
                                    <div class="data-value"><em>{{ $invest->userplan->phone_number }}</em></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection