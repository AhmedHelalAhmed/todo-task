import editTask from './components/edittask.vue'
import showTask from './components/showtask.vue'
import createTask from './components/createtask.vue'
export default[
    {path: "/show/:id",component:showTask },
    {path: "/edit/:id",component:editTask },
    {path: "/create",component:createTask },
]
