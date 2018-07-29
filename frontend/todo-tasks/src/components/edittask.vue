<template>
<div class="container">
  <form v-on:submit.prevent>
    <div class="form-group">
      <label for="task">Task</label>
      <input
        type="text"
        class="form-control"
        id="task"
        v-on:keyup.enter="edittask"
        v-model='description'
        aria-describedby="task"
      placeholder="Enter task">
    </div>

    <div class="form-group">
      <label for="details">Details</label>
      <textarea
        type="text"
        class="form-control"
        id="details"
        v-on:keyup.enter="edittask"
        v-model='details'
        placeholder="Enter details">
      </textarea>
    </div>

    <button
      type="submit"
      class="btn btn-primary"
      v-on:click="edittask">
      Edit
    </button>
    <div @click="back()" class="back">
      <router-link to="/" class="btn btn-primary">Back</router-link>
    </div>
  </form>



</div>
</template>
<script>
export default {
  data() {
    return {
      submitted: false,
      description: '',
      id: this.$route.params.id,
      details: '',
    }
  },
  created() {
    this.$http
    .get("api/tasks/" + this.id + "/edit")
    .then(function(response) {
      this.description = response.data.data.task.description;
      this.details = response.data.data.task.details;
    });
  },
  methods: {
    edittask: function() {
      /*
        event from child to parent to change it's value
        and set it with new value that is entered
      */

      //add to backend
      this.$http.post("api/tasks/" + this.id, {
        _method: 'PUT',
        description: this.description,
        details: this.details
      }, {
        emulateJSON: true
      }).then(function(response) {

        //redirect the url
        this.$router.push({ name: "app"}); //note if i use go this will never work

        //show and hide components
        this.$emit('changeView', true);
        //add to frontend

      });

    },

    back() {
      //show and hide components
      this.$emit('changeView', true);
    }
  },

}
</script>
<style>
.back {
  display: inline;
}
</style>
