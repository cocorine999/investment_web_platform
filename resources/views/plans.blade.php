@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Available Plans</h3>
				
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

				<a class="btn btn-default" href="#" data-toggle="modal" data-target="#plansModal"><i class="fa fa-plus"></i> New plan</a>

                <div class="containter">
						<div class="row">
						<h2>Main plans</h2>
						@foreach($plans as $plan)
                		<div class="col-lg-4">
							<div class="sign-up-row widget-shadow" style="width:100%; padding:0px;">
								<h3 style="background-color:#e9e9e9; padding:20px;">
								{{$plan->name}}
								@if(Auth::user()->type=="1")
								<a href="#" data-toggle="modal" data-target="#editplansModal{{$plan->id}}" class="btn btn-default"><i class="fa fa-pencil"></i></a>&nbsp; &nbsp;
								<a href="{{ url('dashboard/trashplan') }}/{{$plan->id}}" class="btn btn-default"><i class="glyphicon glyphicon-trash"></i></a>
								@endif
								</h3>
								<div style="padding:20px; text-align:center;">
								<h4><strong>{{$settings->currency}}{{$plan->price}}+</strong><br><br><small> <b>Min. Possible deposit:</b>  {{$settings->currency}}{{$plan->min_price}} <br><b>Max. Possible deposit:</b> {{$settings->currency}}{{$plan->max_price}}</small></h4>
									<hr>
									<p><i class="fa fa-star"></i>{{$settings->currency}}{{$plan->minr}} Minimum return</p>
									<hr>
									<p><i class="fa fa-star"></i>{{$settings->currency}}{{$plan->maxr}} Maximum return</p>
									<hr>
									<p><i class="fa fa-gift"></i> {{$settings->currency}}{{$plan->gift}} Gift Bonus</p>
									<hr>
									<form style="padding:3px;" role="form" method="post" action="{{action('Controller@joinplan')}}">
					                    <label>Amount to invest: ({{$settings->currency}}{{$plan->price}} default)</label><br><br>
                                        <input type="number" min="{{$plan->min_price}}" max="{{$plan->max_price}}" name="iamount" placeholder="{{$settings->currency.$plan->price}}" class="form-control">
                                       <hr>
            							   <label>Select investment duration</label><br/>
                                           <select class="form-control" name="" style="border:0px solid #fff; height:50px; font-weight:bold;" disabled>
            									<option>{{$plan->expiration}}</option>
            								</select><br>
											<input type="hidden" name="duration" value="{{$plan->expiration}}">
            							   <input type="hidden" name="id" value="{{ $plan->id }}">
            					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
            					   		<input type="submit" class="btn btn-default" value="Join plan">
            					   </form>
								</div>
							</div>
						</div>

						<!-- edit Plans Modal -->
			<div id="editplansModal{{$plan->id}}" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Add new plan / package</h4>
			      </div>
			      <div class="modal-body">
              		<form style="padding:3px;" role="form" method="post" action="{{action('Controller@updateplan')}}">
					  <label>Plan name</label><br/>	   
					  <input style="padding:5px;" class="form-control" value="{{$plan->name}}" type="text" name="name" required><br/>
					  <label>Plan price</label><br/>		 
					  <input style="padding:5px;" class="form-control" value="{{$plan->price}}" type="text" name="price" required><br/>
					  <label>Plan MIN. price</label><br/>		 
					  <input style="padding:5px;" class="form-control" value="{{$plan->min_price}}" type="text" name="min_price" required><br/>
					  <label>Plan MAX. price</label><br/>		 
					  <input style="padding:5px;" class="form-control" value="{{$plan->max_price}}" type="text" name="max_price" required><br/>
					  <label>Minimum return</label><br/>
					<input style="padding:5px;" class="form-control" value="{{$plan->minr}}" placeholder="Enter minimum return" type="text" name="minr" required><br/>
					<label>Maximum return</label><br/>
					<input style="padding:5px;" class="form-control" value="{{$plan->maxr}}"  placeholder="Enter maximum return" type="text" name="maxr" required><br/>
					<label>Gift Bonus</label><br/>
					<input style="padding:5px;" class="form-control" value="{{$plan->gift}}"  placeholder="Enter Additional Gift Bonus" type="text" name="gift" required><br/>
					  <!-- <label>Plan expected return (ROI)</label><br/>
					  <input style="padding:5px;" class="form-control" placeholder="Enter expected return" value="{{$plan->expected_return}}" type="text" name="return" required><br/> -->
					  
					  
								 <label>top up interval</label><br/>
                               <select class="form-control" name="t_interval">
									<option>{{$plan->increment_interval}}</option>
									<option>Monthly</option>
									<option>Weekly</option>
									<option>Daily</option>
									<option>Hourly</option>
								</select><br>
								<label>top up type</label><br/>
                               <select class="form-control" name="t_type">
									<option>{{$plan->increment_type}}</option>
									<option>Percentage</option>
									<option>Fixed</option>
								</select><br>
								<label>top up amount (in % or $ as specified above)</label><br/>
                               <input style="padding:5px;" class="form-control" value="{{$plan->increment_amount}}" placeholder="top up amount" type="text" name="t_amount" required><br/>
							   <label>Investment duration</label><br/>
                               <select class="form-control" name="expiration">
									<option>{{$plan->expiration}}</option>
									<option>One week</option>
									<option>One month</option>
									<option>Three months</option>
									<option>Six months</option>
									<option>One year</option>
								</select><br>
							   <input type="hidden" name="id" value="{{ $plan->id }}">
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="submit" class="btn btn-default" value="Submit">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /edit plans Modal -->
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
		@include('modals')
		@include('footer')