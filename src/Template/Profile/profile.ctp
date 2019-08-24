 <?php

 $this->assign('prof','active');
 $this->start('topscript');
 echo $this->Html->script('jquery/fileupload.js');
 $this->end();
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
    <meta name="update" url="<?=$this->Url->build(["controller" => "Profile",
        "action" => "update"]);?>">
    <meta name="pass" url="<?=$this->Url->build(["controller" => "Profile",
        "action" => "resetpassword"]);?>">
  <!-- Section: departments -->
  <section style="padding-top:3rem;padding-bottom:3rem;background-image: url(http://www.codexwp.com/wp-content/uploads/2018/01/pattern1.png);">
    <div class="container effect7" style=" background-color:white;">
      <div class="section-title ">
        <div class="row">



          <div class="col-md-12 text-center">
            <h2 class="title text-uppercase">Account<span class="text-black font-weight-300"> Profile</span></h2>
            <p class="text-uppercase letter-space-4">My personal information.</p>

<hr>
            <div class="row mb-20">

              <div class="col-md-12">
                <div class="panel">
                  <div class="panel-body pl-20 pr-20 ">
                      <div class="row" >
                          <div class="col-md-4">
                                  <div class="uploadsingleimg text-center">
                                  <div style="border:1px solid gainsboro;padding:5px">
                                      <?php if(!empty($profile->thumb_url)){?>
                                          <img style="height: 250px;width: auto" class="mb-10" id="myphoto" src="<?= $this->request->getAttribute("webroot");?>img/<?=$profile->thumb_url ?> " alt="Enterpreneur" style="padding:10px;border:1px solid #eee; width: 100%;"><input name="thumb_url" type="hidden">
                                      <?php }
                                      else{ ?>
                                          <img class="mb-10" id="myphoto" src="<?= $this->request->getAttribute("webroot");?>img/no-image.png" alt="Enterpreneur" style="width: 100%; padding:10px;border:1px solid #eee;"><input name="thumb_url" type="hidden">
                                      <?php }?>
                                      </div>
                                      <div class="progress mb-2 mt-2">
                                          <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%">0%</div>
                                      </div>
                                      <input saveid="<?=$user->uid?>" type="file" name="uploadfile" style="display:none"><br>
                                      <button id="uploadbutton" type="button" class="btn btn-default" >Change Photo</button>
                                  </div>
                                  <hr class=" m-10">
                                  <button id="btn_edit" class="btn btn-success btn-block">Edit Profile</button>
                                  <hr class=" m-10">
                                  <button id="btn_cpass" class="btn btn-warning btn-block">Change Password</button>
                          </div>
                          <div class="col-md-7 text-left p-30 col-md-offset-1" style="border: 1px solid #eee;">
                              <div id="view_div">
                                  <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                              <span class="col-md-6" for="exampleInputName3">
                              <?=$this->Html->Image('systems/flat-color-icons-svg/flash_on.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                  Profile ID
                              </span>
                                      <span class="col-md-6" for="exampleInputName3">
                                  <data id="p_pid"><?= $profile->uid ?></data>
                              </span>
                                  </div>
                                  <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                  <span class="col-md-6" for="exampleInputName3">
                                  <?=$this->Html->Image('systems/flat-color-icons-svg/portrait_mode.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                      First Name
                                  </span>
                                      <span class="col-md-6" for="exampleInputName3">
                                      <data id="pf_name"><?= $profile->f_name ?> </data>
                                  </span>
                                  </div>
                                  <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                              <span class="col-md-6" for="exampleInputName3">
                              <?=$this->Html->Image('systems/flat-color-icons-svg/portrait_mode.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                  Last name
                              </span>
                                      <span class="col-md-6" for="exampleInputName3">
                                  <data id="pl_name"><?= $profile->l_name ?> </data>
                              </span>
                                  </div>
                                  <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                  <span class="col-md-6" for="exampleInputName3">
                                  <?=$this->Html->Image('systems/flat-color-icons-svg/ipad.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                      Mobile
                                  </span>
                                      <span class="col-md-6" for="exampleInputName3">
                                      <data id="p_mobile"><?= $profile->mobile ?> </data>
                                  </span>
                                  </div>
                                  <?php if($user->nice_name =="Doctor"){


                                      ?>

                                      <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                              <span class="col-md-6" for="exampleInputName3">
                              <?=$this->Html->Image('systems/flat-color-icons-svg/briefcase.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                  VisitTime
                              </span>
                                          <span class="col-md-6" for="exampleInputName3">
                                  <data id="p_occupation"><?= $profile->visittime ?> </data>
                              </span>
                                      </div>
                                      <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                  <span class="col-md-6" for="exampleInputName3">
                                  <?=$this->Html->Image('systems/flat-color-icons-svg/conference_call.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                      Degree
                                  </span>
                                          <span class="col-md-6" for="exampleInputName3">
                                      <data id="pm_satus"><?= $profile->degree ?> </data>
                                  </span>
                                      </div>
                                      <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                      <span class="col-md-6" for="exampleInputName3">
                                      <?=$this->Html->Image('systems/flat-color-icons-svg/ipad.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                          Speciality
                                      </span>
                                          <span class="col-md-6" for="exampleInputName3">
                                          <data id="p_mobile"><?= $profile->specialist ?> </data>
                                      </span>
                                      </div>
                                      <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                      <span class="col-md-6 col-xs-6" for="exampleInputName3">
                                      <?=$this->Html->Image('systems/flat-color-icons-svg/landscape.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                          Chamber
                                      </span>
                                          <span class="col-md-6 col-xs-6" for="exampleInputName3">
                                          <data id="p_religion"><?= $profile->chamber ?> </data>
                                      </span>
                                      </div>
                                       <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                      <span class="col-md-6 col-xs-6" for="exampleInputName3">
                                      <?=$this->Html->Image('systems/flat-color-icons-svg/landscape.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                          Doctor Type
                                      </span>
                                          <span class="col-md-6 col-xs-6" for="exampleInputName3">
                                          <data id="p_fee"><?= $profile->doctor_type?> </data>
                                      </span>
                                      </div>
                                      <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                      <span class="col-md-6 col-xs-6" for="exampleInputName3">
                                      <?=$this->Html->Image('systems/flat-color-icons-svg/landscape.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                          Demand Fee
                                      </span>
                                          <span class="col-md-6 col-xs-6" for="exampleInputName3">
                                          <data id="p_fee"><?= $profile->fee?> </data>
                                      </span>
                                      </div>
                                      <?php
                                  }
                                  else{

                                  }
                                  ?>
                              </div>
                              <div id="edit_div" style="display: none;">
                                  <form name=" " id="profile_update_form" method="post" enctype="multipart/form-data">
                                     <div class="row" >

                                      <div class="col-md-12  text-left">
                                          <input type="hidden"name="uid"id="uid"value="<?=$profile->uid ?>" class="form-control ">
                                          <div class="col-md-12  pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                              <span class="col-md-5 p-0" for="exampleInputName3">
                                              <?=$this->Html->Image('systems/flat-color-icons-svg/portrait_mode.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                  First Name
                                              </span>
                                              <span class="col-md-7" for="exampleInputName3">
                                                  <input type="text" name="f_name"value="<?=$profile->f_name ?>" class="form-control ">
                                              </span>
                                          </div>

                                          <div class="col-md-12  pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                              <span class="col-md-5 p-0" for="exampleInputName3">
                                              <?=$this->Html->Image('systems/flat-color-icons-svg/portrait_mode.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                  Last name
                                              </span>
                                              <span class="col-md-7" for="exampleInputName3">
                                                  <input type="text"name="l_name"value="<?=$profile->l_name ?>" class="form-control ">
                                              </span>
                                          </div>

                                          <div class="col-md-12  pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                              <span class="col-md-5 p-0" for="exampleInputName3">
                                              <?=$this->Html->Image('systems/flat-color-icons-svg/ipad.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                  Mobile
                                              </span>
                                                  <span class="col-md-7" for="exampleInputName3">
                                                  <input type="text"name="mobile"value="<?=$profile->mobile ?>" class="form-control ">
                                              </span>
                                          </div>
                                          <?php if($user->nice_name =="Doctor"){
                                              ?>
                                          <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                              <span class="col-md-5 p-0" for="exampleInputName3">
                                              <?=$this->Html->Image('systems/flat-color-icons-svg/ipad.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                  Speciality
                                              </span>
                                              <span class="col-md-7" for="exampleInputName3">
                                                  <input type="text" name="specialist"value="<?=$profile->specialist ?>" class="form-control ">
                                              </span>
                                          </div>

                                          <div class="col-md-12  pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                              <span class="col-md-5 p-0" for="exampleInputName3">
                                              <?=$this->Html->Image('systems/flat-color-icons-svg/landscape.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                  Chamber
                                              </span>
                                              <span class="col-md-7" for="exampleInputName3">
                                                  <input type="text"name="chamber"value="<?=$profile->chamber ?>" class="form-control ">
                                              </span>
                                          </div>

                                          <div class="col-md-12  pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                              <span class="col-md-5 p-0" for="exampleInputName3">
                                              <?=$this->Html->Image('systems/flat-color-icons-svg/briefcase.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                  VisitTime
                                              </span>
                                              <span class="col-md-7" for="exampleInputName3">
                                                  <input type="text"name="visittime"value="<?=$profile->visittime ?>" class="form-control ">
                                              </span>
                                          </div>

                                          <div class="col-md-12  pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                              <span class="col-md-5 p-0" for="exampleInputName3">
                                              <?=$this->Html->Image('systems/flat-color-icons-svg/conference_call.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                  Degree
                                              </span>
                                              <span class="col-md-7" for="exampleInputName3">
                                               <input type="text" class="form-control "name="degree"value="<?=$profile->degree ?>">
                                              </span>
                                          </div>
                                          <div class="col-md-12  pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                              <span class="col-md-5 p-0" for="exampleInputName3">
                                              <?=$this->Html->Image('systems/flat-color-icons-svg/conference_call.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                  Doctor Type
                                              </span>
                                              <span class="col-md-7" for="exampleInputName3">
                                                <select class="form-control" name="doc_type">
                                                <option value="Demand">Demand</option>
                                                <option value="Telemede">Telemede</option>
                                                </select>
                                              </span>
                                          </div>
                                          <div class="col-md-12  pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                              <span class="col-md-5 p-0" for="exampleInputName3">
                                              <?=$this->Html->Image('systems/flat-color-icons-svg/conference_call.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                  Demand Fee
                                              </span>
                                              <span class="col-md-7" for="exampleInputName3">
                                               <input type="text" class="form-control" name="fee" value="<?=$profile->fee?>">
                                              </span>
                                          </div>
                                              <?php
                                          }
                                          else{

                                          }
                                          ?>
                                      </div>
                                         <div class="col-md-8 col-md-offset-3 p-10">
                                             <button class="btn btn-success btn-lg mb-10">Update</button>
                                             <button type="reset" class="btn btn-default btn-lg mb-10" data-dismiss="modal">Reset</button>
                                         </div>

                                  </div>

                                  </form>
                              </div>
                              <div id="change_pass_div" style="display: none;">
                                  <form name=" " id="password_update_form" method="post" enctype="multipart/form-data">
                                      <div class="row" >
                                          <div class="col-md-11 m-20 "style="  border:1px solid gainsboro; border-radius:5px;">

                                              <input type="hidden"name="puid" id="puid"value="<?=$profile->uid ?>" class="form-control ">

                                              <div class="col-md-12 mt-10 pb-10" style="border-bottom: 2px dotted gainsboro;">
                                                  <span class="col-md-5 p-0 mt-10" for="exampleInputName3">
                                                  <?=$this->Html->Image('systems/flat-color-icons-svg/portrait_mode.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                      Old Password:
                                                  </span>
                                                  <span class="col-md-7" for="exampleInputName3">
                                                      <input type="password" name="old_pass"placeholder="" class="form-control ">
                                                  </span>
                                              </div>
                                              <div class="col-md-12 mt-10 pb-10" style="border-bottom: 2px dotted gainsboro;">
                                                  <span class="col-md-5 p-0 mt-10" for="exampleInputName3">
                                                  <?=$this->Html->Image('systems/flat-color-icons-svg/portrait_mode.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                      New Password:
                                                  </span>
                                                  <span class="col-md-7" for="exampleInputName3">
                                                      <input type="password" name="password" class="form-control ">
                                                  </span>
                                              </div>


                                              <div class="col-md-12  mt-10 pb-10" >
                                                  <span class="col-md-5 p-0 mt-10" for="exampleInputName3">
                                                  <?=$this->Html->Image('systems/flat-color-icons-svg/portrait_mode.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                      Confirm Password:
                                                  </span>
                                                  <span class="col-md-7" for="exampleInputName3">
                                                      <input type="password" name="confirm_pass" class="form-control ">
                                                  </span>
                                              </div>
                                          </div>
                                          <div class="col-md-8 col-md-offset-3 p-10">
                                              <button class="btn btn-success btn-lg mb-10">Update</button>
                                              <button type="reset" class="btn btn-default btn-lg mb-10" data-dismiss="modal">Reset</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>


                          </div>
                          <script>
                              function hideall() {
                                  $('#view_div').hide();
                                  $('#edit_div').hide();
                                  $('#change_pass_div').hide();
                              }
                              $('#btn_edit').click(function () {

                                  hideall();
                                  $('#edit_div').show();
                              });
                              $('#btn_cpass').click(function () {
                                   hideall();
                                  $('#change_pass_div').show();
                              });

                          </script>



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
        <div class="modal-header">
            <h1>Please Wait</h1>
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

     $("#profile_update_form").submit(function(e) {
         e.preventDefault();
         $('#pleaseWaitDialog').modal();
         var data = $("#profile_update_form").serialize();
         var url =$('meta[name="update"]').attr('url');

         console.log(data);console.log(url);


         $.ajax({
             url:url,
             type:"POST",
             data:data,
             dataType:"json",
             success: function(obj){
                 console.log(obj);

                 $('#pleaseWaitDialog').modal('hide');
                 $('#modal-edit').modal('hide');

                 FlashStatus(obj.status,obj.response);
             }
         });

     });



     $("#password_update_form").submit(function(e) {
         e.preventDefault();
       $('#pleaseWaitDialog').modal();
         var data = $("#password_update_form").serialize();
         var url =$('meta[name="pass"]').attr('url');
         console.log(data);console.log(url);

         $.ajax({
             url:url,
             type:"POST",
             data:data,
             dataType:"json",
             success: function(obj){
                 console.log(obj);

                 $('#pleaseWaitDialog').modal('hide');
//                 $('#reset-pass').modal('hide');
                 $('#password_update_form').find("input[type=text],input[type=password],input[type=email],input[type=number], textarea").val("");

                 FlashStatus(obj.status,obj.response);
             }
         });

     });
 </script>


 <?php
 $this->end();
 ?>
