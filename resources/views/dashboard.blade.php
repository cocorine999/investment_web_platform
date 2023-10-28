@include('header')
		<!-- main content start-->
		<div id="page-wrapper" style="padding-left:0px; padding-right:5px;">
			<div class="main-page mp">
				<div class="sign-u" style="background-color:#fff; padding:0px 15px 5px 15px;">
						<div class="sign-up1">
							<h4><i class="fa fa-bell"></i> {{$settings->update}}</h4>
						</div>
					<div class="clearfix"> </div>
				</div>

				
				@if(Session::has('message'))
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @endif

                @if(count($errors) > 0)
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            @foreach ($errors->all() as $error)
                            <i class="fa fa-warning"></i> {{ $error }}
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif


				<div class="row-one" style="margin-top:20px; text-align:center;">
					<div class="col-md-3 col-sm-6 rp t-b">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon1-background"></i>
                          <i class="fa fa-briefcase fa-stack-1x"></i>
                        </span>
					    DEPOSITED
					    </h4>
						<h3 style=" margin-top:20px;" title="Your account balance">
						    @foreach($deposited as $deposited)
						    @if(!empty($deposited->count))
							{{$settings->currency}}{{$deposited->count}}
							@else
							{{$settings->currency}}0.00
							@endif
							@endforeach
						</h3>
					</div>
					
					<div class="col-md-3 col-sm-6 rp t-b">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon2-background"></i>
                          <i class="fa fa-lock fa-stack-1x"></i>
                        </span>
					    PROFIT
					    </h4>
						<h3 style="margin-top:20px; text-align:center;" title="Your account balance">
							{{$settings->currency}}{{ number_format(Auth::user()->roi, 2, '.', ',')}}
						</h3>
					</div>
					
					<div class="col-md-3 col-sm-6 rp t-b">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon3-background"></i>
                          <i class="fa fa-gift fa-stack-1x"></i>
                        </span>
					    BONUS
					    </h4>
						<h3 style="margin-top:20px; text-align:center;" title="Your account balance">
							{{$settings->currency}} {{ number_format($total_bonus->bonus, 2, '.', ',')}}
						</h3>
					</div>
					<div class="col-md-3 col-sm-6 rp t-b">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon3-background"></i>
                          <i class="fa fa-bullhorn fa-stack-1x"></i>
                        </span>
					    REF. BONUS
					    </h4>
						<h3 style="margin-top:20px; text-align:center;" title="Your account balance">
							{{$settings->currency}}{{ number_format(Auth::user()->ref_bonus, 2, '.', ',')}}
						</h3>
					</div>

					<div class="col-md-4 col-sm-6 rp t-b" style="margin-top: 8px;">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon1-background"></i>
                          <i class="fa fa-money fa-stack-1x"></i>
                        </span>
					    BALANCE
					    </h4>
						<h3 style="color:green; margin-top:20px; text-align:center;" title="Your account balance">
							{{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}
						</h3>
					</div>

					<div class="col-md-4 col-sm-6 rp t-b" style="margin-top: 8px;">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon1-background"></i>
                          <i class="fa fa-unlock fa-stack-1x"></i>
                        </span>
					    TOTAL PACKAGES
					    </h4>
						<h3 style=" margin-top:20px;" title="Your account balance">
						@if(count($user_plan)>0)
						   {{$user_plan->count()}}
						@else
							0
						@endif
						</h3>
					</div>
					<div class="col-md-4 col-sm-6 rp t-b" style="margin-top: 8px;">
					    <h4>
					    <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x icon1-background"></i>
                          <i class="fa fa-unlock-alt fa-stack-1x" ></i>
						</span>
						ACTIVE PACKAGES
					    </h4>
						<h3 style=" margin-top:20px;" title="Your account balance">
							@if(count($user_plan_active)>0)
						   {{$user_plan_active->count()}}
							@else
								0
							@endif
						</h3>
					</div>
					<!--
					@if(empty($uplan))
					<div class="col-md-3 rp" style="text-align:center; color:#fa3425;">
					<h4>Activate account!<br>
					<small>
					<a style="background-color:#fa3425; color:#fff; padding:4px;" href="{{ url('dashboard/mplans') }}">Join a plan</a> 
					</small>
					</h4>
					</div>
					@else
					<div class="col-md-3 rp">
						<h4>
						    <small>Current plan</small><br>
						    <strong>{{$uplan->name}}</strong>
							 
						</h4>
					</div>
					@endif	
					-->
				</div>
				<div class="row">
					
				</div>
				<div class="clearfix"> </div>
			</div>
			
			<div id="chart-page">
                @include('chart')
        	</div>
		</div>	
	@include('footer')
	