<?php
$this->assign('title','Add New Member');
$this->assign('pagename','Add New Member');
$this->assign('membermenu','active');
$this->assign('membermenuopen','menu-open');
$this->assign('membermenuadd','active');
$this->start('topscript');
echo $this->Html->script('jquery/fileupload.js');
$this->end();
$this->start('contents');
?>
<meta name="ajax" url="<?=$this->Url->build(["controller" => "Users",
"action" => "ajax"]);?>">

<div class="row">
    <div class="col-md-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Member</h3>
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
<?=$this->Form->create("Add Member",array('url'=>'/admin/users/add','id'=>'mem_add_form','enctype'=>'multipart/form-data')) ?>
                        <h4 >Personal Information</h4><hr>
                        <div class="form-group mt-4">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                              </div>
<?=$this->Form->text('f_name', ['class'=>'form-control','placeholder'=>'Enter first name','required'=>true]);?>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                              </div>
<?=$this->Form->text('l_name', ['class'=>'form-control','placeholder'=>'Enter Last name','required'=>true]);?>
                            </div>
                        </div>
                        <div class="form-group mt-4">
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
                                    <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
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
    <?=$this->Form->text('address', ['class'=>'form-control', 'placeholder'=>'Give your Address','required'=>true])?>
                                </div>
                            </div>
                        <div class="form-group">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                                  </div>
  <?=$this->Form->text('nid', ['class'=>'form-control', 'placeholder'=>'Enter NID Number','required'=>true])?>
                                  
                                </div>
                        </div>
                        <div class="form-group">
<?=$this->Form->button('Create', array('type'=>'submit','class' => 'btn btn-success col-sm-3 m-4' ,'div' => false))?>
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
<?php $this->start('script'); ?>
<script type="text/javascript">

   $("#mem_add_form").submit(function(e) {
          e.preventDefault();

          var data = $("#mem_add_form").serialize();
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
                      $('#mem_add_form').find("input[type=text],input[type=password],input[type=email],input[type=number], textarea").val("");

              }
              else{
                
                FlashStatus(obj.status,obj.response);
              }
              
            }




          });


        });


</script>


<?php $this->end(); ?>


