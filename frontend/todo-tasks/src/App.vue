<template>
<div class="container">
  <h1>{{title}}</h1>
  <addtasks v-on:addTask="listenToAddTask($event)"></addtasks>
  <showtasks tasks="newTask"></showtasks>
</div>
</template>

<script>
import AddTasks from './components/addtasks.vue'
import ShowTasks from './components/showtasks.vue'

import {
  bus
} from './main.js';


export default {
  components: {
    'addtasks': AddTasks,
    'showtasks': ShowTasks,
  },


  data() {
    return {
      tasks: [],
      title: 'TODO TASKS',
      description: ''
    }
  },

  methods: {
    listenToAddTask(e) {
      //e = the value entered by user
      // console.log("e=");
      //  console.log(e);
        // console.log(this.tasks);
      this.tasks.push({id: 0,description: e});
      // console.log("tasks=");
      // console.log(this.tasks);
    }
  },
}
</script>

<style scoped>
h1 {
  color: purple
}
</style>
