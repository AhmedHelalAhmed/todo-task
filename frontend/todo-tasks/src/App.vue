<template>
<div class="container text-center">
  <h1>{{title}}</h1>
  <addtasks v-if="main&&maincreate" v-on:addTask="listenToAddTask($event)"></addtasks>
  <showtasks v-if="main&&maincreate"  v-bind:newTask="tasks" v-on:changeView="listenToChangeView($event)"></showtasks>

  <router-view  v-on:changeView="listenToChangeView($event)"></router-view>


  <createtask v-if="!maincreate" v-bind:mainApp="main" v-on:createTask="listenToCreateTask($event)"></createtask>
  <button class="btn btn-success"  v-on:click="callCreateTask()" v-if="maincreate&&main">Create a Task</button>

</div>
</template>
<script>
import AddTasks from './components/addtasks.vue'
import ShowTasks from './components/showtasks.vue'
import CreateTask from './components/createtask.vue'

import ShowTask from './components/showtask.vue'
import EditTask from './components/edittask.vue'

export default {
  components: {
    'addtasks': AddTasks,
    'showtasks': ShowTasks,
    'createtask': CreateTask
  },


  data() {
    return {
      //just contain new data
      tasks: [],
      title: 'todo',
      description: '',
      main: true,
      maincreate: true,
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
    listenToChangeView(e) {
      this.main = e;
    },
    callCreateTask() {
      this.maincreate = false;

    },
    listenToCreateTask(e){
      // console.log("ssssssssssssssssssssssssssssssssss");
      this.maincreate = e;
      this.mainApp=e;
    }
  },
}
</script>

<style scoped>
h1 {
  color: purple
}
</style>
