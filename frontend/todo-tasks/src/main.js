import Vue from 'vue'
import App from './App.vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import Routes from './routes'
import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue.esm';



// Import the styles directly. (Or you could add them via script tags.)
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';


Vue.use(VueResource);
Vue.use(VueRouter);
Vue.use(BootstrapVue);

const router = new VueRouter({
  routes: Routes,
  // mode: 'history' //to make the routes without #
});

export const bus = new Vue();

// export const test = "test";

new Vue({
  el: '#app',
  render: h => h(App),
  router: router
})
