import editTask from './components/edittask.vue'
import showTask from './components/showtask.vue'
export default[
    {path: "/show/:id",component:showTask },
    {path: "/edit/:id",component:editTask },
]