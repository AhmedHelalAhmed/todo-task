<template>
<div class="container">
<form v-on:submit.prevent>
  <div class="form-group">
    <div class="input-group mb-3">
    <input  placeholder="enter a task" v-on:keyup.enter="edittask" v-model='description' type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="button" v-on:click="edittask" >Edit task</button>
    </div>
  </div>
  </div>
</form> 

<div @click="back()">
  <router-link to="/"  class="btn btn-primary">Back</router-link>
</div>

</div>
</template>
<script>
  export default {
    data() {
      return {
        submitted: false,
        description: "",
        id: this.$route.params.id,
      }
    },
    created(){
    this.$http.get("http://127.0.0.1:8000/api/tasks/"+this.id+"/edit").then(function(response){
      this.description=response.data.data.task.description;
      // console.log(response.data.data.task.description);

    });
    },
    methods: {
      edittask: function() {
        /*
          event from child to parent to change it's value
          and set it with new value that is entered
        */
        //add to backend
        this.$http.put("http://127.0.0.1:8000/api/tasks", {

          description: this.description

        }).then(function(response) {

          console.log(response);
          
          //add to frontend
          // this.$emit('addTask',response.data.data);
        });

      },

      back(){
          this.$emit('changeView',true);
        
      }
    },

  }
</script>
<style>
</style>
