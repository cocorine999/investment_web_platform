@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">{{$settings->site_name}} account verification list</h3>
				
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
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>ID</th> 
								<th>Full name</th> 
								<th>Email</th> 
								<th>KYC tatus</th>
								<th>Action</th> 
							</tr> 
						</thead> 
						<tbody> 
							@foreach($users as $list)
							<tr> 
								<th scope="row">{{$list->id}}</th>
								 <td>{{$list->name}}</td> 
								 <td>{{$list->email}}</td> 
								 
								 <td>{{$list->account_verify}}</td> 
								 <td>
								<a href="#"  data-toggle="modal" data-target="#viewkycIModal{{$list->id}}" class="btn btn-default"><i class="fa fa-eye"></i> ID</a>
								<a href="#" data-toggle="modal" data-target="#viewkycPModal{{$list->id}}" class="btn btn-default"><i class="fa fa-eye"></i> Passport</a>
								
								<a href="{{ url('dashboard/acceptkyc') }}/{{$list->id}}" class="btn btn-default">Accept</a>
								 <a href="{{ url('dashboard/rejectkyc') }}/{{$list->id}}" class="btn btn-default">Reject</a>
								 </td> 
							</tr> 

                            <!-- View KYC ID Modal -->
            			<div id="viewkycIModal{{$list->id}}" class="modal fade" role="dialog">
            			  <div class="modal-dialog">
            
            			    <!-- Modal content-->
            			    <div class="modal-content">
            			      <div class="modal-header">
            			        <button type="button" class="close" data-dismiss="modal">&times;</button>
            			        <h4 class="modal-title" style="text-align:center;">KYC verification - ID card view</h4>
            			      </div>
            			      <div class="modal-body">
                                    <img src="{{$settings->site_address}}/cloud/app/images/{{$list->id_card}}" style="max-width:100%; height:auto;">
            			      </div>
            			    </div>
            			  </div>
            			</div>
            			<!-- /view KYC ID Modal -->
            			
            			<!-- View KYC Passport Modal -->
            			<div id="viewkycPModal{{$list->id}}" class="modal fade" role="dialog">
            			  <div class="modal-dialog">
            
            			    <!-- Modal content-->
            			    <div class="modal-content">
            			      <div class="modal-header">
            			        <button type="button" class="close" data-dismiss="modal">&times;</button>
            			        <h4 class="modal-title" style="text-align:center;">KYC verification - Passport view</h4>
            			      </div>
            			      <div class="modal-body">
                                    <img src="{{$settings->site_address}}/cloud/app/images/{{$list->passport}}" style="max-width:100%; height:auto;">
            			      </div>
            			    </div>
            			  </div>
            			</div>
            			<!-- /view KYC Passport Modal -->
							@endforeach
							
						</tbody> 
					</table>
				</div>
			</div>
		</div>
		@include('footer')