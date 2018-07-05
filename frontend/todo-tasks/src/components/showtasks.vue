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
        <tr v-for='task in tasks'>
          <th scope="row">{{task.id}}</th>
          <td>{{task.description}}</td>
          <td><button @click="deletetask(task)" class="btn btn-danger">Done</button></td>
<td><button @click="uptask(task)" class="btn btn-danger">Up</button></td>
<td><button @click="deletetask(task)" class="btn btn-danger">Down</button></td>
        </tr>

      </tbody>
    </table>




    <!--
        <ol>
          <li v-for='task in tasks'>{{task.description}} <button @click="deletetask(task)">-</button> </li>
          <li v-if='description' v-model='description'>{{description}}</li>
        </ol>
   -->
  </div>
</template>

<script>
  export default {



    data() {
      return {
        tasks:[],
        description: this.description
      }
    },


    methods: {
      deletetask: function(task) {
        var index = this.tasks.indexOf(task);
        this.props.tasks.splice(index, 1);
      }
    },
    created() {
      this.$http.get("http://127.0.0.1:8000/api/tasks").then(function(res) {
        this.tasks = res.data.data;
      });
    }



  }
</script>

<style>
</style>
