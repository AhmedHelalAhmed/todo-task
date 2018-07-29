export default function (Vue) {

  Vue.auth = {


    isAuth()
    {
      if(this.getToken())
      {
        return true;
      }
      else
      {
        return false;
      }

    },

    isUser()
    {
      if(this.getAuthenticatedUser())
      {
        return true;
      }
      else
      {
        return false;
      }

    },


    deleteToken()
    {
      localStorage.removeItem('access_token');
      localStorage.removeItem('expires_in');
      localStorage.removeItem('time_now');
      localStorage.removeItem('authenticatedUser');
    },


    setAuthenticatedUser(user)
    {
      localStorage.setItem('authenticatedUser', user);
    },

    getAuthenticatedUser()
    {
      return JSON.parse(localStorage.getItem('authenticatedUser'));
    },

    setToken(access_token, expires_in)
    {
      localStorage.setItem('access_token', access_token);
      localStorage.setItem('expires_in', expires_in);
      localStorage.setItem('time_now',new Date().getTime());
    },

    getToken()
    {

      let token_stored_time = localStorage.getItem('time_now');
      let expiration_time = localStorage.getItem('expires_in');
      let token = localStorage.getItem('access_token');


      if(!token || !expiration_time || !token_stored_time){
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
