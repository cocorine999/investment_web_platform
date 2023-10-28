@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Your transaction (ROI) history</h3>
				
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
								<th>ID</th> 
								<th>Plan</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Date created</th>
							</tr> 
						</thead> 
						<tbody> 
						@foreach($t_history as $history)
							<tr> 
								<th scope="row">{{$history->id}}</th>
								 <td>{{$history->plan}}</td> 
                                 <td>{{$settings->currency}}{{$history->amount}}</td> 
                                 <td>{{$history->type}}</td> 
								 <td>{{$history->created_at}}</td> 
							</tr> 
						@endforeach
						</tbody> 
					</table>
					<span style="margin:3px;">
				        {{$t_history->render()}}
				    </span>
				</div>
			</div>
		</div>
        @include('modals')
		@include('footer')