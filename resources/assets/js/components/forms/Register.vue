<template>
	    <form class="col s12" role="form" method="POST" @submit.prevent="store">
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
          <button class="btn waves-effect waves-light btn-large" type="button" @click="store">Register
          <i class="material-icons right">send</i>
        </button>
        </div>
      </div>
   
    </form>

</template>

<script>
	export default {
		props:{},
		data(){
			return{
				form: {
					name:'',
					email: '',
					password:''
				}
			}

		},
		methods:{
			store(){
				console.log(this.form);
				this.$http.post('/api/create-user',this.form)
				.then(function(response){

				})
				.catch(function(response){

				});
			}
		},
		mounted:function(){

		}
	}
</script>