export default function (Vue) {

  Vue.auth = {

    register(vue, site, user) {

      let data = {
        "name": user.name,
        "email": user.email,
        "password": user.password,
        "password_confirmation": user.password_confirmation,
      };


      vue.$http.post(site, data, {
        emulateJSON: true
      }).then(response => {
        if (response.body.success) {
          alert(response.body.message);
          let site = "http://todoapi.local/oauth/token";
          vue.$auth.login(vue, site, user);
        }
      });


    },

    login(vue, site, user) {

      let data = {
        "client_id": user.client_id,
        "client_secret": user.client_secret,
        "grant_type": user.grant_type,
        "username": user.email,
        "password": user.password,
      };


      vue.$http.post(site, data, {
        emulateJSON: true
      }).then(response => {
        let token = response.body.access_token;
        let expiration = response.body.expires_in;
        this.setToken(token, expiration);
        alert("token saved");
      });





    },


    isAuth() {
      if(this.getToken()){
        return true;
      }
     return false  ;
    },
    deleteToken() {
      localStorage.removeItem('access_token');
      localStorage.removeItem('expires_in');
      localStorage.removeItem('time_now');
    },
    setAuthenticatedUser(user) {
      authenticatedUser = user
    },
    getAuthenticatedUser() {
      return authenticatedUser;
    },
    setToken(access_token, expires_in) {
      localStorage.setItem('access_token', access_token);
      localStorage.setItem('expires_in', expires_in);
      localStorage.setItem('time_now',new Date().getTime());
    },
    getToken() {

      let token_stored_time = localStorage.getItem('time_now');
      let expiration_time = localStorage.getItem('expires_in');
      let token = localStorage.getItem('access_token');

      if(! token || ! expiration_time || !token_stored_time){
        return null;
      }

      let time_now = new Date().getTime();
      let spend_time_until_now = time_now-token_stored_time;


      if(spend_time_until_now > expiration_time){
        this.deleteToken();
        return null;
      }


      return token;
    },



  }

  Object.defineProperties(Vue.prototype, {
    $auth: {
      get() {
        return Vue.auth
      },
      set() {
        //just for solve the error
      }
    }
  })



}
