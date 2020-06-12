<template>
<div class="modal fade" id="eg" tabindex="-1" role="dialog" aria-hidden="true">
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
						<input type="username"class="form-control"name="username"v-model="list.username">
						<span v-if="errors.username" class="text-danger">{{errors.username[0]}}</span>
						</div>
						<div class="form-group">
						<label>Email Address</label>
						<input type="email"class="form-control"name="email"v-model="list.email">
						<span v-if="errors.email" class="text-danger">{{errors.email[0]}}</span>
						</div>
						<div class="form-group">
						<label>Password</label>
						<input type="password"class="form-control"name="password"v-model="list.password">
						<span v-if="errors.password" class="text-danger">{{errors.password[0]}}</span>
						</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" @click="save">Submit</button>
					</div>
					
				</div>
				
			</div>
			
		</div>



</template>
<script>
    export default {
   data(){
	return{
	list:{
	 username:'',
	 email:'',
	 password:'',
	  },
	  errors:{}
	}
	},
	methods:{
	 save(){
	  axios.post('/vueproject/public/user',this.$data.list).then((response)=>{
	   this.close()
	   console.log(response.data)
	   this.$parent.list.push(response.data)
	  }
	  )
	  .catch((error)=>this.errors=error.response.data.errors) 
	 },
	 close(){
	 $('#eg').modal('toggle')
	 
	 }
	}
}
</script>