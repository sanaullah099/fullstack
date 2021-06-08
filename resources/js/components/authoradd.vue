<template>
    <div>
            <div><navbar-component /> </div>
        <h1> Add Authors Here</h1>
        <form @submit.prevent="submitAuthor()" enctype="multipart/form-data">
            <div class="form-group">
                <label> Name </label>
                <input type="text" v-model="name">
                <label>Upload Image</label>
                <input type="file" ref="file">
                
            <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default{
        data(){
            return{ data: [],
            name: '',
            image: ''
            }
        },
        created(){
            this.getAuthor();
        },
        methods:{
            getAuthor(){
                axios.get('/api/author').then(success=>{
                    this.data=success.data.data;
                    console.log(success);
                });
            },
            submitAuthor(){
                this.image = this.$refs.file.files[0];
                let fd = new FormData();
                fd.append('img', this.image);
                fd.append('name',this.name);
                axios.post('/api/author',fd).then(success=>{this.getAuthor();
                }).catch()

                event.target.reset();
            }
        }
    }
</script>