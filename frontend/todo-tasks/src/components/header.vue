<template>
  <header>
    <nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <router-link :to="{path: '/'}" class="py-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        </router-link>
        <router-link :to="{path: '/'}" class="py-2 d-none d-md-inline-block">Home</router-link>
        <router-link v-if="this.$auth.isAuth()" :to="{path: '/create'}" class="py-2 d-none d-md-inline-block">Write a task</router-link>
        <router-link v-if="!this.$auth.isAuth()" :to="{path: '/login'}" class="py-2 d-none d-md-inline-block">Login</router-link>
        <router-link v-if="!this.$auth.isAuth()" :to="{path: '/register'}" class="py-2 d-none d-md-inline-block">Register</router-link>
        <div  v-on:click="logout">
          <router-link v-if="this.$auth.isAuth()" :to="{path: '#'}" class="py-2 d-none d-md-inline-block">Log out</router-link>
        </div>
      </div>
    </nav>
  </header>
</template>
<script>
export default {
  data() {
    return {

    }
  },

  methods: {




    logout(){
    this.$auth.deleteToken();
    this.$router.go('/');
    }
  },

}
</script>




<style>
  .site-header {
    background-color: rgba(0, 0, 0, .85);
    -webkit-backdrop-filter: saturate(180%) blur(20px);
    backdrop-filter: saturate(180%) blur(20px);
  }
  .pb-1, .py-1 {
    padding-bottom: .25rem!important;
  }
  .pt-1, .py-1 {
    padding-top: .25rem!important;
  }
  .sticky-top {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1020;
  }
  nav {
    display: block;
  }
  .site-header a {
    color: #999;
    transition: ease-in-out color .15s;
  }

  a {
    color: #999;
    font-weight: bold;
    text-decoration: none;
    background-color: transparent;
    cursor: pointer;
  }

  *, ::after, ::before {
    box-sizing: border-box;
  }
  header{
    margin-bottom: 30px;
  }
</style>
