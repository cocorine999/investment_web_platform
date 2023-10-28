@include('header')
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h3 class="title1">Your Profile Information</h3>

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
                    <div class="row">
                        <div class="col">
                        <button type="submit" class="btn btn-primary nav-pills" style="border-radius:none;" data-toggle="modal" data-target="#edit" >Update Profile</button>
                        </div>
                    </div>
                    <div class="row ">
                    
                        <div class="col-md-3 col-sm-12 text-center" style=" margin-bottom: 15px; radius: none;">
<!--                         
                            <i class="fa fa-user" style="font-size: 170px"></i> <br> -->
                            <h5>Fullname</h5>
                            <h3 class="text-primary">{{$userinfo->l_name}} {{$userinfo->name}}</h3>
                        </div>
                        <div class="col-md-7 col-sm-12 main-raised bg-light">
                            <p> <b>Address</b></p>
                            <p style="color: black;"> {{$userinfo->adress}}</p> <br>

                            <p><b>Date of Birth</b> </p>
                            <p style="color: black">{{$userinfo->dob}}</p><br>
							
							<p><b>Phone Number</b> </p>
							<p style="color: black">{{$userinfo->phone_number}}</p>
                        </div>
                    </div>
          
                    <div id="edit" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header .modal-dialog-centered ">
                                Edit my Profile
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form style="padding:3px;" role="form" method="post"action="{{action('SomeController@updateprofile')}}">
                                <input type="hidden" name="user_id" value="{{$userinfo->id}}">
                                <label for="firtsname">Firstname</label>
                                    <input type="text" name="firstname" value="{{$userinfo->name}}" class="form-control"> <br>
                                    <label for="surname">Surname</label>
                                    <input type="text" name="surname" value="{{$userinfo->l_name}}" class="form-control"> <br>
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob"  class="form-control" value="{{$userinfo->dob}}"> <br>
									<label for="dob">Phone number</label>
                                    <input type="text" name="phone"  class="form-control" value="{{$userinfo->phone_number}}"> <br>
                                    <label for="address">Address</label>
                                    <textarea class="form-control" placeholder="Full Address" name="address" row="3" value="{{$userinfo->adress}}">{{$userinfo->adress}}</textarea><br/>
                                        <input type="hidden" name="user_id" value="">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-primary nav-pills" value="Update">
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		@include('footer')