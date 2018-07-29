<template>
<div class="container">
<div class="text-left">
  <div class="status" v-if="submitStatus">
    <div class="alert alert-danger" role="alert" v-if="!user.password">Password is empty!</div>
    <div class="alert alert-danger" role="alert" v-if="!user.name">Name is empty!</div>
    <div class="alert alert-danger" role="alert" v-if="!user.password">Confirm Password is empty!</div>
    <!-- <div class="alert alert-danger" role="alert" v-if="notequalpasswords">Passwords not identical!</div> -->
  </div>
  <form @submit.prevent="submit" method="post">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter name" v-model='user.name' >
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" v-model='user.email' >
      <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" v-model='user.password' >
    </div>
    <div class="form-group">
      <label for="password_confirmation">Confirm Password</label>
      <input type="password" class="form-control" id="password_confirmation" placeholder="confirmPassword" v-model='user.password_confirmation' >
    </div>
    <button type="submit" class="btn btn-primary" >Sign up</button>
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
        client_secret: "cAorAn45535ku5tWkxAHy6ooG3OZMJGALOvPNpEn",
        grant_type: "password",
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      },
      submitStatus: false,
    }
  },

  methods: {
    submit(){
      this.submitStatus=true;
      if(this.user.name&&
        this.user.password&&
        this.user.password_confirmation&&
        this.user.email){


      let data = {
        "name": this.user.name,
        "email": this.user.email,
        "password": this.user.password,
        "password_confirmation": this.user.password_confirmation,
      };

      let site = "api/register";

      this.$http.post(site, data,{
        emulateJSON: true
      }).then(response => {

      if (response.body.success) {
        console.log(response.body.message);
        let site = "http://localhost:8000/oauth/token";

        //redirect to login
        // window.location.href = '/login';
        this.$router.push("/login");


      }


      });


        }

        // this.$http.get('api/user').then((res)=>{
        //   console.log(res);
        // });


    },

  }
}
</script>
