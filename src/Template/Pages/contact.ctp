
<?php
$this->assign('contact','active');
$this->start('contents');?>
<!-- Start main-content -->
<div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="<?=$this->request->webroot?>img/public/homepage_pic/bg/bg5.jpg">">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title mb-100">Contact</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Divider: Google Map -->
    <section>
        <div class="container-fluid pt-0 pb-0">
            <div class="row">

                <iframe width="600" height="450" frameborder="0" style="border:0" src="https://maps.google.com/maps?q=sucona%20commu&t=&z=13&ie=UTF8&iwloc=&output=embed"  allowfullscreen></iframe>


            </div>
        </div>
    </section>

    <!-- Divider: Contact -->
    <section class="divider">
        <div class="container">
            <div class="row pt-30">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">Our Office Location</h5>
                                    <p>#61/A,Sekhertek,Mohammadpur Dhaka 1216</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">Contact Number</h5>
                                    <p>01776265963</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">Email Address</h5>
                                    <p>Rajud6140@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="fa fa-skype text-theme-colored"></i></a>
                                <div class="media-body">
                                    <h5 class="mt-0">Make a Video Call</h5>
                                    <p>rajuskype</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3 class="line-bottom mt-0 mb-30">Interested in discussing?</h3>
                    <!-- Contact Form -->
                    <form id="contact_form" name="contact_form" class="" action="http://thememascot.net/demo/html/health-beauty/health-zone/v3.0/includes/sendmail.php" method="post">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name <small>*</small></label>
                                    <input name="name" class="form-control" type="text" placeholder="Enter Name" required="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email <small>*</small></label>
                                    <input name="email" class="form-control required email" type="email" placeholder="Enter Email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Subject <small>*</small></label>
                                    <input name="subject" class="form-control required" type="text" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input name="phone" class="form-control" type="text" placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input name="form_botcheck" class="form-control" type="hidden" value="" />
                            <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" data-loading-text="Please wait...">Send your message</button>
                            <button type="reset" class="btn btn-default btn-flat btn-theme-colored">Reset</button>
                        </div>
                    </form>

                    <!-- Contact Form Validation-->
                    <script type="text/javascript">
//                        $("#contact_form").validate({
//                            submitHandler: function(form) {
//                                var form_btn = $(form).find('button[type="submit"]');
//                                var form_result_div = '#form-result';
//                                $(form_result_div).remove();
//                                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
//                                var form_btn_old_msg = form_btn.html();
//                                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
//                                $(form).ajaxSubmit({
//                                    dataType:  'json',
//                                    success: function(data) {
//                                        if( data.status == 'true' ) {
//                                            $(form).find('.form-control').val('');
//                                        }
//                                        form_btn.prop('disabled', false).html(form_btn_old_msg);
//                                        $(form_result_div).html(data.message).fadeIn('slow');
//                                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
//                                    }
//                                });
//                            }
//                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- end main-content -->
<?php $this->end();
$this->start('bottomscript');
?>

<script>
    $("#contact_form").submit(function(e) {
        e.preventDefault();
        var data = $("#contact_form").serialize();
        var url =$('meta[name="baseurl"]').attr('url');
        url = url+"contact";
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
                    $('#contact_form').find("input[type=text],input[type=password],input[type=email],input[type=number], textarea").val("");
                    FlashStatus('success','Successfully Sent');
                }
                else {
                    FlashStatus(obj.status,obj.response);
                }



            }
        });
    });
</script>


<?php $this->end(); ?>
