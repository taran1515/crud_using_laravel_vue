<template>
  
<v-app>



    <div v-if="message ===''">
     <v-container style="margin-top:10%" >


        
         
      <v-row >  
        <v-layout row >
        <v-flex  sm6 md4  no-gutters grid-list-md text-xs-center v-for="postDetail in postDetails" v-bind:key="postDetail.id">
          <v-card style="height:100%">
              <v-card-title> {{ postDetail.name }} </v-card-title>
              <v-card-subtitle>  {{ postDetail.email }} </v-card-subtitle>
            <v-card-text>{{ postDetail.body }}</v-card-text>
        
          </v-card>
          
             </v-flex>
        </v-layout>
        
        

      </v-row>
    </v-container>
    </div>

    <div v-if="message =='Comment not found'">
    {{message}}
    </div>
</v-app>

</template>

<script>
import axios from "axios";


export default {
  name: "Detail",
  data() {
    return {
      postDetails: [],
      message: "",
    //   userDetails: {},
      
    };
  },

  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/comment/" + this.$route.params.id + "/")
      .then(response => {
        var i;
        if(response==="Comment not found"){
        this.message = response;
        console.log('Here is ')
        console.log(this.message)
        }
        console.log(this.response)
        console.log(this.$route.params.id);
        // console.log(this.Post);
        for (i = 0; i < response.data.length; i++) {
          this.postDetails.push(response.data[i]);
          // console.log(this.postDetails)
        }
      })
      .catch(err => err);

}
}
</script>