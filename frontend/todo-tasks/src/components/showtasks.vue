<template>
  <div class="container">
    <h1 class="text-center">All Tasks</h1>

    <table class="table table-bordered table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Task</th>
          <th scope="col" colspan="3" class="text-center">Action</th>

        </tr>
      </thead>
      <tbody>

        <tr v-model="tasks" v-for='task in tasks'>
          <th scope="row">{{task.id}}</th>
          <td>{{task.description}}</td>
          <td><button @click="deletetask(task)" class="btn btn-danger">Done</button></td>
          <td><button @click="uptask(task)" class="btn btn-danger">Up</button></td>
          <td><button @click="deletetask(task)" class="btn btn-danger">Down</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import {bus} from '../main.js';

  export default {

    props:['newTask'],

    data() {
      return {
        tasks:[]
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
    watch:{
      newTask: function(val){
        console.log("tetstststststststst00000000000000000000000000");
        this.tasks.push({id: 0,description: val});
      }
    }

  }
</script>

<style>
</style>
