<template>
<div class="container">
  <div v-if="submitted"  class="alert alert-success" role="alert">
  A Task added successfully
  </div>

<form>
  <div class="form-group">
    <div class="input-group mb-3">
    <input  placeholder="enter a task" v-model='description' type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="button" v-on:click.prevent="addtask()" >Add task</button>
    </div>

  </div>

  </div>
</form>


</div>


</template>

<script>
  export default {
    data() {
      return {
        submitted: false,
        description: "",
      }
    },

    methods: {
      addtask: function() {



        /*
          event from child to parent to change it's value
          and set it with new value that is entered
        */
        
        //add to frontend
        this.$emit('addTask',this.description);


        //add to backend
        this.$http.post("http://127.0.0.1:8000/api/tasks", {

          description: this.description

        }, {
          emulateJSON: true

        }).then(function(data) {

          this.submitted = true;
          this.description = '';

        });

      },
    },

  }
</script>

<style>
</style>
