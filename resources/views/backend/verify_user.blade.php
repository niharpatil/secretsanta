@extends('base.backend.base')
@section('content2')

<h3>Join the group by filling in some details!</h3>
<div class="row">
	<form class="col s12" method="POST" action="/verify-user">
			<input class="hidden" value="{{$member->confirmation}}" name="code"></input>
			<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

			<div class="row">
				<div class="input-field col s6">
				  <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="first_name">
				  <label for="first_name">Name</label>
				</div>

				<div class="col s6">
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit
				    <i class="material-icons right">send</i>
				  </button>
				</div>
		</div>
	</form>
</div>


@stop