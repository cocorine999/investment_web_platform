@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">

				@if(Session::has('message'))
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-warning"></i> {{ Session::get('message') }}
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

				<div class="sign-up-row widget-shadow">
					<form method="post" action="{{action('UsersController@updatepass')}}">
					<h5>Change Password :</h5>
					
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Old Password* :</h4>
						</div>
						<div class="sign-up2">
							<input type="password" name="old_password" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>New Password* :</h4>
						</div>
						<div class="sign-up2">
							<input type="password" name="password" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Confirm* :</small></h4>
						</div>
						<div class="sign-up2">
							<input type="password" name="password_confirmation" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					
					<div class="sub_home">
						<input type="submit" value="Submit">
						<div class="clearfix"> </div>
					</div>
					<input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="current_password" value="{{Auth::user()->password}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
				</form>
				</div>
			</div>
		</div>
		@include('footer')