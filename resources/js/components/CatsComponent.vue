<template>
    <div class="container">
        <div class="row justify-content-center">
            <ul class="list-group">
                <li class="list-group-item">
                    <div v-for='cat in cats.data' :key='cat.id' >
                        <img v-bind:src= "cat.image_url" width="100" height="100" />
                        <ul>
                           <li>{{ cat.image_id }}</li>
                           <li>Score:  {{cat.votes}} </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <pagination :data="cats" @pagination-change-page="getResults" class="mt-5"></pagination>
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
            axios.get('http://catsmash.test/imagesList')
            .then(response => 
            {this.cats = response.data;
            console.log(response.data + 'hello');}
            )
            .catch(error => console.log(error));
        },
        methods: {
            getResults(page = 1) {
			axios.get('http://catsmash.test/imagesList?page=' + page)
				.then(response => {
					this.cats = response.data;
				});
		    }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>