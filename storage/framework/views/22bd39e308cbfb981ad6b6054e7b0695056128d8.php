<!DOCTYPE html>
<html lang="zxx" class="js">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="Billioncycle <?php echo e($settings->description); ?>">
    <meta name="keywords" content="Billioncycle, Investissement, cryptomonnaies, affiliations, management">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?> | BillionCycle</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/assets/css/dashlite.css')); ?>">
    <link id="skin-default" rel="stylesheet" href="<?php echo e(asset('assets/assets/css/theme.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo e(asset('images/'.$settings->logo)); ?>">
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body class="nk-body npc-invest bg-lighter ">
    <!--PayPal-->
    <script>
        // Add your client ID and secret
        var PAYPAL_CLIENT = '<?php echo e($settings->pp_ci); ?>';
        var PAYPAL_SECRET = '<?php echo e($settings->pp_cs); ?>';

        // Point your server to the PayPal API
        var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
    </script>

    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo e($settings->pp_ci); ?>">
    </script>

    <!--/PayPal-->

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    {<?php echo $settings->tawk_to; ?>}

    </script>

    <?php $notifications = \App\notifications::latest()->where('user_id', Auth::id())->where('read', 0)->where('created_at', '>=', \Carbon\Carbon::today())->get(); ?>


    <div class="nk-app-root">
        <div class="nk-wrap ">
            <div class="nk-header nk-header-fluid is-theme  is-regular">
                <div class="container-xl wide-xl">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger mr-sm-2 d-lg-none"><a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a></div>

                        <div class="nk-header-brand"><a href="<?php echo e(url('/dashboard')); ?>" class="logo-link"><img class="logo-light logo-img" src="<?php echo e(asset('images/LOGO BC BLANC.png')); ?>" srcset="<?php echo e(asset('images/LOGO BC BLANC.png')); ?> 2x" alt="logo"><img class="logo-dark logo-img" src="<?php echo e(asset('images/LOGO BC BLANC.png')); ?>" srcset="<?php echo e(asset('images/LOGO BC BLANC.png')); ?> 2x" alt="logo-dark"></a></div>

                        <div class="nk-header-menu" data-content="headerNav">
                            <div class="nk-header-mobile">

                                <div class="nk-header-brand"><a href="<?php echo e(url('/dashboard')); ?>" class="logo-link"><img class="logo-light logo-img" src="<?php echo e(asset('images/LOGO BC.png')); ?>" srcset="<?php echo e(asset('images/LOGO BC.png')); ?> 2x" alt="logo"><img class="logo-dark logo-img" src="<?php echo e(asset('images/LOGO BC.png')); ?>" srcset="<?php echo e(asset('images/LOGO BC.png')); ?> 2x" alt="logo-dark"></a></div>

                                <div class="nk-menu-trigger mr-n2"><a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a></div>
                            </div>
                            <ul class="nk-menu nk-menu-main ui-s2">
                                <li class="nk-menu-item"><a href="<?php echo e(route('dashboard')); ?>" class="nk-menu-link"><span class="nk-menu-text">Overview</span></a></li>
                                <li class="nk-menu-item"><a href="<?php echo e(url('/dashboard/myplans')); ?>" class="nk-menu-link"><span class="nk-menu-text">Plans</span></a></li>
                                <li class="nk-menu-item"><a href="<?php echo e(url('/dashboard/plans')); ?>" class="nk-menu-link"><span class="nk-menu-text">Invest</span></a></li>
                                <li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Transactions</span></a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item"><a href="<?php echo e(route('deposits')); ?>" class="nk-menu-link"><span class="nk-menu-text">Deposits</span></a></li>
                                        <li class="nk-menu-item"><a href="<?php echo e(url('/dashboard/withdrawals')); ?>" class="nk-menu-link"><span class="nk-menu-text">Withdrawals</span></a></li>
                                        <li class="nk-menu-item"><a href="<?php echo e(route('transactions')); ?>" class="nk-menu-link"><span class="nk-menu-text">Transactions</span></a></li>
                                    </ul>
                                </li>
                                <?php if(Auth::user()->type =='1' or Auth::user()->type =='2'): ?>
                                <!-- <li class="nk-menu-item"><a href="<?php echo e(url('/dashboard/projects')); ?>" class="nk-menu-link"><span
                                            class="nk-menu-text">Projects</span></a></li> -->
                                <?php endif; ?>
                                <!-- 
                                <?php if(Auth::user()->type =='0'): ?>
                                <li class="nk-menu-item"><a href="<?php echo e(route('support')); ?>" class="nk-menu-link"><span class="nk-menu-text">Support</span></a></li>
                                <?php endif; ?> -->
                                <?php if(Auth::user()->type !='0'): ?>
                                <li class="nk-menu-item has-sub"><a href="#" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">Manage</span></a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item"><a href="<?php echo e(route('manageusers')); ?>" class="nk-menu-link"><span class="nk-menu-text">Users</span></a></li>
                                        <li class="nk-menu-item"><a href="<?php echo e(route('refer-users')); ?>" class="nk-menu-link"><span class="nk-menu-text">Refer Users</span></a></li>
                                        <li class="nk-menu-item"><a href="<?php echo e(route('kycs')); ?>" class="nk-menu-link"><span class="nk-menu-text">List of KYC</span></a></li>
                                        <!-- <?php if(Auth::user()->type =='1'): ?>
                                                <li class="nk-menu-item"><a href="<?php echo e(route('agents')); ?>"
                                                    class="nk-menu-link"><span class="nk-menu-text">Agents</span></a></li>
                                                    <?php endif; ?> -->
                                    </ul>
                                </li>
                                <?php endif; ?>
                                <?php if(Auth::user()->type =='0'): ?>
                                <li class="nk-menu-item"><a href="<?php echo e(route('refer-users')); ?>" class="nk-menu-link"><span class="nk-menu-text">Refer users</span></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">
                                <li class="dropdown notification-dropdown"><a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">

                                        <?php if(count($notifications)>0): ?>
                                        <div class="icon-status icon-status-info">
                                            <em class="icon ni ni-bell"></em>
                                        </div>
                                        <?php else: ?>
                                        <div class="">
                                            <em class="icon ni ni-bell"></em>
                                        </div>
                                        <?php endif; ?>
                                    </a>
                                    <?php if(count($notifications)>0): ?>
                                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                        <div class="dropdown-head"><span class="sub-title nk-dropdown-title">Notifications</span><a href="<?php echo e(route('makeNotificationHasRead')); ?>">Mark
                                                All as Read</a></div>
                                        <div class="dropdown-body">
                                            <div class="nk-notification">
                                                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="nk-notification-item dropdown-inner">
                                                    <div class="nk-notification-icon">
                                                        <?php if(str_contains($notification->motif,"Deposit")): ?>
                                                        <em class="icon icon-circle bg-success-dim ni ni-curve-up-right"></em>
                                                        <?php elseif(str_contains($notification->motif,"Withdrawal Request")): ?>
                                                        <em class="icon icon-circle bg-danger-dim ni ni-curve-down-left"></em>
                                                        <?php else: ?>
                                                        <em class="icon icon-circle bg-info-dim ni ni-curve-up-right"></em>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text">
                                                            <span><?php echo e(str_limit($notification->message,30)); ?></span>
                                                        </div>
                                                        <div class="nk-notification-time"><?php echo e($notification->created_at->diffForHumans()); ?></div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="dropdown-foot center"><a href="<?php echo e(route('notifications')); ?>">View All</a></div>
                                    </div>
                                    <?php endif; ?>
                                </li>
                                <li class="dropdown user-dropdown order-sm-first"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm"><em class="icon ni ni-user-alt"></em></div>
                                            <div class="user-info d-none d-xl-block">
                                                <div class="user-status">
                                                    <?php if(Auth::user()->type!='0'): ?>
                                                    <div class="user-info d-none d-xl-block">
                                                        <div class="user-status">
                                                            Administrator
                                                        </div>
                                                    </div>
                                                    <?php elseif(Auth::user()->account_verify=='Verified'): ?>
                                                    Account verified
                                                    <?php else: ?>
                                                    <div class="user-warning d-none d-xl-block">
                                                        <div class="user-status" style="color:red;">
                                                            Verify Account
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>

                                                </div>
                                                <div class="user-name dropdown-indicator"><?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->l_name); ?></div>
                                            </div>
                                        </div>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-light">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar"><span><?php echo e(Auth::user()->name[0]); ?><?php echo e(Auth::user()->lname[0]); ?></span></div>
                                                <div class="user-info"><span class="lead-text"><?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->l_name); ?>

                                                    </span><span class="sub-text"><?php echo e(Auth::user()->email); ?></span>
                                                </div>
                                                <div class="user-action"><a class="btn btn-icon mr-n2" href="<?php echo e(route('profile')); ?>"><em class="icon ni ni-setting"></em></a></div>
                                            </div>
                                        </div>
                                        <div class="dropdown-inner user-account-info">
                                            <h6 class="overline-title-alt">Account Balance</h6>
                                            <div class="user-balance"> <?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?> <small class="currency currency-usd">USD</small></div>
                                            <!-- 
                                            <div class="user-balance-sub">Locked <span>15,495.39 <span
                                                        class="currency currency-usd">USD</span></span></div> -->

                                            <a href="<?php echo e(route('withdrawal_form')); ?>" class="link"><span>Withdraw Balance</span> <em class="icon ni ni-wallet-out"></em></a>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="<?php echo e(route('profile')); ?>">
                                                        <em class="icon ni ni-user-alt"></em>
                                                        <span>View Profile</span></a></li>
                                                <?php if(Auth::user()->type !='1'): ?>
                                                <?php if(Auth::user()->account_verify!='Verified'): ?>
                                                <li><a href="<?php echo e(route('welcome.kyc')); ?>"><em class="icon ni ni-shield-off"></em><span>Verify Account</span></a></li>
                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if(Auth::user()->type =='0' ): ?>
                                                <li>
                                                    <a href="<?php echo e(route('acountdetails')); ?>">
                                                        <em class="icon ni ni-user-alt"></em>
                                                        <span>Connect your Account</span>
                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                                <li><a href="<?php echo e(route('account_security')); ?>"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                                <li><a href="<?php echo e(route('logs_activities')); ?>"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><em class="icon ni ni-signout"></em><span>Sign
                                                            out</span></a></li>

                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                    <?php echo e(csrf_field()); ?>

                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <?php echo $__env->yieldContent("content"); ?>
            <div class="nk-footer nk-footer-fluid bg-lighter">
                <div class="container-xl">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright">
                            &copy; Copyright 2014 &nbsp;<strong> <a href="<?php echo e(route('home')); ?>"><?php echo e($settings->site_name); ?></a> &nbsp;</strong> All Rights Reserved.
                        </div>
                        <div class="nk-footer-links">
                            <ul class="nav nav-sm">
                                <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="invest-plan">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body modal-body-md text-center">
                    <div class="nk-modal">
                        <h4 class="nk-modal-title">Confirm Your Payment</h4>
                        <div class="nk-modal-text">
                            <p>To confirm your payment of <strong>$251.25 (0.0054 BTC)</strong> on this order #93033939
                                using your <strong>NioWallet</strong>. Please enter your Wallet Pin code in order
                                complete the payment or cancel.</p>
                        </div>
                        <div class="nk-modal-form">
                            <div class="form-group"><input type="password" class="form-control form-control-password-big text-center"></div>
                        </div>
                        <div class="nk-modal-action"><a href="#" class="btn btn-lg btn-mw btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#confirm-invest">Confirm
                                Payment</a>
                            <div class="sub-text sub-text-alt mt-3 mb-4">This transaction will appear on your wallet
                                statement as Invest * SILVER.</div><a href="#" class="link link-soft" data-dismiss="modal">Cancel and return</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="confirm-invest">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content"><a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal"><em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
                        <h4 class="nk-modal-title">Successfully sent payment!</h4>
                        <div class="nk-modal-text">
                            <p class="sub-text">You have successfully order the Investment Plan of ‘Silver’ with amount
                                of <strong>$250.00</strong> using your <strong>NioWallet</strong>.</p>
                        </div>
                        <div class="nk-modal-action-lg">
                            <ul class="btn-group flex-wrap justify-center g-4">
                                <li><a href="/demo6/invest/invest.html" class="btn btn-lg btn-mw btn-primary">More
                                        Invest</a></li>
                                <li><a href="<?php echo e(route('investmentdetails')); ?>" class="btn btn-lg btn-mw btn-dim btn-primary"><em class="icon ni ni-reports"></em><span>See the plan</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p>Earn upto $25 for each friend your refer! <a href="#">Invite friends</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="manage_users">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title" id="modal_title"></h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <form id="userdata">
                            <div class="row gy-4">
                            <input type="hidden" class="form-control form-control-lg" id="user_id" name="user_id">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input type="text" class="form-control form-control-lg" id="last_name" name="last_name" value="<?php echo e($user->last_name ?? old('last_name')); ?>" placeholder="Enter your last name">
                                        <small class="help-block" style="color:red; font-size:small"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input type="text" class="form-control form-control-lg" id="first_name" name="first_name" value="<?php echo e($user->first_name ?? old('first_name')); ?>" placeholder="Enter your first name">
                                        <small class="help-block" style="color:red; font-size:small"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="sex">Gender</label>
                                        <select class="form-select" id="sex" name="sex" data-ui="lg" data-select2-id="sex" tabindex="-1" aria-hidden="true">
                                            <option>Select your gender</option>
                                            <option value="female">Female</option>
                                            <option value="male" >Male</option>
                                        <small class="help-block" style="color:red; font-size:small"></small>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" id="email_section">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input type="email" class="form-control form-control-lg" id="email" name="email" value="<?php echo e($user->email ?? old('email')); ?>" placeholder="Enter your email address">
                                        <small class="help-block" style="color:red; font-size:small"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Phone Number</label>
                                        <input type="number" class="form-control form-control-lg" id="phone_number" name="phone_number" value="<?php echo e($user->phone_number ?? old('phone_number')); ?>" placeholder=" Enter your phone number">
                                        <small class="help-block" style="color:red; font-size:small"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">Date of Birth</label>
                                        <input type="text" class="form-control form-control-lg date-picker" id="birth_date" name="birth_date" value="<?php echo e(\Carbon\Carbon::parse($user->birth_date)->format('m/d/Y')  ?? old('birth_date')); ?>" placeholder="Enter your birth date">
                                        <small class="help-block" style="color:red; font-size:small"></small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" class="form-control form-control-lg" id="address" name="address" value="<?php echo e($user->adress ?? old('adress')); ?>" placeholder="Enter your address">
                                        <small class="help-block" style="color:red; font-size:small"></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-st">State</label>
                                        <input type="text" class="form-control form-control-lg" id="city" name="city" value="<?php echo e($user->city ?? old('city')); ?>" placeholder="Enter your state city">
                                        <small class="help-block" style="color:red; font-size:small"></small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-county">Country</label>
                                        <select class="form-select select2-hidden-accessible" id="country" name="country" data-ui="lg" data-select2-id="address-county" tabindex="-1" aria-hidden="true">

                                        <small class="help-block" style="color:red; font-size:small"></small>

                                            <option>Select your country</option>
                                            <option value="Afganistan" <?php echo e($user->country =="Afganistan" ? 'selected' : ''); ?>>Afghanistan</option>
                                            <option <?php echo e($user->country =="Albania" ? 'selected' : ''); ?> value="Albania">Albania</option>
                                            <option <?php echo e($user->country =="Algeria" ? 'selected' : ''); ?> value="Algeria">Algeria</option>
                                            <option <?php echo e($user->country =="American Samoa" ? 'selected' : ''); ?> value="American Samoa">American Samoa</option>
                                            <option <?php echo e($user->country =="Andorra" ? 'selected' : ''); ?> value="Andorra">Andorra</option>
                                            <option <?php echo e($user->country =="Angola" ? 'selected' : ''); ?> value="Angola">Angola</option>
                                            <option <?php echo e($user->country =="Anguilla" ? 'selected' : ''); ?> value="Anguilla">Anguilla</option>
                                            <option <?php echo e($user->country =="Antigua & Barbuda" ? 'selected' : ''); ?> value="Antigua & Barbuda">Antigua & Barbuda</option>
                                            <option <?php echo e($user->country =="Argentina" ? 'selected' : ''); ?> value="Argentina">Argentina</option>
                                            <option <?php echo e($user->country =="Armenia" ? 'selected' : ''); ?> value="Armenia">Armenia</option>
                                            <option <?php echo e($user->country =="Aruba" ? 'selected' : ''); ?> value="Aruba">Aruba</option>
                                            <option <?php echo e($user->country =="Australia" ? 'selected' : ''); ?> value="Australia">Australia</option>
                                            <option <?php echo e($user->country =="Austria" ? 'selected' : ''); ?> value="Austria">Austria</option>
                                            <option <?php echo e($user->country =="Azerbaijan" ? 'selected' : ''); ?> value="Azerbaijan">Azerbaijan</option>
                                            <option <?php echo e($user->country =="Bahamas" ? 'selected' : ''); ?> value="Bahamas">Bahamas</option>
                                            <option <?php echo e($user->country =="Bahrain" ? 'selected' : ''); ?> value="Bahrain">Bahrain</option>
                                            <option <?php echo e($user->country =="Bangladesh" ? 'selected' : ''); ?> value="Bangladesh">Bangladesh</option>
                                            <option <?php echo e($user->country =="Barbados" ? 'selected' : ''); ?> value="Barbados">Barbados</option>
                                            <option <?php echo e($user->country =="Belarus" ? 'selected' : ''); ?> value="Belarus">Belarus</option>
                                            <option <?php echo e($user->country =="Belgium" ? 'selected' : ''); ?> value="Belgium">Belgium</option>
                                            <option <?php echo e($user->country =="Belize" ? 'selected' : ''); ?> value="Belize">Belize</option>
                                            <option <?php echo e($user->country =="Benin" ? 'selected' : ''); ?> value="Benin">Benin</option>
                                            <option <?php echo e($user->country =="Bermuda" ? 'selected' : ''); ?> value="Bermuda">Bermuda</option>
                                            <option <?php echo e($user->country =="Bhutan" ? 'selected' : ''); ?> value="Bhutan">Bhutan</option>
                                            <option <?php echo e($user->country =="Bolivia" ? 'selected' : ''); ?> value="Bolivia">Bolivia</option>
                                            <option <?php echo e($user->country =="Bonaire" ? 'selected' : ''); ?> value="Bonaire">Bonaire</option>
                                            <option <?php echo e($user->country =="Bosnia & Herzegovina" ? 'selected' : ''); ?> value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                            <option <?php echo e($user->country =="Botswana" ? 'selected' : ''); ?> value="Botswana">Botswana</option>
                                            <option <?php echo e($user->country =="Brazil" ? 'selected' : ''); ?> value="Brazil">Brazil</option>
                                            <option <?php echo e($user->country =="British Indian Ocean Ter" ? 'selected' : ''); ?> value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                            <option <?php echo e($user->country =="Brunei" ? 'selected' : ''); ?> value="Brunei">Brunei</option>
                                            <option <?php echo e($user->country =="Bulgaria" ? 'selected' : ''); ?> value="Bulgaria">Bulgaria</option>
                                            <option <?php echo e($user->country =="Burkina Faso" ? 'selected' : ''); ?> value="Burkina Faso">Burkina Faso</option>
                                            <option <?php echo e($user->country =="Burundi" ? 'selected' : ''); ?> value="Burundi">Burundi</option>
                                            <option <?php echo e($user->country =="Cambodia" ? 'selected' : ''); ?> value="Cambodia">Cambodia</option>
                                            <option <?php echo e($user->country =="Cameroon" ? 'selected' : ''); ?> value="Cameroon">Cameroon</option>
                                            <option <?php echo e($user->country =="Canada" ? 'selected' : ''); ?> value="Canada">Canada</option>
                                            <option <?php echo e($user->country =="Canary Islands" ? 'selected' : ''); ?> value="Canary Islands">Canary Islands</option>
                                            <option <?php echo e($user->country =="Cape Verde" ? 'selected' : ''); ?> value="Cape Verde">Cape Verde</option>
                                            <option <?php echo e($user->country =="Cayman Islands" ? 'selected' : ''); ?> value="Cayman Islands">Cayman Islands</option>
                                            <option <?php echo e($user->country =="Central African Republic" ? 'selected' : ''); ?> value="Central African Republic">Central African Republic</option>
                                            <option <?php echo e($user->country =="Chad" ? 'selected' : ''); ?> value="Chad">Chad</option>
                                            <option <?php echo e($user->country =="Christmas Island" ? 'selected' : ''); ?> value="Christmas Island">Christmas Island</option>
                                            <option <?php echo e($user->country =="Cocos Island" ? 'selected' : ''); ?> value="Cocos Island">Cocos Island</option>
                                            <option <?php echo e($user->country =="Colombia" ? 'selected' : ''); ?> value="Colombia">Colombia</option>
                                            <option <?php echo e($user->country =="Comoros" ? 'selected' : ''); ?> value="Comoros">Comoros</option>
                                            <option <?php echo e($user->country =="Congo" ? 'selected' : ''); ?> value="Congo">Congo</option>
                                            <option <?php echo e($user->country =="Cook Islands" ? 'selected' : ''); ?> value="Cook Islands">Cook Islands</option>
                                            <option <?php echo e($user->country =="Costa Rica" ? 'selected' : ''); ?> value="Costa Rica">Costa Rica</option>
                                            <option <?php echo e($user->country =="Cote DIvoire" ? 'selected' : ''); ?> value="Cote DIvoire">Cote DIvoire</option>
                                            <option <?php echo e($user->country =="Croatia" ? 'selected' : ''); ?> value="Croatia">Croatia</option>
                                            <option <?php echo e($user->country =="Cuba" ? 'selected' : ''); ?> value="Cuba">Cuba</option>
                                            <option <?php echo e($user->country =="Curaco" ? 'selected' : ''); ?> value="Curaco">Curacao</option>
                                            <option <?php echo e($user->country =="Cyprus" ? 'selected' : ''); ?> value="Cyprus">Cyprus</option>
                                            <option <?php echo e($user->country =="Czech Republic" ? 'selected' : ''); ?> value="Czech Republic">Czech Republic</option>
                                            <option <?php echo e($user->country =="Denmark" ? 'selected' : ''); ?> value="Denmark">Denmark</option>
                                            <option <?php echo e($user->country =="Djibouti" ? 'selected' : ''); ?> value="Djibouti">Djibouti</option>
                                            <option <?php echo e($user->country =="Dominica" ? 'selected' : ''); ?> value="Dominica">Dominica</option>
                                            <option <?php echo e($user->country =="Dominican Republic" ? 'selected' : ''); ?> value="Dominican Republic">Dominican Republic</option>
                                            <option <?php echo e($user->country =="East Timor" ? 'selected' : ''); ?> value="East Timor">East Timor</option>
                                            <option <?php echo e($user->country =="Ecuador" ? 'selected' : ''); ?> value="Ecuador">Ecuador</option>
                                            <option <?php echo e($user->country =="Egypt" ? 'selected' : ''); ?> value="Egypt">Egypt</option>
                                            <option <?php echo e($user->country =="El Salvador" ? 'selected' : ''); ?> value="El Salvador">El Salvador</option>
                                            <option <?php echo e($user->country =="Equatorial Guinea" ? 'selected' : ''); ?> value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option <?php echo e($user->country =="Eritrea" ? 'selected' : ''); ?> value="Eritrea">Eritrea</option>
                                            <option <?php echo e($user->country =="Estonia" ? 'selected' : ''); ?> value="Estonia">Estonia</option>
                                            <option <?php echo e($user->country =="Ethiopia" ? 'selected' : ''); ?> value="Ethiopia">Ethiopia</option>
                                            <option <?php echo e($user->country =="Falkland Islands" ? 'selected' : ''); ?> value="Falkland Islands">Falkland Islands</option>
                                            <option <?php echo e($user->country =="Faroe Islands" ? 'selected' : ''); ?> value="Faroe Islands">Faroe Islands</option>
                                            <option <?php echo e($user->country =="Fiji" ? 'selected' : ''); ?> value="Fiji">Fiji</option>
                                            <option <?php echo e($user->country =="Finland" ? 'selected' : ''); ?> value="Finland">Finland</option>
                                            <option <?php echo e($user->country =="France" ? 'selected' : ''); ?> value="France">France</option>
                                            <option <?php echo e($user->country =="French Guiana" ? 'selected' : ''); ?> value="French Guiana">French Guiana</option>
                                            <option <?php echo e($user->country =="French Polynesia" ? 'selected' : ''); ?> value="French Polynesia">French Polynesia</option>
                                            <option <?php echo e($user->country =="French Southern Ter" ? 'selected' : ''); ?> value="French Southern Ter">French Southern Ter</option>
                                            <option <?php echo e($user->country =="Gabon" ? 'selected' : ''); ?> value="Gabon">Gabon</option>
                                            <option <?php echo e($user->country =="Gambia" ? 'selected' : ''); ?> value="Gambia">Gambia</option>
                                            <option <?php echo e($user->country =="Georgia" ? 'selected' : ''); ?> value="Georgia">Georgia</option>
                                            <option <?php echo e($user->country =="Germany" ? 'selected' : ''); ?> value="Germany">Germany</option>
                                            <option <?php echo e($user->country =="Ghana" ? 'selected' : ''); ?> value="Ghana">Ghana</option>
                                            <option <?php echo e($user->country =="Gibraltar" ? 'selected' : ''); ?> value="Gibraltar">Gibraltar</option>
                                            <option <?php echo e($user->country =="Great Britain" ? 'selected' : ''); ?> value="Great Britain">Great Britain</option>
                                            <option <?php echo e($user->country =="Greece" ? 'selected' : ''); ?> value="Greece">Greece</option>
                                            <option <?php echo e($user->country =="Greenland" ? 'selected' : ''); ?> value="Greenland">Greenland</option>
                                            <option <?php echo e($user->country =="Grenada" ? 'selected' : ''); ?> value="Grenada">Grenada</option>
                                            <option <?php echo e($user->country =="Guadeloupe" ? 'selected' : ''); ?> value="Guadeloupe">Guadeloupe</option>
                                            <option <?php echo e($user->country =="Guam" ? 'selected' : ''); ?> value="Guam">Guam</option>
                                            <option <?php echo e($user->country =="Guatemala" ? 'selected' : ''); ?> value="Guatemala">Guatemala</option>
                                            <option <?php echo e($user->country =="Guinea" ? 'selected' : ''); ?> value="Guinea">Guinea</option>
                                            <option <?php echo e($user->country =="Guyana" ? 'selected' : ''); ?> value="Guyana">Guyana</option>
                                            <option <?php echo e($user->country =="Haiti" ? 'selected' : ''); ?> value="Haiti">Haiti</option>
                                            <option <?php echo e($user->country =="Hawaii" ? 'selected' : ''); ?> value="Hawaii">Hawaii</option>
                                            <option <?php echo e($user->country =="Honduras" ? 'selected' : ''); ?> value="Honduras">Honduras</option>
                                            <option <?php echo e($user->country =="Hong Kong" ? 'selected' : ''); ?> value="Hong Kong">Hong Kong</option>
                                            <option <?php echo e($user->country =="Hungary" ? 'selected' : ''); ?> value="Hungary">Hungary</option>
                                            <option <?php echo e($user->country =="Iceland" ? 'selected' : ''); ?> value="Iceland">Iceland</option>
                                            <option <?php echo e($user->country =="Indonesia" ? 'selected' : ''); ?> value="Indonesia">Indonesia</option>
                                            <option <?php echo e($user->country =="India" ? 'selected' : ''); ?> value="India">India</option>
                                            <option <?php echo e($user->country =="Iran" ? 'selected' : ''); ?> value="Iran">Iran</option>
                                            <option <?php echo e($user->country =="Iraq" ? 'selected' : ''); ?> value="Iraq">Iraq</option>
                                            <option <?php echo e($user->country =="Ireland" ? 'selected' : ''); ?> value="Ireland">Ireland</option>
                                            <option <?php echo e($user->country =="Isle of Man" ? 'selected' : ''); ?> value="Isle of Man">Isle of Man</option>
                                            <option <?php echo e($user->country =="Israel" ? 'selected' : ''); ?> value="Israel">Israel</option>
                                            <option <?php echo e($user->country =="Italy" ? 'selected' : ''); ?> value="Italy">Italy</option>
                                            <option <?php echo e($user->country =="Jamaica" ? 'selected' : ''); ?> value="Jamaica">Jamaica</option>
                                            <option <?php echo e($user->country =="Japan" ? 'selected' : ''); ?> value="Japan">Japan</option>
                                            <option <?php echo e($user->country =="Jordan" ? 'selected' : ''); ?> value="Jordan">Jordan</option>
                                            <option <?php echo e($user->country =="Kazakhstan" ? 'selected' : ''); ?> value="Kazakhstan">Kazakhstan</option>
                                            <option <?php echo e($user->country =="Kenya" ? 'selected' : ''); ?> value="Kenya">Kenya</option>
                                            <option <?php echo e($user->country =="Kiribati" ? 'selected' : ''); ?> value="Kiribati">Kiribati</option>
                                            <option <?php echo e($user->country =="Korea North" ? 'selected' : ''); ?> value="Korea North">Korea North</option>
                                            <option <?php echo e($user->country =="Korea South" ? 'selected' : ''); ?> value="Korea South">Korea South</option>
                                            <option <?php echo e($user->country =="Kuwait" ? 'selected' : ''); ?> value="Kuwait">Kuwait</option>
                                            <option <?php echo e($user->country =="Kyrgyzstan" ? 'selected' : ''); ?> value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option <?php echo e($user->country =="Laos" ? 'selected' : ''); ?> value="Laos">Laos</option>
                                            <option <?php echo e($user->country =="Latvia" ? 'selected' : ''); ?> value="Latvia">Latvia</option>
                                            <option <?php echo e($user->country =="Lebanon" ? 'selected' : ''); ?> value="Lebanon">Lebanon</option>
                                            <option <?php echo e($user->country =="Lesotho" ? 'selected' : ''); ?> value="Lesotho">Lesotho</option>
                                            <option <?php echo e($user->country =="Liberia" ? 'selected' : ''); ?> value="Liberia">Liberia</option>
                                            <option <?php echo e($user->country =="Libya" ? 'selected' : ''); ?> value="Libya">Libya</option>
                                            <option <?php echo e($user->country =="Liechtenstein" ? 'selected' : ''); ?> value="Liechtenstein">Liechtenstein</option>
                                            <option <?php echo e($user->country =="Lithuania" ? 'selected' : ''); ?> value="Lithuania">Lithuania</option>
                                            <option <?php echo e($user->country =="Luxembourg" ? 'selected' : ''); ?> value="Luxembourg">Luxembourg</option>
                                            <option <?php echo e($user->country =="Macau" ? 'selected' : ''); ?> value="Macau">Macau</option>
                                            <option <?php echo e($user->country =="Macedonia" ? 'selected' : ''); ?> value="Macedonia">Macedonia</option>
                                            <option <?php echo e($user->country =="Madagascar" ? 'selected' : ''); ?> value="Madagascar">Madagascar</option>
                                            <option <?php echo e($user->country =="Malaysia" ? 'selected' : ''); ?> value="Malaysia">Malaysia</option>
                                            <option <?php echo e($user->country =="Malawi" ? 'selected' : ''); ?> value="Malawi">Malawi</option>
                                            <option <?php echo e($user->country =="Maldives" ? 'selected' : ''); ?> value="Maldives">Maldives</option>
                                            <option <?php echo e($user->country =="Mali" ? 'selected' : ''); ?> value="Mali">Mali</option>
                                            <option <?php echo e($user->country =="Malta" ? 'selected' : ''); ?> value="Malta">Malta</option>
                                            <option <?php echo e($user->country =="Marshall Islands" ? 'selected' : ''); ?> value="Marshall Islands">Marshall Islands</option>
                                            <option <?php echo e($user->country =="Martinique" ? 'selected' : ''); ?> value="Martinique">Martinique</option>
                                            <option <?php echo e($user->country =="Mauritania" ? 'selected' : ''); ?> value="Mauritania">Mauritania</option>
                                            <option <?php echo e($user->country =="Mauritius" ? 'selected' : ''); ?> value="Mauritius">Mauritius</option>
                                            <option <?php echo e($user->country =="Mayotte" ? 'selected' : ''); ?> value="Mayotte">Mayotte</option>
                                            <option <?php echo e($user->country =="Mexico" ? 'selected' : ''); ?> value="Mexico">Mexico</option>
                                            <option <?php echo e($user->country =="Midway Islands" ? 'selected' : ''); ?> value="Midway Islands">Midway Islands</option>
                                            <option <?php echo e($user->country =="Moldova" ? 'selected' : ''); ?> value="Moldova">Moldova</option>
                                            <option <?php echo e($user->country =="Monaco" ? 'selected' : ''); ?> value="Monaco">Monaco</option>
                                            <option <?php echo e($user->country =="Mongolia" ? 'selected' : ''); ?> value="Mongolia">Mongolia</option>
                                            <option <?php echo e($user->country =="Montserrat" ? 'selected' : ''); ?> value="Montserrat">Montserrat</option>
                                            <option <?php echo e($user->country =="Morocco" ? 'selected' : ''); ?> value="Morocco">Morocco</option>
                                            <option <?php echo e($user->country =="Mozambique" ? 'selected' : ''); ?> value="Mozambique">Mozambique</option>
                                            <option <?php echo e($user->country =="Myanmar" ? 'selected' : ''); ?> value="Myanmar">Myanmar</option>
                                            <option <?php echo e($user->country =="Nambia" ? 'selected' : ''); ?> value="Nambia">Nambia</option>
                                            <option <?php echo e($user->country =="Nauru" ? 'selected' : ''); ?> value="Nauru">Nauru</option>
                                            <option <?php echo e($user->country =="Nepal" ? 'selected' : ''); ?> value="Nepal">Nepal</option>
                                            <option <?php echo e($user->country =="Netherland Antilles" ? 'selected' : ''); ?> value="Netherland Antilles">Netherland Antilles</option>
                                            <option <?php echo e($user->country =="Netherlands" ? 'selected' : ''); ?> value="Netherlands">Netherlands (Holland, Europe)</option>
                                            <option <?php echo e($user->country =="Nevis" ? 'selected' : ''); ?> value="Nevis">Nevis</option>
                                            <option <?php echo e($user->country =="New Caledonia" ? 'selected' : ''); ?> value="New Caledonia">New Caledonia</option>
                                            <option <?php echo e($user->country =="New Zealand" ? 'selected' : ''); ?> value="New Zealand">New Zealand</option>
                                            <option <?php echo e($user->country =="Nicaragua" ? 'selected' : ''); ?> value="Nicaragua">Nicaragua</option>
                                            <option <?php echo e($user->country =="Niger" ? 'selected' : ''); ?> value="Niger">Niger</option>
                                            <option <?php echo e($user->country =="Nigeria" ? 'selected' : ''); ?> value="Nigeria">Nigeria</option>
                                            <option <?php echo e($user->country =="Niue" ? 'selected' : ''); ?> value="Niue">Niue</option>
                                            <option <?php echo e($user->country =="Norfolk Island" ? 'selected' : ''); ?> value="Norfolk Island">Norfolk Island</option>
                                            <option <?php echo e($user->country =="Norway" ? 'selected' : ''); ?> value="Norway">Norway</option>
                                            <option <?php echo e($user->country =="Oman" ? 'selected' : ''); ?> value="Oman">Oman</option>
                                            <option <?php echo e($user->country =="Pakistan" ? 'selected' : ''); ?> value="Pakistan">Pakistan</option>
                                            <option <?php echo e($user->country =="Palau Island" ? 'selected' : ''); ?> value="Palau Island">Palau Island</option>
                                            <option <?php echo e($user->country =="Palestine" ? 'selected' : ''); ?> value="Palestine">Palestine</option>
                                            <option <?php echo e($user->country =="Panama" ? 'selected' : ''); ?> value="Panama">Panama</option>
                                            <option <?php echo e($user->country =="Papua New Guinea" ? 'selected' : ''); ?> value="Papua New Guinea">Papua New Guinea</option>
                                            <option <?php echo e($user->country =="Paraguay" ? 'selected' : ''); ?> value="Paraguay">Paraguay</option>
                                            <option <?php echo e($user->country =="Peru" ? 'selected' : ''); ?> value="Peru">Peru</option>
                                            <option <?php echo e($user->country =="Phillipines" ? 'selected' : ''); ?> value="Phillipines">Philippines</option>
                                            <option <?php echo e($user->country =="Pitcairn Island" ? 'selected' : ''); ?> value="Pitcairn Island">Pitcairn Island</option>
                                            <option <?php echo e($user->country =="Poland" ? 'selected' : ''); ?> value="Poland">Poland</option>
                                            <option <?php echo e($user->country =="Portugal" ? 'selected' : ''); ?> value="Portugal">Portugal</option>
                                            <option <?php echo e($user->country =="Puerto Rico" ? 'selected' : ''); ?> value="Puerto Rico">Puerto Rico</option>
                                            <option <?php echo e($user->country =="Qatar" ? 'selected' : ''); ?> value="Qatar">Qatar</option>
                                            <option <?php echo e($user->country =="Republic of Montenegro" ? 'selected' : ''); ?> value="Republic of Montenegro">Republic of Montenegro</option>
                                            <option <?php echo e($user->country =="Republic of Serbia" ? 'selected' : ''); ?> value="Republic of Serbia">Republic of Serbia</option>
                                            <option <?php echo e($user->country =="Reunion" ? 'selected' : ''); ?> value="Reunion">Reunion</option>
                                            <option <?php echo e($user->country =="Romania" ? 'selected' : ''); ?> value="Romania">Romania</option>
                                            <option <?php echo e($user->country =="Russia" ? 'selected' : ''); ?> value="Russia">Russia</option>
                                            <option <?php echo e($user->country =="Rwanda" ? 'selected' : ''); ?> value="Rwanda">Rwanda</option>
                                            <option <?php echo e($user->country =="St Barthelemy" ? 'selected' : ''); ?> value="St Barthelemy">St Barthelemy</option>
                                            <option <?php echo e($user->country =="St Eustatius" ? 'selected' : ''); ?> value="St Eustatius">St Eustatius</option>
                                            <option <?php echo e($user->country =="St Helena" ? 'selected' : ''); ?> value="St Helena">St Helena</option>
                                            <option <?php echo e($user->country =="St Kitts-Nevis" ? 'selected' : ''); ?> value="St Kitts-Nevis">St Kitts-Nevis</option>
                                            <option <?php echo e($user->country =="St Lucia" ? 'selected' : ''); ?> value="St Lucia">St Lucia</option>
                                            <option <?php echo e($user->country =="St Maarten" ? 'selected' : ''); ?> value="St Maarten">St Maarten</option>
                                            <option <?php echo e($user->country =="St Pierre & Miquelon" ? 'selected' : ''); ?> value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                            <option <?php echo e($user->country =="St Vincent & Grenadines" ? 'selected' : ''); ?> value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                            <option <?php echo e($user->country =="Saipan" ? 'selected' : ''); ?> value="Saipan">Saipan</option>
                                            <option <?php echo e($user->country =="Samoa" ? 'selected' : ''); ?> value="Samoa">Samoa</option>
                                            <option <?php echo e($user->country =="Samoa American" ? 'selected' : ''); ?> value="Samoa American">Samoa American</option>
                                            <option <?php echo e($user->country =="San Marino" ? 'selected' : ''); ?> value="San Marino">San Marino</option>
                                            <option <?php echo e($user->country =="Sao Tome & Principe" ? 'selected' : ''); ?> value="Sao Tome & Principe">Sao Tome & Principe</option>
                                            <option <?php echo e($user->country =="Saudi Arabia" ? 'selected' : ''); ?> value="Saudi Arabia">Saudi Arabia</option>
                                            <option <?php echo e($user->country =="Senegal" ? 'selected' : ''); ?> value="Senegal">Senegal</option>
                                            <option <?php echo e($user->country =="Seychelles" ? 'selected' : ''); ?> value="Seychelles">Seychelles</option>
                                            <option <?php echo e($user->country =="Sierra Leone" ? 'selected' : ''); ?> value="Sierra Leone">Sierra Leone</option>
                                            <option <?php echo e($user->country =="Singapore" ? 'selected' : ''); ?> value="Singapore">Singapore</option>
                                            <option <?php echo e($user->country =="Slovakia" ? 'selected' : ''); ?> value="Slovakia">Slovakia</option>
                                            <option <?php echo e($user->country =="Slovenia" ? 'selected' : ''); ?> value="Slovenia">Slovenia</option>
                                            <option <?php echo e($user->country =="Solomon Islands" ? 'selected' : ''); ?> value="Solomon Islands">Solomon Islands</option>
                                            <option <?php echo e($user->country =="Somalia" ? 'selected' : ''); ?> value="Somalia">Somalia</option>
                                            <option <?php echo e($user->country =="South Africa" ? 'selected' : ''); ?> value="South Africa">South Africa</option>
                                            <option <?php echo e($user->country =="Spain" ? 'selected' : ''); ?> value="Spain">Spain</option>
                                            <option <?php echo e($user->country =="Sri Lanka" ? 'selected' : ''); ?> value="Sri Lanka">Sri Lanka</option>
                                            <option <?php echo e($user->country =="Sudan" ? 'selected' : ''); ?> value="Sudan">Sudan</option>
                                            <option <?php echo e($user->country =="Suriname" ? 'selected' : ''); ?> value="Suriname">Suriname</option>
                                            <option <?php echo e($user->country =="Swaziland" ? 'selected' : ''); ?> value="Swaziland">Swaziland</option>
                                            <option <?php echo e($user->country =="Sweden" ? 'selected' : ''); ?> value="Sweden">Sweden</option>
                                            <option <?php echo e($user->country =="Switzerland" ? 'selected' : ''); ?> value="Switzerland">Switzerland</option>
                                            <option <?php echo e($user->country =="Syria" ? 'selected' : ''); ?> value="Syria">Syria</option>
                                            <option <?php echo e($user->country =="Tahiti" ? 'selected' : ''); ?> value="Tahiti">Tahiti</option>
                                            <option <?php echo e($user->country =="Taiwan" ? 'selected' : ''); ?> value="Taiwan">Taiwan</option>
                                            <option <?php echo e($user->country =="Tajikistan" ? 'selected' : ''); ?> value="Tajikistan">Tajikistan</option>
                                            <option <?php echo e($user->country =="Tanzania" ? 'selected' : ''); ?> value="Tanzania">Tanzania</option>
                                            <option <?php echo e($user->country =="Thailand" ? 'selected' : ''); ?> value="Thailand">Thailand</option>
                                            <option <?php echo e($user->country =="Togo" ? 'selected' : ''); ?> value="Togo">Togo</option>
                                            <option <?php echo e($user->country =="Tokelau" ? 'selected' : ''); ?> value="Tokelau">Tokelau</option>
                                            <option <?php echo e($user->country =="Tonga" ? 'selected' : ''); ?> value="Tonga">Tonga</option>
                                            <option <?php echo e($user->country =="Trinidad & Tobago" ? 'selected' : ''); ?> value="Trinidad & Tobago">Trinidad & Tobago</option>
                                            <option <?php echo e($user->country =="Tunisia" ? 'selected' : ''); ?> value="Tunisia">Tunisia</option>
                                            <option <?php echo e($user->country =="Turkey" ? 'selected' : ''); ?> value="Turkey">Turkey</option>
                                            <option <?php echo e($user->country =="Turkmenistan" ? 'selected' : ''); ?> value="Turkmenistan">Turkmenistan</option>
                                            <option <?php echo e($user->country =="Turks & Caicos Is" ? 'selected' : ''); ?> value="Turks & Caicos Is">Turks & Caicos Is</option>
                                            <option <?php echo e($user->country =="Tuvalu" ? 'selected' : ''); ?> value="Tuvalu">Tuvalu</option>
                                            <option <?php echo e($user->country =="Uganda" ? 'selected' : ''); ?> value="Uganda">Uganda</option>
                                            <option <?php echo e($user->country =="United Kingdom" ? 'selected' : ''); ?> value="United Kingdom">United Kingdom</option>
                                            <option <?php echo e($user->country =="Ukraine" ? 'selected' : ''); ?> value="Ukraine">Ukraine</option>
                                            <option <?php echo e($user->country =="United Arab Erimates" ? 'selected' : ''); ?> value="United Arab Erimates">United Arab Emirates</option>
                                            <option <?php echo e($user->country =="United States of America" ? 'selected' : ''); ?> value="United States of America">United States of America</option>
                                            <option <?php echo e($user->country =="Uraguay" ? 'selected' : ''); ?> value="Uraguay">Uruguay</option>
                                            <option <?php echo e($user->country =="Uzbekistan" ? 'selected' : ''); ?> value="Uzbekistan">Uzbekistan</option>
                                            <option <?php echo e($user->country =="Vanuatu" ? 'selected' : ''); ?> value="Vanuatu">Vanuatu</option>
                                            <option <?php echo e($user->country =="Vatican City State" ? 'selected' : ''); ?> value="Vatican City State">Vatican City State</option>
                                            <option <?php echo e($user->country =="Venezuela" ? 'selected' : ''); ?> value="Venezuela">Venezuela</option>
                                            <option <?php echo e($user->country =="Vietnam" ? 'selected' : ''); ?> value="Vietnam">Vietnam</option>
                                            <option <?php echo e($user->country =="Virgin Islands (Brit)" ? 'selected' : ''); ?> value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                            <option <?php echo e($user->country =="Virgin Islands (USA)" ? 'selected' : ''); ?> value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                            <option <?php echo e($user->country =="Wake Island" ? 'selected' : ''); ?> value="Wake Island">Wake Island</option>
                                            <option <?php echo e($user->country =="Wallis & Futana Is" ? 'selected' : ''); ?> value="Wallis & Futana Is">Wallis & Futana Is</option>
                                            <option <?php echo e($user->country =="Yemen" ? 'selected' : ''); ?> value="Yemen">Yemen</option>
                                            <option <?php echo e($user->country =="Zaire" ? 'selected' : ''); ?> value="Zaire">Zaire</option>
                                            <option <?php echo e($user->country =="Zambia" ? 'selected' : ''); ?> value="Zambia">Zambia</option>
                                            <option <?php echo e($user->country =="Zimbabwe" ? 'selected' : ''); ?> value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <a href="#" class="btn btn-lg btn-primary" id="submit"></a>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Close</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div>

<!-- 
    <div class="modal fade" id="manage_users">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <a href="#" class="close" data-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>

                <div class="modal-body modal-body-lg">
                    <h5 class="title" id="modal_title"></h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal">User Information</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <form style="padding:3px;" id="userdata">
                            <div class="tab-pane active" id="personal">
                                <div class="row gy-4">

                                    <input type="hidden" name="id" id="user_id">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Last Name</label>
                                            <input type="text" class="form-control form-control-lg" id="last_name" name="last_name" value="<?php echo e($user->l_name ?? old('last_name')); ?>" required="required" placeholder="Enter your last name">
                                            <small class="help-block" style="color:red; font-size:small"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">First Name</label>
                                            <input type="text" class="form-control form-control-lg" id="first_name" name="first_name" value="<?php echo e($user->name ?? old('first_name')); ?>" required="required" placeholder="Enter your first name">
                                            <small class="help-block" style="color:red; font-size:small"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Phone Number</label>
                                            <input type="number" class="form-control form-control-lg" id="phone_number" name="phone_number" value="<?php echo e($user->phone_number ?? old('phone_number')); ?>" required="required" placeholder="Enter your phone number">
                                            <small class="help-block" style="color:red; font-size:small"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Email Address</label>
                                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="<?php echo e($user->email ?? old('email')); ?>" placeholder="Enter your email address" required="required">
                                            <small class="help-block" style="color:red; font-size:small"></small>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><a href="#" class="btn btn-lg btn-primary" id="submit"></a></li>
                                            <li><a href="#" data-dismiss="modal" class="link link-light" id="close-form">Close</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

-->
    <div class="modal fade" id="transactionmodal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <a href="#" class="close" data-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>

                <div class="modal-body modal-body-lg">
                    <h5 class="title" id="transaction_title"></h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal">Transaction Détails</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <form style="padding:3px; padding-top:10px" method="POST" action="<?php echo e(route('topup')); ?>" id="transactionformid">
                            <div class="tab-pane active" id="personal">
                                <div class="row gy-4">


                                    <div class="example-alert" id="message_section" style="margin-bottom:30px;">
                                        <div class="alert alert-fill alert-danger alert-icon alert-dismissible">
                                            <em class="icon ni ni-alert-circle"></em>
                                            <p id="message"></p> <button class="close" data-dismiss="alert"></button>
                                        </div>
                                    </div>

                                    <input type="hidden" class="form-control form-control-lg" readonly="readonly" name="transaction_user_id" id="transaction_user_id">
                                    <input type="hidden" class="form-control form-control-lg" readonly="readonly" name="transaction_type" id="transaction_type">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">User Information</label>
                                            <input type="text" class="form-control form-control-lg" readonly="readonly" name="transaction_user_name" id="transaction_user_name">
                                            <small class="help-block" style="color:red; font-size:small"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Amount</label>
                                            <input type="number" class="form-control form-control-lg" id="transaction_amount" name="transaction_amount" value="<?php echo e(old('transaction_amount')); ?>" required="required" placeholder="Enter transaction amount">
                                            <small class="help-block" style="color:red; font-size:small"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="name">Type Operation</label>
                                            <select class="form-select" id="type" name="type" data-ui="lg" tabindex="-1" aria-hidden="true">
                                                <option value="Profit">Profit</option>
                                                <option value="Ref_Bonus">Refer Bonus</option>
                                                <option value="Bonus">Bonus</option>
                                            </select>
                                            <small class="help-block" style="color:red; font-size:small"></small>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><a href="#" class="btn btn-lg btn-primary" id="submit_transaction">Submit</a></li>
                                            <li><a href="#" data-dismiss="modal" class="link link-light" id="close-form">Close</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- send email -->
    <div class="modal fade" id="sendmailModal">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <a href="#" class="close" data-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>

                <div class="modal-body modal-body-lg">
                    <h5 class="title">Send Message to Users</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal">Subject</a>
                        </li>
                    </ul>

                    <form style="padding:3px; padding-top:10px" method="POST" action="<?php echo e(route('sendmail')); ?>" id="sendemailformid">
                        <?php echo e(csrf_field()); ?>

                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" id="mail_subject" name="mail_subject" required="required" placeholder="Enter the subject of your message">
                                    </div>
                                </div>

                                <input type="hidden" class="form-control form-control-lg" id="mail_to" name="mail_to[]">

                                <div class="col-md-12">
                                    <div class="form-group"><label class="form-label" for="name">Message</label>
                                        <textarea class="form-control" name="mail_content" id="mail_content" row="3" required=""></textarea><br />
                                    </div>

                                    <div class="col-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('sendemailformid').submit();" class="btn btn-lg btn-primary">Send message</a></li>
                                            <li><a href="#" data-dismiss="modal" class="link link-light" id="close-form">Close</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /send email Modal -->


    <?php echo $__env->yieldPushContent('js'); ?>

    <script src="<?php echo e(asset('assets/js/jquery-3.3.1.min.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // show form for emailing all users
            $('body').on('click', '#filter_btn', function(event) {

                event.preventDefault();

                listOfUsers = [];

                //console.log($('input[name=mailusers]'));
                

                if ($("#filter_value").val() == "email") {

                    /* var input = document.getElementsByName('mailusers[]');
                    var k="";

                    for (var index = 0; index < input.length; index++) {
                        var a = input[index];
                        if(input[index].checked == true){
                            k = k + "mail_to["+index+"].value = "+a.value+" ";
                            console.log(k);      
                        }                  
                    }

                    document.getElementsByName('mailusers[]').forEach(element => {
                        if(element.checked == true){
                            console.log($('#mail_to').length);
                            $('#mail_to')[$('#mail_to').length].value = parseInt(element.value);
                            $('#mail_to').val(parseInt(element.value));
                            //listOfUsers.push(parseInt(element.value));
                            console.log($('#mail_to').length);
                        }
                    });

                    console.log(listOfUsers); */

                    /* if(listOfUsers.length>0){
                        $('#mail_to').val([201,309]);
                    } */


                    document.getElementsByName('mailusers[]').forEach(element => {
                        if(element.checked == true){
                            /* console.log($('#mail_to').length);
                            $('#mail_to')[$('#mail_to').length].value = parseInt(element.value);
                            $('#mail_to').val(parseInt(element.value)); */
                            listOfUsers.push(parseInt(element.value));
                        }
                    });

                    $('#mail_to').val(listOfUsers);
                    $('#sendmailModal').modal('show');
                }
            });

            // show form for emailing specific user
            $('body').on('click', '#showMailForm', function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                $('#mail_to').val($(this).data('id'));
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#submit', function(event) {
                event.preventDefault()
                var user_id = $("#user_id").val();
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var email = $("#email").val();
                var phone_number = $("#phone_number").val();
                var address = $("#address").val();
                var city = $("#city").val();
                var sex = $("#sex").val();
                var country = $("#country").val();
                var birth_date = $("#birth_date").val();


                $('input+small').text('');
                $('input').parent().removeClass('has-error');

                $.ajax({
                        url: user_id ? 'updateuser/' + user_id : 'adduser',
                        type: "POST",
                        data: {
                            id: user_id,
                            first_name: first_name,
                            last_name: last_name,
                            email: email,
                            phone_number: phone_number,
                            birth_date: birth_date,
                            city: city,
                            country: country,
                            address: address,
                            sex: sex,
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#userdata').trigger("reset");
                            $('#manage_users').modal('hide');
                            window.location.reload(true);
                        }
                    })
                    .done(function(data) {
                        $('.alert-success').removeClass('hidden');
                        $('#manage_users').modal('hide');
                        window.location.reload(true);
                    })
                    .fail(function(data) {
                        console.log(data.responseJSON);
                        $.each(data.responseJSON.errors, function(key, value) {
                            var input = '#userdata input[name=' + key + ']';
                            $(input + '+small').text(value);
                            $(input).parent().addClass('has-error');

                            var select = '#userdata select[name=' + key + ']';
                            console.log(select);
                            $(select + '+small').text(value);
                            $(select).parent().addClass('has-error');
                        });
                    });


            });

            $('body').on('click', '#editUser', function(event) {

                event.preventDefault();
                var id = $(this).data('id');
                $.get('user/' + id, function(data) {
                    $('#modal_title').html("Edit profile");

                    $('#submit').show();
                    $('#email_section').hide();
                    $('#submit').html("Update profile");
                    $('#submit').removeClass();
                    $('#submit').addClass('btn btn-lg btn-primary');

                    $('#close-form').removeClass();
                    $('#close-form').addClass('link link-light');

                    $('#manage_users').modal('show');

                    $('#user_id').val(data.id);
                    $('#first_name').val(data.name);
                    $('#last_name').val(data.l_name);

                    //console.log(sexval);
                    //console.log(sexval.options[sexval.options.selectedIndex].setAttribute("selected","selected"));
                    
                    /*var opt = $("#sex option[val="+data.sex+"]"),
                    html = $("<div>").append(opt.clone()).html();
                    html = html.replace(/\>/, ' selected="selected">');
                    opt.replaceWith(html);
                    console.log(opt);*/
                    
                    console.log($('#sex option[value='+data.sex+']').attr('selected','selected'));
                    $('#address').val(data.adress);
                    $('#city').val(data.city);
                    $('#country').val(data.country);
                    $('#birth_date').val(data.birth_date);
                    $('#phone_number').val(data.phone_number);
                })
            });

            $('body').on('click', '#showUser', function(event) {

                event.preventDefault();
                var id = $(this).data('id');
                $.get('user/' + id, function(data) {
                    $('#modal_title').html("Show user");
                    $('#submit').hide();
                    $('#email_section').show();

                    $('#close-form').removeClass();
                    $('#close-form').addClass('btn btn-lg btn-primary');
                    $('#manage_users').modal('show');

                    $('#first_name').val(data.name);
                    $('#last_name').val(data.l_name);
                    $('#email').val(data.email);
                    $('#sex').val(data.sex);
                    $('#address').val(data.adress);
                    $('#city').val(data.city);
                    $('#country').val(data.country);
                    $('#birth_date').val(data.birth_date);
                    $('#phone_number').val(data.phone_number);
                })
            });

            $('body').on('click', '#addUser', function(event) {

                event.preventDefault();
                $('#modal_title').html("Add user");

                $('#submit').show();
                $('#submit').html("Save user");
                $('#submit').removeClass();
                $('#submit').addClass('btn btn-lg btn-primary');
                $('#email_section').show();

                $('#close-form').removeClass();
                $('#close-form').addClass('link link-light');

                $('#manage_users').modal('show');
                $('#first_name').val("");
                $('#last_name').val("");
                $('#birth_date').val("");
                $('#sex').val("");
                $('#city').val("");
                $('#address').val("");
                $('#country').val("");
                $('#email').val("");
                $('#phone_number').val("");

            });

            //Transaction operation

            $('body').on('click', '#showCreditForm', function(event) {

                event.preventDefault();
                var id = $(this).data('id');
                $.get('user/' + id, function(data) {
                    $('#message_section').hide();
                    $('#transaction_title').html("Credit account");

                    $('#transactionmodal').modal('show');

                    $('#transaction_user_id').val(data.id);
                    $('#transaction_user_name').val(data.l_name + ' ' + data.name);
                    $('#transaction_type').val("Credit");
                })
            });

            $('body').on('click', '#showDebitForm', function(event) {

                event.preventDefault();
                var id = $(this).data('id');
                $.get('user/' + id, function(data) {
                    $('#message_section').hide();
                    $('#transaction_title').html("Debit account");

                    $('#transactionmodal').modal('show');

                    $('#transaction_user_id').val(data.id);
                    $('#transaction_user_name').val(data.l_name + ' ' + data.name);
                    $('#transaction_type').val("Debit");
                })
            });


            $('body').on('click', '#submit_transaction', function(event) {
                event.preventDefault()
                var transaction_user_id = $("#transaction_user_id").val();
                var transaction_amount = $("#transaction_amount").val();
                var transaction_type = $("#transaction_type").val();
                var type = $("#type").val();

                $('input+small').text('');
                $('input').parent().removeClass('has-error');

                $.ajax({
                        url: 'topup/',
                        type: "POST",
                        data: {
                            transaction_user_id: transaction_user_id,
                            transaction_amount: transaction_amount,
                            transaction_type: transaction_type,
                            type: type,
                        },
                        dataType: 'json',
                    })
                    .done(function(data) {
                        $('.alert-success').removeClass('hidden');
                        $('#transactionmodal').modal('hide');
                        window.location.reload(true);
                    })
                    .fail(function(data) {
                        console.log(data);
                        $.each(data.responseJSON.errors, function(key, value) {
                            var input = '#transactionformid input[name=' + key + ']';
                            $(input + '+small').text(value);
                            $(input).parent().addClass('has-error');
                        });
                        $('#message_section').show();
                        $('#message').html(data.responseJSON.message);
                    });


            });


        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {

            $('body').on('click', '#editprofile', function(event) {

                event.preventDefault();
                var id = $(this).data('id');
                $.get('user/' + id, function(data) {
                    $('#modal_title').html("Edit profile");

                    $('#submit').show();
                    $('#submit').html("Update pofile");
                    $('#submit').removeClass();
                    $('#submit').addClass('btn btn-lg btn-primary');

                    $('#close-form').removeClass();
                    $('#close-form').addClass('link link-light');

                    $('#manage_users').modal('show');

                    $('#user_id').val(data.id);
                    $('#first_name').val(data.name);
                    $('#last_name').val(data.l_name);
                    $('#email').val(data.email);
                    $('#sex').val(data.sex);
                    $('#address').val(data.adress);
                    $('#city').val(data.city);
                    $('#country').val(data.country);
                    $('#birth_date').val(data.birth_date);
                    $('#phone_number').val(data.phone_number);
                })
            });


        });
    </script>
    <script src="<?php echo e(asset('assets/assets/js/bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/assets/js/scripts.js')); ?>"></script>

</body>

</html>