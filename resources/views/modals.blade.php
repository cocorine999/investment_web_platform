				<!-- send all users email -->
			<div id="sendmailModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">This message will be sent to all your users.</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="{{action('UsersController@sendmail')}}">
					   		
					   		<textarea class="form-control" name="message" row="3" required=""></textarea><br/>
                               
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Send">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /send all users email Modal -->
			
			
			<!-- Deposit Modal -->
			<div id="depositModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Make new deposit</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="{{action('SomeController@deposit')}}">
					   		<input style="padding:5px;" class="form-control" placeholder="Enter amount here" type="text" name="amount" required><br/>
                               
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Continue">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /deposit Modal -->
			
			
			<!-- Withdrawal method Modal -->
			<div id="wmethodModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Add new withdrawal method</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="{{action('SomeController@addwdmethod')}}">
					   		<input style="padding:5px;" class="form-control" placeholder="Enter method name" type="text" name="name" required><br/>
					   		<input style="padding:5px;" class="form-control" placeholder="Minimum amount $" type="text" name="minimum" required><br/>
					   		<input style="padding:5px;" class="form-control" placeholder="Maximum amount $" type="text" name="maximum" required><br/>
					   		<input style="padding:5px;" class="form-control" placeholder="Charges (Fixed amount $)" type="text" name="charges_fixed" required><br/>
					   		<input style="padding:5px;" class="form-control" placeholder="Charges (Percentage %)" type="text" name="charges_percentage" required><br/>
					   		<input style="padding:5px;" class="form-control" placeholder="Payout duration" type="text" name="duration" required><br/>
					   		<select name="status" class="form-control">
					   		    <option value="">Select action</option> 
					   		    <option value="enabled">Enable</option> 
					   		    <option value="disabled">Disable</option> 
					   		</select><br/>
                             <input type="hidden" name="type" value="withdrawal">
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Continue">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /withdrawal method Modal -->


            			<!-- Withdrawal Modal -->
			<div id="withdrawalModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Payment will be sent to your recieving address.</h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="{{action('SomeController@withdrawal')}}">
					   		<input style="padding:5px;" class="form-control" placeholder="Enter amount here" type="text" name="amount" required><br/>
                               
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Submit">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /Withdrawals Modal -->

			       			<!-- Plans Modal -->
			<div id="plansModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Add new plan / package</h4>
			      </div>
			      <div class="modal-body">
              <form style="padding:3px;" role="form" method="post" action="{{action('Controller@addplan')}}">
							<label>Plan name</label><br/>	
							<input style="padding:5px;" class="form-control" placeholder="Enter Plan name" type="text" name="name" required><br/>
								 <label>Plan price</label><br/>
								 <input style="padding:5px;" class="form-control" placeholder="Enter Plan price" type="text" name="price" required><br/>
								 <label>Plan MIN. price</label><br/>		 
            					  <input style="padding:5px;" placeholder="Enter Plan minimum price" class="form-control" type="text" name="min_price" required><br/>
            					  <label>Plan MAX. price</label><br/>		 
								  <input style="padding:5px;" class="form-control" placeholder="Enter Plan maximum price" type="text" name="max_price" required><br/>
								  <label>Minimum return</label><br/>
								<input style="padding:5px;" class="form-control" placeholder="Enter minimum return" type="text" name="minr" required><br/>
								<label>Maximum return</label><br/>
								<input style="padding:5px;" class="form-control" placeholder="Enter maximum return" type="text" name="maxr" required><br/>
								<label>Gift Bonus</label><br/>
								<input style="padding:5px;" class="form-control" placeholder="Enter Additional Gift Bonus" type="text" name="gift" required><br/>	
								 <!-- <label>Plan expected return (ROI)</label><br/>
								 <input style="padding:5px;" class="form-control" placeholder="Enter expected return for this plan" type="text" name="return" required><br/> -->
								 					 
								<label>top up interval</label><br/>
                               <select class="form-control" name="t_interval">
									<option>Monthly</option>
									<option>Weekly</option>
									<option>Daily</option>
									<option>Hourly</option>
								</select><br>
								 <label>top up type</label><br/>
                               <select class="form-control" name="t_type">
																		<option>Percentage</option>
																		<option>Fixed</option>
															 </select><br>
															 <label>top up amount (in % or $ as specified above)</label><br/>
															 <input style="padding:5px;" class="form-control" placeholder="top up amount" type="text" name="t_amount" required><br/>
															 <label>Investment duration</label><br/>
                               <select class="form-control" name="expiration">
																		<option>One week</option>
																		<option>One month</option>
																	<option>Three months</option>	
																		<option>Six months</option>
																		<option>One year</option>
															 </select><br>
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Submit">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /plans Modal -->

			<!-- settings update Modal -->
			<div id="s_updModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">This settings page was last updated by</h4>
			      </div>
			      <div class="modal-body">
                        <h3>{{$settings->updated_by}}</h3>
                        
                        <h4 class="modal-title" style="text-align:center;">Date/Time</h4>
                        
                        <h3>{{$settings->updated_at}}</h3>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /settings update Modal -->


		<!-- Subscription Payment modal -->
			<div class="modal fade" id="SubpayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Subscription Payment</h4>
			      </div>

				<form style="padding:3px;" role="form" method="post" action="{{action('SomeController@deposit')}}" id="priceform">
				<div class="modal-body">
					
					<label for="subpay">Duration</label>
						<select class="form-control" onchange="calcAmount(this)" name="duration" class="duration" id="duratn">
							<option value="default">Select duration</option>
							<option>Monthly</option>
							<option>Quaterly</option>
							<option>Yearly</option>
						</select><br>

						<label>Amount to Pay</label><br/>	
						<input style="padding:5px;" class="form-control subamount" type="text" id="amount" disabled><br/>
						<input id="amountpay" type="hidden" name="amount">
						<input type="hidden" value="Subscription Trading" name="pay_type">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Pay Now</button>
				</div>
				</div>
				</form>

				<script type="text/javascript">
				function calcAmount(sub) {
					if(sub.value=="Quaterly"){
						var amount = document.getElementById('amount');
						var amountpay = document.getElementById('amountpay');
						amount.value = '<?php echo $settings->currency.$settings->quaterlyfee; ?>';
						amountpay.value = '<?php echo $settings->quaterlyfee; ?>';
					}if(sub.value=="Yearly"){
						var amount = document.getElementById('amount');
						var amountpay = document.getElementById('amountpay');
						amount.value = '<?php echo $settings->currency.$settings->yearlyfee; ?>';
						amountpay.value = '<?php echo $settings->yearlyfee; ?>';
					}if(sub.value=="Monthly"){
						var amount = document.getElementById('amount');
						var amountpay = document.getElementById('amountpay');
						amount.value = '<?php echo $settings->currency.$settings->monthlyfee; ?>';
						amountpay.value = '<?php echo $settings->monthlyfee; ?>';
					}
				}
				</script>
			</div>
			</div>
			<!-- Subscription Payment modal -->
			
			
		<!-- Submit MT4 MODAL modal -->
			<div id="submitmt4modal" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <!-- Modal content-->
			    <div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Submit your MT4 Login Details</h4>
			      </div>
			     	<div class="modal-body">
              			<form style="padding:3px;" role="form" method="post" action="{{action('Controller@savemt4details')}}">
			  				<label>MT4 ID*: </label><br/>	
							<input style="padding:5px;" class="form-control"  type="text" name="userid" required><br/>
							<label>MT4 Password*:</label><br/>	
							<input style="padding:5px;" class="form-control"  type="text" name="pswrd" required><br/>
							<label>Account Type:</label><br/>	
							<input style="padding:5px;" class="form-control" Placeholder="E.g. Standard" type="text" name="acntype" required><br/>
							<label>Currency*:</label><br/>	
							<input style="padding:5px;" class="form-control" Placeholder="E.g. USD" type="text" name="currency" required><br/>
							<label>Leverage*:</label><br/>	
							<input style="padding:5px;" class="form-control" Placeholder="E.g. 1:500"  type="text" name="leverage" required><br/>
							<label>Server*:</label><br/>	
							<input style="padding:5px;" class="form-control" Placeholder="E.g. HantecGlobal-live"  type="text" name="server" required><br/>
							<label>Subscription duration</label><br/>
							<select class="form-control" name="duration" class="duration">
								<option value="default">Select duration</option>
								<option>Monthly</option>
								<option>Quaterly</option>
								<option>Yearly</option>
							</select><br>

					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Submit">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /plans Modal -->
