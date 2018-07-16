import editTask from './components/edittask.vue'
import showTask from './components/showtask.vue'
import createTask from './components/createtask.vue'
export default[
    {
        path: "/show/:id",
        name:'showtask',
        component:showTask
    },
    {
        path: "/edit/:id",
        name:"edittask",
        component:editTask
    },
    {
        path: "/create",
        component:createTask,
        name:'createtask'
    },
]
