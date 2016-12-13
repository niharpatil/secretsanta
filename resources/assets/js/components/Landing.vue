<template>
<div class="row">
	<div class="col s12" id="registration">
		<div class="container">
			<div class="row">
				<div class="container">
					<register></register>
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
				this.$http.get('/user/'+this.userId).then(function(response){
					this.userId = response.data;
				});
			}
		},
		mounted : function(){
		}
	}
</script>