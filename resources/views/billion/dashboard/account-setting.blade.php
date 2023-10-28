@extends('billion.dashboard.include.header')

@section('title','Account Security')

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
                        <div class="nk-block-head-sub"><span>My Profile</span></div>
                        <h2 class="nk-block-title fw-normal">Account Info</h2>
                        <div class="nk-block-des">
                            <p>You have full control to manage your own account setting. <span class="text-primary"><em class="icon ni ni-info"></em></span></p>
                        </div>
                    </div>
                </div>
                @include("billion.dashboard.include.profile_header")
                <div class="nk-block">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Security Settings</h5>
                            <div class="nk-block-des">
                                <p>These settings are helps you keep your account secure.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                    <div class="nk-block-text">
                                        <h6>Save my Activity Logs</h6>
                                        <p>You can save your all activity logs including unusual activity detected.</p>
                                    </div>
                                    <div class="nk-block-actions">
                                        <ul class="align-center gx-3">
                                            <li class="order-md-last">
                                                <div class="custom-control custom-switch mr-n2 checked">
                                                    <form action="{{ route('user_logs_settings',Auth::id()) }}" id="settingslogs">
                                                        <input type="checkbox" class="custom-control-input" {{Auth::user()->savelogs == 1 ? 'checked' : '' }} id="activity-log" onclick="event.preventDefault(); document.getElementById('settingslogs').submit();">
                                                        <label class="custom-control-label" for="activity-log"></label>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner">
                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                    <div class="nk-block-text">
                                        <h6>Change Password</h6>
                                        <p>Set a unique password to protect your account.</p>
                                    </div>
                                    <div class="nk-block-actions flex-shrink-sm-0">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                            <li class="order-md-last"><a href="#" data-toggle="modal" data-target="#updatepassword" class="btn btn-primary">Change Password</a></li><!-- <li><em class="text-soft text-date fs-12px">Last changed: <span>Oct 2, 2019</span></em></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner">
                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                    <div class="nk-block-text">
                                        <?php $enable_2fa = Auth::user()->enable_2fa; ?>
                                        <h6>2FA Authentication
                                            @if($enable_2fa == 1)
                                            <span class="badge badge-success">Enabled</span>
                                            @else
                                            <span class="badge badge-danger">Disable</span>
                                            @endif
                                        </h6>
                                        <p>Secure your account with 2FA security. When it is activated you will need to enter not only your password, but also a special code using app. You can receive this code by in mobile app. </p>
                                    </div>
                                    <div class="nk-block-actions">
                                        <a href="{{ route('user_2FA_settings',Auth::id()) }}" class="btn btn-primary">{{ $enable_2fa == 1 ? "Disable" : "Enable" }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $userlogs = \App\userlogs::latest()->where('user', Auth::id())->limit(6)->get(); ?>
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-head-content">
                            <div class="nk-block-title-group">
                                <h6 class="nk-block-title title">Recent Activity</h6><a href="{{ route('logs_activities') }}" class="link">See full log</a>
                            </div>
                            <div class="nk-block-des">
                                <p>This information about the last login activity on your account.</p>
                            </div>
                        </div>
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
                                @foreach($userlogs as $userlog)
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
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="updatepassword">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Password</h5>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">

                        <form style="padding:3px;" id="update_form" method="POST" action="{{route('update_password')}}">
                            {{csrf_field()}}
                            <div class="row gy-4">

                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }}">
                                        <label class="form-label" for="old_password">Old Password</label>
                                        <input type="password" class="form-control form-control-lg" id="old_password" name="old_password" value="{{old('old_password')}}" placeholder="Enter your actual Password">

                                        @if ($errors->has('old_password'))
                                        <span class="help-block" style="color:red;">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="form-group"><label class="form-label" for="password">New Password</label><input type="password" class="form-control form-control-lg" name="password" id="password" value="{{old('password')}}" placeholder="Enter your new Password"></div>
                                </div>

                                <div class="col-md-12 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <div class="form-group"><label class="form-label" for="password_confirmation">New Password</label><input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Enter your new Password"></div>
                                </div>

                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="current_password" value="{{Auth::user()->password}}">


                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li><a href="#" class="btn btn-lg btn-primary" onclick="event.preventDefault(); document.getElementById('update_form').submit();">Update Password</a></li>
                                        <li><a href="#" data-dismiss="modal" class="link link-light">Cancel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection