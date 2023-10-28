
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ asset('images/'.$settings->logo)}}">
    <title>2FA Authentication | BillionCycle</title>
    <link rel="stylesheet" href="{{asset('assets/assets/css/dashlite.css')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/assets/css/theme.css')}}">

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
                        <div class="brand-logo pb-4 text-center"><a href="{{url('/')}}" class="logo-link"><img
                                    class="logo-light logo-img logo-img-lg" src="{{asset('images/LOGO BC.png')}}"
                                    srcset="{{asset('images/LOGO BC.png')}} 2x" alt="logo"><img
                                    class="logo-dark logo-img logo-img-lg" src="{{asset('images/LOGO BC.png')}}"
                                    srcset="{{asset('images/LOGO BC.png')}} 2x" alt="logo-dark"></a></div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">2FA Authentication</h5>
                                        <div class="nk-block-des">
                                            <p>A 2FA authentication code has been sent to your email, kindly check your email and enter code below to continue.</p>
                                        </div>
                                    </div>
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                
                                <form class="form" method="POST" action="{{ route('2fa') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('2fa') ? ' has-error' : '' }}">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email">2FA</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            
                                            <input class="form-control form-control-lg" name="2fa" id="2fa" type="text" value="{{ old('2fa') }}" required autofocus
                                                placeholder="Enter the code you received here.">
                                        </div>
                                        @if ($errors->has('2fa'))
                                            <span class="help-block" style="color:red;">
                                                <strong>{{ $errors->first('2fa') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group"><button class="btn btn-lg btn-primary btn-block">Submit</button></div>
                                </form>

                                <div class="form-note-s2 text-center pt-4"> Are you stucked here? <a
                                        href="{{ route('login') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Repeat login</a></div>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>

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
                                        <li class="nav-item dropup"><a
                                                class="dropdown-toggle dropdown-indicator has-indicator nav-link"
                                                data-toggle="dropdown" data-offset="0,10"><span>English</span></a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <ul class="language-list">
                                                    <li><a href="#" class="language-item"><img
                                                                src="/demo3/images/flags/english.png" alt=""
                                                                class="language-flag"><span
                                                                class="language-name">English</span></a></li>
                                                    <li><a href="#" class="language-item"><img
                                                                src="/demo3/images/flags/spanish.png" alt=""
                                                                class="language-flag"><span
                                                                class="language-name">Español</span></a></li>
                                                    <li><a href="#" class="language-item"><img
                                                                src="/demo3/images/flags/french.png" alt=""
                                                                class="language-flag"><span
                                                                class="language-name">Français</span></a></li>
                                                    <li><a href="#" class="language-item"><img
                                                                src="/demo3/images/flags/turkey.png" alt=""
                                                                class="language-flag"><span
                                                                class="language-name">Türkçe</span></a></li>
                                                </ul>
                                            </div>
                                        </li>
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