<?php $this->start('contents') ?>
<style>
    .dropdown-toggle{height:45px !important; }
    /*.dropdown-menu{top:unset !important;}*/
    .dropdown-toggle:hover{
        background-color: white;
        border-color:#ccc;}

</style>
<div class="main-content">

    <!-- Section: inner-header -->

    <!-- Section: Have Any Question -->
    <!-- Section: Contact -->
    <section data-bg-img="<?=$this->request->Webroot;?>img/public/p4.png">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase font-28 mt-0"><span class="text-theme-colored">REGISTER as</span>&nbsp; a Doctor</h2>
                        <p class="text-uppercase letter-space-4">Register a free account to start telemedicine service.</p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- Contact Form -->
                        <form id="doc_reg_form" name="doc_reg_form" class="contact-form-transparent" enctype="multipart/form-data" action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 style="border-bottom: 2px solid gainsboro">Personal Information</h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <small>*</small></label>
                                        <input type="hidden" value="3" name="type">
                                        <input name="f_name" class="form-control" type="text" placeholder="Enter First Name" required="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name <small>*</small></label>
                                        <input name="l_name" class="form-control" type="text" placeholder="Enter Last Name" required="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>User Name <small>*</small></label>
                                        <input name="username" class="form-control" type="text" placeholder="Enter User Name" required="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <small>*</small></label>
                                        <input name="email" class="form-control required email" type="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" class="form-control" type="password" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input name="cpassword" class="form-control" type="password" placeholder="Re-enter Password">
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Personal Phone</label>
                                        <input name="mobile" class="form-control" type="text" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" class="form-control" type="text" placeholder="Enter Personal Address">
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-20">
                                    <h3 style="border-bottom: 2px solid gainsboro">About Doctor</h3>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Phone (For patient only)</label>
                                        <input name="alt_mobile" class="form-control" type="text" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Doctor Type</label>
                                        <select id="dt_type" name="doc_type" class="form-control">
                                            <option>Select Doctor Type</option>
                                            <?php
                                            foreach ($dt as $tp)
                                            {

                                                    ?>

                                                    <option status="<?= $tp['status']?>" value="<?= $tp['type_name']?>"><?= $tp['type_name']?></option>

                                                    <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <script>
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
                                </script>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Specialization</label><br>
                                        <select name="specialist[]" class="selectpicker form-control"multiple data-max-options="2" data-live-search="true" style="width:100%;height:50px;">
                                            <?php foreach ($sp as $sps) { ?>
                                                <option data-tokens="<?= $sps['sp_name']?>" value="<?= $sps['sp_name']?>"><?= $sps['sp_name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Demand Fee</label>
                                        <input name="fee" class="form-control" type="text" placeholder="Enter fee">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Visitting Hours</label>
                                        <input name="visittime" class="form-control" type="text" placeholder="Enter Visiting Hour">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Degree</label><br>
                                        <select name="degree[]" class="selectpicker form-control"multiple data-max-options="2" data-live-search="true" style="width:100%;height:50px;">
                                            <?php foreach ($dg as $sps) { ?>

                                                <option data-tokens="<?= $sps['name']?>" value="<?= $sps['name']?>"><?= $sps['name']?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Chamber Address <small>*</small></label>
                                        <input name="chamber" class="form-control required" type="text" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-20">
                                    <h3 style="border-bottom: 2px solid gainsboro">Media Accounts</h3>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Skype</label>
                                        <input name="media_accounts[]" class="form-control required" type="text" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>WhatsApp</label>
                                        <input name="media_accounts[]" class="form-control required" type="text" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Viber</label>
                                        <input name="media_accounts[]" class="form-control required" type="text" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Imo </label>
                                        <input name="media_accounts[]" class="form-control required" type="text" placeholder="Enter Address">
                                    </div>
                                </div>

                                <hr >

                                <div class="col-sm-12 form-group mt-50 mt-50 pt-40" style="border-top: 2px solid gainsboro">

                                    <div class="col-md-3 col-md-offset-3">
                                        <button type="reset" class="btn btn-default btn-xl btn-block" data-loading-text="Please wait...">Reset</button>
                                    </div>
                                    <div class="col-md-3 ">
                                        <button type="submit" class="btn btn-dark btn-theme-colored btn-xl btn-block" data-loading-text="Please wait...">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Contact Form Validation-->


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Google Map -->

</div>
<!-- Start main-content -->

<!-- end main-content -->
<?php $this->end();
$this->start('bottomscript');
?>
<script>
    $("#doc_reg_form").submit(function(e) {
        e.preventDefault();

        var data = $("#doc_reg_form").serialize();
        var url =$('meta[name="baseurl"]').attr('url');
        var url2 = url+"login";
        url = url+"register";
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
                    FlashStatus(obj.status,'your Account in pending for Admin approval.Please wait');
                    $('#doc_reg_form').find("input[type=text],input[type=password],input[type=email],input[type=number], textarea").val("");
//                    $( location ).attr("href", url2);

                }
                else{

                    FlashStatus(obj.status,obj.response);
                }

            }

        });

    });
</script>

<?php $this->end();?>


