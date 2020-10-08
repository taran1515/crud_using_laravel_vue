<template>
  
<v-app>

    
     <v-container style="margin-top:10%" >

        
         
      <v-row >  
        <v-layout row >
        <v-flex  sm6 md4  no-gutters grid-list-md text-xs-center>
          <v-card style="height:100%">
              <v-card-title> {{ userDetails.name }} </v-card-title>
              <v-card-subtitle>  {{ userDetails.username }} </v-card-subtitle>
            <v-card-text>{{ userDetails.email }}</v-card-text>
        
          </v-card>
          
             </v-flex>
        </v-layout>
        
        

      </v-row>
    </v-container>
 </v-app>
</template>

<script>
import axios from "axios";


export default {
  name: "UserDetail",
  data() {
    return {
      userDetails: {},
      
    };
  },

  mounted() {
    

    //   console.log(this.postDetails)

    // console.log(this.$route.params.userId)

    axios
    .get('http://127.0.0.1:8000/api/user/'+this.$route.params.id)
    .then((response) => {
        console.log(response.data[0])
       this.userDetails = response.data[0];
       
    })
    .catch(err => err);
  }

  //   axios.all([
  //       axios
  //       .get('https://jsonplaceholder.typicode.com/posts/'+ this.$route.params.id + '/comments'),
  //       axios
  //       .get('https://jsonplaceholder.typicode.com/users/'+ this.$route.params.userId+'/')
  //   ])
  //   .then(axios.spread((postresponse,userrespponse) => {
  //       var i;
  //       for(i=0;i<postresponse.data.length;i++){
  //           this.postDetails.push(postresponse.data[i])
  //       }
  //       for(i=0;i<userrespponse.data.length;i++){
  //           this.userDetails.push(userrespponse.data[i])
  //       }

  //       console.log(this.postDetails)
  //       console.log(this.userDetails)

  //   }))}
};
</script>