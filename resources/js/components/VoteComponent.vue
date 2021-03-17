<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Vote to one of this cats</h1>
        </div>
        <div class="row justify-content-center">
            <ul class="list-group list-group-horizontal">
               <li class="list-group-item">
                   <div>
                        <img v-if= "images[index1]" :key= "images[index1].id" @click= "addVote(images[index1].id); switchImage1();" class="image" v-bind:src= "images[index1].image_url">
                    <ul>
                           <li>{{ images[index1].image_id }}</li>
                           <li>Score:  {{images[index1].votes}} </li>
                    </ul>
                   </div>
               </li>
               <li class="list-group-item">
                    <label>OR</label>
               </li>
               <li class="list-group-item">
                   <div>
                      <img v-if= "images[index2]" :key= "images[index2].id" @click= "addVote(images[index2].id); switchImage2();" class="image" v-bind:src= "images[index2].image_url"> 
                    <ul>
                           <li>{{ images[index2].image_id }}</li>
                           <li>Score:  {{images[index2].votes}} </li>
                    </ul> 
                   </div>
               </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                  images: [],
                  index1: 0,
                  index2: 1
            }
        },
        mounted() {
            axios.get('http://catsmash.test/catsList')
                .then(response => 
                    {
                    this.images = response.data; 
                    console.log(this.images[0].image_id); 
                    console.log(this.images[1].image_id);  
                    this.index1 = Math.floor(Math.random() * this.images.length);
                    this.index2 = Math.floor(Math.random() * this.images.length);                   
                    })
                .catch(error => console.log(error));
            console.log('Component mounted.');
            console.log(this.index1 + 'aaaaaaaaaaa');
            console.log(this.index2 + 'bbbbbbbbbbb');
        },
        methods: {
            switchImage1() {
                console.log(this.index1 + 'aaaaaaaaaaa');
                this.index1 = Math.floor(Math.random() * this.images.length);
                console.log(this.index1 + 'cccccccc');
                console.log(this.index1  + '&&&&&&&' + this.index2);
                if((this.images[this.index1].id == this.images[this.index2].id) || (this.images[this.index1].id == (this.images[this.index1].id -1))) {
                   this.index1 = Math.floor(Math.random() * this.images.length);
                }
            },
            switchImage2() {
                this.index2 = Math.floor(Math.random() * this.images.length);
                if((this.images[this.index2].id == this.images[this.index1].id) || (this.images[this.index2].id == (this.images[this.index2].id -1))) {
                   this.index2 = Math.floor(Math.random() * this.images.length);
                }
                
            },
            addVote(id) {
                    axios.post('http://catsmash.test/catsList/edit/' + id)
                    .then(response => 
                    {
                        console.log(response.data + 'fffffffffff');
                        console.log(response.data.votes + 'fffffffffff');
                    })
                    .catch(error => console.log(error));
            }
        }
    }
</script>
<style>
    .image {
        width: 200px;
        height: 200px;
        margin: 2px;
        cursor: pointer;
        transition: filter 0.3s ease-in;
    }

    .image:hover {
        filter: brightness(1.2);
    }
</style>