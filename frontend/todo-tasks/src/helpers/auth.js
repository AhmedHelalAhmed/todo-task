export default function (Vue){
Vue.auth = {

  isAuth(){
    return "Ahmed Helal";
  },
  deleteToken(){
    return "Ahmed Helal";
  },
  setAuthenticatedUser() {
    return "Ahmed Helal";
  },
  getAuthenticatedUser() {
    return "Ahmed Helal";
  },
  setToken(access_token,expires_in) {
    localStorage.setItem('access_token',access_token);
    localStorage.setItem('expires_in',expires_in);
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
