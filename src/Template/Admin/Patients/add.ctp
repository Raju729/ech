<?php

$this->assign('title','Add New Patient');
$this->assign('pagename','Add New Patient');
$this->assign('patientmenu','active');
$this->assign('patientmenuopen','menu-open');
$this->assign('patientmenuadd','active');
$this->start('topscript');
echo $this->Html->script('jquery/fileupload.js');
$this->end();
$this->start('contents');
?>
<meta name="ajax" url="<?=$this->Url->build(["controller" => "Patients",
    "action" => "ajax"]);?>">


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Patient</h3>
            </div>
            <div class="card-body">
                <style>.input-group-text{min-width: 40px !important;}</style>
                <div class="row  m-4">
                    <div class="col-md-3">
                        <div class="uploadsingleimg">
                            <div class="col-md-12 border p-1 mb-4">
                                <img id="myphoto" src="<?= $this->request->webroot ?>img/no-image.png" alt="Patient" style="width: 100%;"><input name="thumb_url" type="hidden">
                            </div>
                            <div class="progress mb-2 mt-2">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%">0%</div>
                            </div>
                            <input type="file" name="uploadfile" style="display:none">
                            <button id="uploadbutton" type="button" class="btn btn-default" >Upload/Change</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-1"></div>
                    <div class="col-md-7 col-md-offset-2">
                        <?=$this->Form->create("Add Patient",array('url'=>'/admin/patients/add','id'=>'patient_add_form','enctype'=>'multipart/form-data')) ?>
                        <h4 >Personal Information</h4><hr>
                        <div class="form-group mt-4">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                </div>
                                <?=$this->Form->text('f_name', ['class'=>'form-control','placeholder'=>'Enter first name','required'=>true]);?>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                </div>
                                <?=$this->Form->text('l_name', ['class'=>'form-control','placeholder'=>'Enter Last name','required'=>true]);?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend date" data-provide="datepicker-inline">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <?=$this->Form->text('dob', ['class'=>'form-control','id'=>'dob','placeholder'=>'Date Of Birth','required'=>true]);?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></span>
                                </div>
                                <?=$this->Form->number('age', ['class'=>'form-control','id'=>'age', 'placeholder'=>'Your Age Here','required'=>true])?>
                            </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                </div>
                                <?=$this->Form->text('mobile', ['class'=>'form-control','placeholder'=>'Enter your Phone Number','required'=>true]);?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                                </div>
                                <?=$this->Form->text('address', ['class'=>'form-control', 'placeholder'=>'Give Your Address','required'=>true])?>
                            </div>

                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                </div>
                                <select name="gender" class="form-control" id="pt_gender">
                                    <option value="" disabled selected>..Select Your Gender..</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="C">Common</option>
                                </select>
                            </div>
                        </div>


                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="occupation" class="form-control" id="occupation">
                                        <option value="" disabled selected>..Select Your Occupation..</option>
                                        <option value="BU">Business</option>
                                        <option value="SE">Service Holder</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="m_status" class="form-control" id="dt_type">
                                        <option value="" disabled selected>..Marrital Status..</option>
                                        <option value="M">Married</option>
                                        <option value="U">Unmarried</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="religion" class="form-control" id="dt_type">
                                        <option value="" disabled selected>..Select Your Religion..</option>
                                        <option value="H">HINDU</option>
                                        <option value="M">MUSLIM</option>
                                        <option value="C">CHRISTIAN</option>
                                        <option value="B">BUDDHIST</option>



                                    </select>
                                </div>
                            </div>
                            <div class="form-group " >
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-id-card" aria-hidden="true"></i>

                                    </div>
                                    <?=$this->Form->text('nid', ['id'=>'nid','class'=>'form-control','placeholder'=>'Enter Your NID Number']);?>
                                </div>
                            </div>



                            <div class="form-group">
                                <?=$this->Form->button('Create', array('type'=>'submit','id'=>'doc_add','class' => 'btn btn-success col-sm-3 m-4' ,'div' => false))?>
                                <?= $this->Form->button('Reset', array('type'=>'reset','class' => 'btn btn-warning col-sm-2 m-4','div' => false))?>
                            </div>

                            <?php echo $this->Form->end(); ?>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

        <?php $this->end(); ?>
        <?php $this->start('script');?>

        <script type="text/javascript">
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





            $("#patient_add_form").submit(function(e) {
                e.preventDefault();

                var data = $("#patient_add_form").serialize();
                var url =$('meta[name="ajax"]').attr('url');
                url = url+"?op=add";
                console.log(url);
                console.log(data);
                $.ajax({
                    url:url,
                    type:'POST',
                    data:data,
                    dataType:"json",
                    success: function(obj){
                        console.log(obj);
                        if(obj.status =='success'){
                            FlashStatus(obj.status,obj.response);
                            $('#patient_add_form').find("input[type=text],input[type=password],input[type=email],input[type=number], textarea").val("");

                        }
                        else{

                            FlashStatus(obj.status,obj.response);
                        }

                    }




                });


            });











        </script>


        <?php $this->end(); ?>






