@extends('base.base')

@section('css_files')
@stop

@section('content')
<div class="container">
 <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">My Secret Santa</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li class="center"><img src="http://image.fg-a.com/christmas/3-santa-sleigh-reindeer.gif"></li>
      @if(Auth::check())
        <li>
          <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>
        </li>
      @endif
      </ul>
    </div>
 </nav>
@yield('content2')
</div>
@stop

@section('scripts')
	<script type="text/javascript" src="js/snow.js"></script>
@stop
