@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Settings</h3>
				
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
                
                <div id="exTab2" class="container">	
					<ul class="nav nav-tabs">
						<li class="active">
							<a  href="#1" data-toggle="tab">Website Information</a>
						</li>
						<li>
							<a href="#2" data-toggle="tab">Website Settings/Preference</a>
						</li>
						<li>
							<a href="#3" data-toggle="tab">Bot Settings</a>
						</li>
						<li>
							<a href="#4" data-toggle="tab">Bonus/Ref. commission</a>
						</li>
						<li>
							<a href="#5" data-toggle="tab">Payment/Settings</a>
						</li>
						<li>
							<a href="#6" data-toggle="tab">Subscription Fees Settings</a>
						</li>
					</ul>

						<div class="tab-content ">

							<div class="tab-pane active" id="1">
								<div class="sign-up-row widget-shadow">
									<form method="post" action="{{action('SomeController@updatewebinfo')}}" enctype="multipart/form-data">
										<div class="sign-u">
											<div class="sign-up1">
												<h5>Announcement :</h4>
											</div>
											<div class="sign-up2">
												<textarea name="update" class="form-control" rows="2">{{$settings->update}}</textarea>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sign-u">
											
											<div class="sign-up1">
												<h4>Site Name* :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="site_name" value="{{$settings->site_name}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Site Description :</h4>
											</div>
											<div class="sign-up2">
												<textarea name="description" class="form-control" rows="1">{{$settings->description}}</textarea>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Live chat widget:</h4>
											</div>
											<div class="sign-up2">
												<textarea name="tawk_to" class="form-control" rows="2">{{$settings->tawk_to}}</textarea>
											</div>
											<div class="clearfix"> </div>
										</div>
									
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Site Title :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="site_title" value="{{$settings->site_title}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Site Keywords :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="keywords" value="{{$settings->keywords}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Site URL* :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="site_address" value="{{$settings->site_address}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>

										<div class="sign-u">
											<div class="sign-up1">
												<h4>Site Logo : <small>Recommended size; max width, 200px and max height 100px.</small></h4>
											</div>
											<div class="sign-up2">
												<input style="padding-bottom:39px;" name="logo" class="form-control" type="file">
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sub_home">
										<input type="submit" value="Save">
										<div class="clearfix"> </div>
									</div>
									<input type="hidden" name="id" value="1">
									<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
									</form>
									
								</div>
							</div>

							<div class="tab-pane" id="2">
								<div class="sign-up-row widget-shadow">
									<form method="post" action="{{action('SomeController@updatepreference')}}" enctype="multipart/form-data">
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Contact email* :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="contact_email" value="{{$settings->contact_email}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										<input name="s_currency" value="{{ $settings->s_currency }}" id="s_c" type="hidden">

										<div class="sign-u">
											<div class="sign-up1">
												<h4>My currency:</h4>
											</div>
											<div class="sign-up2">
												<select name="currency" id="select_c" class="form-control" style="height:40px;" onchange="s_f()">
												<option value="<?php echo htmlentities($settings->currency); ?>">{{ $settings->currency }}</option>
												@foreach($currencies as $key=>$currency)
												<option id="{{$key}}" value="<?php echo htmlentities($currency); ?>">{{$key .' ('.$currency.')'}}</option>
												@endforeach
											</select>
											</div>
											<div class="clearfix"> </div>
										</div>
									
										<script>
											function s_f(){
												var e = document.getElementById("select_c");
												var selected = e.options[e.selectedIndex].id;
												document.getElementById("s_c").value = selected;
											}
										</script>

									
									
									
									<!--<div class="sign-u">
										<div class="sign-up1">
											<h4>Dashboard option:</h4>
										</div>
										<div class="sign-up2">
											<br/><select name="dashboard_option" class="form-control">
												<option value="{{$settings->dashboard_option}}">Currently ({{$settings->dashboard_option}})</option>
												<option>Online Trade</option>
												<option>Mining</option>
											</select>
										</div>
										<div class="clearfix"> </div>
									</div>-->
									
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Site preference:</h4>
											</div>
											<div class="sign-up2">
												<br/><select name="site_preference" class="form-control">
													<option value="{{$settings->site_preference}}">Currently ({{$settings->site_preference}})</option>
													<option>Web dashboard only</option>
													<option>Telegram bot only</option>
													<!--<option>Enable both</option>-->
												</select>
											</div>
											<div class="clearfix"> </div>
											<div class="sign-u">
												<div class="sign-up1">
													<h4>Site colour:</h4>
												</div>
												<div class="sign-up2" style="margin-top:20px;">
												<input type="radio" id="colour1" value="default" name="site_colour"> Default <span style="border-radius:150px; background-color:#333; color:#333;">11</span>
												
												<input type="radio" id="colour2" value="blue" name="site_colour"> Blue <span style="border-radius:150px; background-color:#2882C0; color:#2882C0;">22</span>
												</div>
												<div class="clearfix"> </div>
											</div>


											<div class="sign-u">
											<div class="sign-up1">
												<h4>Verify registration:</h4>
											</div>
											<div class="sign-up2">
											<label class="switch">
												<input name="enable_verification" id="enable_verification" type="checkbox" value="true">
												<span class="slider round"></span>
											</label>
											</div>
											<div class="clearfix"> </div>
										</div>

										<div class="sign-u">
											<div class="sign-up1">
												<h4>Turn on/off trade:</h4>
											</div>
											<div class="sign-up2">
											<label class="switch">
												<input name="trade_mode" id="check" type="checkbox" value="on">
												<span class="slider round"></span>
											</label>
											</div>
											<div class="clearfix"> </div>
										</div>
										
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Turn on/off 2FA:</h4>
											</div>
											<div class="sign-up2">
											<label class="switch">
												<input name="enable_2fa" id="2fa_check" type="checkbox" value="yes">
												<span class="slider round"></span>
											</label>
											</div>
											<div class="clearfix"> </div>
										</div>
										
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Turn on/off KYC:</h4>
											</div>
											<div class="sign-up2">
												<label class="switch">
												<input name="enable_kyc" id="kyc_check" type="checkbox" value="yes">
												<span class="slider round"></span>
											</label>
											</div>
											<div class="clearfix"> </div>
										</div>
										@if($settings->trade_mode=='on')
										<script>document.getElementById("check").checked= true;</script>
									@endif
									
									@if($settings->enable_2fa=='yes')
										<script>document.getElementById("2fa_check").checked= true;</script>
									@endif
									
									@if($settings->enable_kyc=='yes')
										<script>document.getElementById("kyc_check").checked= true;</script>
									@endif
									
									@if($settings->enable_verification=='true')
										<script>document.getElementById("enable_verification").checked= true;</script>
									@endif


											<?php
											if($settings->site_colour=="default"){
												echo'
												<script>document.getElementById("colour1").checked= true;</script>
												';
												}
												if($settings->site_colour=="blue"){
													echo'
													<script>document.getElementById("colour2").checked= true;</script>
													';
												}
												
												//for  bot actuvate checkbox
												if($settings->bot_activate=="true"){
													echo'
													<script>document.getElementById("bot_activate").checked= true;</script>
													';
												}
											?>
										</div>

										<div class="sub_home">
										<input type="submit" value="Save">
										<div class="clearfix"> </div>
									</div>
									<input type="hidden" name="id" value="1">
									<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
									</form> 
								</div>
							</div>

							<div class="tab-pane" id="3">
								<div class="sign-up-row widget-shadow">
									<form method="post" action="{{action('SomeController@updatebot')}}" enctype="multipart/form-data">
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Bot Link* :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="bot_link" value="{{$settings->bot_link}}">
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Telegram Token:</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="telegram_token" value="{{$settings->telegram_token}}">
											</div>
											<div class="clearfix"> </div>
										</div>
										
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Bot group chat link:</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="bot_group_chat" value="{{$settings->bot_group_chat}}">
											</div>
											<div class="clearfix"> </div>
										</div>
										
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Bot channel link:</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="bot_channel" value="{{$settings->bot_channel}}">
											</div>
											<div class="clearfix"> </div>
										</div>
										
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Activate/Deactivate bot:</h4>
											</div>
											<div class="sign-up2">
											<label class="switch">
											<input type="checkbox" id="bot_activate" name="bot_activate" value="true">
											<span class="slider round"></span>
											</label>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sub_home">
										<input type="submit" value="Save">
										<div class="clearfix"> </div>
									</div>
									<input type="hidden" name="id" value="1">
									<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
									</form>
								</div>
							</div>
							

							<div class="tab-pane" id="4">
								<div class="sign-up-row widget-shadow">
									<form method="post" action="{{action('SomeController@updatebotswt')}}" enctype="multipart/form-data">
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Referral Commission (%) :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="ref_commission" value="{{$settings->referral_commission}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Referral Commission 1 (%) :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="ref_commission1" value="{{$settings->referral_commission1}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Referral Commission 2 (%) :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="ref_commission2" value="{{$settings->referral_commission2}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Referral Commission 3 (%) :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="ref_commission3" value="{{$settings->referral_commission3}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Referral Commission 4 (%) :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="ref_commission4" value="{{$settings->referral_commission4}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Referral Commission 5 (%) :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="ref_commission5" value="{{$settings->referral_commission5}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Sign up Bonus ({{$settings->currency}}):</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="signup_bonus" value="{{$settings->signup_bonus}}" required>
											</div>
											<div class="clearfix"> </div>
										</div>
										
										
										<div class="sub_home">
										<input type="submit" value="Save">
										<div class="clearfix"> </div>
									</div>
									<input type="hidden" name="id" value="1">
									<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
									</form>
								</div>
							</div>

							<div class="tab-pane" id="5">
								<div class="sign-up-row widget-shadow">

								<!-- Withdrawal methods -->
								<h3 style="text-align:center; margin:10px 0px 10px 0px;">Withdrawal methods</h3>
									<a class="btn btn-default" href="#" data-toggle="modal" data-target="#wmethodModal"><i class="fa fa-plus"></i> Add new</a><br/><br/>
									
									@foreach($wmethods as $method)
									<div class="panel panel-default" style="border:0px solid #fff;">
												<!-- Panel Heading Starts -->
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#method{{$method->id}}">
												{{$method->name}}</a>
											</h4>
										</div>
											
										<div id="method{{$method->id}}" class="panel-collapse collapse">
										<div class="sign-u">
											<br/>
											<a class="btn btn-default" href="#" data-toggle="modal" data-target="#wmethodModal{{$method->id}}"><i class="fa fa-pencil"></i> Edit</a> &nbsp; &nbsp;
											<a class="btn btn-danger" href="{{url('dashboard/deletewdmethod')}}/{{$method->id}}"><i class="glyphicon glyphicon-trash"></i></a> 
										</div>

										</div>
									</div>
									
							<!-- Edit Withdrawal method Modal -->
							<div id="wmethodModal{{$method->id}}" class="modal fade" role="dialog">
							<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" style="text-align:center;">Edit withdrawal method</h4>
										</div>
										<div class="modal-body">
												<form style="padding:3px;" role="form" method="post" action="{{action('SomeController@updatewdmethod')}}">
													<label>Enter method name</label>
													<input style="padding:5px;" class="form-control" placeholder="Enter method name" type="text" name="name" value="{{$method->name}}" required><br/>
													<label>Minimum amount $</label>
													<input style="padding:5px;" class="form-control" placeholder="Minimum amount $" type="text" name="minimum" value="{{$method->minimum}}" required><br/>
													<label>Maximum amount $</label>
													<input style="padding:5px;" class="form-control" placeholder="Maximum amount $" type="text" name="maximum" value="{{$method->maximum}}" required><br/>
													<label>Charges (Fixed amount $)</label>
													<input style="padding:5px;" class="form-control" placeholder="Charges (Fixed amount $)" type="text" name="charges_fixed" value="{{$method->charges_fixed}}" required><br/>
													<label>Charges (Percentage %)</label>
													<input style="padding:5px;" class="form-control" placeholder="Charges (Percentage %)" type="text" name="charges_percentage" value="{{$method->charges_percentage}}" required><br/>
													<label>Duration</label>
													<input style="padding:5px;" class="form-control" placeholder="Payout duration" type="text" name="duration" value="{{$method->duration}}" required><br/>
													<label>Method status</label>
													<select name="status" class="form-control">
														<option>{{$method->status}}</option> 
														<option value="enabled">Enable</option> 
														<option value="disabled">Disable</option> 
													</select><br/>
													<input type="hidden" name="type" value="withdrawal">
													<input type="hidden" name="id" value="{{$method->id}}">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="submit" class="btn btn-default" value="Continue">
											</form>
										</div>
										</div>
									</div>
									</div>
									<!-- /edit withdrawal method Modal -->
											@endforeach
											<!-- End withdrawal method -->

									<form method="post" action="{{action('SomeController@updatesettings')}}" enctype="multipart/form-data">
									<div class="sign-u">
										<div class="sign-up1">
											<h4>Deposit/Withdrawal option:</h4>
										</div>
										<div class="sign-up2">
											<br/><select name="withdrawal_option" class="form-control">
												<option value="{{$settings->withdrawal_option}}">Currently ({{$settings->withdrawal_option}})</option>
												<option>manual</option>
												<option>auto</option>
											</select>
										</div>
										<div class="clearfix"> </div>
									</div>

									<!-- Payment info and methods -->
									<h3 style="text-align:center; margin:10px 0px 10px 0px;">Payment methods</h3>
									<a class="btn btn-default btn-lg" href="#" data-toggle="modal" data-target="#cpdModal"> Set up Coinpayments</a><br/><br/>
									

									<div class="panel panel-default" style="border:0px solid #fff;">
												<!-- Panel Heading Starts -->
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bank">
												Bank deposit or transfer</a>
											</h4>
										</div>
											
										<div id="bank" class="panel-collapse collapse">
											<div class="sign-u">
										<div class="sign-up1">
											<h4>Bank name :</h4>
										</div>
										<div class="sign-up2">
											<input type="text" name="bank_name" value="{{$settings->bank_name}}">
										</div>
										<div class="clearfix"> </div>
									</div>

									<div class="sign-u">
										<div class="sign-up1">
											<h4>Account name :</h4>
										</div>
										<div class="sign-up2">
											<input type="text" name="account_name" value="{{$settings->account_name}}">
										</div>
										<div class="clearfix"> </div>
									</div>

									<div class="sign-u">
										<div class="sign-up1">
											<h4>Account number :</h4>
										</div>
										<div class="sign-up2">
											<input type="text" name="account_number" value="{{$settings->account_number}}">
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
											<h4>BTC address :</h4>
										</div>
										<div class="sign-up2">
											<input type="text" name="btc_address" value="{{$settings->btc_address}}">
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
											<h4>LTC address :</h4>
										</div>
										<div class="sign-up2">
											<input type="text" name="ltc_address" value="{{$settings->ltc_address}}">
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
												<h4>ETH address :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="eth_address" value="{{$settings->eth_address}}">
											</div>
											<div class="clearfix"> </div>
										</div>
										</div>
									</div>

									<div class="panel panel-default" style="border:0px solid #fff;">
												<!-- Panel Heading Starts -->
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#card">
												Credit Card (Stripe)</a>
											</h4>
										</div>
											
										<div id="card" class="panel-collapse collapse">
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Stripe secret key :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="s_s_k" value="{{$settings->s_s_k}}">
											</div>
											<div class="clearfix"> </div>
										</div>

										<div class="sign-u">
											<div class="sign-up1">
												<h4>Stripe publishable key :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="s_p_k" value="{{$settings->s_p_k}}">
											</div>
											<div class="clearfix"> </div>
										</div>
										</div>
									</div>
									
									<div class="panel panel-default" style="border:0px solid #fff;">
												<!-- Panel Heading Starts -->
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#pp">
												PayPal</a>
											</h4>
										</div>
											
										<div id="pp" class="panel-collapse collapse">
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Paypal client ID :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="pp_ci" value="{{$settings->pp_ci}}">
											</div>
											<div class="clearfix"> </div>
										</div>

										<div class="sign-u">
											<div class="sign-up1">
												<h4>Paypal client secret :</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="pp_cs" value="{{$settings->pp_cs}}">
											</div>
											<div class="clearfix"> </div>
										</div>
										</div>
									</div>
									
									<div class="sign-u">
										<div class="sign-up1">
											<h4>Payment mode:</h4>
										</div>
										<div class="sign-up2">
										<input type="checkbox" id="check1" value="1" name="payment_mode1"> Bank transfer &nbsp; &nbsp;
										<input type="checkbox" id="check3" value="3" name="payment_mode3"> Ethereum &nbsp; &nbsp;
										<input type="checkbox" id="check2" value="2" name="payment_mode2"> Bitcoin <br>
										<input type="checkbox" id="check4" value="4" name="payment_mode4"> Litecoin &nbsp; &nbsp;
										<input type="checkbox" id="check6" value="6" name="payment_mode6"> Paypal &nbsp; &nbsp;
										<input type="checkbox" id="check5" value="5" name="payment_mode5"> Credit card (Stripe) 
										&nbsp; &nbsp;
										
										</div>
										<div class="clearfix"> </div>
									</div>
									<?php 
										$pmodes = str_split($settings->payment_mode);
										foreach($pmodes as $pmode){
											if($pmode==1){
											echo'
											<script>document.getElementById("check1").checked= true;</script>
											';
											}
											if($pmode==2){
												echo'
												<script>document.getElementById("check2").checked= true;</script>
												';
											}
											if($pmode==3){
												echo'
												<script>document.getElementById("check3").checked= true;</script>
												';
											}
											if($pmode==4){
												echo'
												<script>document.getElementById("check4").checked= true;</script>
												';
											}
											if($pmode==5){
												echo'
												<script>document.getElementById("check5").checked= true;</script>
												';
											}
											if($pmode==6){
												echo'
												<script>document.getElementById("check6").checked= true;</script>
												';
											}
										}
									?>

									<!-- end Payment info and methods -->
									
									
								<div class="sub_home">
									<input type="submit" value="Save">
									<div class="clearfix"> </div>
								</div>
								<input type="hidden" name="id" value="1">
								<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
								</form>
									
									<!-- set up coinpayments Modal -->
								<div id="cpdModal" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title" style="text-align:center;">Coinpayments set up</h4>
											</div>
											<div class="modal-body">
												<form style="padding:3px;" role="form" method="post" action="{{action('SomeController@updatecpd')}}">
													<label>Merchant ID</label>
													<input style="padding:5px;" class="form-control" placeholder="Merchant ID" type="text" name="cp_m_id" value="{{$cpd->cp_m_id}}" required><br/>
													
													<label>CoinPayment IPN Secret</label>
													<input style="padding:5px;" class="form-control" placeholder="CoinPayment IPN Secret" type="text" name="cp_ipn_secret" value="{{$cpd->cp_ipn_secret}}" required><br/>
													
													<label>CoinPayments debug email</label>
													<input style="padding:5px;" class="form-control" placeholder="CoinPayments debug email" type="text" name="cp_debug_email" value="{{$cpd->cp_debug_email}}" required><br/>
													
													<label>Public key</label>
													<input style="padding:5px;" class="form-control" placeholder="Public key" type="text" name="cp_p_key" value="{{$cpd->cp_p_key}}" required><br/>
													
													<label>Private key</label>
													<input style="padding:5px;" class="form-control" placeholder="Private key" type="text" name="cp_pv_key" value="{{$cpd->cp_pv_key}}" required><br/>
												
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="submit" class="btn btn-default" value="Submit">
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
							<!-- /set up coinpayments Modal -->
							<div class="tab-pane" id="6">
								<div class="sign-up-row widget-shadow">
									<form method="post" action="{{action('SomeController@updatesubfee')}}">
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Monthly Subscription Fee:</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="monthlyfee" value="{{$settings->monthlyfee}}">
											</div>
											<div class="clearfix"> </div>
										</div>

										<div class="sign-u">
											<div class="sign-up1">
												<h4>Quaterly Subscription Fee:</h4>
											</div>
											<div class="sign-up2">
										<input type="text" name="quaterlyfee" value="{{$settings->quaterlyfee}}">
											</div>
											<div class="clearfix"> </div>
										</div>
										
										<div class="sign-u">
											<div class="sign-up1">
												<h4>Yearly Subscription Fee:</h4>
											</div>
											<div class="sign-up2">
												<input type="text" name="yearlyfee" value="{{$settings->yearlyfee}}">
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="sub_home">
											<input type="submit" value="Save">											<div class="clearfix"> </div>
										</div>
										<input type="hidden" name="id" value="1">
										<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
									</form>
								</div>
							</div>

								</div>
							</div>
						</div>
					</div>
				
				


					
				</div>
			</div>
		</div>
		@include('modals')
		<script type="text/javascript">
					var badWords = [ 
					    '<!--Start of Tawk.to Script-->',
                        '<script type="text/javascript">', 
                        '<!--End of Tawk.to Script-->'
                                ];
                    $(':input').on('blur', function(){
                      var value = $(this).val();
                      $.each(badWords, function(idx, word){
                        value = value.replace(word, '');
                      });
                      $(this).val( value);
                    });
		</script>

		<script type="text/javascript">
            // $(window).on('load',function(){
            //  $('#s_updModal').modal('show');
            // });
        </script>
		@include('footer')