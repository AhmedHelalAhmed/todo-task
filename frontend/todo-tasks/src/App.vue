<template>
  <div>
    <app-header></app-header>
    <div class="container text-center">






      <addtasks
        v-if="app_key&&app_create_key&&!route_name&&false"
        v-on:addTask="listenToAddTask($event)">
      </addtasks>

      <showtasks
        v-if="app_key&&app_create_key&&!route_name&&false"
        v-bind:newTask="tasks"
        v-on:changeView="listenToChangeView($event)">
      </showtasks>

      <router-view
        v-on:changeView="listenToChangeView($event)&&false"
        v-on:createTask="listenToCreateTask($event)">
      </router-view>


      <!-- <login></login> -->

      <div
        v-on:click="callCreateTask()"
        v-if="app_create_key&&app_key&&!route_name&&false">
        <router-link
          :to="{path: '/create'}"
          class="btn btn-success">
          Create a Task
        </router-link>
      </div>

    </div>

    <welcome></welcome>
    <app-footer></app-footer>
  </div>
</template>
<script>
import AddTasks from './components/addtasks.vue'
import ShowTasks from './components/showtasks.vue'
import CreateTask from './components/createtask.vue'
import ShowTask from './components/showtask.vue'
import EditTask from './components/edittask.vue'
import Login from './components/login.vue'
import Header from './components/header.vue'
import Footer from './components/footer.vue'
import Welcome from './components/welcome.vue'
// import {bus} from './main';


export default {
  components: {
    'addtasks': AddTasks,
    'showtasks': ShowTasks,
    'createtask': CreateTask,
    'login': Login,
    'app-header': Header,
    'app-footer': Footer,
    'welcome': Welcome,
  },


  data() {
    return {
      //just contain new data
      tasks: [], //for new task that will be added
      title: 'todo', //title of the app
      description: '', //for add new task
      app_key: true, //flag for show tasks and add tasks components and app
      app_create_key: true, //flag for create task component and the rest of components
      route_name: this.$route.name,
    }
  },

  methods: {
    listenToAddTask(e) {
      //e = the value entered by user
      this.tasks.push(e);
    },
    listenToChangeView(e) {
      this.app_key = e;
      this.route_name = null;
    },
    callCreateTask() {
      this.app_create_key = false;
      this.route_name = null;
    },
    listenToCreateTask(e) {
      this.app_create_key = e;
      this.route_name = null;
    }

  },
  created() {
    // bus.$emit('send_data',[this.app_key,this.app_create_key]);
  },

}
</script>

<style scoped>


h1 {
  color: purple
}


</style>
