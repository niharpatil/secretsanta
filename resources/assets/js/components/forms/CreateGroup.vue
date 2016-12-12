<template>
<div class="row">
	<a v-if="edit_group" @click="toggleToggle" class="btn-floating btn-medium red" >
                              <i class="large material-icons">mode_edit</i>
      </a>
	<a v-else @click="toggleToggle" class="waves-effect waves-light btn btn-large"><i class="material-icons right">cloud</i> {{buttonText}}</a>
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
	 			 	<input v-model="form.group_size" @change="show_emails" type="range" id="test5" min="2" max="100" name="groupSize"/>
				</p>
				<br>
			 </div>
	    </div>
	    <div class="row">
	    	<ul>
		   	<p class="flow-text" style="color:white;">Group Members' Emails</p>
			   	<li v-for="(item,index) in email_list">
			   		<div class="row">
		        	<div class="input-field col s12">
		          		<input :value="item" @change="entered(index,$event.target.value)" type="email" class="validate" name="email">
		          		<label class="active" for="email">Email {{index+1}} </label>
		        	</div>
		      	</div>
			   	</li>
	   		</ul>
	    </div>
	    <div class="row">
	   		<button v-if="edit_group" class="btn waves-effect waves-light" type="button" name="edit" @click="edit">Edit Group
    			<i class="material-icons right">send</i>
  			</button>
	    	<button v-else class="btn waves-effect waves-light" type="button" name="store" @click="store">Create Group
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
			userId:{
				type:Number,
				required: false
			},
			groupId:{
				type: Number,
				required: false
			}
		},
		data(){
			return {
				form:{
					user_id:'',
					group_name:'',
					emails:'',
					group_size:2
				},
				email_list: [],
				email_list_edit: [],
				edit_group: false,
				size_entered:true,
				user_name: '',
				toggle: false,
				buttonText: 'Make a new secret santa group!'
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
			edit(){
				this.form.emails = this.email_list_edit.toString();
				this.$http.post('/api/edit-group/'+this.groupId, this.form).then(function(response){
					console.log(response.data);
				})
				.catch(function(response){
					console.log(response.data);
				});
			},
			getFormData(){
				this.$http.get('/api/form-data/'+this.groupId).then(function(response){
					this.email_list_edit = response.data[0];
					this.email_list = response.data[0];
					this.form.group_name = response.data[1];
					this.group_size = this.email_list.length;
					this.edit_group = true;
				});
			},
			show_emails(){
				this.email_list = [];
				var count = 0;
				if(this.email_list_edit.length > 0){
					for(i = 0; i < this.form.group_size; i++){
						if(this.email_list_edit[i] != undefined){
							this.email_list.push(this.email_list_edit[i]);
							count++;
						} else {
							break;
						}
					}
				}
				for(i = count; i < this.form.group_size; i++){
					this.email_list.push(i);
				}
			},
			entered(index,value){
				this.email_list[index] = value;
				this.email_list_edit[index] = value;
			},
			toggleToggle(){
				this.toggle = !this.toggle;
			}
		},
		mounted : function(){
			this.getUser();
			if(this.groupId){
				this.getFormData();
				this.buttonText = "Edit Group";
			}

		}
	}
</script>