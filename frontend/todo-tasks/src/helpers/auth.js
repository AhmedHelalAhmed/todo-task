export default function (Vue) {
  let authenticatedUser;
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
      let time_now_in_milliseconds = new Date().getTime();
      let expiration_time_in_milliseconds = localStorage.getItem('expires_in');
      if (time_now_in_milliseconds > expiration_time_in_milliseconds) {
        this.deleteToken();
      }

      return this.getToken() ? true : false;
    },
    deleteToken() {
      return "Ahmed Helal";
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
    },
    getToken() {
      return localStorage.getItem('access_token');
    },

    makeUserObject()
    {
      return localStorage.set
    }

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
