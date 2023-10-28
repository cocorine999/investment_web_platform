@include('header')
<!-- //header-ends -->
<!-- main content start-->
<div id="page-wrapper">
	<div class="main-page signup-page">
		<h3 class="title1">{{$settings->site_name}} users list</h3>

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

		<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
			<span style="margin:3px;">
				{{$users->render()}}
			</span>

			<form style="padding:3px; float:right;" role="form" method="post" action="{{action('Controller@search')}}">
				<a class="btn btn-default" href="{{ url('dashboard/manageusers') }}">Show all</a>
				<input style="padding:5px; margin-top:15px;" placeholder="Search user" type="text" name="searchItem" required>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="type" value="subscription">
				<input type="submit" style="margin-top:-5px;" class="btn btn-default" value="Go">
			</form>

			<a href="#" data-toggle="modal" data-target="#sendmailModal" class="btn btn-default btn-lg" style="margin:10px;">Message all</a>
			@if($settings->enable_kyc =="yes")
			<a href="{{ url('dashboard/kyc') }}" class="btn btn-default btn-lg">KYC</a>
			@endif

			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Balance</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Inv. plan</th>
						<th>Status</th>
						<th>Date registered</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $list)
					<tr>
						<th scope="row">{{$list->id}}</th>
						<td>${{$list->account_bal}}</td>
						<td>{{$list->name}}</td>
						<td>{{$list->l_name}}</td>
						<td>{{$list->email}}</td>
						<td>{{$list->phone_number}}</td>
						@if(isset($list->dplan->name))
						<td>{{$list->dplan->name}}</td>
						@else
						<td>NULL</td>
						@endif
						<td>{{$list->status}}</td>
						<td>{{$list->created_at}}</td>
						<td>
							@if($list->status==NULL || $list->status=='blocked')
							<a class="btn btn-default" href="{{ url('dashboard/unblock') }}/{{$list->id}}">Unblock</a>
							@else
							<a class="btn btn-default" href="{{ url('dashboard/ublock') }}/{{$list->id}}">Block</a>
							@endif
							@if($list->trade_mode=='on')
							<a class="btn btn-default" href="{{ url('dashboard/usertrademode') }}/{{$list->id}}/off">Turn off trade</a>
							@else
							<a class="btn btn-default" href="{{ url('dashboard/usertrademode') }}/{{$list->id}}/on">Turn on trade</a>
							@endif
							@if($list->type=='1')
							<a class="btn btn-default" href="{{ url('dashboard/makeadmin') }}/{{$list->id}}/off">Remove admin</a>
							@else
							<a class="btn btn-default" href="{{ url('dashboard/makeadmin') }}/{{$list->id}}/on">Make admin</a>
							@endif
							<a href="#" data-toggle="modal" data-target="#topupModal{{$list->id}}" class="btn btn-default">Credit/Debit</a>
							<a href="#" data-toggle="modal" data-target="#resetpswdModal{{$list->id}}" class="btn btn-default">Reset Password</a>
							<a href="#" data-toggle="modal" data-target="#clearacctModal{{$list->id}}" class="btn btn-default">Clear Account</a>
							<a href="#" data-toggle="modal" data-target="#TradingModal{{$list->id}}" class="btn btn-default">Add Trading History</a>
							<a href="{{ url('dashboard/deluser') }}/{{$list->id}}" class="btn btn-default">Delete</a>
							<a href="#" data-toggle="modal" data-target="#edituser{{$list->id}}" class="btn btn-default">Edit</a>
							<a href="#" data-toggle="modal" data-target="#sendmailtooneuserModal{{$list->id}}" class="btn btn-primary" style="margin:10px;">Send Message</a>
							<a href="#" data-toggle="modal" data-target="#switchuserModal{{$list->id}}" class="btn btn-success">Get access</a>
						</td>
					</tr>

					<!-- Deposit for a plan Modal -->
					<div id="topupModal{{$list->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="text-align:center;">Credit/Debit user account.</strong></h4>
								</div>
								<div class="modal-body">
									<form style="padding:3px;" role="form" method="post" action="{{action('SomeController@topup')}}">
										<input style="padding:5px;" class="form-control" value="{{$list->name}}" type="text" disabled><br />
										<input style="padding:5px;" class="form-control" placeholder="Enter amount" type="text" name="amount" required><br />
										<div class="form-group">
											<label for="type">Select where to credit/debit</label>
											<select class="form-control" name="type" required>
												<option value="">Select Column</option>
												<option value="Bonus">Bonus</option>
												<option value="Profit">Profit</option>
												<option value="Ref_Bonus">Ref_Bonus</option>
											</select>
										</div>
										<div class="form-group">
											<label for="t_type">Select credit to add, debit to subtract.</label>
											<select class="form-control" name="t_type" required>
												<option value="">Select type</option>
												<option value="Credit">Credit</option>
												<option value="Debit">Debit</option>
											</select>
										</div>
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="user_id" value="{{$list->id}}">
										<input type="submit" class="btn btn-default" value="Save">
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /deposit for a plan Modal -->


					<!-- send a single user email Modal-->
					<div id="sendmailtooneuserModal{{$list->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="text-align:center;">This message will be sent to {{$list->name}} {{$list->l_name}} </h4>
								</div>

								<div class="modal-body">
									<form style="padding:3px;" role="form" method="post" action="{{action('UsersController@sendmailtooneuser')}}">
										<input type="hidden" name="user_id" value="{{$list->id}}">
										<textarea class="form-control" name="message" row="3" required=""></textarea><br />

										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="submit" class="btn btn-default" value="Send">
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- /Trading History Modal -->

					<div id="TradingModal{{$list->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="text-align:center;">Add Trading History for {{$list->name}} {{$list->l_name}} </h4>
								</div>
								<div class="modal-body">
									<form style="padding:3px;" role="form" method="post" action="{{action('Controller@addHistory')}}">
										<input type="hidden" name="user_id" value="{{$list->id}}">

										<div class="form-group">
											<label>Investment Plans</label>
											<select class="form-control" name="plan">
												<option value="">Select Plan</option>
												@foreach($pl as $plns)
												<option value="{{$plns->name}}">{{$plns->name}}</option>
												@endforeach
											</select>
										</div>
										<label>Amount</label>
										<input type="number" name="amount" class="form-control">
										<br>
										<div class="form-group">
											<label>Type</label>
											<select class="form-control" name="type">
												<option value="">Select type</option>
												<option value="Bonus">Bonus</option>
												<option value="ROI">ROI</option>
											</select>
										</div>

										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="submit" class="btn btn-default" value="Add History">
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /send a single user email Modal -->

					<!-- Edit user Modal -->
					<div id="edituser{{$list->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="text-align:center;">Edit user details.</strong></h4>
								</div>
								<div class="modal-body">
									<form style="padding:3px;" role="form" method="post" action="{{action('UsersController@edituser')}}">
										<input style="padding:5px;" class="form-control" value="{{$list->name}}" type="text" disabled><br />
										<label>Full name</label>
										<input style="padding:5px;" class="form-control" value="{{$list->name}}" type="text" name="name" required><br />
										<label>Email</label>
										<input style="padding:5px;" class="form-control" value="{{$list->email}}" type="text" name="email" required><br />
										<label>Phone number</label>
										<input style="padding:5px;" class="form-control" value="{{$list->phone_number}}" type="text" name="phone" required><br />
										<label>Referral link</label>
										<input style="padding:5px;" class="form-control" value="{{$list->ref_link}}" type="text" name="ref_link" required><br />
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="user_id" value="{{$list->id}}">
										<input type="submit" class="btn btn-default" value="Update user">
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /Edit user Modal -->

					<!-- Reset user password Modal -->
					<div id="resetpswdModal{{$list->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="text-align:center;">You are reseting password for {{$list->name}}.</strong></h4>
								</div>
								<div class="modal-body">
									<p>Default password:</p>
									<h3>user01236</h3><br>
									<a class="btn btn-default" href="{{ url('dashboard/resetpswd') }}/{{$list->id}}">Proceed</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Reset user password Modal -->

					<!-- Switch useraccount Modal -->
					<div id="switchuserModal{{$list->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="text-align:center;">You are about to login as {{$list->name}}.</strong></h4>
								</div>
								<div class="modal-body">
									<a class="btn btn-default" href="{{ url('dashboard/switchuser') }}/{{$list->id}}">Proceed</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Switch user account Modal -->

					<!-- Clear account Modal -->
					<div id="clearacctModal{{$list->id}}" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="text-align:center;">You are clearing account for {{$list->name}} to $0.00</strong></h4>
								</div>
								<div class="modal-body">
									<a class="btn btn-default" href="{{ url('dashboard/clearacct') }}/{{$list->id}}">Proceed</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /Clear account Modal -->
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>
@include('modals')
@include('footer')