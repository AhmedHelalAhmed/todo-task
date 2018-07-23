<template>


<div class="text-left">
  <div class="status" v-if="submitStatus">
    <div class="alert alert-danger" role="alert" v-if="!password">Password is empty!</div>
    <div class="alert alert-danger" role="alert" v-if="!name">Name is empty!</div>
    <div class="alert alert-danger" role="alert" v-if="!password">Confirm Password is empty!</div>
    <!-- <div class="alert alert-danger" role="alert" v-if="notequalpasswords">Passwords not identical!</div> -->
  </div>


  <form v-on:submit.prevent>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter name" v-model='name' v-on:keyup.enter="submit">
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" v-model='email' v-on:keyup.enter="submit">
      <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>



    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password" v-model='password' v-on:keyup.enter="submit">
    </div>


    <div class="form-group">
      <label for="confirmpassword">Confirm Password</label>
      <input type="password" class="form-control" id="confirmpassword" placeholder="confirmpassword" v-model='confirmpassword' v-on:keyup.enter="submit">
    </div>


    <button type="submit" class="btn btn-primary" v-on:click="submit">Sign up</button>
  </form>



</div>

</template>

<script>
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      confirmpassword:'',
      submitStatus: false,
    }
  },

  methods: {
    submit(){
      this.submitStatus=true;
      if(this.name&&this.password&&this.confirmpassword&&this.email){
        let site = "http://todoapi.local/api/register";

        let data = {
            name: this.name,
            email: this.email,
            password: this.password}

          this.$http.post(site,data,{emulateJSON: true}).then(response =>{
            console.log(response);
          });
      }

    },

  },
created(){

}
}
</script>
