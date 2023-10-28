@extends('billion.dashboard.include.header')

@section('title','KYC Documents')

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
                            <div class="kyc-app wide-sm m-auto">
                                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                    <div class="nk-block-head-content text-center">
                                        <h2 class="nk-block-title fw-normal">KYC Verification</h2>
                                        <div class="nk-block-des">
                                            <p>To comply with regulation each participant will have to go through
                                                indentity verification (KYC/AML) to prevent fraud causes. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner card-inner-lg">
                                            <div class="nk-kyc-app p-sm-2 text-center">
                                                <div class="nk-kyc-app-icon"><em class="icon ni ni-files"></em></div>
                                                <div class="nk-kyc-app-text mx-auto">
                                                    <p class="lead">You have not submitted your necessary documents to
                                                        verify your identity. In order to withdraw, please
                                                        verify your identity.</p>
                                                </div>
                                                <div class="nk-kyc-app-action"><a href="{{route('kyc.form')}}"
                                                        class="btn btn-lg btn-primary">Click here to complete your
                                                        KYC</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center pt-4">
                                        <p>If you have any question, please contact our support team <a
                                                href="mailto:info@softnio.com">support@billioncycle.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection