export default function (Vue){
Vue.auth = {

  register(vue,site,user){
    
    let data = {
      "name": user.name,
      "email": user.email,
      "password": user.password,
      "password_confirmation": user.password_confirmation,
    };


    vue.$http.post(site,data,{emulateJSON: true}).then(response =>{
      if(response.body.success)
      {
        alert(response.body.message);
        let site = "http://todoapi.local/oauth/token";
          vue.$auth.login(vue,site,user);
      }
    });


  },

  login(vue,site,user){

        
        let data = {
          "client_id" : user.client_id,
          "client_secret" : user.client_secret,
          "grant_type" : user.grant_type,
          "username" : user.email,
          "password" : user.password,
        };


    vue.$http.post(site,data,{emulateJSON: true}).then(response =>{
      let token = response.body.access_token;
      let expiration = response.body.expires_in;
      this.setToken(token,expiration);
      alert("token saved");
    });
  },
  
  isAuth(){
    let token_stored_time = localStorage.getItem('time_now').getTime();
    let time_now   = new Date();
    let spend_time_until_now = time_now.getTime()-token_stored_time;
    let expiration_time = localStorage.getItem('expires_in');
    if(spend_time_until_now > expiration_time){
      this.deleteToken();
    }
    if(true){
      alert(this.deleteToken());
    }
    return this.getToken()? true:false;
  },
  deleteToken(){
    return "Ahmed Helal";
  },
  setAuthenticatedUser(email) {
    let user={email:email,}
    localStorage.setItem('user',JSON.stringify(user));
  },
  getAuthenticatedUser() {
    return JSON.parse(localStorage.getItem('user'));
  },
  setToken(access_token,expires_in) {
    localStorage.setItem('access_token',access_token);
    localStorage.setItem('expires_in',expires_in);
    localStorage.setItem('time_now',new Date());
  },
  getToken() {
    return localStorage.getItem('access_token');
  }



}

Object.defineProperties(Vue.prototype,{
  $auth: {
    get(){
      return Vue.auth
    },
    set(){
      //just for solve the error
    }
  }
})



}
