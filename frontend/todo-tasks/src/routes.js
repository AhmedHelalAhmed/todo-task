import editTask from './components/edittask.vue'
import showTask from './components/showtask.vue'
import createTask from './components/createtask.vue'
import registeration from './components/registeration.vue'
import login from './components/login.vue'

export default [{
    path: "/show/:id",
    name: 'showtask',
    component: showTask
  },
  {
    path: "/edit/:id",
    name: "edittask",
    component: editTask
  },
  {
    path: "/create",
    component: createTask,
    name: 'createtask'
  },
  {
    path: "/login",
    component: login,
    name: 'login'
  },
  {
    path: "/register",
    component: registeration,
    name: 'registeration'
  },

]
