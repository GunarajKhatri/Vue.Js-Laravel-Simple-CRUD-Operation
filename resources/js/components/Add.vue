<template>
<div>
<button type="button" class="btn btn-primary" @click="showmodal">Add user</button>
<div>
</div>
<br>
<div class="container">
<table class="table table-dark table-bordered">
	<thead>
		<tr>
			<th scope="col">Username</th>
			<th scope="col">Email Addres</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<tr v-for="item,key in list">
			<td>{{item.username}}</td>
			<td>{{item.email}}</td>
			<td><button @click="showupdate(key)">Update</button>
			<button @click="del(key,item.id)">Delete</button></td>
		</tr>
	</tbody>
</table>
</div>

<Update></Update>
<Mod></Mod>
</div>
</template>
<script>
window.Vue = require('vue');
Vue.component('Update', require('./Update.vue').default);
Vue.component('Mod', require('./Mod.vue').default);
export default{
data(){
	return{
	  list:{},
	  errors:{},
	  message:''
	}
},
mounted(){
	axios.post('/vueproject/public/user/show').then((response)=>
	  this.list=response.data)
	  .catch((error)=>this.errors=error.response.data.errors)
},
methods:{
	showmodal(){
	 $('#eg').modal('show');
	},
	showupdate(key){
	this.$children[0].lists=this.list[key]
	$('#eg1').modal('show');
	},
  del(key,id){
  if(confirm('Are you sure you want to delete?')){
  	axios.delete(`/vueproject/public/user/${id}`).then((response)=>
	  this.list.splice(key,1))
	  .catch((error)=>this.errors=error.response.data.errors)
	 }
	 }
}
}
</script>