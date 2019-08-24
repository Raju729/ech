<?php


foreach ($query as $pr)
{

    $patobj = json_decode($pr->pid_info);
    $docobj = json_decode($pr->did_info);
    $usrobj = json_decode($pr->eid_info);
    $pcomobj = json_decode($pr->pcommon_info);
    $pres_id = $pr->pres_id;
}


if(isset($patobj) && isset($pcomobj))
{
    $imgurl = $this->request->getAttribute("webroot");
    if (!empty($patobj->thumb_url))
    {

        $img = 'img/'.$patobj->thumb_url;
        if(file_exists(WWW_ROOT.$img)){
            $imgurl = $imgurl.$img;
        }
        else{
            $img = 'img/no-image.png';
            $imgurl = $imgurl.$img;
        }

    }else{
        $img = 'img/no-image.png';
        $imgurl = $imgurl.$img;
    }

    $fullname= $patobj->f_name.' '.$patobj->l_name;
    $age = $patobj->age;
    $gender = $patobj->gender;
    $mstatus = $patobj->m_status;
    $occupation = $patobj->occupation;
    $mobile = $patobj->mobile;
    $religion = $patobj->mobile;

    if(isset($pcomobj->height)){$height=$pcomobj->height;}else{$height='';}
    if(isset($pcomobj->weight)){$weight=$pcomobj->weight;}else{$weight='';}
    if(isset($pcomobj->bloodpressure)){$bloodpressure=$pcomobj->bloodpressure;}else{$bloodpressure='';}
    if(isset($pcomobj->bloodglucose)){$bloodglucose=$pcomobj->bloodglucose;}else{$bloodglucose='';}
    if(isset($pcomobj->pulserate)){$pulserate=$pcomobj->pulserate;}else{$pulserate='';}
    if(isset($pcomobj->temperature)){$temperature=$pcomobj->temperature;}else{$temperature='';}
    if(isset($pcomobj->symptoms)){$symptoms=$pcomobj->symptoms;}else{$symptoms='';}
    if(isset($pcomobj->reports)){$reports=$pcomobj->reports;}else{$reports=(object)array();}

}
else{
    echo 'raju';
}

?>
<?php

$this->start('topscript');
echo $this->Html->script('public/stepselect.js');
echo  $this->Html->script('public/prescribe.js');
$this->end();


$this->start('contents');
?>
<style>
    /*==================================================
   * Effect 7
   * ===============================================*/
    .effect7{position:relative;-webkit-box-shadow:0 1px 4px rgba(0,0,0,.3),0 0 5px rgba(0,0,0,.1) inset;-moz-box-shadow:0 1px 4px rgba(0,0,0,.3),0 0 5px rgba(0,0,0,.1) inset;box-shadow:0 1px 4px rgba(0,0,0,.3),0 0 5px rgba(0,0,0,.1) inset}.effect7:after,.effect7:before{content:"";position:absolute;z-index:-1;-webkit-box-shadow:0 0 20px rgba(0,0,0,.8);-moz-box-shadow:0 0 20px rgba(0,0,0,.8);box-shadow:0 0 20px rgba(0,0,0,.8);top:0;bottom:0;left:10px;right:10px;-moz-border-radius:100px/10px;border-radius:100px/10px}.effect7:after{right:10px;left:auto;-webkit-transform:skew(8deg) rotate(3deg);-moz-transform:skew(8deg) rotate(3deg);-ms-transform:skew(8deg) rotate(3deg);-o-transform:skew(8deg) rotate(3deg);transform:skew(8deg) rotate(3deg)}.stepwizard-step p{margin-top:10px}.stepwizard-row{display:table-row}.stepwizard{display:table;width:100%;position:relative}.stepwizard-step button[disabled]{opacity:1!important;filter:alpha(opacity=100)!important}.stepwizard-row:before{top:14px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0;left:0}.stepwizard-step{display:table-cell;text-align:center;position:relative}.btn-circle{width:30px;height:30px;text-align:center;padding:6px 0;font-size:12px;line-height:1.428571429;border-radius:15px}label{padding-top:10px}
</style>
<!-- Start main-content -->
<div class="main-content" >
    <section style="padding-top:3rem;padding-bottom:3rem;background-image: url(http://www.codexwp.com/wp-content/uploads/2018/01/pattern1.png);">
        <div class="container effect7" style=" background-color:white;">
            <div class="section-title ">
                <div class="row">
                    <div class="col-md-4" style="padding:40px;">
                        <div style="border:1px solid gainsboro;padding:15px;">
                            <img style="height: 200px;width:auto;" src ="<?=$imgurl?>">
                            <hr>
                            <h4 class="text-success" style="border-bottom:1px solid #eee"><i class="fa fa-user" aria-hidden="true"></i> <?=$fullname?></h4>
                            <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Gender -</strong> <?=$gender?></p>
                            <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Age -</strong><?=$age?> years</p>
                            <p class="text-success ml-20"><a href="#modalpatientinfo" data-toggle="modal" data-target="#modalpatientinfo">Click here for more info</a></p>
                        </div>
                    </div>
                    <div class="col-md-8 text-center">
                        <h2 class="title text-uppercase">Prescribe <span class="text-black font-weight-300">A Patient</span></h2>
                        <p class="text-uppercase letter-space-4">Prescribe after face to face video call.</p>
                        <br>

                        <div class="col-md-12">
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step col-md-3">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle" >1</a>
                                        <p>History</p>
                                    </div>
                                    <div class="stepwizard-step col-md-3 ">
                                        <a href="#step-2" type="button" class="btn  btn-circle" disabled="disabled">2</a>
                                        <p>Test</p>
                                    </div>
                                    <div class="stepwizard-step col-md-3">
                                        <a href="#step-3" type="button" class="btn  btn-circle" disabled="disabled">3</a>
                                        <p>RX</p>
                                    </div>
                                    <div class="stepwizard-step col-md-3">
                                        <a href="#step-4" type="button" class="btn  btn-circle" disabled="disabled">4</a>
                                        <p>Advice</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form id="prescrip_form" method ="post" enctype="multipart/form-data">
                            <data pres_id="<?= $pres_id ?>" id="pres_id"></data>
                            <div class="col-md-12">
                                <form role="form" method="post">
                                    <div class="row setup-content" id="step-1">
                                        <div class="col-md-12" style="margin-top:3em;">
                                            <div class="row">
                                                <div class="col-md-10 text-left mb-30">
                                                    <p class="text-warning text-left"><strong>Patients Note</strong></p><hr>
                                                    <div class="col-md-6">
                                                        <p><?=$symptoms?></p>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <?php $photos = $pcomobj->myphotos;
                                                        $ph_id=0;
                                                        if(!empty($photos) ){
                                                            foreach ($photos as $p){
                                                                $ph_id++
                                                                ?>
                                                                <div class="col-md-2" style="border:1px solid gainsboro;padding:5px; margin:2px;">
                                                                    <a onclick="showimage()" href="#"> <?php  echo $this->Html->image($p, array('id'=>'report_img'.$ph_id,'alt' => 'CakePHP')); ?></a>
                                                                </div>
                                                            <?php };}; ?>

                                                    </div>

                                                    <hr>
                                                </div>
                                                <div class="col-md-10">
                                                    <p class="text-warning text-left"><strong>Write Diseases</strong></p><hr>
                                                    <textarea name="diseases" class="form-control" style="min-height: 80px;"></textarea>
                                                    <hr>
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="col-md-8 col-sm-offset-1 mt-30">
                                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next Step <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row setup-content" id="step-2">
                                        <div class="col-md-12" style="margin-top:3em;">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <p class="text-warning text-left"><strong>Write Tests</strong> ( <a href="#modaladdtest" data-toggle="modal" data-target="#modaladdtest">click here for add</a> )</p>
                                                    <hr>
                                                    <div class="text-left" style="border:1px solid gainsboro;min-height: 150px;padding:20px;">
                                                        <ul class="ml-20" id="uladdtest" style="list-style: circle;">

                                                        </ul>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-8 col-sm-offset-1 mt-30">
                                                <button class="btn btn-warning prevBtn btn-lg pull-left" type="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next Step <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end step 2 modal-->


                                    <!--Start step 3 modal-->
                                    <div class="row setup-content" id="step-3">
                                        <div class="col-md-12" style="margin-top:3em;">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <p class="text-warning text-left"><strong>Write RX</strong> ( <a href="#modaladdtabcap" data-toggle="modal" data-target="#modaladdtabcap">click here for add</a> )</p>
                                                    <hr>
                                                    <div class="text-left" style="border:1px solid gainsboro;min-height: 150px;padding:20px;">
                                                        <ul class="ml-20" id="uladdtabcap"></ul>
                                                    </div><hr>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-8 col-sm-offset-1 mt-30">
                                                <button class="btn btn-warning prevBtn btn-lg pull-left" type="button"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next Step <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end step 3 modal-->


                                    <!--start step 4 modal-->
                                    <div class="row setup-content" id="step-4">
                                        <div class="col-md-12" style="margin-top:3em;">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <p class="text-warning text-left"><strong>Doctors Advice</strong></p><hr>
                                                    <textarea name="advices" class="form-control" style="min-height: 150px;"></textarea>
                                                    <hr>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-8 col-sm-offset-1 mt-30">
                                                    <button class="btn btn-warning prevBtn btn-lg pull-left" type="button" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back </button>
                                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">Submit <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end step 3 modal-->

                                </form>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Add patient info modal-->
    <div id="modalpatientinfo" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header " style="background-color:#00A4EF;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="text-white"><i class="fa fa-user" aria-hidden="true"></i> <?=$fullname?></h4>
                </div>
                <div class="modal-body">
                    <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Gender -</strong> <?=$gender?></p>
                    <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Age -</strong><?=$age?> years</p>
                    <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Marital Status -</strong> <?=$mstatus?></p>
                    <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Religion -</strong> <?=$religion?></p>
                    <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Height -</strong> <?=$height?></p>
                    <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Weight -</strong> <?=$weight?> KG</p>
                    <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Blood Pressure -</strong><?=$bloodpressure?></p>
                    <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Blood Glucose -</strong> <?=$bloodglucose?>nml</p>
                    <p class="text-warning ml-20"><strong><i class="fa fa-hand-o-right mr-10" aria-hidden="true"></i>Pulse Rate -</strong> <?=$pulserate?>/min</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--end patient info modal-->
    <!--Add test modal-->
    <div id="modaladdtest" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add/Write Test</h4>
                </div>
                <div class="modal-body">

                    <input type="text" class="form-control" id="txttestname" placeholder="Enter Test Name">

                    <select style="width:100%;color:coral;font-weight:bolder;" id="txttestnames" name="dtabcap" multiple>

                    </select>
                    <label id="msgshows" style="width: 100%;text-align: center; font-weight:bolder; color: #bd2130;display:none"></label>

                    <script>
                        var request ;


                        $('#txttestnames').hide();
                        $( "#txttestname" ).keyup(function() {
                            var test = $(this).val();
                            src_test(test);

                        });
                        function src_test(test) {
                            if (request != null){
                                request.abort();
                                request = null;
                            }

                            var url =$('meta[name="baseurl"]').attr('url');
                            url = url+"prescriptions/ajax?op=src_test&data="+test;
                            console.log(url);
                            request = $.ajax({
                                url:url,
                                type:'GET',
                                dataType:"json",
                                success: function(obj){

                                    if(obj.status == 'success'){
                                        console.log(obj);
                                        var medi = obj.data;
                                        if(medi.length>0) {
                                            $('#txttestnames').empty();
                                            $('#txttestnames').show();
                                            for (var i = 0; i < medi.length; i++) {
//                                          console.log(medi[i]);
                                                var html = '<option value="'+medi[i].name+'">'+medi[i].name+'</option>';
                                                $("select#txttestnames").append(html);
                                            }

                                        }
                                        else {

                                            $('#txttestnames').empty();
                                            $('#txttestnames').hide();


                                        }

                                    }
                                    else if(obj.status == 'failed') {
                                        console.log(obj);
                                        $('#txttestnames').hide();
                                        $('#msgshows').text('Type Test name');
                                        $('#msgshows').slideDown('slow').delay(2000).slideUp('slow');

                                    }


                                }
                            });

                        }
                        $('select#txttestnames').change(function () {
                            var valu =$(this).val();
                            var data = $("select#txttestnames").children("option").filter(":selected").text();
                            $('#txttestname').val(data);
                            $('#txttestnames').hide();
//
//        console.log(valu[0]);

                        });

                    </script>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-flat" id="btnaddtest">Add</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--end test modal-->
    <!--Add rx modal-->
    <div id="modaladdtabcap" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Tablet/Capsule</h4>
                </div>
                <div class="modal-body" style="padding:30px;">
                    <div class="row text-left">
                        <div class="col-md-6 mb-20">
                            <label>Medicine Type</label>
                            <select name="dtype" class="form-control">
                                <option>Select Medicine type</option>
                                  <?php foreach ($medis as $m){?>
                      <option value="<?= $m->type ?>"><?= $m->type ?> </option>
                <?php  }?>
                            </select>
                             <input type="hidden" name="src_medi_typ" id="src_medi_typ">
                        </div>

                        <div class="col-md-6 mb-20">

                            <label>Name of Medicine</label>
                            <input id="dtabcap" type="text" class="form-control" name="dtabcap" placeholder="Enter Tablet/Capsule">
                            <select style="z-index: 999; width:89%;position: absolute; color:coral;font-weight:bolder;" id="dtabcaps" name="dtabcap" multiple>

                            </select>
                        </div>
                        <label id="msgshow" style="width: 100%;text-align: center; font-weight:bolder; color: #bd2130;display:none"></label>
                        <script>
                            var request ;


                            $('#dtabcaps').hide();
                            $( "#dtabcap" ).keyup(function() {
                                var medi = $(this).val();
                                // var src_medi_type = $('#src_medi_typ').val();
                                // src_medicine(medi,src_medi_type);
                                src_medicine(medi);

                            });
                            function src_medicine(medi) {
                                if (request != null){
                                    request.abort();
                                    request = null;
                                }

                                var url =$('meta[name="baseurl"]').attr('url');
                                // url = url+"prescriptions/ajax?op=src_medicine&data="+medi+"&type="+type;
                                url = url+"prescriptions/ajax?op=src_medicine&data="+medi;
                                console.log(url);
                                request = $.ajax({
                                    url:url,
                                    type:'GET',
                                    dataType:"json",
                                    success: function(obj){

                                        if(obj.status == 'success'){
                                            console.log(obj);
                                            var medi = obj.data;
                                            if(medi.length>0) {
                                                $('#dtabcaps').empty();
                                                $('#dtabcaps').show();
                                                for (var i = 0; i < medi.length; i++) {
//                                          console.log(medi[i]);
                                                    var html = '<option value="'+medi[i].name+'">'+medi[i].name+'</option>';
                                                    $("select#dtabcaps").append(html);
                                                }

                                            }
                                            else {

                                                $('#dtabcaps').empty();
                                                $('#dtabcaps').hide();


                                            }

                                        }
                                        else if(obj.status == 'failed') {
                                            console.log(obj);
                                            $('#dtabcaps').hide();
                                            $('#msgshow').text('Type medicine name');
                                            $('#msgshow').slideDown('slow').delay(2000).slideUp('slow');

                                        }


                                    }
                                });

                            }
                            $('select#dtabcaps').change(function () {
                                var valu =$(this).val();
                                var data = $("select#dtabcaps").children("option").filter(":selected").text();
                                $('#dtabcap').val(data);
                                $('#dtabcaps').hide();
//
//        console.log(valu[0]);

                            });
                        </script>
                        <div class="col-md-12 ">
                            <label >Duration</label>
                        </div>
                        <div class="col-md-12 mb-20">
                            <div class="row">
                                <div class="col-sm-4">
                                    <select id="duration" name="duration" class="form-control">
                                        <option value="1+1+0">1+1+0</option>
                                        <option value="1+0+0">1+0+0</option>
                                        <option value="0+1+1">0+1+1</option>
                                        <option value="0+0+1">0+0+1</option>
                                        <option value="1+0+1">1+0+1</option>
                                        <option value="1+1+1">1+1+1</option>
                                    </select>
                                </div>


                                <div class="col-sm-3" id="equaltea">
                                    <h5 style="float:left;" > Tea spoons</h5>
                                </div>

                                <div class="col-sm-1 equaldays" id="equaldays">
                                    <h5 style="float:left;" > = </h5>
                                </div>
                                <div class="col-sm-3 equaldays" >
                                    <select id="day" name ="day" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4"> 4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>

                                </div>
                                <div class="col-sm-1 equaldays"><h6 style="float:left;"> Days </h6></div>

                            </div>
                        </div>

                        <div class="col-md-12 mb-20">
                            <label>Details</label>
                            <!-- <input type="text" class="form-control" name="dadvice" placeholder="(Ex. Take before 30 min meal.)"> -->
                            <select  class="form-control" name="dadvice">
                                <option value="">Select Rules</option>
                                <option value="Take before meal">Take before meal</option>
                                <option value="Take after meal">Take after meal</option>
                                <option value="Take mid time of meal">Take mid time of meal</option>
                            </select>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-flat" id="btnaddtabcap">Add</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--end rx modal-->
</div>
<!-- end main-content -->
<?php $this->end();?>
