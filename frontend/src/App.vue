<template>
  <v-app>
    <v-app-bar app dark color="brown darken-4">
      <v-toolbar-title>
      Posts
      </v-toolbar-title>
      <v-spacer>
      </v-spacer>
       <router-link :to="'/'">
      <v-btn text rounded>Home</v-btn>
       </router-link>
    </v-app-bar>
    <router-view></router-view>
  </v-app>
  
</template>

<script>


export default {
  name: 'app',


  data: () => ({
    //
  }),
};
</script>
