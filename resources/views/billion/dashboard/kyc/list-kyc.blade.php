@extends('billion.dashboard.include.header')

@section('title','KYC Documents')

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
                            <h3 class="nk-block-title page-title">KYC Documents</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total <span class="text-base">{{count($users)}}</span> KYC documents.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content"><a href="#" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-download-cloud"></em><span>Export</span></a><a href="#" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-download-cloud"></em></a></div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner position-relative">
                                <div class="card-title-group">
                                    <div class="card-tools">
                                        <div class="form-inline flex-nowrap gx-3">
                                            <div class="form-wrap w-150px"><select class="form-select form-select-sm" data-search="off" data-placeholder="Bulk Action">
                                                    <option value="">Bulk Action</option>
                                                    <option value="email">Send Email</option>
                                                    <option value="group">Change Group</option>
                                                    <option value="suspend">Suspend User</option>
                                                    <option value="delete">Delete User</option>
                                                </select></div>
                                            <div class="btn-wrap"><span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span><span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-tools mr-n1">
                                        <ul class="btn-toolbar gx-1">
                                            <li><a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a></li>
                                            <li class="btn-toolbar-sep"></li>
                                            <li>
                                                <div class="dropdown"><a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                        <div class="dot dot-primary"></div><em class="icon ni ni-filter-alt"></em>
                                                    </a>
                                                    <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                        <div class="dropdown-head"><span class="sub-title dropdown-title">Filter
                                                                Document</span></div>
                                                        <div class="dropdown-body dropdown-body-rg">
                                                            <div class="row gx-6 gy-3">
                                                                <div class="col-6">
                                                                    <div class="form-group"><label class="overline-title overline-title-alt">Doc
                                                                            Type</label><select class="form-select form-select-sm">
                                                                            <option value="any">Any Type
                                                                            </option>
                                                                            <option value="nidcard">Nidcard
                                                                            </option>
                                                                            <option value="passport">
                                                                                Passport</option>
                                                                            <option value="driving">Driving
                                                                            </option>
                                                                        </select></div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group"><label class="overline-title overline-title-alt">Status</label><select class="form-select form-select-sm">
                                                                            <option value="any">Any Status
                                                                            </option>
                                                                            <option value="approved">
                                                                                Approved</option>
                                                                            <option value="pending">Pending
                                                                            </option>
                                                                            <option value="suspend">Rejected
                                                                            </option>
                                                                            <option value="deleted">Deleted
                                                                            </option>
                                                                        </select></div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group"><button type="button" class="btn btn-secondary">Filter</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-foot between"><a class="clickable" href="#">Reset Filter</a>
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
                                <div class="card-search search-wrap" data-search="search">
                                    <div class="card-body">
                                        <div class="search-content"><a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a><input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or id"><button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button></div>
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
                                        <div class="nk-tb-col"><span>User</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Documents</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span>Submitted</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Status</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span>Checked By</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools">&nbsp;</div>
                                    </div>


                                    @foreach ($users as $user)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid1"><label class="custom-control-label" for="uid1"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary"><span>{{$user->name[0]}}{{$user->l_name[0]}}</span></div>
                                                <div class="user-info"><span class="tb-lead"> {{$user->name}}{{$user->l_name}} <span class="dot dot-success d-md-none ml-1"></span></span><span>{{$user->email}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <ul class="list-inline list-download">
                                                <li>National ID <a href="#showdocument{{$user->id}}" data-toggle="modal" class="popup"><em class="icon ni ni-eye"></em></a></li>
                                                <li>Passport<a href="#showpassport{{$user->id}}" data-toggle="modal" class="popup"><em class="icon ni ni-eye"></em></a></li>
                                                <li>Birth Certificate<a href="#showBirthCertificate{{$user->id}}" data-toggle="modal" class="popup"><em class="icon ni ni-eye"></em></a></li>
                                            </ul>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg"><span class="tb-date">18 Dec, 2019
                                                01:02 PM</span></div>
                                        @if($user->account_verify == "Verified")
                                        <div class="nk-tb-col tb-col-md"><span class="tb-status text-success">{{$user->account_verify}}</span><span data-toggle="tooltip" title="Approved at 18 Dec, 2019 01:02 PM" data-placement="top"><em class="icon ni ni-info"></em></span>
                                        </div>
                                        @elseif($user->account_verify == "Rejected")
                                        <div class="nk-tb-col tb-col-md"><span class="tb-status text-danger">{{$user->account_verify}}</span><span data-toggle="tooltip" title="Approved at 18 Dec, 2019 01:02 PM" data-placement="top"><em class="icon ni ni-info"></em></span>
                                        </div>
                                        @else
                                        <div class="nk-tb-col tb-col-md"><span class="tb-status text-warning">{{$user->account_verify}}</span><span data-toggle="tooltip" title="Approved at 18 Dec, 2019 01:02 PM" data-placement="top"><em class="icon ni ni-info"></em></span>
                                        </div>
                                        @endif
                                        <div class="nk-tb-col tb-col-lg">
                                            <div class="user-card">
                                                <div class="user-avatar user-avatar-xs bg-orange-dim">
                                                    <span>JS</span>
                                                </div>
                                                <div class="user-name"><span class="tb-lead">Administrator</span></div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-hidden"><a href="{{route ('detail_kyc',$user->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Quick View"><em class="icon ni ni-eye-fill"></em></a></li>
                                                <li class="nk-tb-action-hidden"><a href="{{ url('dashboard/acceptkyc') }}/{{$user->id}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Approved"><em class="icon ni ni-check-fill-c"></em></a></li>
                                                <li>
                                                    <div class="drodown"><a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{route ('detail_kyc',$user->id) }}"><em class="icon ni ni-focus"></em><span>Quick
                                                                            View</span></a></li>
                                                                <li><a href="{{route ('detail_kyc',$user->id) }}"><em class="icon ni ni-eye"></em><span>View
                                                                            Details</span></a></li>
                                                                <li><a href="{{ route('user_details',$user->id) }}"><em class="icon ni ni-user"></em><span>View
                                                                            Profile</span></a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="{{ url('dashboard/acceptkyc') }}/{{$user->id}}"><em class="icon ni ni-check-round"></em><span>Approved</span></a>
                                                                </li>
                                                                <li><a href="{{ url('dashboard/rejectkyc') }}/{{$user->id}}"><em class="icon ni ni-na"></em><span>Rejected</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="modal fade" tabindex="-1" role="dialog" id="showdocument{{$user->id}}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                <div class="modal-body modal-body-lg">
                                                    <h5 class="title">National ID</h5>
                                                    <div class="tab-content">
                                                        <img src="{{$settings->site_address}}{{$settings->files_key}}/cloud/uploads/{{$user->id_card}}" style="max-width:100%; height:auto;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="modal fade" tabindex="-1" role="dialog" id="showBirthCertificate{{$user->id}}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                <div class="modal-body modal-body-lg">
                                                    <h5 class="title">Birth Certificate</h5>
                                                    <div class="tab-content">
                                                        <img src="{{$settings->site_address}}{{$settings->files_key}}/cloud/uploads/{{$user->birth_certificate}}" style="max-width:100%; height:auto;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" tabindex="-1" role="dialog" id="showpassport{{$user->id}}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                <div class="modal-body modal-body-lg">
                                                    <h5 class="title">Passport</h5>
                                                    <div class="tab-content">
                                                        <img src="{{$settings->site_address}}{{$settings->files_key}}/cloud/uploads/{{$user->passport}}" style="max-width:100%; height:auto;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-inner">
                                <ul class="pagination justify-content-center justify-content-md-start">
                                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection