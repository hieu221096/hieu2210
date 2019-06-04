<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="{{asset('public')}}/">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tiệm Bánh TocoToco</title>
	<link rel="stylesheet" title="style" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="layout/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="layout/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="layout/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="layout/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="layout/assets/dest/css/style.css">
	<link rel="stylesheet" href="layout/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="layout/assets/dest/css/huong-style.css">
	<script type="text/javascript">
		function Login(){
			if(confirm("Bạn phải đăng nhập để mua hàng")){
				return true;

			}
			else{
				return false;
			}
		}
		// ẩn message 
	</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=655198308243028&autoLogAppEvents=1"></script>

<style type="text/css">

	.fa-facebook {
	  background: #3B5998;
	  color: white;
	}

</style>

</head>
<body>


	@include('header')
	<div class="rev-slider">
		@yield('content')
	</div> <!-- .container -->
	@include('footer')



	<!-- include js files -->
	<script src="layout/assets/dest/js/jquery.js"></script>
	<script src="layout/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="layout/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="layout/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="layout/assets/dest/vendors/animo/Animo.js"></script>
	<script src="layout/assets/dest/vendors/dug/dug.js"></script>
	<script src="layout/assets/dest/js/scripts.min.js"></script>
	<script src="layout/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="layout/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="layout/assets/dest/js/waypoints.min.js"></script>
	<script src="layout/assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="layout/assets/dest/js/custom2.js"></script>
</body>
</html>
