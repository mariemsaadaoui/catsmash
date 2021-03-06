<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
    </head>
    <body>
       <div id="app">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <a class="navbar-brand" href="/vote">
               <router-link to="/" class="nav-link">
                  CatsMash
               </router-link>
            </a>
           <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>-->
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                            <router-link to="/vote" class="nav-link">Vote</router-link>
                      </li>
                      <li class="nav-item">
                            <router-link to="/cats" class="nav-link">Cats list</router-link>
                      </li>
    
                 </ul>
    
           </div>
        </nav>
       
       <div class="container">
           <router-view></router-view>   
       </div>
       </div>
    
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>

