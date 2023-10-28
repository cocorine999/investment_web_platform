@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">{{$settings->site_name}} Support</h3>
				
				<div class="sign-up-row widget-shadow">
					<h4>For inquiries, suggestions or complains. Mail us at</h4>
					<h5 style="margin-top:20px;">{{$settings->contact_email}}
				</div>
			</div>
		</div>
		@include('footer')