import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

const MyCharacters  = {
  template: '<div>My Characters</div>'
}

const ShearchCharacters = {
  template: '<div>Shearch Characters</div>'
}

const AccountFusion = {
  template: '<div>Account Fusion</div>'
}

const router = new VueRouter({
  routes: [
    { path: '/mycharacters', component: MyCharacters },
    { path: '/shearchcharacters', component: ShearchCharacters },
    { path: '/accountfusion', component: AccountFusion }
  ]
})

new Vue({
  router
}).$mount('#app')
