<template>
<div class="container">
  <div class="card">
    <div class="card-header">
      {{description}}
    </div>
    <div class="card-body">
      <h5 class="card-title">Details</h5>
      <p class="card-text">{{details}}</p>
    </div>
    <div class="card-footer text-muted">
      <div @click="back()">
        <router-link
          to="/"
          class="btn btn-primary">
          Back
        </router-link>
      </div>
    </div>
  </div>

</div>
</template>
<script>
  export default {
    data() {
      return {
        description: '',
        id: this.$route.params.id,
        details: '',
      }
    },
    created()
    {
      this.$http
      .get("api/tasks/"+this.id)
      .then(response => {
        this.description=response.data.data.task.description;
        this.details=response.data.data.task.details;
      });
    },
      methods:
      {
        back()
        {
          this.$emit('changeView',true);
        }
      },

  }
</script>
<style scoped>
</style>
