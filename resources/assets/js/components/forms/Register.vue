<template>
      
	    <form class="col s12" role="form" @submit.prevent="store">
      <ul>
        <li style="color:white;" v-for="error in errors">{{error}}</li>
      </ul>
      <div class="row">
        <div class="input-field col s12">
          <input v-model="form.name" id="name" type="text" class="validate" name="name" required autofocus>
          <label for="name">Name</label>
        </div>
      </div>

      <div class="row">        
        <div class="input-field col s12">
          <input v-model="form.email" id="email" type="email" class="validate" name="email" required>
          <label for="email">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input v-model="form.password" id="password" type="password" class="validate" name="password" required>
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
          <button class="btn waves-effect waves-light btn-large" type="button" @click="validate">Register
          <i class="material-icons right">send</i>
        </button>
        </div>
      </div>
   
    </form>

</template>

<script>
	export default {
		data(){
			return {
				form: {
					name:'',
					email: '',
					password:''
				},
        errors : [],
			}
		},
		methods:{
			store(){
        this.validate
				this.$http.post('/api/create-user',this.form)
				.then(function(response){
					var msg = response.data;
					if(msg == "ok"){
						  window.location.href = "http://mysecretsantacla.us";
          } else {
            this.errors = [];
            this.errors.push(msg);
          }
				})
				.catch(function(response){
					console.log(response.data);
				})
			},
      validate(){
        this.errors = [];
        var errors_exist = false;
        if(this.form.name == ""){
          this.errors.push('Name cannot be blank');
          errors_exist = true;
        } 
        if (this.form.email == ""){
          this.errors.push("Email cannot be blank");
          errors_exist = true;
        } 
        if (this.form.password ==""){
          this.errors.push("Password cannot be blank");
          errors_exist = true;
        }
        if (errors_exist){
          return;
        } else {
          this.store();
        }
      }
		},
		mounted:function(){

		}
	}
</script>