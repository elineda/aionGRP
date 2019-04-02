<template>
  <div class="navbar">
    <nav>
      <router-link to="/mycharacters">My Characters</router-link>
      <router-link to="/shearchcharacters">Shearch Characters</router-link>
      <router-link to="/accountfusion">Account Fusion</router-link>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script>
  export default {
    name: 'Navbar',

  }
</script>

<style>
  nav {
    width: 100%;
    background-color: #0b98de;

  }
    nav a {
      display: block;
      float: left;
      font-size: 9px;
      color: white;
      background-color: #17b0cf;
      border: 1px solid #000;
      padding-top: 20px;
      padding-right: 10px;
      padding-bottom: 10px;
      padding-left: 10px;
      text-decoration: none;
   }
  nav a:hover {
  }
</style>
