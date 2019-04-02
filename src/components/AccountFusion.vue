<template>

</template>

<script>
export default {
  name: 'AccountFusion',
  mounted() {
    axios.get('****').then((response) => {
      this. = response.data
    })
    .catch((e) => {
      console.error(e)
    })
  }

}
</script>

<style>

</style>
