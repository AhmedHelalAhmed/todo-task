<template>
  <div class="container">


<div class="text-left">
  <div class="status" v-if="submitStatus">
    <div class="alert alert-danger" role="alert" v-if="!user.email">Email is empty!</div>
    <div class="alert alert-danger" role="alert" v-if="!user.password">Password is empty!</div>
  </div>
  <form @submit.prevent="submit">
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" v-model='user.email' >
      <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" v-model='user.password' >
    </div>
    <div class="form-group form-check">
    </div>
    <button type="submit" class="btn btn-primary" >Login</button>
  </form>
</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        client_id: 2,
        client_secret: "8mt7lOeIajgzCA0NwdcW1B9O70Gj9pEua3OD5zZN",
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
      let data = {
        "client_id": this.user.client_id,
        "client_secret": this.user.client_secret,
        "grant_type": this.user.grant_type,
        "username": this.user.email,
        "password": this.user.password,
      };

      let site_for_token = "http://localhost:8000/oauth/token";

      let vue=this;

      this.$http.post(site_for_token, data).then(response => {
          let token = response.body.access_token;
          let expiration = response.body.expires_in;
          this.$auth.setToken(token, expiration);
          console.log("token saved");
          if(vue.$auth.isAuth()){
            //the two are required
            //one for send the next request correctly
            //the other for redirect
            // vue.$router.go("/");

            window.location.href = '/';

            // this.$router.push({name:'app'});


          }
        }).catch(e=>{
          console.log(e);
        });







      }




    },

  },
created(){

}
}
</script>
