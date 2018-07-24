<template>
<div class="text-left">
  <div class="status" v-if="submitStatus">
    <div class="alert alert-danger" role="alert" v-if="!user.username">Email is empty!</div>
    <div class="alert alert-danger" role="alert" v-if="!user.password">Password is empty!</div>
  </div>
  <form v-on:submit.prevent>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" v-model='user.email' v-on:keyup.enter="submit">
      <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" v-model='user.password' v-on:keyup.enter="submit">
    </div>
    <div class="form-group form-check">
    </div>
    <button type="submit" class="btn btn-primary" v-on:click="submit">Login</button>
  </form>
</div>

</template>

<script>
export default {
  data() {
    return {
      user: {
        client_id: 2,
        client_secret: "cAorAn45535ku5tWkxAHy6ooG3OZMJGALOvPNpEn",
        grant_type: "password",
        email: '',
        password: '',
      },
      submitStatus: false,
    }
  },

  methods: {
    submit(){
      this.submitStatus=true;
      if(this.user.email&&this.user.password){
        let site = "http://todoapi.local/oauth/token";
        this.$auth.login(this,site,this.user);
      }

    },

  },
created(){

}
}
</script>
