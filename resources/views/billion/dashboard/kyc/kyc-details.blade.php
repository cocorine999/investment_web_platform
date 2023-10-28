@extends('billion.dashboard.include.header')

@section('title','KYC Documents')

@section("content")


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">KYCs / <strong class="text-primary small">{{ $user->l_name }} {{ $user->name }}</strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>Application ID: <span class="text-base">KID000844</span></li>
                                    <li>Submited At: <span class="text-base">18 Dec, 2019 01:02 PM</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-block-head-content"><a href="{{ route('kycs') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a><a href="{{ route('kycs') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a></div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="row gy-5">
                        <div class="col-lg-5">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">Application Info</h5>
                                    <p>Submission date, approve date, status etc.</p>
                                </div>
                            </div>
                            <div class="card card-bordered">
                                <ul class="data-list is-compact">
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Submitted By</div>
                                            <div class="data-value">Administrator</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Submitted At</div>
                                            <div class="data-value">18 Dec, 2019 01:02 PM</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Status</div>
                                            <div class="data-value">
                                                @if($user->account_verify == "Verified")
                                                <span class="badge badge-dim badge-sm badge-outline-success">Approved</span>
                                                @elseif($user->account_verify == "Rejected")
                                                <span class="badge badge-dim badge-sm badge-outline-danger">Rejected</span>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h5 class="nk-block-title title">Uploaded Documents</h5>
                                                <p>Here is user uploaded documents.</p>
                                            </div>
                                        </div>
                                        <div class="card card-bordered">
                                            <ul class="data-list is-compact">
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Document Type</div>
                                                        <div class="data-value">National ID Card</div>
                                                    </div>
                                                </li>
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Front Side</div>
                                                        <div class="data-value">National ID Card</div>
                                                    </div>
                                                </li>
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Back Side</div>
                                                        <div class="data-value">National ID Card</div>
                                                    </div>
                                                </li>
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Proof/Selfie</div>
                                                        <div class="data-value">National ID Card</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div> -->
                        </div>
                        <div class="col-lg-7">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">Applicant Information</h5>
                                    <p>Basic info, like name, phone, address, country etc.</p>
                                </div>
                            </div>
                            <div class="card card-bordered">
                                <ul class="data-list is-compact">
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">First Name</div>
                                            <div class="data-value">{{ $user->name }}</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Last Name</div>
                                            <div class="data-value">{{ $user->l_name }}</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Email Address</div>
                                            <div class="data-value">{{ $user->email }}</div>
                                        </div>
                                    </li>
                                    <li class="data-item">
                                        <div class="data-col">
                                            <div class="data-label">Phone Number</div>
                                            <div class="data-value"><em>{{ $user->phone_number }}</em></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block" style="padding-top: 5rem;">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title title">Uploaded Documents</h5>
                                <p>Here is user uploaded documents.</p>
                            </div>
                        </div>
                        <div class="card card-bordered">
                            <ul class="data-list is-compact">
                                <li class="data-item">
                                    <div class="data-col">
                                        <div class="data-label">Document Type</div>
                                        <div class="data-value">Preview</div>
                                    </div>
                                </li>

                                <li class="data-item">
                                    <div class="data-col">
                                        <div class="data-label">National ID Card</div>
                                        <div class="data-value">
                                            <a href="#showidcard" data-toggle="modal" class="popup">
                                                <em class="icon ni ni-eye"></em>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="data-item">
                                    <div class="data-col">
                                        <div class="data-label">Passport</div>
                                        <div class="data-value">
                                            <a href="#showpassport" data-toggle="modal" class="popup">
                                                <em class="icon ni ni-eye"></em>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="data-item">
                                    <div class="data-col">
                                        <div class="data-label">Birth Certificate</div>
                                        <div class="data-value text-right">
                                            <a href="#showbirthcertificate" data-toggle="modal" class="popup">
                                                <em class="icon ni ni-eye"></em>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="showidcard">
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

<div class="modal fade" tabindex="-1" role="dialog" id="showpassport">
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

<div class="modal fade" tabindex="-1" role="dialog" id="showbirthcertificate">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Birth Certicate</h5>
                <div class="tab-content">
                    <img src="{{$settings->site_address}}{{$settings->files_key}}/cloud/uploads/{{$user->birth_certificate}}" style="max-width:100%; height:auto;">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection