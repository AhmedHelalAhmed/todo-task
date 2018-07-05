<template>
<div class="container">
  <h1>{{title}}</h1>
  <addtasks></addtasks>
  <showtasks  v-bind:tasks="tasks"></showtasks>
</div>
</template>

<script>
import AddTasks from './components/addtasks.vue'
import ShowTasks from './components/showtasks.vue'
export default {

  components: {
    'addtasks': AddTasks,
    'showtasks':ShowTasks,
  },
  data() {
    return {
      tasks: [],
      title: 'TODO TASKS',
       description: this.description
    }
  },


}

</script>

<style scoped>
h1 {
  color: purple
}
</style>
