@extends('billion.dashboard.include.header')

@section('title','Login Activities')

@section("content")


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a class="back-to" href="{{ route('profile') }}"><em class="icon ni ni-arrow-left"></em><span>My Profile</span></a></div>
                        <h2 class="nk-block-title fw-normal">Login Activity</h2>
                        <div class="nk-block-des">
                            <p>Here is your last 20 login activities log. <span class="text-soft"><em class="icon ni ni-info"></em></span></p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="nk-block-title-group mb-3">
                        <h6 class="nk-block-title title">Activity on your account</h6>
                        <!-- <a href="#" class="link link-danger">Clear log</a> -->
                    </div>
                    <div class="card card-bordered">
                        <table class="table table-ulogs">
                            <thead class="thead-light">
                                <tr>
                                    <th class="tb-col-os"><span class="overline-title">Browser <span class="d-sm-none">/ IP</span></span></th>
                                    <th class="tb-col-ip"><span class="overline-title">IP</span></th>
                                    <th class="tb-col-time"><span class="overline-title">Time</span></th>
                                    <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($logs_activities as $userlog)
                                <tr>
                                    <td class="tb-col-os">{{ $userlog->browser ?? "Not Detected"  }}</td>
                                    <td class="tb-col-ip"><span class="sub-text">{{ $userlog->ip }}</span></td>
                                    <td class="tb-col-time"><span class="sub-text">{{ $userlog->created_at->format('M d, Y') != \Carbon\Carbon::today()->format('M d, Y') ? $userlog->created_at->format('M d, Y') :""  }} <span class="d-none d-sm-inline-block">{{ $userlog->created_at->format('h:m A') }}</span></span></td>
                                    <td class="tb-col-action">
                                        @if($userlog->created_at->format('M d, Y') != \Carbon\Carbon::today()->format('M d, Y'))
                                        <a href="#" class="link-cross mr-sm-n1"><em class="icon ni ni-cross"></em></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection