@include('header')
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="row">
					<div class="col-lg-5 col-md-5 col-sm-5" style="margin-bottom:5px; padding:0px;">
						<h3 style="color:#555; margin:20px 0px 20px 0px;">{{$title}}</h3>				
					</div>
				</div>
				
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
                
                <div class="sign-u" style="background-color:#fff; padding:5px 15px 15px 15px;">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 nav-pills bg-primary" style="color:#fff; padding:30px 20px 30px 20px;">
                            <h3><i class="fa fa-money"></i> Current package</h3>
                        </div>
                        <div class="col-lg-8 col-md-8" >
                            <p style="color:#999;">Activated on: {{\Carbon\Carbon::parse($cplan->created_at)->toDayDateTimeString()}}</p>
                            
                            <h4>Package name: <small>{{$cplan->dplan->name}}</small></h4>
                            
                            <h4>Amount: <small>{{$settings->currency}}{{$cplan->amount}}</small></h4>
                            <h4>Duration: <small>{{$cplan->inv_duration}}</small></h4>
                            @if($cplan->active=="yes")
                            <p style="color:green;">Active! <i class="glyphicon glyphicon-ok"></i></p>
                            @elseif($cplan->active=="expired")
                            <p style="color:#fa3425;">Expired! <i class="fa fa-info-circle"></i></p>
                            @else
                            <p style="color:#fa3425;">Inactive! <i class="fa fa-info-circle"></i></p>
                            @endif
                        </div>
                    </div>
						
					<div class="clearfix"> </div>
				</div>
				
				<h3 style="margin:20px 0px 20px 0px;">Concurrent packages</h3>
 
                <a href="{{ url('dashboard/mplans') }}" class="btn btn-lg btn-default nav-pills" style="color:#fff; background-color:brown; border-radius: none; ">Add plan</a>
                
                    <div class="row row-one" style="margin-top:10px;">
                    @foreach($plans as $plan)
                     @if($cplan->id != $plan->id)
                        <div class="col-md-4" style="margin-bottom: 18px;">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front text-center" style="padding-top:25px;">
                                        <i class="fa fa-th" style="font-size:50px; color: white;"></i>
                                        <h1 style="color:#fff;">{{$plan->dplan->name}}</h1>
										<div style="text-align:left; padding:6px;">
                                        <p style="color:black;"> <b style="color: white;">Activated on: </b>{{\Carbon\Carbon::parse($plan->created_at)->toDayDateTimeString()}}</p>
										@if($plan->dplan->increment_type=="Fixed")
										<p style="color:black;"> <b style="color: white;">ROI: </b>{{$settings->currency.$plan->dplan->increment_amount}}</p>
										@else
										<p style="color:black;"> <b style="color: white;">ROI: </b>{{$plan->dplan->increment_amount}}%</p>
										@endif
										<p style="color:black;"> <b style="color: white;">Interval: </b>{{$plan->dplan->increment_interval}}</p>
										</div>
                                    </div>
                                    <div class="flip-card-back" style="text-align:left; padding:30px;">
                                        <h3> <b>Amount:</b> {{$settings->currency}}{{$plan->amount}}</h3> 
                                        <h3> <b>Duration: </b>{{$plan->inv_duration}}</h3>
										<p style="color:black;"> <b style="color: white;">Min Return: </b>{{$settings->currency.$plan->dplan->minr}}</p>
										<p style="color:black;"> <b style="color: white;">Max Return: </b>{{$settings->currency.$plan->dplan->maxr}}</p>
                                        @if($plan->active=="yes")
                                        <p style="color:green;">Active! <i class="glyphicon glyphicon-ok"></i></p>
                                        @elseif($plan->active=="expired")
                                        <p style="color:#fa3425;">Expired! <i class="fa fa-info-circle"></i></p>
                                        @else
                                        <p style="color:#fa3425;">Inactive! <i class="fa fa-info-circle"></i></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        @endif
				        @endforeach
                    </div>
			</div>
		</div>	
	@include('footer')
	