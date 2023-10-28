@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Your Notifications</h3>

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

				<h3 class="title1"></h3>
				<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
					<table class="table table-hover"> 
						<thead> 
							<tr> 
                                <th>Message</th>
                                <th>Recieve Date</th>
                                <th>Option</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($Notif as $notification)
							<tr> 
                                <td> <a href="#" data-toggle="modal" data-target="#message{{$notification->id}}" class=" "> {{ substr($notification->message,0,85)}} </a> </td> 
                                <td>{{$notification->created_at}}</td> 
                                <td> <a href="{{ url('dashboard/delnotif') }}/{{$notification->id}}" class="btn btn-default">Delete</a> </td>
							</tr> 

							<div id="message{{$notification->id}}" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
										<div class="modal-header .modal-dialog-centered ">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<divs style="color: black" class="font-italic bg-light">
                                                <p>{{$notification->message}}</p>
                                            </div>
										</div>
										</div>
									</div>
									</div>
							@endforeach
						</tbody> 
					</table>
				</div>
			</div>
		</div>
		@include('footer')