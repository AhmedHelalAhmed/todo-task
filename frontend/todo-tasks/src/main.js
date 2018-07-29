import Vue from 'vue'
import App from './App.vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import Routes from './routes'
import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue.esm';
import Auth from './helpers/auth.js'


// Import the styles directly. (Or you could add them via script tags.)
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';


Vue.use(VueResource);
Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(Auth);

Vue.http.options.root = "http://localhost:8000";

// Vue.http.options.emulateJSON = true;



if(Vue.auth.isAuth()) {
  Vue.http.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken();
  Vue.http.headers.common['Accept'] = 'application/json';
}


const router = new VueRouter({
  routes: Routes,
  // mode: 'history' //to make the routes without #
});


//this called when ever the navigation trigger
router.beforeEach(
  (to, from, next) => {

    // if (to.matched.some(record => record.meta.forVisitors)) {
    //   if (!Vue.auth.isAuth(Vue)) {
    //     next({
    //       path: '/'
    //     })
    //   }
    //   else {
    //     next();
    //   }
    // }
    // else
    if (to.matched.some(record => record.meta.forAuth)) {
      if (!Vue.auth.isAuth(Vue)) {
        next({
          path: '/welcome'
        })
      }
      else {
        next();
      }
    }
    else {
      next();
    }
  }
);


// export const bus = new Vue();

// export const test = "test";

new Vue({
  el: '#app',
  render: h => h(App),
  router: router
})
