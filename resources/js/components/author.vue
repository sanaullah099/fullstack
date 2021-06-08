<template>

    <div class="container">
            <div><navbar-component /> </div>
            <router-link class="btn btn-secondary" to="/authoradd" >Add Authors</router-link>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <tr v-for="(item, ind) in data" :key="ind">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td><button class="btn btn-danger text-dark" @click="del(item.id)">Delete</button> <router-link to="#" class="btn btn-secondary text-dark">Edit</router-link></td>
            </tr>
        </table>
    </div>
</template>

<script>
export default{
    data(){
        return{
            data: [],
            id: '',
            name: ''
        }
    },

    created() {
        this.getAuthors()

    },
    methods:{
        getAuthors(){
            axios.get('/api/author').then(success=>{this.data=success.data.data;
            console.log(success);
        })
    },
    del(id){
        axios.delete('/api/author/'+id).then(success=>{this.getAuthors();
        });
    }
}
}
</script>