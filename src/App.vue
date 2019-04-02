<template>
  <div id="app">
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue'
import MyCharacters from './components/MyCharacters.vue'
import ShearchCharacters from './components/ShearchCharacters.vue'
import AccountFusion from './components/AccountFusion.vue'

export default {
  name: 'app',
  components: {
    Navbar,
    MyCharacters,
    ShearchCharacters,
    AccountFusion
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
