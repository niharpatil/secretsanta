<template>
<div class="row">
	<button @click="toggleToggle" class="waves-effect waves-light btn btn-large"><i class="material-icons right">cloud</i> Make a new secret santa group!</button>
	<br>
	<div class="row">
		<div class="col s3"></div>
		<form v-if="toggle" class="col s6" role="form" @submit.prevent="store">
		<div class="row">
    		<div class="input-field col s12">
      		<input :placeholder="{user_name}" v-model="form.group_name" :value="{user_name}" id="group_name" type="text" class="validate" name="group_name">
     		<label class="active" for="group_name">Group Name</label>
    		</div>
  		</div>
	    <div class="row">
	    	<div class="input-field col s12">
	    	   	<label>How many people are in your group? {{form.group_size}}</label>
	    	   	<br>
	    		<p class="range-field" id="range">
	 			 	<input v-model="form.group_size" @change="show_emails" type="range" id="test5" min="3" max="100" name="groupSize"/>
				</p>
				<br>
			 </div>
	    </div>
	    <div class="row">
	    	<ul>
		   	<p class="flow-text">Group Members' Emails</p>
			   	<li v-for="(item,index) in email_list">
			   		<div class="row">
		        	<div class="input-field col s12">
		          		<input value="" @change="entered(index,$event.target.value)" type="email" class="validate" name="email">
		          		<label for="email">Email {{index+1}} </label>
		        	</div>
		      	</div>
			   	</li>
	   		</ul>
	    </div>
	    <div class="row">
	    	<button class="btn waves-effect waves-light" type="button" name="store" @click="store">Create Group
    			<i class="material-icons right">send</i>
  			</button>
	    </div>	
     </form>
	</div>
	
</div>
	
</template>

<script>
	export default {
		props:{
			userId:Number,
		},
		data(){
			return {
				form:{
					user_id:'',
					group_name:'',
					emails:'',
					group_size:3
				},
				email_list: [],
				size_entered:true,
				user_name: '',
				toggle: false,
			}
		},
		methods : {
			getUser(){
				this.$http.get('/api/user/'+this.userId).then(function(response){
					this.form.user_id = response.data.id;
					this.user_name = response.data.name;
					this.form.group_name = this.user_name.toString()+"'s Group";
				});
				
			},
			store(){
				this.form.emails = this.email_list.toString();
				this.$http.post('/api/create-group', this.form)
				.then(function(){
					window.location.href = '/';
				})
				.catch(response =>{

				});
			},
			show_emails(){
				this.email_list = [];
				for(i = 0; i < this.form.group_size; i++){
					this.email_list.push(i);
				}
			},
			entered(index,value){
				this.email_list[index] = value;
				console.log(this.email_list.toString());
			},
			toggleToggle(){
				this.toggle = !this.toggle;
			}
		},
		mounted : function(){
			this.getUser();
		}
	}
</script>