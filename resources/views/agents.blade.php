@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Agents</h3>
				
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
				<a href="#" data-toggle="modal" data-target="#addagentModal" class="btn btn-default btn-lg" style="margin:10px;">Add agent</a>
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>Agent name</th>
                                <th>Clients referred</th>
                                <!--<th>Clients activated</th>
								<th>Earnings</th>-->
								<th>Option(s)</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($agents as $agent)
							<tr> 
								 <td>{{$agent->duser->name}}</td> 
								 <td>{{$agent->total_refered}}</td> 
                                 <!--<td>{{$agent->total_activated}}</td> 
								 <td>{{$agent->earnings}}</td>-->
								 <td>
								     <a href="{{url('dashboard/viewagent')}}/{{$agent->agent}}" title="View agent clients">
								     <i class="fa fa-eye"></i>
								     </a> | 
								     
								     <a href="{{url('dashboard/delagent')}}/{{$agent->id}}" style="color:red;" title="Remove agent clients">
								     <i class="fa fa-times"></i>
								     </a>
								 </td> 
							</tr> 
							@endforeach
						</tbody> 
						<!-- Add agent Modal -->
								<div id="addagentModal" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" style="text-align:center;"><strong>Add agent.</strong></h4>
								</div>
								<div class="modal-body">
										<form style="padding:3px;" role="form" method="post" action="{{action('UsersController@addagent')}}">
											<select class="form-control" name="user">
											    @foreach($users as $user)
											  <option value="{{$user->id}}">{{$user->name}}</option>
											    @endforeach
										   </select><br>	    
											<input style="padding:5px;" class="form-control" placeholder="Increment referred users" type="number" min="0" name="referred_users" value="0"><br/>
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="submit" class="btn btn-default" value="Submit">
									</form>
								</div>
								</div>
							</div>
							</div>
							<!-- /Add agent Modal -->
					</table>
				</div>
			</div>
		</div>
        @include('modals')
		@include('footer')