@extends('billion.dashboard.include.header')

@section('title','Deposits')

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
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Your Deposits Transactions</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total {{$total_deposits}} deposits.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle"><a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        @if(Auth::user()->type!=0)
                                        <li><a href="#" class="btn btn-white btn-dim btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a>
                                        </li>
                                        @endif
                                        <li><a href="{{route('deposit_form')}}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Deposit Funds</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All Deposits</h5>
                                    </div>
                                    <div class="card-tools mr-n1">
                                        <ul class="btn-toolbar gx-1">
                                            <li><a href="#" class="search-toggle toggle-search btn btn-icon" data-target="search"><em class="icon ni ni-search"></em></a></li>


                                            @if(Auth::user()->type!=0)
                                            <li class="btn-toolbar-sep"></li>
                                            <li>
                                                <div class="dropdown"><a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                        <div class="badge badge-circle badge-primary">2
                                                        </div><em class="icon ni ni-filter-alt"></em>
                                                    </a>
                                                    <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                        <div class="dropdown-head"><span class="sub-title dropdown-title">Advance
                                                                Filter</span>
                                                            <div class="dropdown"><a href="#" class="link link-light"><em class="icon ni ni-more-h"></em></a>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-body dropdown-body-rg">
                                                            <div class="row gx-6 gy-4">
                                                                <div class="col-6">
                                                                    <div class="form-group"><label class="overline-title overline-title-alt">Status</label>
                                                                        <select class="form-select form-select-sm">
                                                                            <option value="any">Any Status
                                                                            </option>
                                                                            <option value="pending">Pending
                                                                            </option>
                                                                            <option value="processed">Process
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label class="overline-title overline-title-alt">Pay Currency</label>
                                                                        <select class="form-select form-select-sm">
                                                                            <option value="any">Any Coin
                                                                            </option>
                                                                            <option value="bitcoin">Bitcoin
                                                                            </option>
                                                                            <option value="ethereum">
                                                                                Ethereum</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="includeDel"><label class="custom-control-label" for="includeDel"> Including
                                                                                Deleted</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group"><button type="button" class="btn btn-secondary">Filter</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-foot between"><a class="clickable" href="#">Reset
                                                                Filter</a><a href="#savedFilter" data-toggle="modal">Save Filter</a></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dropdown"><a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown"><em class="icon ni ni-setting"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                        <ul class="link-check">
                                                            <li><span>Show</span></li>
                                                            <li class="active"><a href="#">10</a></li>
                                                            <li><a href="#">20</a></li>
                                                            <li><a href="#">50</a></li>
                                                        </ul>
                                                        <ul class="link-check">
                                                            <li><span>Order</span></li>
                                                            <li class="active"><a href="#">DESC</a></li>
                                                            <li><a href="#">ASC</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="card-search search-wrap" data-search="search">
                                        <div class="search-content"><a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a><input type="text" class="form-control border-transparent form-focus-none" placeholder="Quick search by transaction"><button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner p-0">
                                <div class="nk-tb-list nk-tb-tnx">
                                    <?php $role = Auth::user()->type;
                                    $role ?>

                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col"><span>Details</span></div>
                                        @if($role!='0')
                                        <div class="nk-tb-col tb-col-lg"><span>User</span></div>
                                        @endif
                                        <div class="nk-tb-col text-right"><span>Amount</span></div>
                                        <div class="nk-tb-col nk-tb-col-status"><span class="sub-text d-none d-md-block">Status</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools"></div>
                                    </div>
                                    @foreach($deposits as $deposit)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col">
                                            <div class="nk-tnx-type">
                                                <div class="nk-tnx-type-icon bg-success-dim text-success">
                                                    <em class="icon ni ni-arrow-up-right"></em>
                                                </div>
                                                <div class="nk-tnx-type-text">
                                                    <span class="tb-lead">{{$deposit->payment_mode}}</span>
                                                    <span class="tb-date">{{$deposit->created_at->format("d/m/Y h:m")}} PM</span>
                                                </div>
                                            </div>
                                        </div>

                                        @if($role!='0')
                                        <div class="nk-tb-col tb-col-lg">
                                            <span class="tb-lead-sub">
                                                <div class="user-card">
                                                    <div class="user-avatar bg-primary"><span>{{strtoupper($deposit->duser->name[0])}}{{strtoupper($deposit->duser->l_name[0])}}</span></div>
                                                    <div class="user-info"><span class="tb-lead">{{$deposit->duser->name}}
                                                            {{$deposit->duser->l_name}} <span class="dot dot-success d-md-none ml-1"></span></span><span>{{ number_format($deposit->duser->account_bal, 2, '.', ',')}}<span> USD</span></span>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                        @endif

                                        <div class="nk-tb-col text-right"><span class="tb-amount">{{ number_format($deposit->amount, 2, '.', ',')}}
                                                <span>USD</span></span>
                                            <!-- <span class="tb-amount-sm">0.653453
                                                                BTC</span> -->
                                        </div>


                                        <div class="nk-tb-col nk-tb-col-status">
                                            @if($deposit->status == 'Processed' )
                                            <div class="dot dot-success d-md-none"></div>
                                            <span class="badge badge-sm badge-dim badge-outline-success d-none d-md-inline-flex">{{$deposit->status}}</span>
                                            @else

                                            <div class="dot dot-warning d-md-none"></div>
                                            <span class="badge badge-sm badge-dim badge-outline-warning d-none d-md-inline-flex">{{$deposit->status}}</span>

                                            @endif
                                        </div>
                                        @if($role!='0')
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-2">
                                                <li class="nk-tb-action-hidden"><a href="{{ url('dashboard/pdeposit') }}/{{$deposit->id}}" class="bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="tooltip" data-placement="top" title="Approve"><em class="icon ni ni-done"></em></a></li>
                                                <li class="nk-tb-action-hidden"><a href="#tranxDetails{{$deposit->id}}" data-toggle="modal" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" title="Details"><em class="icon ni ni-eye"></em></a>
                                                </li>
                                                <li>
                                                    <div class="dropdown"><a href="#" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt">
                                                                <li><a href="{{ url('dashboard/pdeposit') }}/{{$deposit->id}}"><em class="icon ni ni-done"></em><span>Approve</span></a>
                                                                </li>
                                                                <li><a href="#"><em class="icon ni ni-cross-round"></em><span>Reject</span></a>
                                                                </li>
                                                                <li><a href="{{ url('dashboard/deldeposit') }}/{{$deposit->id}}"><em class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                </li>
                                                                <li><a href="#tranxDetails{{$deposit->id}}" data-toggle="modal"><em class="icon ni ni-eye"></em><span>View
                                                                            Details</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        @else

                                        <div class="nk-tb-col nk-tb-col-tools ">
                                            <ul class="nk-tb-actions gx-2">
                                                <li class="nk-tb-action-hidden">
                                                    <a href="#tranxDetails{{$deposit->id}}" data-toggle="modal" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" title="Details"><em class="icon ni ni-eye"></em></a>
                                                </li>
                                                <li>
                                                    <div class="dropdown"><a href="#" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt">
                                                                <li>
                                                                    <a href="#tranxDetails{{$deposit->id}}" data-toggle="modal">
                                                                        <em class="icon ni ni-eye"></em>
                                                                        <span>View Details</span>
                                                                    </a>
                                                                </li>
                                                                @if($deposit->status == "Pending")
                                                                <li><a href="{{route ('deldeposit',$deposit->id) }}"><em class="icon ni ni-cross-round"></em><span>Annuler</span></a>
                                                                </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- Modal Default -->
                                    <div class="modal fade" tabindex="-1" id="tranxDetails{{$deposit->id}}">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                    <em class="icon ni ni-cross"></em>
                                                </a>
                                                <div class="modal-body modal-body-md">
                                                    <div class="nk-modal-head mb-3 mb-sm-5">
                                                        <h4 class="nk-modal-title title">Transaction</h4>
                                                    </div>
                                                    <div class="nk-tnx-details">
                                                        <div class="nk-block-between flex-wrap g-3">
                                                            <div class="nk-tnx-type">
                                                                <div class="nk-tnx-type-icon bg-success-dim text-success">
                                                                    <em class="icon ni ni-arrow-up-right"></em>
                                                                </div>
                                                                <div class="nk-tnx-type-text">
                                                                    <h5 class="title">{{ number_format($deposit->amount, 2, '.', ',')}} USD</h5>
                                                                    <span class="sub-text mt-n1">{{$deposit->created_at->format("d M, Y h:m A")}}</span>
                                                                </div>
                                                            </div>

                                                            <ul class="align-center flex-wrap gx-3">
                                                                <li>
                                                                    @if($deposit->status == 'Processed' )
                                                                    <span class="badge badge-sm badge-success">{{ $deposit->status }}</span>
                                                                    @else
                                                                    <span class="badge badge-sm badge-warning">{{ $deposit->status }}</span>
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- .row -->
                                                        <div class="modal-body">

                                                            <div class="nk-block">
                                                                <div class="nk-block-head nk-block-head-line">
                                                                    <h6 class="title overline-title text-base">Deposit Information</h6>
                                                                </div><!-- .nk-block-head -->
                                                                <div class="profile-ud-list">

                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Amount</span>
                                                                            <span class="profile-ud-value">{{ number_format($deposit->amount, 2, '.', ',')}} USD</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Payment Date</span>
                                                                            <span class="profile-ud-value">{{$deposit->created_at->format("d/m/Y")}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Payment Type</span>
                                                                            <span class="profile-ud-value">Cryptocurrencies</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Payment Mode</span>
                                                                            <span class="profile-ud-value">{{ $deposit->payment_mode }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="profile-ud-item col-lg-12">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Payment To :</span>
                                                                            @if( $deposit->payment_mode == "Bitcoin" )
                                                                            <span class="profile-ud-value">{{ \App\settings::where('id',1)->first()->btc_address }}</span>
                                                                            <!--\App\settings::where('id',1)->first()->eth_address-->
                                                                            @elseif( $deposit->payment_mode == "Ethereum" )

                                                                            <span class="profile-ud-value">{{ \App\settings::where('id',1)->first()->eth_address }}</span>

                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                </div><!-- .profile-ud-list -->
                                                            </div><!-- .nk-block -->



                                                            <div class="nk-block">
                                                                <div class="nk-block-head">
                                                                    <h5 class="title">Personal Information</h5>
                                                                    <p>Basic info, like name and address, that you use on BillionCycle Platform.</p>
                                                                </div><!-- .nk-block-head -->
                                                                <div class="profile-ud-list">
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Full Name</span>
                                                                            <span class="profile-ud-value">{{ $deposit->duser->name }} {{ $deposit->duser->l_name }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Mobile Number</span>
                                                                            <span class="profile-ud-value">{{ $deposit->duser->phone_number }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Email Address</span>
                                                                            <span class="profile-ud-value">{{ $deposit->duser->email }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="profile-ud-item">
                                                                        <div class="profile-ud wider">
                                                                            <span class="profile-ud-label">Account Balance</span>
                                                                            <span class="profile-ud-value">{{ number_format($deposit->duser->account_bal, 2, '.', ',')}} USD</span>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- .profile-ud-list -->
                                                            </div><!-- .nk-block -->

                                                            <div class="nk-divider divider md"></div>

                                                            <div class="nk-block">
                                                                <div class="nk-block-head nk-block-head-sm nk-block-between">
                                                                    <h5 class="title">Deposit Proof</h5>
                                                                </div><!-- .nk-block-head -->

                                                                <img src="localhost:8000/{{$settings->files_key}}/cloud/uploads/{{$deposit->proof}}" style="max-width:100%; height: auto;">
                                                            </div><!-- .nk-block -->
                                                        </div>
                                                    </div><!-- .nk-tnx-details -->
                                                </div><!-- .modal-body -->
                                            </div><!-- .modal-content -->
                                        </div><!-- .modal-dialog -->
                                    </div><!-- .modal -->
                                    @endforeach

                                </div>
                            </div>


                            @if(count($deposits) != 0)
                            {{$deposits->links()}}
                            @endif
                            <!-- <div class="card-inner">
                            <ul class="pagination justify-content-center justify-content-md-start">

                                <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection