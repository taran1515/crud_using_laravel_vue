<template>
 <v-app>

     <h1>Post List</h1>
    
     <v-container style="margin-top:5%">
         
      <v-row >  
        <v-layout row >
        <v-flex style="margin-top:50px"  sm6 md4  no-gutters grid-list-md text-xs-center v-for="post in Posts" v-bind:key="post.id">
          <v-card style="height:100%" class="card-outter">
              <v-card-title> {{ post.title }} </v-card-title>
            <v-card-text>{{ post.body }}</v-card-text>

            <v-card-actions class="card-actions">
                 <router-link :to="'/' + post.id +'/'">
                  <v-btn text color="deep-purple accent-4">
                      Comment Details
      </v-btn>
                 
                 </router-link> 

                  <router-link :to="'/user/' + post.user_id +'/'">
                  <v-btn text color="deep-purple accent-4">
                      User Details
      </v-btn>
                 
                 </router-link> 

            </v-card-actions>
        
          </v-card>
          
             </v-flex>
        <!-- </v-col> -->
        </v-layout>
        
        

      </v-row>
    </v-container>
 </v-app>
</template>

<script>



import axios from "axios";

export default {
  name: "PostList",

  data() {
    return {
      Posts: []
    };
  },
  mounted() {
    axios.get("http://127.0.0.1:8000/api/posts")
    .then(response => {
      // console.log(response);
      var i;
      for (i = 0; i < response.data.length; i++) {
        this.Posts.push(response.data[i]);
      }
    console.log(this.Posts[0].user_id);
    
    })
    .catch(err => err);
  }
};
</script>

<style scoped>
.card-outter {
  position: relative;
  padding-bottom: 50px;
  margin-right: 50px;
  margin-bottom: 10px;
  color:"brown darken-4"; 
}
.card-actions {
  position: absolute;
  bottom: 0;
}
</style>