<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>{{$settings->site_name}} | {{$settings->site_title}}</title>
		<!-- Bootstrap Core CSS -->
		<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="{{ asset('css/patros.css')}}" >
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
	</head>

	<body data-spy="scroll">
	
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=642791809168417";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/"><h2 style="color:#fff; margin-top:-5px;">{{$settings->site_name}}</h2></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right custom-menu">
						<li class="active"><a href="/">Home</a></li>
						<li><a href="#about">About</a></li>
						@if (Auth::guest())
						<li><a href="login"> Sign in</a></li>
					    <li><a href="register">Register</a></li>	
					    @else
				            <li><a href="dashboard">{{ Auth::user()->username }}</a></li>
				            @endif
						
					</ul>
				</div>
			</div>
		</nav>

		<!-- Header Carousel -->
		<header id="home" class="carousel slide">
			<ul class="cb-slideshow">
				<li><span class="bg">image1</span>
					<div class="container">
						<div class="row bg">
							<div class="col-lg-12">
								<div class="text-center"><h3 style="text-transform:none;">Walk your way into success with {{$settings->site_name}}</h3></div>
							</div>
						</div>
						<h4 style="font-size:1.2em;">Invest with {{$settings->site_name}} (Give help, Get help) and get 30% of your investment in 22 days maximum.</h4>
					</div>
				</li>
				
			</ul>
			<div class="intro-scroller">
				<a class="inner-link" href="#about">
					<div class="mouse-icon" style="opacity: 1;">
						<div class="wheel"></div>
					</div>
				</a> 
			</div>          
		</header>

		<section id="services">
			<div class="orangeback">
				<div class="container">
					<div class="text-center homeport2"><h2>We are different</h2></div>
					<div class="row">
						<div class="col-md-12 homeservices1">
							
							<div class="col-md-3 portfolio-item">
								<div class="text-center">
									<a href="javascript:void(0);">
									<span class="fa-stack fa-lg">
									  <i class="fa fa-circle fa-stack-2x"></i>
									  <i class="fa fa-clock-o fa-stack-1x"></i>
									</span>
									</a>
									<h3 style="background-color: rgba(0,0,0,0.5); color:#fff; margin:0px; padding:10px;">Good timing</h3>
									<p style="font-size:17px; margin-top:-6px;">
										{{$settings->site_name}} is designed to pay the community members within a specified time. No extra time, just make sure your account is confirmed.
									</p>
								</div>
							</div>

							<div class="col-md-3 portfolio-item">
								<div class="text-center">
									<a href="javascript:void(0);">
									<span class="fa-stack fa-lg">
									  <i class="fa fa-circle fa-stack-2x"></i>
									  <i class="fa fa-user fa-stack-1x"></i>
									</span>
									</a>
									<h3 style="background-color: rgba(0,0,0,0.5); color:#fff; margin:0px; padding:10px;">User friendly</h3>
									<p style="font-size:17px; margin-top:-6px;">
										{{$settings->site_name}} is designed with the end user in mind. All part of it is user friendly and responsive to all devices.
									</p>
								</div>
							</div>
							<div class="col-md-3 portfolio-item">
								<div class="text-center">
									<a href="javascript:void(0);">
									<span class="fa-stack fa-lg">
									  <i class="fa fa-circle fa-stack-2x"></i>
									  <i class="fa fa-edit fa-stack-1x"></i>
									</span>
									</a>
									<h3 style="background-color: rgba(0,0,0,0.5); color:#fff; margin:0px; padding:10px;">Re-Commitment</h3>
									<p style="font-size:17px; margin-top:-6px;">
										Re-Commitment is a way {{$settings->site_name}} secures the system from HIT and RUN and UNSERIOUS members. This encourages proper circulation of the system funds.
									</p>
								</div>
							</div>
							<div class="col-md-3 portfolio-item">
								<div class="text-center">
									<a href="javascript:void(0);">
									<span class="fa-stack fa-lg">
									  <i class="fa fa-circle fa-stack-2x"></i>
									  <i class="fa fa-check fa-stack-1x"></i>
									</span>
									</a>
									<h3 style="background-color: rgba(0,0,0,0.5); color:#fff; margin:0px; padding:10px;">Auto payout</h3>
									<p style="font-size:17px; margin-top:-6px;">
										{{$settings->site_name}} makes it easy for you to get paid. No action is required to make withdrawal, you are matched to recieve payment immediately you are eligible to get help. 
									</p>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Page Content -->
		<section id="about">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-5">
						<img src="images/ab.png" style="width:100%; height:auto;">
						<h1 style="color:#faaa02;">{{$settings->site_name}} is your best way to a substantial income.</h1>
						
					</div>
					<div class="col-lg-7 col-md-7">
						<div class="text-center">
							<h2>Introducing {{$settings->site_name}}</h2>
							<div class="row">
								<div class="col-md-12">
									<p style="font-size:22px; line-height:40px;">
									{{$settings->site_name}} is a company that was founded by a team of selfless and humanitarians, with decorative prospect towards this community, {{$settings->site_name}} goal is to help each other grow and we believed that with honesty and trust of our selfless community {{$settings->site_name}} will take Over the empowerment services. Together we will conquer.   
									<br/><strong>MISSION</strong><br/>
									{{$settings->site_name}} was designed with the following objective: "to capture the world's attention, hereby giving room for the less privileged from all over the world to benefit from it                                                                                                                                    
									<br/><strong>VISION</strong><br/>
									We believe that with {{$settings->site_name}} you can make extra income to sustain your living. <br/>

									<strong> AIM</strong><br/>
									To provide the system and support needed to enable our members achieve our vision.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12" style="text-align:center; padding:10px; margin-top:20px;">
						<h1>Join the community today!</h1>
						<a href="register" class="btn btn-default" style="background-color:#faaa02; padding:10px 30px 10px 30px; color:#fff; font-size:18px;">Join us</a> | 
						<a href="login" class="btn btn-default" style="background-color:#faaa02; padding:10px 30px 10px 30px; color:#fff; font-size:18px;">Sign in</a>
					</div>
				</div>
			</div>
		</section>


		<footer id="footer">
			<div class="container">
				<div class="row myfooter">
					<div style="font-size:20px; color:white; text-align:center;">
					© Copyright {{$settings->site_name}} 2017
					</div>
				</div>
			</div>
		</footer>

		<!-- jQuery -->
		<script src="{{ asset('js/jquery.js')}}"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="{{ asset('js/bootstrap.min.js')}}"></script>

		<!-- Google Map -->
		<script src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true&amp;libraries=places"></script>

		<!-- Portfolio -->
		<script src="{{ asset('js/jquery.quicksand.js')}}"></script>	    
	

		<!--Jquery Smooth Scrolling-->
		<script>
			$(document).ready(function(){
				$('.custom-menu a[href^="#"], .intro-scroller .inner-link').on('click',function (e) {
					e.preventDefault();

					var target = this.hash;
					var $target = $(target);

					$('html, body').stop().animate({
						'scrollTop': $target.offset().top
					}, 900, 'swing', function () {
						window.location.hash = target;
					});
				});

				$('a.page-scroll').bind('click', function(event) {
					var $anchor = $(this);
					$('html, body').stop().animate({
						scrollTop: $($anchor.attr('href')).offset().top
					}, 1500, 'easeInOutExpo');
					event.preventDefault();
				});

			   $(".nav a").on("click", function(){
					 $(".nav").find(".active").removeClass("active");
					$(this).parent().addClass("active");
				});

				$('body').append('<div id="toTop" class="btn btn-primary color1"><span class="glyphicon glyphicon-chevron-up"></span></div>');
					$(window).scroll(function () {
						if ($(this).scrollTop() != 0) {
							$('#toTop').fadeIn();
						} else {
							$('#toTop').fadeOut();
						}
					}); 
				$('#toTop').click(function(){
					$("html, body").animate({ scrollTop: 0 }, 700);
					return false;
				});

			});

		</script>

		<script>
		function gallery(){};

		var $itemsHolder = $('ul.port2');
		var $itemsClone = $itemsHolder.clone(); 
		var $filterClass = "";
		$('ul.filter li').click(function(e) {
		e.preventDefault();
		$filterClass = $(this).attr('data-value');
			if($filterClass == 'all'){ var $filters = $itemsClone.find('li'); }
			else { var $filters = $itemsClone.find('li[data-type='+ $filterClass +']'); }
			$itemsHolder.quicksand(
			  $filters,
			  { duration: 1000 },
			  gallery
			  );
		});

		$(document).ready(gallery);
		</script>


		<script type="text/javascript">
	$(document).ready(function(){
		inicializemap()

		$('#contactForm').on('submit', function(e){
			e.preventDefault();
			e.stopPropagation();

			// get values from FORM
			var name = $("#name").val();
			var email = $("#email").val();
			var message = $("#message").val();
			var goodToGo = false;
			var messgaeError = 'Request can not be send';
			var pattern = new RegExp(/^(('[\w-\s]+')|([\w-]+(?:\.[\w-]+)*)|('[\w-\s]+')([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);


			 if (name && name.length > 0 && $.trim(name) !='' && message && message.length > 0 && $.trim(message) !='' && email && email.length > 0 && $.trim(email) !='') {
				  if (pattern.test(email)) {
					 goodToGo = true;
				  } else {
					 messgaeError = 'Please check your email address';
					 goodToGo = false; 
				  }
			 } else {
			   messgaeError = 'You must fill all the form fields to proceed!';
			   goodToGo = false;
			 }

			 
			if (goodToGo) {
			   $.ajax({
				 data: $('#contactForm').serialize(),
				 beforeSend: function() {
				   $('#success').html('<div class="col-md-12 text-center"><img src="images/spinner1.gif" alt="spinner" /></div>');
				 },
				 success:function(response){
				   if (response==1) {
					 $('#success').html('<div class="col-md-12 text-center">Your email was sent successfully</div>');
					 window.location.reload();
				   } else {
					 $('#success').html('<div class="col-md-12 text-center">E-mail was not sent. Please try again!</div>');
				   }
				 },
				 error:function(e){
				   $('#success').html('<div class="col-md-12 text-center">We could not fetch the data from the server. Please try again!</div>');
				 },
				 complete: function(done){
				   console.log('Finished');
				 },
				 type: 'POST',
				 url: 'js/send_email.php', 
			   });
			   return true;
			} else {
			   $('#success').html('<div class="col-md-12 text-center">'+messgaeError+'</div>');
			   return false;
			}
			return false;
		});
	});

	var map = null;
	 var latitude;
	 var longitude;
	 function inicializemap(){
	   latitude = 41.3349509; 
	   longitude = 19.8217028;

	  var egglabs = new google.maps.LatLng(latitude, longitude);
	  var egglabs1 = new google.maps.LatLng(43.0630171, 89.2296082);
	  var egglabs2 = new google.maps.LatLng(13.0630171, 80.2296082 );


	  var image = new google.maps.MarkerImage('images/marker.png', new google.maps.Size(84,56), new google.maps.Point(0,0), new google.maps.Point(42,56));
	  var mapCoordinates = new google.maps.LatLng(latitude, longitude);
	  var mapOptions = {
	   backgroundColor: '#ffffff',
	   zoom: 10,
	   disableDefaultUI: true,
	   center: mapCoordinates,
	   mapTypeId: google.maps.MapTypeId.ROADMAP,
	   scrollwheel: true,
	   draggable: true, 
	   zoomControl: false,
	   disableDoubleClickZoom: true,
	   mapTypeControl: false,
	   styles: [
					{
						"featureType": "all",
						"elementType": "labels.text.fill",
						"stylers": [
							{
								"color": "#1f242f"
							}
						]
					},
					{
						"featureType": "all",
						"elementType": "labels.icon",
						"stylers": [
							{
								"hue": "#ff9d00"
							}
						]
					},
					{
						"featureType": "landscape.man_made",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#fef8ef"
							}
						]
					},
					{
						"featureType": "poi.medical",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"hue": "#ff0000"
							}
						]
					},
					{
						"featureType": "poi.park",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#c9d142"
							},
							{
								"lightness": "0"
							},
							{
								"visibility": "on"
							},
							{
								"weight": "1"
							},
							{
								"gamma": "1.98"
							}
						]
					},
					{
						"featureType": "road",
						"elementType": "geometry",
						"stylers": [
							{
								"weight": "1.00"
							}
						]
					},
					{
						"featureType": "road",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#d7b19c"
							},
							{
								"weight": "1"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"weight": "4.03"
							}
						]
					},
					{
						"featureType": "road.highway",
						"elementType": "geometry.stroke",
						"stylers": [
							{
								"visibility": "off"
							},
							{
								"color": "#ffed00"
							}
						]
					},
					{
						"featureType": "road.highway.controlled_access",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "road.arterial",
						"elementType": "geometry",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "road.local",
						"elementType": "geometry",
						"stylers": [
							{
								"visibility": "on"
							}
						]
					},
					{
						"featureType": "transit.line",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#cbcbcb"
							}
						]
					},
					{
						"featureType": "water",
						"elementType": "geometry.fill",
						"stylers": [
							{
								"color": "#0b727f"
							}
						]
					}
				]
					  };

	  map = new google.maps.Map(document.getElementById('map-canvas-holder'),mapOptions);
	  marker = new google.maps.Marker({position: egglabs, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS1'}); 
	  marker = new google.maps.Marker({position: egglabs1, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS2'}); 
	  marker = new google.maps.Marker({position: egglabs2, raiseOnDrag: false, icon: image, map: map, draggable: false,  title: 'ATIS3'}); 
	  google.maps.event.addListener(map, 'zoom_changed', function() {
	   var center = map.getCenter();
	   google.maps.event.trigger(map, 'resize');
	   map.setCenter(center);
	  });
	 }

</script>


</body>
</html>




