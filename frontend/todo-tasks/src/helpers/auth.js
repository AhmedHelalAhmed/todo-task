export default function (Vue){
Vue.auth = {


  isAuth:() => {
    return "Ahmed Helal";
  },
  deleteToken:() => {
    return "Ahmed Helal";
  },
  setAuthenticatedUser:() => {
    return "Ahmed Helal";
  },
  getAuthenticatedUser:() => {
    return "Ahmed Helal";
  },
  setToken:() => {
    return "Ahmed Helal";
  },
  getToken:() => {
    return "Ahmed Helal";
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
