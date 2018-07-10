<template>
<div class="container">
  <h1>{{title}}</h1>
  <addtasks v-if="main" v-on:addTask="listenToAddTask($event)"></addtasks>
  <showtasks v-if="main" v-bind:newTask="tasks"  v-on:changeView="listenToChangeView($event)"></showtasks>
  <router-view v-on:changeView="listenToChangeView($event)"></router-view>
  <!--
  <ul>
    <li><router-link to="/edit/2" >edit a task</router-link></li>
    <li><router-link to="/show/3" >show a task</router-link></li>
  </ul>
  -->
</div>
</template>
<script>
import AddTasks from './components/addtasks.vue'
import ShowTasks from './components/showtasks.vue'

import ShowTask from './components/showtask.vue'
import EditTask from './components/edittask.vue'

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
      description: '',
      main:true,
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
    },
    listenToChangeView(e){
      this.main=e;
    }
  },
}




</script>

<style scoped>
h1 {
  color: purple
}
</style>
