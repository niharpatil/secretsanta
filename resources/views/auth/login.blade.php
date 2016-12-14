
<form class="col s12" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="input-field col s12{{ $errors->has('email') ? ' has-error' : '' }}">
          <input id="email" type="email" class="validate" name="email" required autofocus>
          <label for="email">Email</label>
          @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="validate" name="password" required>
        <label for="password">Password</label>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        </div>
    </div>
</form>

