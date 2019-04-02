<template>

</template>

<script>
export default {
  name: 'ShearchCharacters',
  data () {
    return {
      characters: []
    }
  },
  mounted() {
    axios.get('****').then((response) => {
      this.character = response.data
    })
    .catch((e) => {
      console.error(e)
    })
  }

}
</script>

<style>

</style>
