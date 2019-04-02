<template>
  <ul v-if="characters">
    <li v-for="character of characters" v-bind:key="character.id">
      <p><strong>{{character.name}}</strong></p>
      <p>{{character.race}}</p>
      <input type="text" v-model="postDesc" placeholder="Description"/>
      <input type="text" v-model="postHouse" placeholder="House"/>
      <input type="button" @click="updateCharacters()" value="submit">
    </li>
  </ul>
</template>

<script>
export default {
  name: 'MyCharacters',
  data () {
    postDesc: null,
    postHouse: null
    return {
      characters: []
    }
  },
  mounted() {
    axios
    .get('/api.php?w=personnage&v=type&name=?&api=?')
    .then((response) => {
      this.character = response.data
    })
    .catch((e) => {
      console.error(e)
    })
  },
  methods: {
    updateCharacters () {
      axios.post('', {
        desc: this.postDesc,
        house: this.postHouse
      }).then((response) => {})
      .catch((e) => {
        console.error(e)
      })
    }
 }
}
</script>

<style>

</style>
