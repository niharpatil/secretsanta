@extends('base.base')

@section('css_files')
	<link rel="stylesheet" type="text/css" href="css/my.css">
@stop

@section('content')
@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() { 
        $("#steps a").bind("click",function(event){ 
        	event.preventDefault(); var target = $(this).attr("href"); $("html, body").stop().animate({ scrollLeft: $(target).offset().left, scrollTop: $(target).offset().top }, 1200); 
        }); 
    }); 
</script>
<script type="text/javascript" src="js/snow.js"></script>
@stop