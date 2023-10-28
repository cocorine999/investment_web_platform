	<!--footer-->
		<div class="footer">
		   <p>All Rights Reserved &copy; {{$settings->site_name}} {{date('Y')}}</p>
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="{{ asset('js/classie.js')}}"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<!--
	<script src="{{ asset('js/jquery.nicescroll.js')}}"></script>
	<script src="{{ asset('js/scripts.js')}}"></script>
	-->
	<!--//scrolling js-->
	<!-- js-->
 <!-- Bootstrap Core JavaScript -->
 <script src="{{ asset('js/bootstrap.js')}}"> </script>

<script src="{{ asset('js/modernizr.custom.js')}}"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
   
</body>
</html>