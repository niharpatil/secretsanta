<template>
	

<div class="row">
	<div class="col s3" id="registration" style="margin-top:5%">
		<div class="container">
			<div class="row">
				<div class="container">
					<register></register>
				</div>
			</div>
		</div>
	</div>
	<div class="col s3" id="create_group" style="margin-top:5%">
		<div class="container">
			<div class="row">
				<div v-if="userId" class="container">
					<create-group :user-id="userId"></create-group>
				</div>
				<div v-else class="container">
					<h1>Filler 1</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="col s3" id="view_group" style="margin-top:5%">
		<div class="container">
			<div class="row">
				<div class="container">
					<h1>Filler</h1>
				</div>
			</div>
		</div>
	</div>
</div>
</template>
<script>
	export default {
		props:{
			userId : {
				type: Number,
				required:false
			}
		},
		data(){
			return{

			}
		},
		methods : {
			getUser(){
				this.$http.get('/user'+this.userId).then(function(response){
					this.userId = response.data;
				});
			}
		},
		mounted : function(){

		}
	}
</script>