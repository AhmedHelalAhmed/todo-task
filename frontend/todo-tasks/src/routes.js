import editTask from './components/edittask.vue'
import showTask from './components/showtask.vue'
import createTask from './components/createtask.vue'
import authorizedClients from './components/AuthorizedClients.vue'
import Clients from './components/Clients.vue'
import PersonalAccessTokens from './components/PersonalAccessTokens.vue'

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
    path: "/authorizedclients",
    component: authorizedClients,
    name: 'authorizedclients'
  },
  {
    path: "/clients",
    component: Clients,
    name: 'clients'
  },
  {
    path: "/personalaccesstokens",
    component: PersonalAccessTokens,
    name: 'personalaccesstokens'
  },
]
