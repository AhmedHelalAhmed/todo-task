<template>
<div class="text-left">
  <div class="status" v-if="submitStatus">
    <div class="alert alert-danger" role="alert" v-if="!username">Email is empty!</div>
    <div class="alert alert-danger" role="alert" v-if="!password">Password is empty!</div>
  </div>
  <form v-on:submit.prevent>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" v-model='username' v-on:keyup.enter="submit">
      <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" v-model='password' v-on:keyup.enter="submit">
    </div>
    <div class="form-group form-check">
    </div>
    <button type="submit" class="btn btn-primary" v-on:click="submit">Ok</button>
  </form>
</div>

</template>

<script>
export default {
  data() {
    return {
      username: '',
      password: '',
      submitStatus: false,
    }
  },

  methods: {
    submit(){
      this.submitStatus=true;
      if(this.username&&this.password){
        let site = "http://todoapi.local/oauth/token";

        let data = {
            client_id: 2,
            client_secret: "cAorAn45535ku5tWkxAHy6ooG3OZMJGALOvPNpEn",
            grant_type: "password",
            username: this.username,
            password: this.password}

          this.$http.post(site,data,{emulateJSON: true}).then(response =>{
            let token = response.body.access_token;
            let expiration = response.body.expires_in;
            this.$auth.setToken(token,expiration);
          });
      }

    },

  },
created(){

}
}
</script>
