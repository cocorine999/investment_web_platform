@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">View agent ({{$agent->name}}) clients</h3>
				
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
					<table class="table table-hover"> 
						<thead> 
							<tr> 
								<th>Client name</th>
                                <th>Client Inv. plan</th>
                                <th>Client status</th>
								<th>Earnings</th>
							</tr> 
						</thead> 
						<tbody> 
							@foreach($ag_r as $client)
							<tr> 
								 <td>{{$client->name}}</td> 
								 @if(isset($client->dplan->name)) 
								 <td>{{$client->dplan->name}}</td>
								 @else
								 <td>NULL</td>
								 @endif 
                                 <td>{{$client->status}}</td> 
								 <td>{{$client->account_bal}}</td>
							</tr> 
							@endforeach
						</tbody> 
					</table>
				</div>
			</div>
		</div>
        @include('modals')
		@include('footer')