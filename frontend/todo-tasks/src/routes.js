import editTask from './components/edittask.vue'
import showTask from './components/showtask.vue'
import createTask from './components/createtask.vue'
import registeration from './components/registeration.vue'
import login from './components/login.vue'
import welcome from './components/welcome.vue'
import app from './App.vue'

export default [{
    path: "/show/:id",
    name: 'showtask',
    component: showTask,
    meta: {
      forAuth: true
    }
  },
  {
    path: "/edit/:id",
    name: "edittask",
    component: editTask,
    meta: {
      forAuth: true
    }
  },
  {
    path: "/create",
    component: createTask,
    name: 'createtask',
    meta: {
      forAuth: true
    }
  },
  {
    path: "/login",
    component: login,
    name: 'login',
    meta: {
      forVisitors: true
    }
  },
  {
    path: "/register",
    component: registeration,
    name: 'registeration',
    meta: {
      forVisitors: true
    }
  },
  {
    path: "/",
    component: welcome,
    name: 'welcome',
    meta: {
      forVisitors: true
    }
  },


  {
    path: "/",
    component: app,
    name: 'app',
    meta: {
      forAuth: true
    }
  },
]
