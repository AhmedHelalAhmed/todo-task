<template>
  <div>
    <app-header></app-header>
    <div class="container text-center">
      <addtasks v-if="app_key&&app_create_key&&this.$route.name=='app'" v-on:addTask="listenToAddTask($event)">
      </addtasks>
      <showtasks v-if="app_key&&app_create_key&&this.$route.name=='app'" v-bind:newTask="tasks" v-on:changeView="listenToChangeView($event)">
      </showtasks>
      <router-view v-on:changeView="listenToChangeView($event)" v-on:createTask="listenToCreateTask($event)" v-if="this.$route.name!='app'">
      </router-view>
      <div v-on:click="callCreateTask()" v-if="app_create_key&&app_key&&this.$route.name=='app'">
        <router-link :to="{path: '/create'}" class="btn btn-success">
          Create a Task
        </router-link>
      </div>

    </div>

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

  // import {bus} from './main';


  export default {
    components: {
      'addtasks': AddTasks,
      'showtasks': ShowTasks,
      'createtask': CreateTask,
      'login': Login,
      'app-header': Header,
      'app-footer': Footer,
    },


    data() {
      return {
        //just contain new data
        tasks: [], //for new task that will be added
        title: 'todo', //title of the app
        description: '', //for add new task
        app_key: true, //flag for show tasks and add tasks components and app
        app_create_key: true, //flag for create task component and the rest of components

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
      listenToCreateTask(e) {
        this.app_create_key = e;

      }

    },
    created() {

    },
    mounted() {


      //start save Authenticated User
      if (this.$auth.isAuth() && !this.$auth.isUser()) {

        let site = "api/user";
        this.$http.get(site).then(response => {

          this.$auth.setAuthenticatedUser(response.bodyText)
          alert("Authenticated User saved");
        });
      }


      // bus.$emit('send_data',[this.app_key,this.app_create_key]);
    }

  }
</script>

<style scoped>
  div .notAuth {
    margin-top: 350px;
    margin-right: 44px;
  }

  .media-heading span {
    color: red;
    font-weight: bold;
  }

  h1 {
    color: purple
  }

  a {
    color: #001b44;
  }
</style>
