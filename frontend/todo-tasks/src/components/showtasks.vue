<template>
<div class="container">
  <h1 class="text-center">Your Tasks</h1>
  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Task</th>
        <th scope="col" colspan="5" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for='(task, key, index) in tasks'>
        <th scope="row" v-bind:index="key++">{{key}}</th>
        <td>{{task.description}}</td>
        <td><button @click="deletetask(task)" class="btn btn-danger">Delete</button></td>
        <td><button @click="uptask(task)" class="btn btn-light">Up</button></td>
        <td><button @click="downtask(task)" class="btn btn-warning">Down</button></td>
        <td><button @click="edittask(task)" class="btn btn-primary">Edit</button></td>
        <td><button @click="viewtask(task)" class="btn btn-info">View</button></td>
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
      tasks: [],
    }
  },

  mounted() {
    this.$http.get("http://127.0.0.1:8000/api/tasks").then(function(res) {
      this.tasks = res.data.data;
    });

  },

  methods: {
    getcount: function(){
      console.log("dddddddddddddddddddddddddd"+this.count);
      this.count++;
      return this.count;
    },
    deletetask: function(task) {

      //frontend
      var index = this.tasks.indexOf(task);
      this.tasks.splice(index, 1);

      //backend
      this.$http.post("http://127.0.0.1:8000/api/tasks/" + task.id, {
        id: task.id
      }, {
        emulateJSON: true
      }).then(function(res) {
        // console.log("sucesss in request");
        // console.log(res);

      }).catch(function(error) {
        // console.log("errrorrrr in request");
      });



    },
    uptask: function(task) {

      //frontend
      var index = this.tasks.indexOf(task);
      if (this.tasks[index - 1]) {
        var temp = this.tasks[index - 1];
        this.tasks[index - 1] = this.tasks[index];
        this.tasks[index] = temp;
      } else {
        alert("can not do this");
      }

    },

    downtask: function(task) {
      //frontend
      var index = this.tasks.indexOf(task);
      if (this.tasks[index + 1]) {
        var temp = this.tasks[index + 1];
        this.tasks[index + 1] = this.tasks[index];
        this.tasks[index] = temp;
      } else {
        alert("can not do this");
      }
    },
    edittask: function() {



    },
    viewtask: function() {



    }
  },


  //from parent to child - change the value
  watch: {
    newTask: function(val) {
      // console.log("tasks changed !!");
      let index = val.length - 1
      let description = val[index].description;
      let id = val[index].id;
      this.tasks.push({
        id: id,
        description: description
      });
    }
  }

}
</script>

<style>
</style>
