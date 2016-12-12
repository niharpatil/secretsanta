@extends('base.backend.base')

@section('content2')
  <!--form modal -->

  <div class="row">
    <div class="col s12 center-align">
      <create-group :user-id="{{Auth::user()->id}}"></create-group>
    </div>
  </div>
  <div class="divider"></div>
    <div class="row">
      <div class="col s4">
        <h3 style="color:white;">Your Groups</h3>
      </div>
      <div class="col s8">

      
      <group-cards :user-id="{{Auth::user()->id}}"></group-cards>

      <div class="row">
      </div>
      </div>
    </div>
@stop


