<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Vote to one of this cats</h1>
        </div>
        <div class="row justify-content-center">
            <ul class="list-group list-group-horizontal">
               <li class="list-group-item">
                   <div>
                   <img v-if= "image1" :key= "image1.id" @click= "switchImage1" class="image" v-bind:src= "image1.image_url">
                    <ul>
                           <li>{{ image1.image_id }}</li>
                           <li>Score:  {{image1.votes}} </li>
                    </ul>
                   </div>
               </li>
               <li class="list-group-item">
                    <label>OR</label>
               </li>
               <li class="list-group-item">
                   <div>
                      <img v-if= "image2" :key= "image2.id" @click= "switchImage2" class="image" v-bind:src= "image2.image_url"> 
                    <ul>
                           <li>{{ image2.image_id }}</li>
                           <li>Score:  {{image2.votes}} </li>
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
                  index: 0,
                  image1: null,
                  image2: null,
                  images: []
            }
        },
        mounted() {
            this.switchImage1();
            this.switchImage2();
        },
        methods: {
            getCats() {
                axios.get('http://catsmash.test/catsList')
                .then(response => response.data)
                .catch(error => console.log(error));
            },
            switchImage1() {
                this.images = this.getCats();
                console.log(this.getCats() + 'bonjour')
                this.image1 = this.images[this.index]
                this.image2 = this.images[this.index + 1]
                //if(this.image1.id != this.image2.id) {
                //console.log(this.image1);
                this.index = (this.index + 1) % this.images.length
                //console.log(this.index);
                //}
            },
            switchImage2() {
                this.images = this.getCats();
                this.image2 = this.images[this.index + 1]
                this.index = (this.index + 1) % this.images.length
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