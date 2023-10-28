
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    
    <meta charset="UTF-8">
    <meta name="description" content="Billioncycle {{$settings->description}}">
    <meta name="keywords" content="Billioncycle, Investissement, cryptomonnaies, affiliations, management">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | BillionCycle</title>
    <link rel="stylesheet" href="{{asset('assets/assets/css/dashlite.css')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/assets/css/theme.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('images/'.$settings->logo)}}">

</head>

<body class="nk-body npc-default pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            
            <div class="nk-wrap nk-wrap-nosidebar">
                
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    @if(Session::has('message'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-warning"></i> {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($rmessage!="")
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-ok"></i> {{ $rmessage }}
                            </div>
                        </div>
                    </div>
                    @endif
                        <div class="brand-logo pb-4 text-center"><a href="{{url('/')}}" class="logo-link"><img
                                    class="logo-light logo-img logo-img-lg" src="{{asset('images/LOGO BC.png')}}"
                                    srcset="{{asset('images/LOGO BC.png')}} 2x" alt="logo"><img
                                    class="logo-dark logo-img logo-img-lg" src="{{asset('images/LOGO BC.png')}}"
                                    srcset="{{asset('images/LOGO BC.png')}} 2x" alt="logo-dark"></a></div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign-In</h4>
                                        <div class="nk-block-des">
                                            <p>Log In your dashboard.</p>
                                        </div>
                                    </div>
                                </div>
                                <form class="form" method="POST" action="{{ route('login') }}">
                                    {{csrf_field()}}	
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email">E-Mail Address</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input class="form-control form-control-lg" name="email" id="email" type="email" value="{{ old('email') }}" required
                                                placeholder="Enter your email address">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block" style="color:red;">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group"><label class="form-label"
                                                for="password">Password</label><a class="link link-primary link-sm"
                                                href="{{route('password.request')}}">Forgot Password?</a></div>
                                        <div class="form-control-wrap">                                            
                                            <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block" style="color:red;">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group"><button class="btn btn-lg btn-primary btn-block">Sign  in</button></div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> New on our platform? <a
                                        href="{{ route('register') }}">Create an account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item"><a class="nav-link" href="#">Terms & Condition</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft"> &copy; 2014 &nbsp;<strong> BillionCycle. &nbsp;</strong> All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/assets/js/bundle.js')}}"></script>
    <script src="{{asset('assets/assets/js/scripts.js')}}"></script>
</body>
</html>