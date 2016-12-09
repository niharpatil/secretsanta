    <form class="col s12" role="form" method="POST" action="{{ url('/register') }}">
        {{csrf_field()}}

      <div class="row">
        <div class="input-field col s12 {{ $errors->has('name') ? ' has-error' : '' }}">
          <input id="name" type="text" class="validate" name="name" value="{{ old('name') }}" required autofocus>
          <label for="name">Name</label>
           @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="row">        
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
          <label for="email">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password" required>

          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">      
         <div class="input-field col s12">
            <input id="password-confirm" type="password" class="validate" name="password_confirmation" required>           
            <label for="confirm-password">Confirm Password</label>
         </div>
      </div>
      <div class="row">
        <div class="center-align input-field col s12">
          <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Register
          <i class="material-icons right">send</i>
        </button>
        </div>
      </div>
   
    </form>
