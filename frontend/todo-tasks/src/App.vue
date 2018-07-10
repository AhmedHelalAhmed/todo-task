<template>
<div class="container text-center">
  <h1>{{title}}</h1>

  <addtasks 
  v-if="app_key&&app_create_key" 
  v-on:addTask="listenToAddTask($event)"
  ></addtasks>

  <showtasks 
  v-if="app_key&&app_create_key"  
  v-bind:newTask="tasks" 
  v-on:changeView="listenToChangeView($event)"
  ></showtasks>

  <router-view  
  v-on:changeView="listenToChangeView($event)"
  ></router-view>

  <createtask 
  v-if="!app_create_key"  
  v-on:createTask="listenToCreateTask($event)"
  ></createtask>
  
  <button 
  class="btn btn-success"  
  v-on:click="callCreateTask()" 
  v-if="app_create_key&&app_key"
  >Create a Task</button>

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
      tasks: [],//for new task that will be added
      title: 'todo',//title of the app
      description: '',//for add new task
      app_key: true,//flag for show tasks and add tasks components and app
      app_create_key: true,//flag for create task component and the rest of components
    }
  },

  methods: {
    listenToAddTask(e) {
      //e = the value entered by user
      this.tasks.push(e);
    },
    listenToChangeView(e) {
      this.app_key = e;
    },
    callCreateTask() {
      this.app_create_key = false;

    },
    listenToCreateTask(e){
      this.app_create_key = e;
    }
  },
}
</script>

<style scoped>
h1 {
  color: purple
}
</style>
