<template>
    <div class="catscontainer">
        <div v-for='cat in cats' :key='cat.id' >
            <!--<a :href="'/cat/'+cat.id">{{ cat.url }}</a>-->
            <img v-bind:src= "cat.image_url" width="304" height="236" />
            <ul>
              <li>{{ cat.image_id }}</li>
              <li>Score:  {{cat.votes}} </li>
            </ul>
        </div>
    </div>
</template>


<script>
//import json from "./cats.json"


export default {
    data() {
            return {
                cats: {}
            }
    },
    created() {
            axios.get('cats')
                .then( response => 
                    this.cats = response.data
                   // console.log(response.data);
                )
                .catch(error => console.log(error));
    },
    mounted() {
      console.log('Component mounted.')
    }
    
}
</script>
<style>
  .catscontainer {
      text-align: center;
  }
  ul {
    list-style: none;
    margin-top: 16px;
  }

  li {
    line-height: 24px;
  }
</style>