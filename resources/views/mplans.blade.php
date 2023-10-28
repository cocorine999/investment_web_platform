@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Available packages</h3>
				
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

						<div class="row">
						@foreach($plans as $plan)
                		<div class="col-lg-4 ">
							<div class="sign-up-row widget-shadow nav-pills" style="width:100%; padding:0px;">
								<h3 style="background-color:#B0B0B0  ; text-align:center; padding:20px;" class=" ">
								{{$plan->name}}
							
								</h3>
								<div style="padding:15px; text-align:center;">
									<h4><strong>{{$settings->currency}}{{$plan->price}}+</strong><br><br><small> <b>Min. Possible deposit:</b>  {{$settings->currency}}{{$plan->min_price}} <br><b>Max. Possible deposit:</b> {{$settings->currency}}{{$plan->max_price}}</small></h4>
									<hr>
									<p><i class="fa fa-star"></i>{{$settings->currency}}{{$plan->minr}} Minimum return</p>
									<hr>
									<p><i class="fa fa-star"></i>{{$settings->currency}}{{$plan->maxr}} Maximum return</p>
									<hr>
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
            					   		<input type="submit" class="btn btn-block pricing-action btn-primary nav-pills" value="Join plan" style=" border-radius: 40px;">
            					   </form>
								</div>
							</div>
						</div>

				<!-- Deposit for a plan Modal -->
				<div id="depositModal{{$plan->id}}" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">Make a deposit of <strong>{{$settings->currency}}{{$plan->price}} to join this plan</strong></h4>
			      </div>
			      <div class="modal-body">
                        <form style="padding:3px;" role="form" method="post" action="{{action('SomeController@deposit')}}">
					   		<input style="padding:5px;" class="form-control" value="{{$plan->price}}" type="text" name="amount" required><br/>
                               
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="hidden" name="pay_type" value="plandeposit">
					   		<input type="hidden" name="plan_id" value="{{$plan->id}}">
					   		<input type="submit" class="btn btn-default" value="Continue">
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /deposit for a plan Modal -->
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
		@include('modals')
		@include('footer')