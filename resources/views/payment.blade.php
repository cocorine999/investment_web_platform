@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				
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

                    @if($title=="Complete Payment")
						<div class="sign-u">
							<div class="sign-up1 alert-success" style="padding:20px; text-align:center;">
								<h4>You are to send <strong>{{$amount}} {{$coin}}</strong> to the address below or scan the QR code to complete payment.</h4>
								
								<h4><strong>{{$p_address}}</strong></h4><br>
								<img width="220" height="220" alt="Payment QR code" src="{{$p_qrcode}}">
							</div>
						</div>
                    @elseif($title == "Pay with card")
						<form action="charge" method="post">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
								data-key="{{$settings->s_p_k}}"
								data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
								data-name="{{$settings->site_name}}"
								data-description="Account fund"
								data-amount="{{$t_p}}"
								data-locale="auto">
							</script>
						</form>
                    @else
						<div class="sign-u" style="background-color:#fff; padding:20px;">
							<div class="sign-up1">
								<h4>You are to make payment of <strong>{{$settings->currency}}{{$amount}}</strong> using your preferred mode of payment below.</h4>
								

								<?php 
								$pmodes = str_split($settings->payment_mode);
								?>
							@foreach($pmodes as $pmode)
								@if($pmode==1)
								<div class="panel panel-default" style="border:0px solid #fff;">
									<!-- Panel Heading Starts -->
									<h4>
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bank">
										<strong>Bank deposit/transfer </strong>
										<img src="{{ asset('home/images/bank-transfer.png')}}" width="70px;" height="40px;"> 
										</a>
									</h4>
									<div id="bank" class="panel-collapse collapse">
										<div class="alert alert-success alert-dismissable">
											<h4><strong>Bank name:</strong> {{$settings->bank_name}}.</h4>
											<h4><strong>Account name:</strong> {{$settings->account_name}}.</h4>
											<h4><strong>Account number:</strong> {{$settings->account_number}}.</h4>
										</div>
									</div>
								</div>
								@endif

								@if($pmode==3)
								<div class="panel panel-default" style="border:0px solid #fff;">
									<!-- Panel Heading Starts -->
									<h4>
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#eth">
										<strong>Ethereum</strong>
										<img src="{{ asset('home/images/eth.png')}}" width="60px;" height="60px;">
										</a>
									</h4>
									<div id="eth" class="panel-collapse collapse">
										<div class="alert alert-success alert-dismissable">
											<h4>
											<strong>Manual ETH Address:</strong> {{$settings->eth_address}}
											
											<br/><br/>
											@if($settings->withdrawal_option != "manual")
											<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-default">Automatic payment method</a>
											@endif
											</h4>
										</div>
									</div>
								</div>
									
								@endif

								@if($pmode==2)
								<div class="panel panel-default" style="border:0px solid #fff;">
									<!-- Panel Heading Starts -->
									<h4>
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#btc">
										<strong>Bitcoin</strong>
										<img src="{{ asset('home/images/btc.png')}}" width="60px;" height="60px;">
										</a>
									</h4>
									<div id="btc" class="panel-collapse collapse">
										<div class="alert alert-success alert-dismissable">
											<h4>
											<strong>Manual BTC Address:</strong> {{$settings->btc_address}}
											
											<br/><br/>
											@if($settings->withdrawal_option != "manual")
											<a href="{{ url('dashboard/cpay') }}/{{$amount}}/BTC/{{ Auth::user()->id }}/new" class="btn btn-default">Automatic payment method</a>
											@endif
											</h4>
										</div>
									</div>
								</div>
								@endif

								

								@if($pmode==4)
								<div class="panel panel-default" style="border:0px solid #fff;">
									<!-- Panel Heading Starts -->
									<h4>
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ltc">
										<strong>Litecoin</strong>
										<img src="{{ asset('home/images/ltc.png')}}" width="60px;" height="60px;">
										</a>
									</h4>
									<div id="ltc" class="panel-collapse collapse">
										<div class="alert alert-success alert-dismissable">
											<h4>
											<strong>Manual LTC Address:</strong> {{$settings->ltc_address}}
											<br/><br/>
											@if($settings->withdrawal_option != "manual")
											<a href="{{ url('dashboard/cpay') }}/{{$amount}}/LTC/{{ Auth::user()->id }}/new" class="btn btn-default">Automatic payment method</a>
											@endif
											</h4>
										</div>
									</div>
								</div>
								@endif
								
								@if($pmode==5)
								
								<div class="panel panel-default" style="border:0px solid #fff;">
									<!-- Panel Heading Starts -->
									
									<h4>
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#stripe">
										<strong>Credit card 
										<img src="{{ asset('home/images/c3.jpg')}}" width="70px;" height="40px;"> 
										<img src="{{ asset('home/images/c2.jpg')}}" width="70px;" height="40px;">
										</strong>
										</a>
									</h4>
									<div id="stripe" class="panel-collapse collapse">
										<div class="alert alert-success alert-dismissable">
											<h4>
												
											<br/>
											<a href="{{ url('dashboard/paywithcard') }}/{{$amount}}" class="btn btn-default">Pay with card</a>
											
											</h4>
										</div>
									</div>
								</div>
										
								@endif
								
								@if($pmode==6)
								
								<div class="panel panel-default" style="border:0px solid #fff;">
									<!-- Panel Heading Starts -->
									
									<h4>
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#paypal">
										<strong>PayPal</strong> <img src="{{ asset('home/images/pp.png')}}" width="60px;" height="60px;">
										</a>
									</h4>
									<div id="paypal" class="panel-collapse collapse">
										<div class="alert alert-success alert-dismissable">
											<h4>
												
											@include('paypal')
											
											</h4>
										</div>
									</div>
								</div>
										
								@endif
							@endforeach

								<div class="alert alert-danger alert-dismissable">
									<h4>Contact management at <strong>{{$settings->contact_email}}</strong> for other payment methods.</h4>
								</div>							
							</div>
							
							<div class="clearfix"> </div>
						</div>
					
						<form method="post" action="{{action('SomeController@savedeposit')}}" enctype="multipart/form-data" style="background-color:#fff; padding:20px; margin-top:10px;">
							<div class="sign-u">
								<div class="sign-up1">
									<label>Upload Payment proof after payment. (Ignore if paid with card).</label>
								</div>
								<div class="sign-up2">
									<input type="file" name="proof" required>
								</div>
								<div class="clearfix"> </div>
							</div><br>

							<div class="sign-u">
								<div class="sign-up1">
									<label>Payment mode:</label>
								</div>
								<div class="sign-up2">
								<select name="payment_mode" style="height:40px;">
									<option>Bank transfer</option>
									<option>Ethereum</option>
									<option>Bitcoin</option>
									<option>Credit card</option>
								</select>
								</div>
								<div class="clearfix"> </div>
							</div>

							<div class="sub_home">
								<input type="submit" class="btn btn-default" value="Submit payment">
								<div class="clearfix"> </div>
							</div>
							<input type="hidden" name="amount" value="{{$amount}}">
							<input type="hidden" name="pay_type" value="{{$pay_type}}">
							<input type="hidden" name="plan_id" value="{{$plan_id}}">
							<!--<input type="hidden" name="payment_mode" value="{{$payment_mode}}">-->
							<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
						</form>
				@endif
			</div>
		</div>
		@include('footer')