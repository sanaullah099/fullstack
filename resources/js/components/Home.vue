<template>
<div>
    <div><navbar-component /> </div>
<div>
        <div class="mt-5 container" style="margin-top:300px;"> 
    <form @submit.prevent="submitContact()">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" v-model="name" class="form-control" >
  </div>
  <div class="form-group">
    <label for="name">Email</label>
    <input type="text" v-model="email" class="form-control" >
  </div>
  <div class="form-group">
    <label for="name">Bio</label>
    <input type="text" v-model="bio"  class="form-control" >
  </div>
  <div class="form-group">
    <label for="name">Contact</label>
    <input type="text" v-model="contact"  class="form-control" >
  </div>
  <div class="form-group">
    <label for="name">Designation</label>
    <input type="text" v-model="designation"  class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    <ul class="list-group mt-2"  v-for="(item,ind) in data" :key="ind">
    <li class="list-group-item">{{item.name}}<button class="btn btn-danger ml-5" @click="del(item.id)">Del</button></li>
    <li class="list-group-item">{{item.email}}<router-link :to="{name: 'contactDetail', params: {id: item.id }}" class="btn btn-primary">edit</router-link></li>
    <li class="list-group-item">{{item.bio}}</li>
    <li class="list-group-item">{{item.contact}}</li>
    <li class="list-group-item">{{item.designation}}</li>
    </ul>
 </div>
    
    
</div>
</div>
</template>
<script>
import axios from 'axios';
export default{
    data(){
        return{data:[],
        name : 'arsalan',
        email: 'ars@gmail.com',
        bio: 'bio',
        contact: '03444764547654',
        designation: 'web'
        }
    },
    created(){
        this.getContacts()
    },
    methods:{
        getContacts(){
            axios.get('/api/contact').then(success=>{
                this.data=success.data.data;
                console.log(success);
            })
        },
        submitContact(){
                axios.post('/api/contact',
                {
                "name": this.name,
                "email": this.email,
                "bio":this.bio,
                "contact":this.contact,
                "designation":this.designation
                }
                )
                .then(success=>{
                this.getContacts();
                })
                .catch()
        },
        del(id){
            axios.delete('/api/contact/'+id).then(success=>{
                this.getContacts();
            });
        }
    }


}

</script>