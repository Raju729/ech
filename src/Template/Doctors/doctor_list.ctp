<?php

$this->assign('doctor','active');
?>

<?php
$this->start('contents');
?>
    <div class="main-content">
      <style>
      @media screen and (min-width: 768px) {
        .h2class{
          margin-left: -40px !important;
        }

       }
    </style>

    <!-- divider:  -->
    <section class="divider parallax layer-overlay overlay-black"  data-parallax-ratio="0.7" data-bg-img="<?=  $this->request->webroot.'img/doctordemo.jpg'; ?>">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
        <div class="col-md-10 col-md-offset-1" >
          <div class="col-md-12 col-lg-12 col-sm-12" style="margin: 0px !important;padding:0px !important; "><h2  class=" h2class font-weight-300 pb-30 text-theme-colored">Find Your Desired Doctor</h2></div>
              

              <form id=""  method="get" class="doctor-search-form">

                    <!-- <div class="col-md-3 col-lg-3 col-sm-12" style="margin: 0px auto;padding: 0px;margin-right: 2px">
                        <select style="font-size: 15px" id="doc_filter" class="form-control">
                            <option >Filter By</option><hr>
                            <option value="name">Doctor Name</option>
                            <option value="special">Specialization</option>
                        </select>
                    </div> -->
                <!--   <div id="doc_default" class="col-md-4 col-lg-4 col-sm-12" style="margin: 0px auto;padding: 0px;margin-right: 2px">
                      <input type="text" style="margin: 0px"  readonly id="doc_slct_rslt" name="doc_scr"placeholder="Select option for searching.." class="form-control input-lg font-16" data-height="45px" >
                  </div> -->
                    <div id="doc_name" class="col-md-5 col-lg-5 col-sm-12" style="margin: 0px auto;padding: 0px;background-color: white;margin-right: 2px">
                        <input type="text" name="doc_src_name" style="margin: 0px"   id="doc_slct_rslt" name="doc_scr"placeholder="Type Desire Doctor Name,Speciality or Address" class="form-control input-lg font-16" data-height="45px" >
                    </div>
                 <div id="doc_special" class="col-md-2 col-lg-2 col-sm-12" style="margin: 0px auto;padding: 0px ;background-color: white;margin-right: 2px">
                      <select id="doc_slct_rslt" name="doc_src_tp" class="form-control"  >
                          <option value="">Search By Type</option>
                          <option value="Free">Free</option>
                          <option value="Demand">Demand</option>
                          
                      </select>
                  </div> 
                   <div class="col-md-3 col-lg-3 col-sm-12" style="margin: 0px auto;padding: 0px;margin-right: 2px">
                      <select style="font-size: 15px" id="" name="doc_src_status" class="form-control">
                          <option value="">Search By Status </option>
                          <option value="online">Online</option>
                          <option value="offline">Offline</option>
                          <option value="all">All</option>
                      </select>
                  </div> 
                    <div class="col-md-1 col-lg-1col-sm-12" style="margin: 0px auto;padding: 0px;float:left">
                           <span class="input-group-btn" style="margin: 0px;padding: 0px">
                          <button style="margin: 0px auto;" data-height="45px" id ="doc_get_btn" class="btn btn-block btn-colored btn-theme-colored btn-xs m-0 font-14" ><i style="width: 10px" class="fa fa-search" aria-hidden="true"></i>&nbsp; Search</button>
                  </span>
                    </div>


              </form>
            <!--    <script>
                   $('#doc_special').hide();
                   $('#doc_name').hide();
                   $("#doc_filter").change(function () {
                       var doc_val = this.value;
                       if(doc_val=="name"){
                           $('#doc_default').hide();
                           $('#doc_special').hide();
                           $('#doc_name').show();
                       }
                       else {
                           $('#doc_default').hide();
                           $('#doc_name').hide();
                           $('#doc_special').show();
                       }


                   });
//                   var data = $("#doc_filter").children("option").filter(":selected").val();
               </script> -->
            </div>
          </div>
          </div>
        </div>
        <div class="section-content text-center">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
            </div>
          </div>
        </div>
      </div>
    </section>

        <style>.shadow {
                -moz-box-shadow:    inset 0 0 5px gainsboro;
                -webkit-box-shadow: inset 0 0 5px gainsboro;
                box-shadow:         inset 0 0 5px gainsboro;
            }</style>
        <section>

            <div class="container mt-30 mb-30 pt-30 pb-30">
                <div class="row ">
                    <div class="col-md-9">
                        <?php foreach ($doctors as $u):
                              $p= (object)$u->p;
                              $login_token = $u->login_token;
                              $flag=0;
                              if($login_token!="" and $login_token!=null)
                              {
                                try{
                                    $token = unserialize($this->Public->encryptDecrypt($login_token,'d'));
                                    $exp = $token['exp_time'];
                                    $cur=strtotime(date('Y-m-d H:i:s'));
                                    if($exp>$cur)
                                        $flag=1;                        
                                }
                                catch(Exception $e){}                                
                              }
                              if($flag==1)
                                $status = '<h4 style="color:#5cb85c;"><i class="fa fa-circle" aria-hidden="true"></i> Online</h4>';
                              else
                                $status = '<h4 class="text-warning"><i class="fa fa-circle-o" aria-hidden="true"></i> Away</h4>';
                        ?>
                        <div class="col-md-12">
                            <div class="row mb-20 shadow " style="border-radius: 5px; padding:1em;">
                                <div class="col-sm-2 shadow" style="padding:5px;height: 130px ">
                                    <img class="" style="height: 120px;width: auto"  src="<?php if (!empty($p->thumb_url)){
                                        if(file_exists(WWW_ROOT.'/img/'.$p->thumb_url)){
                                            echo $this->request->webroot.'img/'.$p->thumb_url;
                                        }
                                        else{
                                            echo $this->request->webroot.'img/no-image.png';
                                        }

                                    }
                                    else{
                                        echo $this->request->webroot.'img/no-image.png';
                                    }

                                    ?>">
                                </div>
                                <div class="col-sm-7">
                                    <h4 class="text-success"> <i class="fa fa-user-md" aria-hidden="true"></i> <data class="pl-5"><?= $p->f_name."&nbsp".$p->l_name?></data></h4><hr class="mt-5 mb-5">
                                    <i class="fa fa-heartbeat text-warning" aria-hidden="true"></i><data class="pl-5"><?= $p->specialist ?></data><br>
                                    <i class="fa fa-medkit text-warning" aria-hidden="true"></i> <data class="pl-5"> <?= $p->degree ?></data><br>
                                    <i class="fa fa-hospital-o text-warning" aria-hidden="true"></i><data class="pl-5"> <?= $p->chamber ?></data>
                                    <br>
                                    <i class="fa fa-clock-o text-warning" aria-hidden="true"></i><data class="pl-5"> <?= $p->visittime ?></data>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <div style="border:1px solid #eee;" class="mt-10">
                                        <?=$status?>
                                        <a href="getadoctor/<?=$u->uid ?>" class="btn btn-success" style="width:70%"><i class="fa fa-stethoscope" aria-hidden="true"></i> Get</a>
                                        <h4 class="text-warning"><i class="fa fa-money" aria-hidden="true"></i>  <?php    if( $p->doc_type == "Demand"){
                                             echo $p->fee;
                                            }
                                            else{
                                               echo "Free";
                                            }

                                            ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php
                        $this->Paginator->setTemplates(['prevActive' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                        $this->Paginator->setTemplates(['prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                        $this->Paginator->setTemplates(['number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                        $this->Paginator->setTemplates(['current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                        $this->Paginator->setTemplates(['nextActive' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                        $this->Paginator->setTemplates(['nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                        ?>
                        <div class="card-footer clearfix">
                            <nav aria-label="...">
                                <ul class="pagination">
                                    <?= $this->Paginator->prev('< ' . __('prev')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >') ?>
                                </ul>
                            </nav>
                            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <div class="sidebar sidebar-right mt-sm-30">
                           
                          
                            <div class="widget">
                                <h5 class="widget-title line-bottom">Image gallery </h5>
                                <div class="widget-image-carousel">
                                    <div class="item">
                                        <img src="<?php  echo $this->request->webroot.'img/telemedicine.jpg'; ?>" alt="">
                                        <h4 class="title">HHH-Telemedicine</h4>
                                        <p></p>
                                    </div>
                                   <div class="item">
                                        <img src="<?php  echo $this->request->webroot.'img/exr.gif'; ?>" alt="">
                                        <h4 class="title">Physical Exercise</h4>
                                        <p></p>
                                    </div>
                                    <div class="item">
                                        <img src="<?php  echo $this->request->webroot.'img/addin.jpg'; ?>" alt="">
                                        <h4 class="title">Addin Hospital</h4>
                                       
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php
$this->end();

$this->start('bottomscript');
?>
<script type="text/javascript">
    $("#doctor-search-form").submit(function(e) {
        e.preventDefault();
    });
    $('#doc_src_rslt').hide();


   function doctorsearch() {


      var data = $('#doc_src').val();
       var url =$('meta[name="baseurl"]').attr('url');
       url = url+"doctors/search?src="+data;
       console.log(url);
       console.log(data);
        $.ajax({
           url:url,
           type:'GET',
           dataType:"json",
           success: function(obj){

               if(obj.status == 'success'){
                   $('#doc_src_rslt').show();
                   var src_data = obj.data;
                   if(src_data.length>0)
                   {
                       $("#doc_src_rslt").empty();

//                       $("span#nomessage").hide();


                       for(var i=0;i<src_data.length;i++)
                       {
                           var html='';
                           var pfl =src_data[i].p;

                               html = '<option value ="'+src_data[i].uid+'"> '+pfl.f_name+"&nbsp;"+pfl.l_name+"&nbsp;("+pfl.specialist+")"+'</option>';
//                       <a href="getadoctor/'+src_data[i].uid+'"></a>
                           $("#doc_src_rslt").append(html);

                       }


                   }
//                   $('#patient_register_form').find("input[type=text],input[type=password],input[type=email],input[type=number], textarea").val("");

               }
               else {
                   $("#doc_src_rslt").empty();
                   $('#doc_slct_rslt').val('Search & Select,Then Get');
                   $("#doc_src_rslt").hide();

               }



           }
       });

   }
    $('#doc_src_rslt').change(function () {
        var valu =$(this).val();
        document.getElementById('doc_get_btn').href = 'getadoctor/'+valu[0];
         var data = $("#doc_src_rslt").children("option").filter(":selected").text();
         $('#doc_slct_rslt').val(data);
//
//        console.log(valu[0]);

    });

</script>
<?php  $this->end();?>

