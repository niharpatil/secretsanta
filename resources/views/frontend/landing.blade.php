@extends('base.base')
@section('content')

<div class="container" style="position:fixed; padding-left:30%;">
	<div class="row"  style="position:relative">	
		<div class="col s12 center-align">
			<h1 style="color:#ef5350">My Secret Santa</h1>
		</div>
	</div>
	<div class="row"  style="position:relative">
		<nav>
    		<div class="nav-wrapper center-align">
     			<div class="col s12" id="steps">
       				<a href="#registration" class="breadcrumb">Register</a>
        			<a href="#create_group" class="breadcrumb">Create</a>
        			<a href="#view_group" class="breadcrumb">View</a>
     			</div>
    		</div>
  		</nav>
	</div>
	<div class="row">
		<div class="col s12 center-align"><a href="/login">Returning user?</a>
</div>
	</div>
</div>

<div class="row">
	<div class="col s3" id="registration" style="margin-top:5%">
		<div class="container">
			<div class="row">
				<div class="container">
					@include('frontend.registration_form')
				</div>
			</div>
		</div>
	</div>
	<div class="col s3" id="create_group" style="margin-top:5%">
		<div class="container">
			<div class="row">
				<div class="container">
					@include('frontend.filler')
				</div>
			</div>
		</div>
	</div>
	<div class="col s3" id="view_group" style="margin-top:5%">
		<div class="container">
			<div class="row">
				<div class="container">
					@include('frontend.filler')
				</div>
			</div>
		</div>
	</div>
</div>
	

        
@stop