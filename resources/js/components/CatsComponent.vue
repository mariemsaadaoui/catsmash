<template>
    <div class="container">
        <div class="row justify-content-center">
            <ul class="list-group">
                <li class="list-group-item">
                    <div v-for='cat in cats' :key='cat.id' >
                        <img v-bind:src= "cat.image_url" width="304" height="236" />
                        <ul>
                           <li>{{ cat.image_id }}</li>
                           <li>Score:  {{cat.votes}} </li>
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
                cats: {}
            }
        },
        created() {
            axios.get('http://catsmash.test/catsList')
            .then(response => 
            {this.cats = response.data;
            console.log(response.data + 'hello');}
            )
            .catch(error => console.log(error));
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>