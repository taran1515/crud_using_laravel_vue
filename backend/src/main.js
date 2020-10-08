import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify';
// import router from './router'

// import VueRouter from 'vue-router'
import router from './router'

// Vue.use(VueRouter);


Vue.config.productionTip = false

new Vue({
    vuetify,
    router,
    render: h => h(App)
}).$mount('#app')