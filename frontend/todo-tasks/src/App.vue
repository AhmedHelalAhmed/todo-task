<template>
<div class="container">
  <h1>{{title}}</h1>
  <addtasks v-on:addTask="listenToAddTask($event)"></addtasks>
  <showtasks v-bind:newTask="tasks"></showtasks>
</div>
</template>
<script>
import AddTasks from './components/addtasks.vue'
import ShowTasks from './components/showtasks.vue'

export default {
  components: {
    'addtasks': AddTasks,
    'showtasks': ShowTasks,
  },


  data() {
    return {
      //just contain new data
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
      this.tasks.push(e);
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
