 <?php
$this->start('contents');
?>

 <style>


.info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 2px;
    margin-bottom: 15px;
        border: 1px solid gainsboro;

}
.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    color:white;
}
.info-box-text{
    text-transform: uppercase;
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding-top:1em;
}
.info-box-number{font-size: 2em;}
.bg-aqua{background-color: #00c0ef !important;}
.bg-green{background-color: #00a65a !important;color:white!important;}
.bg-blue{background-color: #00A4EF !important;}
.bg-red{background-color: #D33C44 !important;}
.bg-yellow{    background-color: #f39c12 !important;color:white!important;}

</style>

<!-- Start main-content -->
<div class="main-content" >
    <meta name="ajax" url="<?=$this->Url->build(["controller" => "Authexs",
        "action" => "login"]);?>">
    <meta name="redirect" url="<?=$this->Url->build(['controller' => 'Profile', 'action' => 'profile']);?>">
  <!-- Section: departments -->
  <section style="padding-top:3rem;padding-bottom:3rem;background-image: url(http://www.codexwp.com/wp-content/uploads/2018/01/pattern1.png);">    
    <div class="container effect7" style=" background-color:white;background-image: url(http://pqsnetwork.com/img/welcome-login.jpg);">
      <div class="section-title ">
        <div class="row">


        <div class="col-md-12">


            <div class="row mb-20">
              
              <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                  <div class="panel-body">


                        <div class="row text-center mt-40">
                            <h2 class="title text-uppercase">EHC<span class="text-black font-weight-300"> Login</span></h2>
                            <p class="text-uppercase letter-space-4">Secure login with your user/pass.</p>
                        </div>
                       

                     <div class="row" >
                        <div class="col-md-12 p-50">

                            <form class="form-horizontal" id="login_form" action="/action">
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="username">Username</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="" name="username" placeholder="Enter username">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-3" for="pwd">Password</label>
                                <div class="col-sm-9"> 
                                  <input type="password" class="form-control" id="pwd"name="password" placeholder="Enter password">
                                </div>
                              </div>
                              <div class="form-group"> 
                                <div class="col-sm-offset-3 col-sm-9">
                                  <div class="checkbox">
                                    <label><input type="checkbox"> Remember me</label>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group"> 
                                <div class="col-sm-offset-3 col-sm-9">
                                  <button type="submit" class="btn btn-default bg-green"><i class="fa fa-sign-in text-white mr-5" aria-hidden="true"></i>  Secure Login</button>
                                </div>
                              </div>
                            </form>
                            <br>
                            <p class="col-md-6">
                                <i class="fa fa-key mr-10" aria-hidden="true"></i><a href="#">I forgot my password</a>
                            </p>
                            <p class="col-md-6">
                                <i class="fa fa-user-plus mr-10" aria-hidden="true"></i><a href="" class="text-center">Register new account</a>
                            </p>
                            <!-- /.login-card-body -->
                         </div>
              


                    </div>

                </div>

              </div>


            </div>

              </div>


        </div>
      </div>
    </div>
  </section>
 <!--loading modal start-->
    <div class="modal " id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-header center">
            <center><h1>You Are Logging In</h1></center>
        </div>
        <div class="modal-body">
            <div id="ajax_loader">
                <img src="<?= $this->request->webroot ?>img/public/please-wait.gif" style="display: block; margin-left: auto; margin-right: auto;">
            </div>
        </div>
    </div>
    <!--loading modal end-->
</div>
<!-- end main-content -->

<?php
$this->end();
$this->start('bottomscript');
?>
 <script>
     $("#login_form").submit(function(e) {
         e.preventDefault();
         $('#pleaseWaitDialog').modal();
         var url =$('meta[name="ajax"]').attr('url');
         var url2 =$('meta[name="redirect"]').attr('url');
         var url3 =$('meta[name="baseurl"]').attr('url');
         var aurl = url3+"admin/";
         var data = $("#login_form").serialize();
         console.log(url);
         $.ajax({
             url:url,
             type:"POST",
             data:data,
             dataType: "json",
             success: function(obj){
                 console.log(obj);
                 if(obj.status =='success'){
                 $('#pleaseWaitDialog').modal('hide');
                     $( location ).attr("href", url2);
                     //console.log(obj);
                 }
                 else if(obj.status =='admin'){
                     $('#pleaseWaitDialog').modal('hide');
                     $( location ).attr("href", aurl);
                 }
                 else{
                    $('#pleaseWaitDialog').modal('hide');
                     FlashStatus(obj.status,obj.response);
                 }



             }
         });
         // alert(data);
     });



 </script>


 <?=$this->end();?>
