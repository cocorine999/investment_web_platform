<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ asset('images/'.$settings->logo)}}">
    <title>Verify Account | BillionCycle</title>
    <link rel="stylesheet" href="{{asset('assets/assets/css/dashlite.css')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/assets/css/theme.css')}}">

</head>

<body class="nk-body npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body">
                        @if(Session::has('message'))

                        <div class="example-alert" style="margin-bottom:30px;">
                            <div class="alert alert-fill alert-warning alert-icon alert-dismissible">
                                <em class="icon ni ni-alert-circle"></em> {{ Session::get('message') }} <button class="close" data-dismiss="alert"></button>
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

                        @if(count($errors) > 0)
                        <div class="example-alert" style="margin-bottom:30px;">
                            <div class="alert alert-fill alert-danger alert-icon alert-dismissible">
                                <button class="close" data-dismiss="alert"></button>
                                @foreach ($errors->all() as $error)
                                <p><em class="icon ni ni-cross-circle"></em> {{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="brand-logo pb-5">
                            <a href="{{ route('home') }}" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="{{asset('images/LOGO BC.png')}}" srcset="{{asset('images/LOGO BC.png')}} 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{asset('images/LOGO BC.png')}}" srcset="{{asset('images/LOGO BC.png')}} 2x" alt="logo-dark">
                            </a>
                        </div>

                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Thank you for your registered</h4>
                                <div class="nk-block-des text-success">
                                    <p>A verification link has just been sent to your email inbox.</p>
                                </div>
                                
                                <div>Before continuing, please check your email box for the verification link</div>
                                <div style="margin-top: 5px; margin-bottom: 10px;">If you did not receive the email,</div>

                                <form class="d-inline" method="POST" action="{{ route('resend.verify_account.email.link') }}" id ="resend_link">
                                    {{csrf_field()}}
                                    <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Session::get('mail') ?? '' }}" required autocomplete="email">
                                    
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('resend_link').submit();" style="background-color:#6576ff;border-radius:4px;color:#ffffff;display:inline-block;font-size:13px;font-weight:600;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 30px">Click here to receive another email</a>
                                </form>
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
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>

    <script src="{{asset('assets/assets/js/bundle.js')}}"></script>
    <script src="{{asset('assets/assets/js/scripts.js')}}"></script>
</body>

</html>