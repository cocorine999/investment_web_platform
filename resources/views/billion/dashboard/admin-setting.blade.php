@extends('billion.dashboard.include.header')

@section('title','Website Settings')

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
                                    <div class="nk-block-head-sub"><span>Settings</span></div>
                                    <h2 class="nk-block-title fw-normal">Settings of website</h2>
                                    <div class="nk-block-des">
                                        <p>You have full control to manage your website settings. <span
                                                class="text-primary"><em class="icon ni ni-info"></em></span></p>
                                    </div>
                                </div>
                            </div>
                            @include("billion.dashboard.include.profile_header")
                            <div class="nk-block">
                                    <div class="card">
                                        <div class="card-inner">
                                            <h5 class="card-title">Web Store Setting</h5>
                                            <p>Here is your basic store setting of your website.</p>
                                            <form action="#" class="gy-3 form-settings">
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="site-name">Store Name</label>
                                                            <span class="form-note">Specify the name of your website.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="site-name" value="My Store">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="site-email">Site Email</label>
                                                            <span class="form-note">Specify the email address of your website.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="site-email" value="info@softnio.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="site-copyright">Site Copyright</label>
                                                            <span class="form-note">Copyright information of your website.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="site-copyright" value="© 2019, DashLite. All Rights Reserved.">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label">Allow Registration</label>
                                                            <span class="form-note">Enable or disable registration from site.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <ul class="custom-control-group g-3 align-center flex-wrap">
                                                            <li>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" checked="" name="reg-public" id="reg-enable">
                                                                    <label class="custom-control-label" for="reg-enable">Enable</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="reg-public" id="reg-disable">
                                                                    <label class="custom-control-label" for="reg-disable">Disable</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" class="custom-control-input" name="reg-public" id="reg-request">
                                                                    <label class="custom-control-label" for="reg-request">On Request</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label">Main Website</label>
                                                            <span class="form-note">Specify the URL if your main website is external.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" name="site-url" value="https://www.softnio.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="site-off">Maintanance Mode</label>
                                                            <span class="form-note">Enable to make website make offline.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" name="reg-public" id="site-off">
                                                                <label class="custom-control-label" for="site-off">Offline</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-3">
                                                    <div class="col-lg-7 offset-lg-5">
                                                        <div class="form-group mt-2">
                                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- .card-inner -->
                                    </div><!-- .card -->
                                </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection