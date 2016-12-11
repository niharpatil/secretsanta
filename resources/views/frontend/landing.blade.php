@extends('base.frontend.base')

@section('content')
@parent
<div class="container" style="position:fixed; padding-left:30%;">
	<div class="row"  style="position:relative">	
		<div class="col s12 center-align">
			<h1>My Secret Santa</h1>
		</div>
	</div>
	<div class="row"  style="position:relative">
		<nav>
    		<div class="nav-wrapper center-align">
     			<div class="col s12" id="steps">
       				<a href="#registration" class="breadcrumb">Register</a>
        			<a id="create_group_anchor" href="#create_group" class="breadcrumb">Create</a>
        			<a href="#view_group" class="breadcrumb">View</a>
     			</div>
    		</div>
  		</nav>
	</div>
	<div class="row">
		<div class="col s12 center-align"><a href="/login">Returning user?</a></div>
	</div>
</div>

<landing></landing>

@stop