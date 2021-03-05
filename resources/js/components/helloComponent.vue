<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Vote to one of this cat</h1>
        </div>
        <div class="row justify-content-center">
            <ul class="list-group list-group-horizontal">
               <li class="list-group-item">
                   <!--<img v-bind:src= "image.image_url" width="304" height="236" />-->
                    <img v-if= "image1 " @click= "switchImage1" class="image" v-bind:src= "image1.image_url" >
                    <ul>
                           <li>{{ image1.image_id }}</li>
                           <li>Score:  {{image1.votes}} </li>
                    </ul>
               </li>
               <li class="list-group-item">
                    <img v-if= "image2" @click= "switchImage2" class="image" v-bind:src= "image2.image_url" >
                    <ul>
                           <li>{{ image2.image_id }}</li>
                           <li>Score:  {{image2.votes}} </li>
                    </ul>
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
            switchImage1() {
                axios.get('http://catsmash.test/catsList')
                .then(response => 
                {this.images = response.data
                this.image1 = this.images[this.index]
                this.index = (this.index + 1) % this.images.length})
            },
            switchImage2() {
                axios.get('http://catsmash.test/catsList')
                .then(response => 
                {this.images = response.data
                this.image2 = this.images[this.index + 1]
                this.index = (this.index + 1) % this.images.length})
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