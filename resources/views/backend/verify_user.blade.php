@extends('base.backend.base')
@section('content2')

<h3>Join the group by filling in some details!</h3>
<div class="row">
	<form class="col s12" method="POST" action="/verify-user">
				{{csrf_field()}}
			<input type="hidden" value="{{$member->confirmation}}" name="code">

			<div class="row">
				<div class="input-field col s6">
				  <input placeholder="Placeholder" id="name" type="text" class="validate" name="name">
				  <label for="name">Name</label>
				</div>
			</div>
			<div class="row">
				<div class="col s6">
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
				    <i class="material-icons right">send</i>
				  </button>
				</div>
			</div>
	</form>
</div>


@stop