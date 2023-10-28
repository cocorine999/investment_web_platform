<!DOCTYPE HTML>
<html>
<head>
<title>{{$settings->site_name}} | {{$title}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--PayPal-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!--/PayPal-->

<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{ asset('css/dashboard_style_'.$settings->site_colour.'.css')}}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
 
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="{{ asset('css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
<link href="{{ asset('css/mystyle.css')}}" rel="stylesheet" type="text/css" media="all">
<script src="{{ asset('js/wow.min.js')}}"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->

<!-- Metis Menu -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="{{ asset('js/metisMenu.min.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
<link href="{{ asset('css/custom.css')}}" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
    
    <!--PayPal-->
    <script>
    
    // Add your client ID and secret
    var PAYPAL_CLIENT = '{{$settings->pp_ci}}';
    var PAYPAL_SECRET = '{{$settings->pp_cs}}';
    
    // Point your server to the PayPal API
    var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';

    </script>
    
    <script
    src="https://www.paypal.com/sdk/js?client-id={{$settings->pp_ci}}">
  </script>
  
  <!--/PayPal-->
	
<!--Start of Tawk.to Script-->
<script type="text/javascript">
{{!! $settings->tawk_to !!}}

</script>
<!--End of Tawk.to Script-->

	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
					<ul class="nav" id="side-menu">
						<li>
							<a href="{{ url('/dashboard') }}" class="active"><i class="fa fa-dashboard nav_icon"></i>Dashboard</a>
						</li>
						<li class="">
							<a href="#"><i class="fa fa-user nav_icon"></i>Account <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="{{ url('dashboard/changepassword') }}">Change Password</a>
									<a href="{{ url('dashboard/accountdetails') }}">Update Account</a>
									@if(Auth::user()->type =='0')
									<a href="{{ url('dashboard/notification') }}">Notification</a>
									<!--<a href="{{ url('dashboard/profile') }}">Profile</a>-->
									@endif
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>

						@if(Auth::user()->type =='0')
						
						<li>
							<a href="{{ url('dashboard/support') }}"><i class="fa fa-ticket nav_icon"></i>Support</a>
							
						</li>
						
						<li>
							<a href="{{ url('dashboard/tradinghistory') }}"><i class="fa fa-briefcase nav_icon"></i>Transaction (ROI) log</a>
						</li>
						<li class="">
							<a href="#"><i class="fa fa-credit-card nav_icon"></i>Deposit/Withdrawal<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="{{ url('dashboard/deposits') }}"><i class="fa fa-money nav_icon"></i>Deposits</a>
									<a href="{{ url('dashboard/withdrawals') }}"><i class="fa fa-dollar nav_icon"></i>Withdrawals</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>
						<li class="">
							<a href="#"><i class="fa fa-gears (alias) nav_icon"></i>Packages <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="{{ url('dashboard/mplans') }}"><i class="fa fa-list nav_icon"></i>Investment plans</a>
									<a href="{{ url('dashboard/myplans') }}"><i class="fa fa-eye nav_icon"></i>My packages</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>


						@endif
						
						@if(Auth::user()->type =='1' or Auth::user()->type =='2')
						<li>
							<a href="{{ url('dashboard/plans') }}"><i class="fa fa-cog nav_icon"></i>Investment plans</a>
						</li>

						<li>
							<a href="{{ url('dashboard/manageusers') }}"><i class="fa fa-users nav_icon"></i>Manage users</a>
						</li>
						<li class="">
							<a href="#"><i class="fa fa-credit-card nav_icon"></i>Manage Deposit/Withdrawal<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
								<li>
									<a href="{{ url('dashboard/mdeposits') }}"><i class="fa fa-money nav_icon"></i>Manage Deposits</a>
									<a href="{{ url('dashboard/mwithdrawals') }}"><i class="fa fa-th-list nav_icon"></i>Manage withdrawals</a>
								</li>
							</ul>
							<!-- /nav-second-level -->
						</li>
						<li>
							<a href="{{ url('dashboard/settings') }}"><i class="fa fa-gear nav_icon"></i>Settings</a>
						</li>

						<li>
							<a href="{{ url('dashboard/agents') }}"><i class="fa fa-users nav_icon"></i>View Agents</a>
						</li>
						<li>
							<a href="{{ url('dashboard/msubtrade') }}"><i class="fa fa-refresh nav_icon"></i> Manage Subscription</a>
						</li>
						@endif
						
						<li>
							<a href="{{ url('dashboard/referuser') }}"><i class="fa fa-users nav_icon"></i>Refer users</a>
						</li>
						@if(Auth::user()->type =='0')
						<li>
							<a href="{{ url('dashboard/subtrade') }}"><i class="fa fa-refresh nav_icon"></i> Subscription Trade</a>
						</li>
						@endif
					</ul>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<!--logo -->
				<div class="logo" style="padding:6px; width:200px;">
					<a href="{{ url('/') }}" style="padding-left:15px !important;">
						<h4>{{$settings->site_name}}</h4>
						
					</a>
				</div>
				<!--//logo-->
				
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<div class="profile_details" style="padding:8px; margin-top:15px;">	
					@if(Auth::user()->type =='0')
					<a href="{{ url('dashboard/notification') }}"><i style="color:white;" class="fa fa-bell text-white"></i></a> &nbsp;| 
					@endif
					<a href="#"><i class="fa fa-user "></i>  {{ Auth::user()->name }}</a>
					@if($settings->enable_kyc =="yes")
					@if(Auth::user()->account_verify=='Verified')	
				    | <a href="#"><i class="glyphicon glyphicon-ok"></i> KYC status: Account verified</a>
				    @else
				    | <a href="#" data-toggle="modal" data-target="#verifyModal">Verify Account</a> | <a>KYC status: {{Auth::user()->account_verify}}</a>
				    @endif
				    @endif
					| <a href="{{ url('dashboard/changepassword') }}"><i class="fa fa-key"></i> Change Password</a>
					| <a href="{{ url('dashboard/accountdetails') }}"><i class="fa fa-edit"></i> Update Account</a>
					| <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    	</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		
		<!-- Verify Modal -->
			<div id="verifyModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">KYC verification - Upload documents below to get verified.</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="{{action('SomeController@savevdocs')}}"  enctype="multipart/form-data">
                            <label>Valid identity card. (e.g. Drivers licence, international passport or any government approved document).</label>
                            <input type="file" name="id" required><br>
					   		<label>Passport photogragh</label>
                            <input type="file" name="passport" required><br>
                               
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Submit documents">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /Verify Modal -->