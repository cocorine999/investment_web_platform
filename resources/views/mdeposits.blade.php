@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Manage clients deposits</h3>
				
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
				<div class="col">
					<form style="padding:3px; float:right;" role="form" method="post" action="{{action('Controller@searchDp')}}">
						<a class="btn btn-default" href="{{ url('dashboard/mdeposits') }}">Show all</a>
						<input style="padding:5px; margin-top:15px;" size="50px" placeholder="Search by user ID, Status, Payment mode, Amount" type="text" name="query" required>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" style="margin-top:-5px;" class="btn btn-default" value="Search">
					</form>
				</div>
			</div>

				<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
				<span style="margin:3px;">
				        {{$deposits->render()}}
				    </span>
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>ID</th> 
								<th>Client name</th>
								<th>Client email</th>
                                <th>Amount</th>
                                <th>Payment mode</th>
                                <th>Plan</th>
								<th>Status</th> 
                                <th>Date created</th>
                                <th>Option</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($deposits as $deposit)
							<tr> 
								<th scope="row">{{$deposit->id}}</th>
                                <td>{{$deposit->duser->name}}</td>
                                <td>{{$deposit->duser->email}}</td> 
								 <td>${{$deposit->amount}}</td> 
								 <td>{{$deposit->payment_mode}}</td>
								 @if(isset($deposit->dplan->name)) 
								 <td>{{$deposit->dplan->name}}</td>
								 @elseif($deposit->plan=="Subscription Trading")
								 <td>Subscription Trading</td>
								 @else
								 <td>Account funds</td>
								 @endif
                                 <td>{{$deposit->status}}</td> 
								 <td>{{$deposit->created_at}}</td> 
                                 <td> 
                                 <a href="#" class="btn btn-default" data-toggle="modal" data-target="#popModal{{$deposit->id}}" title="View payment proof">
								     <i class="fa fa-eye"></i>
								     </a>
								     
								     <a href="{{ url('dashboard/deldeposit') }}/{{$deposit->id}}" class="btn btn-default">Delete</a>
                                 
                                 <a class="btn btn-default" href="{{ url('dashboard/pdeposit') }}/{{$deposit->id}}">Process</a>
                                 </td> 
							</tr> 
							
								<!-- POP Modal -->
			<div id="popModal{{$deposit->id}}" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="text-align:center;">{{$deposit->duser->name}} proof of payment</h4>
			      </div>
			      <div class="modal-body">
                        <img src="{{$settings->site_address}}/cloud/app/images/{{$deposit->proof}}" style="max-width:100%; height: auto;">
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /POP Modal -->
							@endforeach
						</tbody> 
					</table>
				</div>
			</div>
		</div>
        @include('modals')
		@include('footer')