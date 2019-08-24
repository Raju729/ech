
<?php
$this->start('topscript');
echo $this->Html->script('jquery/fileupload.js');
$this->end();

$this->assign('title','Add New Doctor');
$this->assign('pagename','Add New Doctor');
$this->assign('doctormenu','active');
$this->assign('doctormenuopen','menu-open');
$this->assign('doctormenuadd','active');
$this->start('contents');
?>
<meta name="ajax" url="<?=$this->Url->build(["controller" => "Doctors",
"action" => "ajax"]);?>">
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add New Doctor</h3>
      </div>
      <div class="card-body">
        <style>.input-group-text{min-width: 40px !important;}</style>
        <div class="row  m-4">
          <div class="col-md-3">

            <div class="uploadsingleimg">
              <div class="col-md-12 border p-1 mb-4">
                <img id="myphoto" src="<?= $this->request->webroot ;?>img/no-image.png" alt="Enterpreneur" style="width: 100%;"><input name="thumb_url" type="hidden">
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
            <?=$this->Form->create("Add Doctor",array('url'=>'/admin/doctors/add','id'=>'doc_add_form','enctype'=>'multipart/form-data')) ?>
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
            <div class="form-group ">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                </div>
                <?=$this->Form->text('username', ['class'=>'form-control','placeholder'=>'Username','required'=>true]);?>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                </div>
                <?=$this->Form->email('email', ['class'=>'form-control','placeholder'=>'Enter your email','required'=>true]);?>
              </div>
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
                  <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                </div>
                <?=$this->Form->password('password', ['class'=>'form-control', 'placeholder'=>'Enter password','required'=>true])?>
              </div>
            </div> 
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                </div>
                <?=$this->Form->password('cpassword', ['class'=>'form-control', 'placeholder'=>'Confirm password','required'=>true])?>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                </div>
                <?=$this->Form->text('chamber', ['class'=>'form-control', 'placeholder'=>'Give chamber Address','required'=>true])?>
              </div>
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                  </div>
                  <select name="doc_type" class="form-control" id="dt_type">
                    <option value="" disabled selected>Doctor Type</option>

                    <?php 
                    foreach ($dt as $tp) 
                    { 
                      if($tp['status']>0)
                      {
                        ?>                                 

                        <option status="<?= $tp['status']?>" value="<?= $tp['type_name']?>"><?= $tp['type_name']?></option>

                        <?php 
                      }
                    }
                    ?>

                  </select>
                </div>
              </div>
              <div class="form-group " id="fee">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-money" aria-hidden="true"></i>

                    </div>
                    <?=$this->Form->text('fee', ['id'=>'fee','class'=>'form-control','name'=>'fee','placeholder'=>'Enter Your Fees']);?>
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-book" aria-hidden="true"></i></span>
                        </div>
                        <?=$this->Form->text('degree', ['class'=>'form-control', 'placeholder'=>'Give Your Degree','required'=>true])?>
                    </div>
                </div>
                <div class="form-group">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                    </div>
                    <?=$this->Form->text('visittime', ['class'=>'form-control', 'placeholder'=>'Give Your Visittime','required'=>true])?>

                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-5">
                      <div class="input-group mb-3">

                        <select id="system_sp" name="" class="form-control" size=6>
                          <option class=" border-bottom font-weight-bold" value="" disabled>Specialization</option>

                          <?php foreach ($sp as $sps) { ?>

                          <option value="<?= $sps['sp_name']?>"><?= $sps['sp_name']?></option>

                          <?php } ?>

                        </select>
                      </div>
                    </div>

                    <div class="col-sm-2 text-center">
                      <br>
                      <button type="button" id="sp_add">>></button><br><br>
                      <button type="button" id="sp_remove"><<</button><br><br>
                    </div>

                    <div class="col-sm-5">
                      <div class="input-group mb-3">

                        <select id="my_sp" name="specialist[]" class="form-control" multiple size=6>

                          <option class=" border-bottom font-weight-bold"  disabled>Selected</option>                     


                        </select>
                      </div>
                    </div>
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

      <?php $this->end();
      $this->start('script');?>


      <script type="text/javascript">

        $('#dt_type').on('change', function() {
         var fee = $('input[name="fee"]');
         var sel = $('#dt_type option:selected');

         if( sel.attr("status") == 1){
          fee.val("0");
          fee.attr("disabled","true");
        }
        else{
          fee.removeAttr("disabled");
        }

      });

        $('#sp_add').click(function() {
         var sp = $('#system_sp option:selected');
         if(sp.attr("disabled")==undefined)
         {               
           $("#my_sp").append("<option selected value='"+sp.text()+"'>" +sp.text()+ "</option>");
           sp.attr("disabled","true");
         }     
       });

        $('#sp_remove').click(function() {
         var sp = $('#my_sp option:selected');
         $("#system_sp").find("option[value='"+sp.text()+"']").removeAttr("disabled");       
         sp.remove();              
       });

        $("#doc_add_form").submit(function(e) {
          e.preventDefault();

          var data = $("#doc_add_form").serialize();
          var url =$('meta[name="ajax"]').attr('url');
          url = url+"?op=add";
          console.log(url);
          console.log(data);
          $.ajax({
            url:url,
            type:'POST',
            data:data,
            dataType:"JSON",
            success: function(obj){
              console.log(obj);
              if(obj.status =='success'){
                    FlashStatus(obj.status,obj.response);
                      $('#doc_add_form').find("input[type=text],input[type=password],input[type=email],input[type=number], textarea").val("");

              }
              else{
                
                FlashStatus(obj.status,obj.response);
              }
              
            }

          });

        });
</script>

<?php $this->end();
//$this->element("Common/fileuploadjs");?>







