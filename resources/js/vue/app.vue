<template>
    <div class="container">
        <div class="header">
            <h1 id="title">Cats Mash</h1>
        </div>    
        <list-cats></list-cats>
        <div class="footer">
            Pictures from <a href="https://latelier.co/data/cats.json" target="_blank">latelier.co</a>
        </div>
    </div>
</template>


<script>
import ListCats from "./listCats"

export default {
  components: { 
      ListCats
    }
}
</script>

<style>
            .container {
              font-family: 'Arial';
              border: 4px solid #8B0101;
              border-top: none;
            }

            .header {
              width: 100%;
              background-color: #8B0101;
              color: #FFF;
              text-align: center;
              padding: 16px 0;
            }

            .footer {
              text-align: center;
              font-size: 13px;
              margin: 16px 0;
            }

            .footer a {
              color: #8B0101;
            }

            .header h1 {
              letter-spacing: 1px;
              font-size: 32px;
              text-transform: uppercase;
              font-weight: bold;
            }
</style>