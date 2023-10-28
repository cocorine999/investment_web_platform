@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Manage Subscription</h3>

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

				<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                    <form style="padding:3px; float:right;" role="form" method="post" action="{{action('Controller@searchsub')}}">
				            <a class="btn btn-default" href="{{ url('dashboard/msubtrade') }}">Show all</a>
					   		<input style="padding:5px; margin-top:15px;" placeholder="Search Subscription" type="text" name="searchItem" required>
					   		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					   		<input type="hidden" name="type" value="user">
					   		<input type="submit" style="margin-top:-5px;" class="btn btn-default" value="Search">
					  </form> 
					<table class="table table-hover"> 
						<thead> 
							<tr> 
                                <th>MT4 ID</th>
                                <th>MT4 Password</th>
                                <th>Account Type</th>
                                <th>Currency</th>
                                <th>Leverage</th>
                                <th>Server</th>
                                <th>Duration</th>
                                <th>Submitted at</th>
                                <th>Started at</th>
                                <th>Expiring at</th>
                                <th>Action</th>
							</tr> 
						</thead> 
						<tbody> 
                        @foreach($subscriptions as $sub)
                        <tr>
                            <td>{{$sub->mt4_id}}</td>
                                <td>{{$sub->mt4_password}}</td>
                                <td>{{$sub->account_type}}</td>
                                <td>{{$sub->currency}}</td>
                                <td>{{$sub->leverage}}</td>
                                <td>{{$sub->server}}</td>
                                <td>{{$sub->duration}}</td>
                                <td>{{$sub->created_at}}</td>
                                <td>{{$sub->start_date}}</td>
                                <td>{{$sub->end_date}}</td>
                                <td>
                                    <a href="{{ url('dashboard/confirmsub') }}/{{$sub->id}}" class="btn btn-primary">Process</a>
                                    <a href="{{ url('dashboard/delsub') }}/{{$sub->id}}" class="btn btn-danger">Delete</a>
                                </td>
                        </tr>
                            
                        @endforeach
						</tbody> 
					</table>
				</div>
			</div>
		</div>
		@include('footer')