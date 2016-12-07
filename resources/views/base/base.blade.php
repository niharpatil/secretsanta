<!DOCTYPE html>
<html>
<head>
	<title>SecretSanta</title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
   <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.4/vue.min.js">

   <link rel="stylesheet" type="text/css" href="css/my.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body id="material-overrides">
	<canvas id="canvas" style="position:fixed;"></canvas>

	@yield('content')

	<script type="text/javascript" src ="js/jquery-3.1.1.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  	<script type="text/javascript" src="js/snow.js"></script>
  	<script type="text/javascript">
        	$(document).ready(function(){
        		Materialize.updateTextFields();
        	});
        	$(document).ready(function() { 
        		$("#steps a").bind("click",function(event){ event.preventDefault(); var target = $(this).attr("href"); $("html, body").stop().animate({ scrollLeft: $(target).offset().left, scrollTop: $(target).offset().top }, 1200); }); }); 


        </script>
</body>
</html>