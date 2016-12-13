@extends('base.frontend.base')

@section('content')
@parent
<div class="container">
	<div class="row">	
		<div class="col s12 center-align">
			<h1>My Secret Santa</h1>
		</div>
	</div>
	<div class="row">
		<div class="col s6 offset-s3">
			<nav>
    		<div class="nav-wrapper center-align">
     			<div class="col s12" id="steps">
       				<a class="breadcrumb active">Register</a>
        			<a class="breadcrumb">Create</a>
        			<a class="breadcrumb">Give</a>
     			</div>
    		</div>
  		</nav>
		</div>
		
	</div>
	<div class="row">
		<div class="col s12 center-align"><p><a href="/login">Returning user?</a></p></div>
	</div>
</div>

<landing></landing>

@stop