<template>



<div class="container">

  <div class="row">


    <div class="col-lg-5">
      <div class="media">
        <a class="pull-left" href="#">

          <img class="media-object dp img-circle" src="http://img.app-liv.jp.s3.amazonaws.com/icon/003090831/26a250e865c6d36819efbe6badcee2f1.png" style="width: 100px;height:100px;">

        </a>
        <div class="media-body">



          <h4 class="media-heading">Welcome {{ this.$auth.getAuthenticatedUser().name}} you have : <small> number of tasks </small>tasks</h4>



          <hr style="margin:8px auto">

          <h3>some of tasks you have</h3>

          <span class="label label-default">task1</span>
          <span class="label label-default">task2</span>
          <span class="label label-info">task3</span>
          <span class="label label-default">task4</span>


        </div>
      </div>

    </div>



  </div>
</div>


</template>




<script>
export default {
  data() {
    return {}
  },

  methods: {},

}
</script>
<style scoped>

  .pull-left
  {
    margin-right: 30px;
  }
  .media
  {
    /*box-shadow:0px 0px 4px -2px #000;*/
    margin: 20px 0;
    padding:30px;
  }
  .dp
  {
    border:10px solid #eee;
    transition: all 0.2s ease-in-out;
  }
  .dp:hover
  {
    border:2px solid #eee;
    transform:rotate(360deg);
    -ms-transform:rotate(360deg);
    -webkit-transform:rotate(360deg);
    /*-webkit-font-smoothing:antialiased;*/
  }
</style>
