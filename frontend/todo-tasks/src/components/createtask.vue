<template>
<div class="container">
  <form v-on:submit.prevent>
    <div class="form-group row">
      <label for="description" class="col-sm-2 col-form-label">A Task</label>
      <div class="col-sm-10">
        <input v-on:keyup.enter.prevent v-model='description' type="text" class="form-control" id="description" placeholder="Write a task">
      </div>
    </div>
    <div class="form-group row">
      <label for="details" class="col-sm-2 col-form-label">Details</label>
      <div class="col-sm-10">
        <textarea v-model='details' class="form-control" id="details" placeholder="Write details" rows="3"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button v-on:click="createtask" type="button" class="btn btn-primary">Create</button>
        <div @click="back()" class ="back">
          <router-link to="/"  class="btn btn-primary">Back</router-link>
        </div>
      </div>
    </div>
  </form>
</div>
</template>
<script>
export default {
  props: ['mainApp'],

  data() {
    return {
      submitted: false,
      description: "",
      details: "",
    }
  },

  methods: {
    createtask: function() {
      /*
        event from child to parent to change it's value
        and set it with new value that is entered
      */
      //add to backend
      this.$http.post("http://127.0.0.1:8000/api/tasks", {
        description: this.description,
        details: this.details
      }, {
        emulateJSON: true
      }).then(function(response) {
        //add to frontend
        this.$emit('createTask', true);
        this.$emit('changeView', false);
        this.$router.push('/');
        console.log("in createtask method");
      });
    },
    back(){
      //show and hide components
        this.$emit('createTask',true);
    }
  },

}
</script>
<style>
.back{
  display:inline;
}
</style>
