@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Add your withdrawal info</h3>
				
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
                
				<div class="sign-up-row widget-shadow">
					<form method="post" action="{{action('UsersController@updateacct')}}">
					
					<h5>Withdrawal account :</h5>
				
						
						<div class="panel panel-default" style="border:0px solid #fff;">
                                <!-- Panel Heading Starts -->
                    	<div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bank">
                                Bank transfer</a>
                            </h4>
                    	</div>
                               
                        <div id="bank" class="panel-collapse collapse">
    					
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Bank Name* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="bank_name" value="{{Auth::user()->bank_name}}">
							</div>
							<div class="clearfix"> </div>
						</div>					
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Account Name* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="account_name" value="{{Auth::user()->account_name}}" >
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Account Number* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="account_number" value="{{Auth::user()->account_no}}" >
							</div>
							<div class="clearfix"> </div>
						</div>
					

                        </div>
                    </div>
                    
                    
					
					    <div class="panel panel-default" style="border:0px solid #fff;">
                                <!-- Panel Heading Starts -->
                    	<div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#btc">
                                Bitcoin</a>
                            </h4>
                    	</div>
                               
                        <div id="btc" class="panel-collapse collapse">
    				
						<div class="sign-u">
							<div class="sign-up1">
								<h4>BTC Address* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="btc_address" value="{{Auth::user()->btc_address}}" >
							</div>
							<div class="clearfix"> </div>
						</div>
					

                        </div>
                    </div>
                    
                    <div class="panel panel-default" style="border:0px solid #fff;">
                                <!-- Panel Heading Starts -->
                    	<div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#eth">
                                Ethereum</a>
                            </h4>
                    	</div>
                               
                        <div id="eth" class="panel-collapse collapse">
    				
						<div class="sign-u">
							<div class="sign-up1">
								<h4>ETH Address* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="eth_address" value="{{Auth::user()->eth_address}}" >
							</div>
							<div class="clearfix"> </div>
						</div>
					

                        </div>
                    </div>
                    
                    <div class="panel panel-default" style="border:0px solid #fff;">
                                <!-- Panel Heading Starts -->
                    	<div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ltc">
                                Litecoin</a>
                            </h4>
                    	</div>
                               
                        <div id="ltc" class="panel-collapse collapse">
    				
						<div class="sign-u">
							<div class="sign-up1">
								<h4>LTC Address* :</h4>
							</div>
							<div class="sign-up2">
								<input type="text" name="ltc_address" value="{{Auth::user()->ltc_address}}" >
							</div>
							<div class="clearfix"> </div>
						</div>
					

                        </div>
                    </div>
					   
					
					<div class="sub_home">
						<input type="submit" value="Submit">  &nbsp; &nbsp; 
						<a href="{{ url('dashboard/skip_account') }}" style="color:red;">Skip</a>
						<div class="clearfix"> </div>
					</div>
					<input type="hidden" name="id" value="{{Auth::user()->id}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
				</form>
				</div>
			</div>
		</div>
		@include('footer')