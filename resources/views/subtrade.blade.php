@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Subscription Trade</h3>
				
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
                <div class="container">
                    <div class="row p-3">
                        <div class="col-lg-8 offset-lg-2">
                            <h3>{{$settings->site_name}} Account manager</h3> <br>
                            <div clas="well">
                            <p class="text-justify">Don’t have time to trade or learn how to trade? 
                            Our Account Management Service is The Best Profitable Trading Option for you, 
                            We can help you to manage your account in the financial MARKET with a simple subscription model.<br>
                            <small>Terms and Conditions apply</small><br>Reach us at {{$settings->contact_email}} 
                            for more info.</p>
                            </div>
                            <br>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SubpayModal">
                            Subscribe Now
                            </button>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#submitmt4modal">
                            Submit MT4 Details
                            </button>
                        </div>
                    </div>
                </div>
			</div>
		</div>
        @include('modals')

		@include('footer')