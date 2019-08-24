<?php 
$this->start('topscript');
  echo $this->Html->script('public/stepselect.js');
  echo $this->Html->script('jquery/fileupload.js');
$this->end();

$this->start('contents');
?>
<style>
    .input-hidden {
        position: absolute;
        left: -9999px;
    }

    input[type=radio]:checked + label>img {
        border: 1px solid #fff;
        box-shadow: 0 0 3px 3px #090;
    }

    /* Stuff after this is only to make things more pretty */
    input[type=radio] + label>img {
        border: 1px dashed #444;
        width: 100px;
        height: 100px;
        transition: 500ms all;
    }

    input[type=radio]:checked + label>img {
        transform:
                rotateZ(-10deg)
                rotateX(10deg);
    }
</style>
<div class="main-content" >
    <meta name="redirect" url="<?=$this->Url->build(['controller' => 'Payment', 'action' => 'bkash',]);?>">
    <meta name="free" url="<?=$this->Url->build(['controller' => 'Payment', 'action' => 'free']);?>">
    <form name="getadoctor" enctype="multipart/form-data" id="getadoctor">
        <!-- Section: departments -->
        <section style="padding-top:3rem;padding-bottom:3rem;background-image: url(http://www.codexwp.com/wp-content/uploads/2018/01/pattern1.png);">
            <div class="container effect7" style=" background-color:white;">
                <div class="section-title ">
                    <div class="row">
                        <div class="col-md-4" style="padding:40px;">
                            <div style="border:1px solid gainsboro;padding:15px;">
                                <img style="height:300px;width:auto" src="<?php if (!empty($doctor->thumb_url)){
                                        if(file_exists(WWW_ROOT.'/img/'.$doctor->thumb_url)){
                                            echo $this->request->webroot.'img/'.$doctor->thumb_url;
                                        }
                                        else{
                                            echo $this->request->webroot.'img/no-image.png';
                                        }

                                    }
                                    else{
                                        echo $this->request->webroot.'img/no-image.png';
                                    }

                                    ?>"> 
                                <hr>
                                <h4 class="text-success" style="border-bottom:1px solid #eee"><i class="fa fa-user-md" aria-hidden="true"></i> <?= $doctor->f_name."&nbsp".$doctor->l_name?></h4>
                                <p class="text-warning ml-20"><strong> <i class="fa fa-heartbeat " aria-hidden="true"></i>&nbsp<?= $doctor->specialist ?>&nbsp Specialist</strong></p>
                                <p class="ml-20 text-warning"><i class="fa fa-medkit " aria-hidden="true"></i> <?= $doctor->degree ?></p>
                                <p class="ml-20 text-warning"><i class="fa fa-hospital-o " aria-hidden="true">&nbsp</i> <?= $doctor->chamber ?><p>
                            </div>
                        </div>
                        <div class="col-md-8 ">
                            <div class="col-md-12 text-center">
                                <h2 class="title text-uppercase">Doctor's <span class="text-black font-weight-300">Consulatation</span></h2>
                                <p class="text-uppercase letter-space-4">Get your disired doctor after 4 steps.</p>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="stepwizard">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step col-md-4">
                                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                            <p>Step 1</p>
                                        </div>
                                        <div class="stepwizard-step col-md-4 ">
                                            <a href="#step-2" type="button" class="btn  btn-circle" disabled="disabled">2</a>
                                            <p>Step 2</p>
                                        </div>
                                        <div class="stepwizard-step col-md-4">
                                            <a href="#step-3" type="button" class="btn  btn-circle" disabled="disabled">3</a>
                                            <p>Step 3</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">


                                <!-- Step-1 Content -->
                                <div class="row setup-content" id="step-1">
                                        <div class="col-md-12" style="margin-top:3em;">

                                            <div class="row text-center" id="div_patient_search">
                                                <h4>Search a patient</h4><hr>
                                                <div class="form-group col-sm-5 col-md-offset-3">
                                                    <input type="text" class="form-control" id="patient_id" placeholder="Enter Patient ID">
                                                </div>
                                                <button id="btn_patient_search" class="btn btn-lg btn-success col-md-1"><i class="fa fa-search" aria-hidden="true"></i></button>
                                            </div>

                                            <div class="row text-center mt-10">
                                                <p class="text-primary"><strong>If you do not have patient ID,<a href="" data-toggle="modal" data-target="#modal-patient-register" > register here</a></strong><p>
                                            </div>

                                            <div class="row" id="loading" style="display: none">
                                                <hr>
                                                 <div class="col-md-12 text-center text-primary">
                                                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>

                                            <div class="row" id="patientdata" style="display: none">

                                                <hr>
                                                <input  type="hidden"  name="pid" value="" required>
                                                <input type="hidden" name="did" value="<?= $doctor->uid ?>">
                                                <input type="hidden" name="fee" value="<?= $doctor->fee ?>">
                                                <div class="col-md-6">
                                                <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                                    <span class="col-md-6" for="exampleInputName3">
                                                    <?=$this->Html->Image('systems/flat-color-icons-svg/flash_on.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                        Patient ID
                                                    </span>
                                                     <span class="col-md-6" for="exampleInputName3">
                                                        <data id="p_pid"> </data>
                                                    </span>
                                                </div>
                                                <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                                    <span class="col-md-6" for="exampleInputName3">
                                                    <?=$this->Html->Image('systems/flat-color-icons-svg/portrait_mode.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                        First Name
                                                    </span>
                                                     <span class="col-md-6" for="exampleInputName3">
                                                        <data id="pf_name"> </data>
                                                    </span>
                                                </div>
                                                <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                                    <span class="col-md-6" for="exampleInputName3">
                                                    <?=$this->Html->Image('systems/flat-color-icons-svg/portrait_mode.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                        Last name
                                                    </span>
                                                     <span class="col-md-6" for="exampleInputName3">
                                                        <data id="pl_name"> </data>
                                                    </span>
                                                </div>

                                                 <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                                    <span class="col-md-6" for="exampleInputName3">
                                                    <?=$this->Html->Image('systems/flat-color-icons-svg/collaboration.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                        Gender
                                                    </span>
                                                     <span class="col-md-6" for="exampleInputName3">
                                                        <data id="p_gender"> </data>
                                                    </span>
                                                </div>

                                                <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                                    <span class="col-md-6" for="exampleInputName3">
                                                    <?=$this->Html->Image('systems/flat-color-icons-svg/clock.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                        Age
                                                    </span>
                                                    <span class="col-md-6" for="exampleInputName3">
                                                        <data id="p_age"> </data>
                                                    </span>
                                                </div>

                                                <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                                        <span class="col-md-6" for="exampleInputName3">
                                                        <?=$this->Html->Image('systems/flat-color-icons-svg/ipad.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                            Mobile
                                                        </span>
                                                            <span class="col-md-6" for="exampleInputName3">
                                                            <data id="p_mobile"> </data>
                                                        </span>
                                                </div>



                                            </div>

                                                <div class="col-md-6">

                                                    <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                                        <span class="col-md-6" for="exampleInputName3">
                                                        <?=$this->Html->Image('systems/flat-color-icons-svg/landscape.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                            Religion
                                                        </span>
                                                         <span class="col-md-6" for="exampleInputName3">
                                                            <data id="p_religion"> </data>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                                    <span class="col-md-6" for="exampleInputName3">
                                                    <?=$this->Html->Image('systems/flat-color-icons-svg/briefcase.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                        Occupation
                                                    </span>
                                                        <span class="col-md-6" for="exampleInputName3">
                                                        <data id="p_occupation"> </data>
                                                    </span>
                                                    </div>
                                                    <div class="col-md-12 pb-10 pt-10" style="border-bottom: 2px dotted gainsboro;">
                                                        <span class="col-md-6" for="exampleInputName3">
                                                        <?=$this->Html->Image('systems/flat-color-icons-svg/conference_call.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                            M. Status
                                                        </span>
                                                            <span class="col-md-6" for="exampleInputName3">
                                                            <data id="pm_satus"> </data>
                                                        </span>
                                                    </div>

                                                    <div class="col-md-12 pb-10 pt-10" >
                                                        <span class="col-md-6" for="exampleInputName3">
                                                        <?=$this->Html->Image('systems/flat-color-icons-svg/mms.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                                            Photo
                                                        </span>
                                                            <span class="col-md-6" for="exampleInputName3">
                                                            <?=$this->Html->Image('no-image.png',['id'=>'p_thumb_url','name'=>'thumb_url','width'=>'100%'])?>
                                                        </span>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-30">
                                                <button btnpid="dfsdf" class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next Step <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                                            </div>
                                        </div>

                                </div>
                                <!-- End Step-1 Content -->

                                <!-- Start Step-2 Content -->
                                <div class="row setup-content" id="step-2">
                                    <div class="col-md-12" style="margin-top:3em;">

                                        <div class="row">
                                            <p class="text-primary"><strong><a href="#"> Patient Information </a></strong><p>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-6 control-label text-right" >Height</label>
                                                    <div class="col-sm-6 input-group">
                                                        <input type="text"id=""name="height" class="form-control "placeholder="_ \ __" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-6 control-label text-right" >Weight</label>
                                                    <div class="col-sm-6 input-group">
                                                        <input type="text"id=""name="weight" class="form-control "placeholder="Patient weight (KG)" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-6 control-label text-right" >Temperature</label>
                                                    <div class="col-sm-6 input-group">
                                                        <input type="text"id=""name="temperature" pattern='[0-9]{2,3}' placeholder="Body Temperature (F)"title="Should be valid temperature" class="form-control "required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-6 control-label text-right" >Pulse Rate</label>
                                                    <div class="col-sm-6 input-group">
                                                        <input type="text"id=""name="pulserate" pattern="[0-9]{3}" title="Should be valid pulse rate"placeholder="Patient Pulse rate" class="form-control "required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-6 control-label text-right" >Blood Pressure</label>
                                                    <div class="col-sm-6 input-group">
                                                        <input type="text"id=""name="bloodpressure" placeholder="___/__" class="form-control "required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-6 control-label text-right" >Blood  Glucose</label>
                                                    <div class="col-sm-6 input-group">
                                                        <input type="text"id=""name="bloodglucose"placeholder="Patient Blood Glucose" class="form-control "required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label text-right" >Symtoms</label>
                                                    <div class="col-sm-8 input-group">
                                                        <textarea name="symptoms" class="form-control " placeholder="Enter your priliminary description of diseases." required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label text-right" >Reports</label>
                                                    <div class="col-sm-8 input-group text-left" style="border:1px solid #eee;padding:10px;">
                                                        <div class="uploadmultitplefiles">
                                                            <div class="progress mb-2 mt-2">
                                                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%">0%</div>
                                                            </div>
                                                            <input required type="file" name="uploadfile" style="display:none">
                                                            <button id="uploadbutton" type="button" class="btn btn-xs btn-default" >Add File</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                       </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-offset-3">
                                                <button class="btn btn-primary nextBtn btn-lg" type="button">Next</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Step-2 Content -->

                                <!-- Start Step-3 Content -->
                                <div class="row setup-content" id="step-3">
                                    <div class="col-xs-12 text-center">
                                        <div class="col-md-8 col-md-offset-2">
                                            <h4 class="mb-20" style="font-family:"Times New Roman">Choose ,By Which System You Want to Pay</h4>

                                            <div class="row"style="margin-bottom: 20px; ">
                                                <?php if($doctor->doc_type == 'Demand'){

                                                ?>
                                                <div class="col-md-8 col-md-offset-2 " style="box-shadow: 2px 2px 33px -4px rgba(0,0,0,0.88);padding: 5px;border-radius: 10px">
                                                    <?php $id =0;
                                                    foreach ($pay_method as $p):
                                                        ?>

                                                        <input required type="radio" name="pay_method" value="<?=$p->method_name ?>" id="<?=$p->id ?>" class="input-hidden" />
                                                        <label for="<?=$p->id ?>">
                                                            <img class=" m-10" src="<?= $this->request->webroot ?><?= 'img/'. $p->method_logo ?>"alt="Method-Logo">
                                                        </label>

                                                    <?php endforeach; ?>
                                                </div>
                                                    <?php }
                                                    else{?>
                                                    <div class="col-md-8 col-md-offset-2 " style="box-shadow: 2px 2px 33px -4px rgba(0,0,0,0.88);padding: 5px;border-radius: 10px">
                                                        <input required type="radio" checked name="pay_method" value="free" id="free" class="input-hidden" />
                                                        <label for="free">
                                                            <img class=" m-10" src="<?= $this->request->webroot ?>img/free.png"alt="Method-Logo">
                                                        </label>
                                                    </div>
                                                  <?php  }?>
                                            </div>

                                            <button class="btn btn-primary prevBtn btn-lg mr-10 " type="button">Previous</button>
                                            <button class="btn btn-success btn-lg ml-10" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Step-3 Content -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <!-- Start Patient register modal-->
   <div class="modal fade" id="modal-patient-register">
        <div class="modal-dialog ">
            <form name="patient_register_form" id="patient_register_form" method="post">
                <div class="modal-content">
                <div class="modal-header" style="background-color: #00bfff">                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center"style="color: white">Patient Register</h4>
                </div>

                <div class="modal-body  m-4 p-4">
                    
                    <div class="row" id="modalstatus" style="display: none;">
                        <div class="col-sm-12">
                            <div class="alert alert-danger alert-dismissible col-sm-4 float-right " role="alert">
                                <p style="margin:0px;" id="modalmessage"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row p-4 m-5 "style="border: 1px solid #e1e1ea">

                            <div class="col-md-6 mt-10">


                                <div class="form-group">
                                    <label class="col-sm-5 control-label text-right" >FirstName</label>
                                    <div class="col-sm-7 input-group">
                                        <input type="text"id="f_name" name=" f_name" class="form-control "required>                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label text-right" >LastName</label>
                                    <div class="col-sm-7 input-group">
                                        <input type="text" id="l_name" name="l_name" class="form-control "required>                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label text-right" >D.O.B</label>
                                    <div class="col-sm-7 input-group">
                                        <input type="text" id="dob" name="dob" class="form-control "required>                                    </div>
                                </div><div class="form-group">
                                    <label class="col-sm-5 control-label text-right" >Age</label>
                                    <div class="col-sm-7 input-group">
                                        <input type="text"id="age" name="age" class="form-control "required>                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label text-right" >Mobile</label>
                                    <div class="col-sm-7 input-group">
                                        <input type="text"id="mobile" name="mobile" class="form-control ">                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label text-right" >Address</label>
                                    <div class="col-sm-7 input-group">
                                        <input type="text"id="address" name="address" class="form-control ">                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label text-right">Religion</label>
                                    <div class="col-sm-7 input-group">
                                        <select class="form-control"name="religion" id="religion"required >
                                            <option disabled>Select Religion</option>
                                            <option value="H">Hindu</option>
                                            <option value="I">Muslim</option>
                                            <option value="B">Buddhist</option>
                                            <option value="C">Chiristian</option>
                                            <option value="O">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label text-right"name="occupation"id="occupation" required>Occupation</label>
                                    <div class="col-sm-7 input-group">
                                        <select class="form-control"name="occupation"id="occupation" required>
                                            <option disabled>Select Occupation</option>
                                            <option value="HO">Housewife</option>
                                            <option value="ST">Student</option>
                                            <option value="BU">Business</option>
                                            <option value="SE">Service Holder</option>
                                            <option value="OT">Others</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6  mt-10">

                                <div class="form-group">
                                    <label class="col-sm-5 control-label text-right">Gender</label>
                                    <div class="col-sm-7 input-group">
                                        <select class="form-control"id="gender" name="gender"required >
                                            <option disabled>Select Gender</option>
                                            <option value="M">Male </option>
                                            <option value="F">Female</option>
                                            <option value="O">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label text-right">M. Status</label>
                                    <div class="col-sm-7 input-group">
                                        <select class="form-control"id="m_status"name="m_status" required>
                                            <option disabled>Select M status</option>
                                            <option value="M">Married</option>
                                            <option value="U">Unmarried</option>
                                            <option value="O">Others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-5 control-label text-right"id="thumb_url"name="thumb_url" required>Photo</label>
                                    <div class="col-sm-7 uploadsingleimg input-group">
                                        <div style="border:1px solid gainsboro;padding:5px;">
                                           <?=$this->Html->Image('no-image.png',['id'=>'myphoto','width'=>'100%'])?>
                                            <input name="thumb_url" type="hidden">
                                        </div>
                                        <div class="progress mb-2 mt-2">
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%">0%</div>
                                        </div>

                                        <input type="file" name="uploadfile" style="display:none">
                                        <button id="uploadbutton" type="button" class="btn btn-default mt-10" >Upload/Change</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-success pull-left">Register</button>
                    <button type="cancel" class=" pull-right btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- End Modal for Patient register -->

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



<?php
$this->end();

$this->start('bottomscript');
?>
<script type="text/javascript">
    $("#getadoctor").submit(function(e) {
        e.preventDefault();
       $('#pleaseWaitDialog').modal();
        var data = $("#getadoctor").serialize();
        var url2 =$('meta[name="redirect"]').attr('url');
        var urlfree =$('meta[name="free"]').attr('url');

        var url =$('meta[name="baseurl"]').attr('url');
        url = url+"pay/ajax?op=before_getadoctor";
        console.log(url);
        console.log(data);
        $.ajax({
            url:url,
            type:'POST',
            data:data,
            dataType:"json",
            success: function(obj){
                console.log(obj);
                if(obj.status == 'success'){
                    var url = obj.data;
                    url2 = url2+'?token='+url;
                    console.log(url2);
                    $( location ).attr("href", url2);
                    $('#pleaseWaitDialog').modal('hide');
                    FlashStatus("success","Successfully saved.");

                }
                else if(obj.status == 'free'){
                    var url = obj.data;
                    url2 = urlfree+'?token='+url;
                    console.log(url2);
                    $( location ).attr("href", url2);
                    $('#pleaseWaitDialog').modal('hide');
                   // FlashStatus("success","Successfully saved.");
                }
                else {

                }



            }
        });
    });





    $( function() {
        $( "#dob" ).datepicker();
    } );

    $('#dob').datepicker({
        onSelect: function(value, ui) {
            var today = new Date(),
                age = today.getFullYear() - ui.selectedYear;
            console.log(age);
            $('#age').val(age);
        },
        maxDate: '+0d',
        changeMonth: true,
        changeYear: true,
        defaultDate: '-18yr',
    });

    $("#patient_register_form").submit(function(e) {
        e.preventDefault();
        var data = $("#patient_register_form").serialize();
        var url =$('meta[name="baseurl"]').attr('url');
        url = url+"patients/ajax?op=register";
        console.log(url);
        console.log(data);
        $.ajax({
            url:url,
            type:'POST',
            data:data,
            dataType:"json",
            success: function(obj){
                console.log(obj);
                if(obj.status == 'success'){
                    patient_search(obj.data);

                    $('#patient_register_form').find("input[type=text],input[type=password],input[type=email],input[type=number], textarea").val("");
                    $("button.close").click();
                    FlashStatus("success","Successfully registered.");
                }
                else {
                    $('#modalmessage').text(obj.response);
                    $("#modalstatus").slideDown('slow');
                    $("#modalstatus").delay(3000).fadeOut('slow');
                }


            }
        });
    });


 function patient_search(id) {

    if(id==undefined || id == "" || id!=parseInt(id, 10))
    {
        alert("Patient ID is invalid/empty ");
        return;
    }
    $("#patient_id").attr("disabled","disabled");
    $("#btn_patient_search").attr("disabled","disabled");  

    $("div#patientdata").hide();
    $("div#loading").show();

    var url =$('meta[name="baseurl"]').attr('url');
    url = url+"patients/ajax?op=getpatient&id="+id;
    console.log(id);console.log(url);
    $.ajax({
        url:url,
        type:"GET",
        dataType:"JSON",
        success: function(obj){
            console.log(obj);
            $("div#loading").hide();
            $("#patient_id").removeAttr("disabled","disabled");
            $("#btn_patient_search").removeAttr("disabled","disabled"); 

            if(obj.status=="success")
            {
                var data=obj.data;
                show_patient_data(data);


                $("div#patientdata").show();

            }
            else
            {
                FlashStatus(obj.status,obj.response);
            }
        },
        error: function(e){
        }
    });
}
function show_patient_data(data) {
    var url =$('meta[name="baseurl"]').attr('url');
    var imgurl = url+'img/'+data.thumb_url;
    $("input[name='pid']").val(data.pid);
    $("#p_pid").html(data.pid);
    $("#pf_name").html(data.f_name);
    $("#pl_name").html(data.l_name);
    $("#p_dob").html(data.dob);
    $("#p_age").html(data.age);

    $("#pm_satus").html(MSTATUS[data.m_status]);
    $("#p_mobile").html(data.mobile);
    $("#p_occupation").html(OCCUPATION[data.occupation]);
    $("#p_religion").html(RELIGION[data.religion]);
    $("#p_gender").html(GENDER[data.gender]);
    $("#p_thumb_url").attr('src', imgurl);
}



$("div#div_patient_search").on("click", "#btn_patient_search", function(){

    var id = $("#patient_id").val();
    patient_search(id);

});


$('input#patient_id').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                var id = $("#patient_id").val();
                patient_search(id);
          }
});

</script>






<?php
$this->end();
?>
