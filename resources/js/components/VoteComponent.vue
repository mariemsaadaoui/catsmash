<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Vote to one of this cats</h1>
        </div>
        <div class="row justify-content-center">
            <ul class="list-group list-group-horizontal">
               <li class="list-group-item">
                   <div>
                        <img v-if= "images[index1]" :key= "images[index1].id" @click= "switchImage1(); addVote(images[index1].id);" class="image" v-bind:src= "images[index1].image_url">
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
                      <img v-if= "images[index2]" :key= "images[index2].id" @click= "switchImage2(); addVote(images[index2].id);" class="image" v-bind:src= "images[index2].image_url"> 
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
                  index1: 0,
                  index2: 1,
                  images: []
            }
        },
        /*created() {
            axios.get('http://catsmash.test/catsList')
                .then(response => 
                    {this.images = response.data;
                     //this.switchImage(this.images);
                    console.log(this.images + 'bonjour');
                    console.log(this.images[0] + 'bonbon');
                    })
                .catch(error => console.log(error));
        },*/
        mounted() {
            axios.get('http://catsmash.test/catsList')
                .then(response => 
                    {
                    this.images = response.data;
                    })
                .catch(error => console.log(error));
            console.log('Component mounted.')

        },
        methods: {
            switchImage1() {
                this.index1 = this.index1 + 1;
                if(this.index1 == this.index2) {
                    this.index1 = this.index1 + 1;
                }
                /*if(this.index1 != this.index2) {
                    this.index1 = this.index1++;
                }
                else {
                    this.index1 = (this.index1 + 2) % this.images.length;

                }
                if (this.images[this.index1].id == this.images[this.index2].id) {*/
                if (this.index1 == this.images.length - 1) {
                        this.index1 = 0;
                }
                
            },
            switchImage2() {
                this.index2 = this.index2 + 1;
                if(this.index2 == this.index1) {
                    this.index2 = this.index2 + 1;
                }
                /*if(this.index2 != this.index1) {
                    this.index2 = (this.index2 + 1) % this.images.length
                }
                else {
                    this.index2 = (this.index2 + 2) % this.images.length
                }
                if (this.images[this.index1].id == this.images[this.index2].id) {*/
                    if (this.index2 == this.images.length - 2) {
                        this.index2 = 1;
                    } 
                
            },
            addVote(id) {
                    axios.post('http://catsmash.test/catsList/edit/' + id)
                    .then(response => 
                    {
                        console.log(response.data + 'fffffffffff');
                        console.log(response.data.votes + 'fffffffffff')
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