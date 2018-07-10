<template>
<div class="container">
<h1>show task is here</h1>
<h1>id : {{id}}</h1>


<div @click="back()">

  <router-link to="/" class="btn btn-primary">Back</router-link>


</div>

</div>
</template>
<script>
  export default {
    data() {
      return {
        description: "",
        id: this.$route.params.id,
      }
    },

    methods: {
      back(){
          this.$emit('changeView',true);
        
      }
    },

  }
</script>
<style>
</style>
