

var myapp = new Vue({

  //root element (scope of the Vue instance)
  'el': '#app',

  //my variable
  'data': {
    'tasks': []
  },

  //my methods
  'methods': {

  },


  mounted() {
    axios
      .get("http://127.0.0.1:8000/api/tasks")
      .then(response => {
        this.tasks = response.data
      })
  }

});
