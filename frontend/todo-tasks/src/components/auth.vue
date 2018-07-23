<template>
  <h1>auth component</h1>
</template>

<script>
export default {
  data() {
    return {
    }
  },

  methods: {

  },
created(){

    console.log(this.$auth.getToken());

}
}
</script>
