@extends('billion.dashboard.include.header')

@section('title','Manage Users')

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
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Users Lists</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total {{count($users)}} users.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle"><a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown"><a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="" data-toggle="modal" id="addUser" data-target='#manage_users'>Add User</a></li>
                                                        <li><a href="#"><span>Add Team</span></a></li>
                                                        <li><a href="#"><span>Import User</span></a></li>
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
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner position-relative card-tools-toggle">
                                <div class="card-title-group">
                                    <div class="card-tools">
                                        @if(Auth::user()->type!='0')
                                        <div class="form-inline flex-nowrap gx-3">
                                            <div class="form-wrap w-150px"><select class="form-select form-select-sm" name="filter_value" id="filter_value" data-search="off" data-placeholder="Bulk Action">
                                                    <option value="">Bulk Action</option>
                                                    <option value="email">Send Email</option>
                                                    <option value="suspend">Suspend User</option>
                                                    <option value="delete">Delete User</option>
                                                </select>
                                            </div>
                                            <div class="btn-wrap">
                                                <span class="d-none d-md-block">
                                                    <button class="btn btn-primary" id="filter_btn">Apply</button>
                                                </span>
                                                <span class="d-md-none">
                                                    <button class="btn btn-primary btn-icon"><em class="icon ni ni-arrow-right"></em></button>
                                                </span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="card-tools mr-n1">
                                        <ul class="btn-toolbar gx-1">
                                            <li><a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a></li>
                                            <li class="btn-toolbar-sep"></li>
                                            <li>
                                                <div class="toggle-wrap"><a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                    <div class="toggle-content" data-content="cardTools">
                                                        <ul class="btn-toolbar gx-1">
                                                            <li class="toggle-close"><a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                                            </li>
                                                            <li>
                                                                <div class="dropdown"><a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                        <div class="dot dot-primary"></div>
                                                                        <em class="icon ni ni-filter-alt"></em>
                                                                    </a>
                                                                    <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                                        <div class="dropdown-head"><span class="sub-title dropdown-title">Filter
                                                                                Users</span>
                                                                            <div class="dropdown"><a href="#" class="btn btn-sm btn-icon"><em class="icon ni ni-more-h"></em></a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="dropdown-body dropdown-body-rg">
                                                                            <div class="row gx-6 gy-3">
                                                                                <div class="col-6">
                                                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                                                        <input type="checkbox" class="custom-control-input" id="hasBalance" name="hasBalance"><label class="custom-control-label" for="hasBalance">
                                                                                            Have
                                                                                            Balance</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                                                        <input type="checkbox" class="custom-control-input"><label class="custom-control-label" for="hasKYC" id="hasKYC" name="hasKYC">
                                                                                            KYC
                                                                                            Verified</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        <label class="overline-title overline-title-alt">Role</label><select class="form-select form-select-sm" id="type" name="type">
                                                                                            <option value="any">
                                                                                                Any Role
                                                                                            </option>
                                                                                            <option value="investor">
                                                                                                Investor
                                                                                            </option>
                                                                                            <option value="referer">
                                                                                                Referer
                                                                                            </option>
                                                                                            <option value="agent">
                                                                                                Agent
                                                                                            </option>
                                                                                            <option value="administrator">
                                                                                                Administrator
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="form-group">
                                                                                        <label class="overline-title overline-title-alt">Status</label><select class="form-select form-select-sm" id="status" name="status">
                                                                                            <option value="any">
                                                                                                Any Status
                                                                                            </option>
                                                                                            <option value="active">
                                                                                                Active
                                                                                            </option>
                                                                                            <option value="blocked">
                                                                                                Blocked
                                                                                            </option>
                                                                                            <option value="suspend">
                                                                                                Suspend
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="form-group">
                                                                                        <button type="button" class="btn btn-secondary">Filter</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="dropdown-foot between">
                                                                            <a class="clickable" href="#">Reset Filter</a><a href="#">Save Filter</a>
                                                                        </div>
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
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-search search-wrap" data-search="search">
                                    <div class="card-body">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search">
                                                <em class="icon ni ni-arrow-left"></em>
                                            </a>
                                            <form action="{{ route('searchUser') }}" method="POST" id="search_form_id">
                                                {{ csrf_field() }}
                                                <input type="text" id="search_value" name="search_value" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">

                                                <button class="search-submit btn btn-icon" id="submit_search">
                                                    <em class="icon ni ni-search"></em>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner p-0">
                                <div class="nk-tb-list nk-tb-ulist">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid"><label class="custom-control-label" for="uid"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col"><span class="sub-text">User</span></div>
                                        <div class="nk-tb-col tb-col-mb"><span class="sub-text">Balance</span></div>
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Verified</span></div>
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools text-right">
                                            <div class="dropdown"><a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                                                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                    <ul class="link-tidy sm no-bdr">

                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" checked="" id="bl"><label class="custom-control-label" for="bl">Balance</label>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" checked="" id="ph"><label class="custom-control-label" for="ph">Phone</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="vri"><label class="custom-control-label" for="vri">Verified</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="st"><label class="custom-control-label" for="st">Status</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @foreach ($users as $user)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid{{$user->id}}" name="mailusers[]" value='{{$user->id}}'>
                                                <label class="custom-control-label" for="uid{{$user->id}}"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-info"><span>{{strtoupper($user->name[0])}}{{strtoupper($user->l_name[0])}}</span></div>
                                                <div class="user-info"><span class="tb-lead">{{$user->name}} {{$user->l_name}}
                                                        <span class="dot dot-success d-md-none ml-1"></span></span><span>{{$user->email}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-mb"><span class="tb-amount">{{$user->account_bal}}
                                                <span class="currency">{{$settings->s_currency}}</span></span></div>
                                        <div class="nk-tb-col tb-col-md"><span>{{$user->phone_number}}</span></div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <ul class="list-status">
                                                @if($user->status == 'active')
                                                <li><em class="icon text-success ni ni-check-circle"></em>
                                                    <span>Email</span>
                                                </li>
                                                @else
                                                <li><em class="icon text-danger ni ni-check-circle"></em>
                                                    <span>Email</span>
                                                </li>
                                                @endif
                                                @if($user->account_verify == "Verified")
                                                <li><em class="icon text-success ni ni-check-circle"></em>
                                                    <span>KYC</span>
                                                </li>

                                                @elseif($user->account_verify == "Rejected")
                                                <li><em class="icon text-danger ni ni-check-circle"></em>
                                                    <span>KYC</span>
                                                </li>
                                                @else

                                                <li><em class="icon text-warning ni ni-check-circle"></em>
                                                    <span>KYC</span>
                                                </li>

                                                @endif
                                            </ul>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            @if($user->status=="active")
                                            <span class="tb-status text-success">{{strtoupper($user->status)}}</span>

                                            @elseif($user->status=="suspend")
                                            <span class="tb-status text-warning">{{strtoupper($user->status)}}</span>

                                            @else
                                            <span class="tb-status text-danger">{{strtoupper($user->status)}}</span>

                                            @endif

                                        </div>
                                        @if(Auth::user()->type!='0')
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-hidden"><a href="" data-toggle="modal" id="showUser" data-target="#manage_user" data-id="{{$user->id}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Quick View"><em class="icon ni ni-focus"></em></a></li>
                                                <li class="nk-tb-action-hidden"><a href="" data-toggle="modal" id="editUser" data-target="#manage_user" data-id="{{$user->id}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit"><em class="icon ni ni-edit-fill"></em></a></li>
                                                <li class="nk-tb-action-hidden"><a href="" data-toggle="modal" id="showMailForm" data-target="#sendmailModal" data-id="{{$user->id}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email"><em class="icon ni ni-mail-fill"></em></a></li>
                                                <li>
                                                    <div class="drodown"><a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="" data-toggle="modal" id="showUser" data-target="#manage_user" data-id="{{$user->id}}"><em class="icon ni ni-focus"></em><span>Quick
                                                                            View</span></a></li>
                                                                <li><a href="{{ route('user_details',$user->id) }}"><em class="icon ni ni-eye"></em><span>View
                                                                            Profile</span></a></li>
                                                                <li><a href="" data-toggle="modal" id="editUser" data-target="#manage_user" data-id="{{$user->id}}"><em class="icon ni ni-edit"></em><span>Edit
                                                                            Profile</span></a></li>

                                                                <li><a href="" data-toggle="modal" id="showMailForm" data-target="#sendmailModal" data-id="{{$user->id}}"><em class="icon ni ni-mail-fill"></em><span>Send Email
                                                                        </span></a></li>

                                                                <li class="divider"></li>
                                                                <li><a href="" data-toggle="modal" id="showCreditForm" data-target="#transactionmodal" data-id="{{$user->id}}"><em class="icon ni ni-wallet-in"></em><span>Credit Account</span></a>
                                                                </li>
                                                                <li><a href="" data-toggle="modal" id="showDebitForm" data-target="#transactionmodal" data-id="{{$user->id}}"><em class="icon ni ni-wallet-out"></em><span>Debit Account</span></a>
                                                                </li>
                                                                <li><a href="{{ route('user_details',$user->id) }}"><em class="icon ni ni-tranx"></em><span>Transaction</span></a>
                                                                </li>
                                                                <li><a href="{{ route('user_details',$user->id) }}"><em class="icon ni ni-activity-round"></em><span>Activities</span></a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li><a href="{{ route('resetpassword',$user->id) }}"><em class="icon ni ni-lock"></em><span>Reset
                                                                            Pass</span></a></li>
                                                                <li><a href="{{ route('reset2fa',$user->id) }}"><em class="icon ni ni-security"></em><span>Reset
                                                                            2FA</span></a></li>
                                                                @if($user->status!="suspend" && $user->status!="blocked" && $user->status!=null)
                                                                <li><a href="{{ url('dashboard/ublock') }}/{{$user->id}}"><em class="icon ni ni-na"></em><span>Suspend
                                                                            User</span></a></li>

                                                                @elseif($user->status=="suspend" && $user->status!=null)
                                                                <li><a href="{{ url('dashboard/unblock') }}/{{$user->id}}"><em class="icon ni ni-check-thick"></em><span>Unsuspend
                                                                            User</span></a></li>
                                                                @endif

                                                                <li>
                                                                    <a href="{{ url('dashboard/deluser') }}/{{$user->id}}"><em class="icon ni ni-user-cross-fill"></em><span>Delete User</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif
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


@push('js')
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('body').on('click', '#submit_search', function(event) {
            event.preventDefault()
            var search = $("#search_value").val();

            console.log(search);

            $.ajax({
                    url: 'manageusers',
                    type: "POST",
                    data: {
                        search_value: search,
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        '<?php $users = data; ?>';

                        /* $('#userdata').trigger("reset");
                        $('#manage_users').modal('hide');
                        window.location.reload(true); */
                    }
                })
                .fail(function(data) {
                    console.log(data.responseJSON.errors);
                });


        });

    });
</script>
@endpush