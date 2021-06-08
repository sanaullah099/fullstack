<template>
<div class="container">
<div><navbar-component /> </div>
<form @submit.prevent="updateContact"> 
<h1>Individual Details</h1>
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" v-model="cont.name">
</div>
<div class="form-group">
<label>Email</label>
<input type="text" class="form-control" v-model="cont.email">
 </div>
<div class="form-group">
<label>Bio</label>
<input type="text" class="form-control" v-model="cont.bio">
 </div>
<div class="form-group">
<label>Email</label>
<input type="text" class="form-control" v-model="cont.contact_no">
 </div>
<div class="form-group">
<label>Email</label>
<input type="text" class="form-control" v-model="cont.designation">
 </div>
 {{cont}}
<button type="submit" class="btn btn-primary">Update</button>                    
</form>

</div>

</template>

<script>

export default
 {
    data()
    {
     return {
        
        cont: {
            name:'',
            email:'',
            bio:'',
            contact_no:'',
            designation:'',
        }
      }
    },
    created()
    {
        // axios.get('/api/edit-contacts/'+ this.router.params.id)
        // .then((res)=> {this.contacts=res.data;
        // });
        axios.get('/api/edit-contact/'+ this.$route.params.id).then(success=>{
            this.cont=success.data.data;
            console.log(success.data.data);
            //console.log('success')
        })
    },
    methods: 
    {
        updateContact()
        {
        axios.put('/api/contact/' + this.$route.params.id, this.cont).then(success=>{
           alert('updated');
        })
    }
    }
}
</script>