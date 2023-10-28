@extends('billion.dashboard.include.header')

@section('title','Refer Us & Earn')

@section("content")

<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
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
                                        <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span></div>
                                        <div class="form-icon"><em class="icon ni ni-link-alt"></em></div>
                                        <input type="text" class="form-control copy-text" id="refUrl" value="{{Auth::user()->ref_link}}">
                                    </div>
                                </div>
                            </div>
                            <div class="nk-refwg-stats card-inner bg-lighter">
                                <div class="nk-refwg-group g-3">
                                    <div class="nk-refwg-name">
                                        <h6 class="title"> @if(Auth::user()->type =='0') My @endif Referrals <em class="icon ni ni-info" data-toggle="tooltip" data-placement="right" title="Referral Informations"></em></h6>
                                    </div>
                                    <div class="nk-refwg-info g-3">
                                        <div class="nk-refwg-sub">
                                            <div class="title"> {{ $nbre_refers }} </div>
                                            <div class="sub-text">Total Joined</div>
                                        </div>
                                        <div class="nk-refwg-sub">
                                            <div class="title"> {{ number_format( $earnings, 2, '.', ',')}}</div>
                                            <div class="sub-text">Referral Earn</div>
                                        </div>
                                    </div>
                                    <!-- 
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
                                <div class="nk-refwg-ck"><canvas class="chart-refer-stats" id=""></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">


                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Refer users Lists</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total {{count($users)}} refer users.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle"><a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        @if(Auth::user()->type!=0)

                                        <li><a href="#" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Export</span></a>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown"><a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Add User</span></a></li>
                                                        <li><a href="#"><span>Add Team</span></a></li>
                                                        <li><a href="#"><span>Import User</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        @endif
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
                                        <div class="form-inline flex-nowrap gx-3">
                                            <!-- <div class="form-wrap w-150px"><select
                                                                class="form-select form-select-sm" data-search="off"
                                                                data-placeholder="Bulk Action">
                                                                <option value="">Bulk Action</option>
                                                                <option value="email">Send Email</option>
                                                                <option value="group">Change Group</option>
                                                                <option value="suspend">Suspend User</option>
                                                                <option value="delete">Delete User</option>
                                                            </select></div>
                                                        <div class="btn-wrap"><span class="d-none d-md-block"><button
                                                                    class="btn btn-dim btn-outline-light disabled">Apply</button></span><span
                                                                class="d-md-none"><button
                                                                    class="btn btn-dim btn-outline-light btn-icon disabled"><em
                                                                        class="icon ni ni-arrow-right"></em></button></span>
                                                        </div> -->
                                        </div>
                                    </div>
                                    <div class="card-tools mr-n1">
                                        <ul class="btn-toolbar gx-1">
                                            <li><a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a></li>
                                            <!-- <li class="btn-toolbar-sep"></li>
                                                        <li>
                                                            <div class="toggle-wrap"><a href="#"
                                                                    class="btn btn-icon btn-trigger toggle"
                                                                    data-target="cardTools"><em
                                                                        class="icon ni ni-menu-right"></em></a>
                                                                <div class="toggle-content" data-content="cardTools">
                                                                    <ul class="btn-toolbar gx-1">
                                                                        <li class="toggle-close"><a href="#"
                                                                                class="btn btn-icon btn-trigger toggle"
                                                                                data-target="cardTools"><em
                                                                                    class="icon ni ni-arrow-left"></em></a>
                                                                        </li>
                                                                        <li>
                                                                            <div class="dropdown"><a href="#"
                                                                                    class="btn btn-trigger btn-icon dropdown-toggle"
                                                                                    data-toggle="dropdown">
                                                                                    <div class="dot dot-primary"></div>
                                                                                    <em
                                                                                        class="icon ni ni-filter-alt"></em>
                                                                                </a>
                                                                                <div
                                                                                    class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                                                    <div class="dropdown-head"><span
                                                                                            class="sub-title dropdown-title">Filter
                                                                                            Users</span>
                                                                                        <div class="dropdown"><a
                                                                                                href="#"
                                                                                                class="btn btn-sm btn-icon"><em
                                                                                                    class="icon ni ni-more-h"></em></a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="dropdown-body dropdown-body-rg">
                                                                                        <div class="row gx-6 gy-3">
                                                                                            <div class="col-6">
                                                                                                <div
                                                                                                    class="custom-control custom-control-sm custom-checkbox">
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="custom-control-input"
                                                                                                        id="hasBalance"><label
                                                                                                        class="custom-control-label"
                                                                                                        for="hasBalance">
                                                                                                        Have
                                                                                                        Balance</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div
                                                                                                    class="custom-control custom-control-sm custom-checkbox">
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="custom-control-input"
                                                                                                        id="hasKYC"><label
                                                                                                        class="custom-control-label"
                                                                                                        for="hasKYC">
                                                                                                        KYC
                                                                                                        Verified</label>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="overline-title overline-title-alt">Role</label><select
                                                                                                        class="form-select form-select-sm">
                                                                                                        <option
                                                                                                            value="any">
                                                                                                            Any Role
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="investor">
                                                                                                            Investor
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="seller">
                                                                                                            Seller
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="buyer">
                                                                                                            Buyer
                                                                                                        </option>
                                                                                                    </select></div>
                                                                                            </div>
                                                                                            <div class="col-6">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        class="overline-title overline-title-alt">Status</label><select
                                                                                                        class="form-select form-select-sm">
                                                                                                        <option
                                                                                                            value="any">
                                                                                                            Any Status
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="active">
                                                                                                            Active
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="pending">
                                                                                                            Pending
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="suspend">
                                                                                                            Suspend
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="deleted">
                                                                                                            Deleted
                                                                                                        </option>
                                                                                                    </select></div>
                                                                                            </div>
                                                                                            <div class="col-12">
                                                                                                <div class="form-group">
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="btn btn-secondary">Filter</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="dropdown-foot between">
                                                                                        <a class="clickable"
                                                                                            href="#">Reset Filter</a><a
                                                                                            href="#">Save Filter</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="dropdown"><a href="#"
                                                                                    class="btn btn-trigger btn-icon dropdown-toggle"
                                                                                    data-toggle="dropdown"><em
                                                                                        class="icon ni ni-setting"></em></a>
                                                                                <div
                                                                                    class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                                                    <ul class="link-check">
                                                                                        <li><span>Show</span></li>
                                                                                        <li class="active"><a
                                                                                                href="#">10</a></li>
                                                                                        <li><a href="#">20</a></li>
                                                                                        <li><a href="#">50</a></li>
                                                                                    </ul>
                                                                                    <ul class="link-check">
                                                                                        <li><span>Order</span></li>
                                                                                        <li class="active"><a
                                                                                                href="#">DESC</a></li>
                                                                                        <li><a href="#">ASC</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-search search-wrap" data-search="search">
                                    <div class="card-body">
                                        <div class="search-content"><a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a><input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or email"><button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button></div>
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
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Verified</span></div>
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                                        @if(Auth::user()->type!='0')
                                        <div class="nk-tb-col nk-tb-col-tools text-right">
                                            <div class="dropdown"><a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                                                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                    <ul class="link-tidy sm no-bdr">
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
                                        @endif
                                    </div>


                                    @foreach ($users as $user)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid3"><label class="custom-control-label" for="uid3"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-info"><span>{{$user->name[0]}}{{$user->l_name[0]}}</span></div>
                                                <div class="user-info"><span class="tb-lead">{{$user->name}} {{$user->l_name}}
                                                        <span class="dot dot-success d-md-none ml-1"></span></span><span>{{$user->email}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-md"><span>{{$user->phone_number}}</span></div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <ul class="list-status">
                                                <li><em class="icon text-success ni ni-check-circle"></em>
                                                    <span>Email</span>
                                                </li>
                                                <li><em class="icon text-success ni ni-check-circle"></em>
                                                    <span>KYC</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            @if($user->status=="active")
                                            <span class="tb-status text-success">{{strtoupper($user->status)}}</span>

                                            @else
                                            <span class="tb-status text-danger">{{strtoupper($user->status)}}</span>

                                            @endif

                                        </div>

                                        @if(Auth::user()->type!='0')
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Quick View"><em class="icon ni ni-focus"></em></a></li>
                                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit"><em class="icon ni ni-edit-fill"></em></a></li>
                                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email"><em class="icon ni ni-mail-fill"></em></a></li>
                                                <li>
                                                    <div class="drodown"><a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em class="icon ni ni-focus"></em><span>Quick
                                                                            View</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>View
                                                                            Profile</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit
                                                                            Profile</span></a></li>

                                                                <li><a href="#"><em class="icon ni ni-mail-fill"></em><span>Send Email
                                                                        </span></a></li>

                                                                <li class="divider"></li>
                                                                <li><a href="#"><em class="icon ni ni-repeat"></em><span>Credit Account</span></a>
                                                                </li>
                                                                <li><a href="#"><em class="icon ni ni-repeat"></em><span>Debit Account</span></a>
                                                                </li>
                                                                <li><a href="#"><em class="icon ni ni-repeat"></em><span>Transaction</span></a>
                                                                </li>
                                                                <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset
                                                                            Pass</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-shield-off"></em><span>Reset
                                                                            2FA</span></a></li>
                                                                @if($user->status!="blocked" && $user->status!=null)
                                                                <li><a href="{{ url('dashboard/ublock') }}/{{$user->id}}"><em class="icon ni ni-na"></em><span>Suspend
                                                                            User</span></a></li>

                                                                @elseif($user->status=="blocked" && $user->status!=null)
                                                                <li><a href="{{ url('dashboard/unblock') }}/{{$user->id}}"><em class="icon ni ni-na"></em><span>UnSuspend
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