<!DOCTYPE html>
<html>
<head>
	<title>SecretSanta</title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
   <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   @yield('css_files')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
       window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
    </script>
</head>
<body>

    <canvas id="canvas" style="position:fixed;"></canvas>

    <div id="app">
        @yield('content')

    </div>

	<script type="text/javascript" src ="js/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
  <script type="text/javascript" src="js/vue.min.js"></script>
  <script type="text/javascript" src="js/app.js"></script>

 	<script type="text/javascript">
        	$(document).ready(function(){
        		Materialize.updateTextFields();
        	});
        	$(document).ready(function(){
        		//make snowflakes fall
        		setInterval(draw,33);
        	});
  </script>
  @yield('scripts')
</body>
</html>