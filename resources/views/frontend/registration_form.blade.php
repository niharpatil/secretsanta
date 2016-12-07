    <form class="col s12" role="form" method="POST" action"{{ url('/register') }}">
        {{csrf_field()}}

      <div class="row">
        <div class="input-field col s12 {{ $errors->has('name') ? ' has-error' : '' }}">
          <input id="name" type="text" class="validate">
          <label for="name">Name</label>
        </div>
      </div>

      <div class="row">        
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">      
         <div class="input-field col s12">
           <input id="confirm-password" type="password" class="validate">
           <label for="confirm-password">Confirm Password</label>
         </div>
      </div>
      <div class="row">
        <div class="center-align input-field col s12">
          <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
        </button>
        </div>
      </div>
   
    </form>
