import Vue from 'vue'
import App from './App.vue'



import axios from 'axios'

Vue.config.productionTip = false


import VueRouter from 'vue-router'

Vue.use(VueRouter)

const MyCharacters  = {
  template: '<div>My Characters</div>'
}

const SearchCharacters = {
  template: '<div>Search Characters</div>'
}

const AccountFusion = {
  template: '<div>Account Fusion</div>'
}

const router = new VueRouter({
  routes: [
    { path: '/mycharacters', component: MyCharacters },
    { path: '/searchcharacters', component: SearchCharacters },
    { path: '/accountfusion', component: AccountFusion }
  ]
})

new Vue({
  router
}).$mount('#app')
