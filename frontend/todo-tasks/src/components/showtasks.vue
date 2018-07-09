<template>
<div class="container">
  <h1 class="text-center">Your Tasks</h1>

  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Task</th>
        <th scope="col" colspan="5" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>

      <tr v-model="tasks" v-for='task in tasks'>
        <th scope="row">{{task.id}}</th>
        <td>{{task.description}}</td>
        <td><button @click="deletetask(task)" class="btn btn-danger">Delete</button></td>
        <td><button @click="uptask(task)" class="btn btn-warning">Up</button></td>
        <td><button @click="deletetask(task)" class="btn btn-warning">Down</button></td>
        <td><button @click="edittask(task)" class="btn btn-primary">Edit</button></td>
        <td><button @click="edittask(task)" class="btn btn-info">View</button></td>

      </tr>
    </tbody>
  </table>
</div>
</template>

<script>
export default {

  props: ['newTask'],

  data() {
    return {
      tasks: []
    }
  },

  mounted() {
    this.$http.get("http://127.0.0.1:8000/api/tasks").then(function(res) {
      this.tasks = res.data.data;
    });

  },

  methods: {
    deletetask: function(task) {
      var index = this.tasks.indexOf(task);
      this.tasks.splice(index, 1);
    },

  },


  //from parent to child - change the value
  watch: {
    newTask: function(val) {
      // console.log("tasks changed !!");
      let index = val.length - 1
      let description = val[index].description;
      let id = val[index].id;
      this.tasks.push({id:id,description:description});
    }
  }

}
</script>

<style>
</style>
