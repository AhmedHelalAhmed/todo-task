<template>
<div class="container">
  <header>
   <h1
   class="text-center">
   ===============( tasks )===============
   </h1>
  </header>

  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">The Task</th>
        <th
         scope="col"
         colspan="5"
         class="text-center">
         The Actions
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for='(task, key, index) in tasks'>
        <th scope="row" v-bind:index="key++">{{key}}</th>
        <td>{{task.description}}</td>
        <td>
        <button
         @click="deletetask(task)"
         class="btn btn-danger">
         Delete
        </button>
        </td>
        <td>
        <button
         @click="uptask(task.id,tasks[key-1-1].id,task)"
         class="btn btn-light">
         Up
        </button>
        </td>
        <td>
        <button
         @click="downtask(task.id,tasks[key-1+1].id,task)"
         class="btn btn-warning">
         Down
        </button>
        </td>
        <td@click="edittask()">
        <router-link
         :to="{path: '/edit/'+task.id}"
         class="btn btn-primary">
         Edit
        </router-link>
        </td>
        <td @click="viewtask()">
        <router-link
        :to="{path: '/show/'+task.id}"
        class="btn btn-info">
        view
        </router-link>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</template>

<script>
// import {bus} from '../main';
export default {
  props: ['newTask'],
  data() {
    return {
      tasks: [],
    }
  },

  mounted() {
      this.$http.get("http://127.0.0.1:8000/api/tasks").then(function(res) {
      this.tasks = res.data.data;
    });

  },

  methods: {

    deletetask: function(task) {

      //frontend
      var index = this.tasks.indexOf(task);
      this.tasks.splice(index, 1);

      //backend
      this.$http.post("http://127.0.0.1:8000/api/tasks/" + task.id, {
        _method: 'DELETE'
      }, {
        emulateJSON: true
      }).then(function(res) {


      }).catch(function(error) {

      });



    },
    uptask(the_current_id, the_up_id ,task) {

      //frontend
      let current_index = this.tasks.indexOf(task);
      let up_index = current_index - 1;
      if (this.tasks[up_index]) {
        var temp = this.tasks[up_index];
        this.tasks[up_index] = this.tasks[current_index];
        this.tasks[current_index] = temp;
        //backend
        this.swapbackend(the_current_id,the_up_id);

        //re render the component
        this.$forceUpdate();
      } else {
        alert("can not do this");
      }
    },
    downtask: function(the_current_id, the_down_id ,task) {
      //frontend
      var index = this.tasks.indexOf(task);
      if (this.tasks[index + 1]) {
        //backend
        this.swapbackend(the_current_id,the_down_id);
        var temp = this.tasks[index + 1];
        this.tasks[index + 1] = this.tasks[index];
        this.tasks[index] = temp;
        //re render the component
        this.$forceUpdate();
      } else {
        alert("can not do this");
      }
    },
    edittask: function() {
          this.$emit('changeView',false);
    },
    viewtask: function() {
          this.$emit('changeView',false);
    },
    swapbackend: function(id1,id2){

      this.$http.post("http://127.0.0.1:8000/api/tasks/"+id1+"/"+id2,{}, {
        emulateJSON: true}).then(res => {
        //frontend swap ids
         for(let task of this.tasks){
           //second
           if(task.description === res.body.data.second.description){
              this.tasks[this.tasks.indexOf(task)].id = res.body.data.second.id;
           }
           //first
           if(task.description === res.body.data.first.description){
             this.tasks[this.tasks.indexOf(task)].id = res.body.data.first.id;
           }
         }

      }).catch(function(error) {
      });
    }
  },


  //from parent to child - change the value
  watch: {
    newTask: function(val) {
      let index = val.length - 1
      let description = val[index].description;
      let id = val[index].id;
      this.tasks.push({
        id: id,
        description: description
      });
    }
  },

  created(){
        //   console.log(this.$route.name);
        //   bus.$on('send_data', data => {
        //           console.log(data,'from show list');
        //   })
  }

}
</script>

<style scoped>

/* Start Header */
header h1{
  padding: 20px;
  margin: 20px;
  text-transform: uppercase;
}
/* End Header */

</style>
