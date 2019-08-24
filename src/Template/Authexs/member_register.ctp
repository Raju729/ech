<?php $this->start('contents') ?>
<style>
    .dropdown-toggle{height:45px !important; }
    /*.dropdown-menu{top:unset !important;}*/
    .dropdown-toggle:hover{
        background-color: white;
        border-color:#ccc;}


</style>

<!-- Start main-content -->
<div class="main-content">

    <!-- Section: inner-header -->

    <!-- Section: Have Any Question -->
    <!-- Section: Contact -->
    <form id="member_reg_form" method="post" enctype="multipart/form-data">
        <section data-bg-img="<?=$this->request->Webroot;?>img/public/p4.png">
            <div class="container">
                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-uppercase font-28 mt-0"><span class="text-theme-colored">REGISTER as</span> a Member</h2>
                            <p class="text-uppercase letter-space-4">Register a free account to start telemedicine service.</p>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">

                            <!-- Contact Form -->
                            <form id="contact_form" name="contact_form" class="contact-form-transparent" action="http://thememascot.net/demo/html/health-beauty/health-zone/v3.0/includes/sendmail.php" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>First Name <small>*</small></label>
                                            <input type="hidden" value="4" name="type">
                                            <input name="f_name" class="form-control" type="text" placeholder="Enter First Name" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name <small>*</small></label>
                                            <input name="l_name" class="form-control" type="text" placeholder="Enter Lirst Name" required="">
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
                                            <input name="email" class="form-control required email" type="email" placeholder="Enter Email"required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Password <small>*</small></label>
                                            <input name="password" class="form-control" type="password" placeholder="Enter Password"required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Confirm Password <small>*</small></label>
                                            <input name="cpassword" class="form-control" type="password" placeholder="Re-enter Password"required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Phone<small>*</small></label>
                                            <input name="mobile" class="form-control" type="text" placeholder="Enter Phone"required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>NID </label>
                                            <input name="nid" class="form-control required" type="text" placeholder="Enter NID Number"required="">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Address <small>*</small></label>
                                            <input name="address" class="form-control required" type="text" placeholder="Enter Address"required="">
                                        </div>
                                    </div>
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
<!--                            <script type="text/javascript">-->
<!--                                $("#member_reg_form").validate({-->
<!--                                    submitHandler: function(form) {-->
<!--                                        var form_btn = $(form).find('button[type="submit"]');-->
<!--                                        var form_result_div = '#form-result';-->
<!--                                        $(form_result_div).remove();-->
<!--//                                        form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');-->
<!--                                        var form_btn_old_msg = form_btn.html();-->
<!--                                        form_btn.html(form_btn.prop('disabled', true).data("loading-text"));-->
<!--                                        $(form).ajaxSubmit({-->
<!--                                            dataType:  'json',-->
<!--                                            success: function(data) {-->
<!--                                                if( data.status == 'true' ) {-->
<!--                                                    $(form).find('.form-control').val('');-->
<!--                                                }-->
<!--                                                form_btn.prop('disabled', false).html(form_btn_old_msg);-->
<!--                                                $(form_result_div).html(data.message).fadeIn('slow');-->
<!--                                                setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);-->
<!--                                            }-->
<!--                                        });-->
<!--                                    }-->
<!--                                });-->
<!--                            </script>-->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- Divider: Google Map -->

</div>
<!-- end main-content -->
<?php $this->end();
$this->start('bottomscript');
?>
<script>
    $("#member_reg_form").submit(function(e) {
        e.preventDefault();

        var data = $("#member_reg_form").serialize();
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
                    $('#member_reg_form').find("input[type=text],input[type=password],input[type=email],input[type=number], textarea").val("");


                }
                else{

                    FlashStatus(obj.status,obj.response);
                }

            }

        });

    });
</script>

<?php $this->end();?>


