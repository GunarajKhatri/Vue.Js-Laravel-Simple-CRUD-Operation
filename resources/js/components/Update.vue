<template>
<div class="modal fade" id="eg1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title font-weight-bold">Sign up</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>	
						</button>
					</div>
					<div class="modal-body">
						<form>
						<div class="form-group">
						<label>Username</label>
						<input type="username"class="form-control"name="username"v-model="lists.username">
						<span v-if="errors.username" class="text-danger">{{errors.username[0]}}</span>
						</div>
						<div class="form-group">
						<label>Email Address</label>
						<input type="email"class="form-control"name="email"v-model="lists.email">
						<span v-if="errors.email" class="text-danger">{{errors.email[0]}}</span>
						</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" @click="update">Submit</button>
					</div>
					
				</div>
				
			</div>
			
		</div>

</template>
<script>
    export default {
        data(){
        return{
        	lists:{
	 username:'',
	 email:'',
	 password:'',
	  },
        errors:{}
        }
        },
        methods:{
	 update(){
	  axios.patch(`/vueproject/public/user/${this.lists.id}`,this.$data.lists).then((response)=>
	  this.close())
	  .catch((error)=>this.errors=error.response.data.errors)
	  
	 },
	 close(){
	 $('#eg1').modal('toggle')
	 this.lists=''
	 }
	}
    }
</script>