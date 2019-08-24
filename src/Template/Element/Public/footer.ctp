<footer id="footer" class="footer bg-black-222">
    <div class="container pb-50">
        <div class="row border-bottom-black">
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">

                    <h4>Easy Health Care</h4>
                    <ul class="list-inline mt-5">                       
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="#">01776265963</a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="#">ehc@afia.com</a> </li>
                        
                         <li class="m-0 pl-10 pr-10"> <i class="fa fa-location-arrow text-theme-colored mr-5"></i> <a class="text-gray" href="#"> Dhaka-1209</a> </li>
                    </ul>
                    
                   
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
               <div class="widget dark">
                <h5 class="widget-title line-bottom">Twitter Feed</h5>
                <div class="twitter-feed list-border clearfix" data-username="Envato" data-count="2"><ul><li class="item">Integrating typography with photos to create an interesting 3D effect is a popular style for advertising and poster… <a href="https://t.co/ptvsDESWEk" target="_blank" title="Visit this link">https://t.co/ptvsDESWEk</a> <div class="date">Jun. 20, 2018</div></li><li class="item">Many people check websites more frequently on their mobile devices than on computers, so having a website that does… <a href="https://t.co/uJhDsNdxRE" target="_blank" title="Visit this link">https://t.co/uJhDsNdxRE</a> <div class="date">Jun. 20, 2018</div></li></ul></div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Useful Links</h5>
                    <ul class="list angle-double-right list-border ">
                        <li><a href="<?= $this->Url->build(['controller' => 'Doctors', 'action' => 'doctorList']) ?>">Our Doctors</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'gallery']) ?>">Gallary</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']) ?>">About Us</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']) ?>">Contact</a></li>
                        <li><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']) ?>">Support</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">Quick Contact</h5>
                    <form method="post" action="includes/quickcontact.php" class="quick-contact-form" name="footer_quick_contact_form" id="quick_contact_form2" novalidate="novalidate">
                      <div class="form-group">
                        <input type="text" placeholder="Enter Email" required="" class="form-control" name="form_email" aria-required="true">
                      </div>
                      <div class="form-group">
                        <textarea rows="3" placeholder="Enter Message" required="" class="form-control" name="form_message" aria-required="true"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden" value="" class="form-control" name="form_botcheck">
                        <button data-loading-text="Please wait..." class="btn btn-default btn-transparent btn-xs btn-flat mt-0" type="submit">Send Message</button>
                      </div>
                    </form>

                    <!-- Quick Contact Form Validation-->
                    <script type="text/javascript">
                      $("#quick_contact_form2").validate({
                        submitHandler: function(form) {
                          var form_btn = $(form).find('button[type="submit"]');
                          var form_result_div = '#form-result';
                          $(form_result_div).remove();
                          form_btn.before('&lt;div id="form-result" class="alert alert-success" role="alert" style="display: none;"&gt;&lt;/div&gt;');
                          var form_btn_old_msg = form_btn.html();
                          form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                          $(form).ajaxSubmit({
                            dataType:  'json',
                            success: function(data) {
                              if( data.status == 'true' ) {
                                $(form).find('.form-control').val('');
                              }
                              form_btn.prop('disabled', false).html(form_btn_old_msg);
                              $(form_result_div).html(data.message).fadeIn('slow');
                              setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                            }
                          });
                        }
                      });
                    </script>
                  </div>
            </div>
        </div>
        <div class="row mt-10">
            <div class="col-md-5">
                <h4 class="text-white">Subscribe Us</h4>
                <form id="mailchimp-subscription-form-footer" class="newsletter-form mt-20">
                    <div class="input-group">
                        <input type="email" value="" name="EMAIL" placeholder="Your Email" class="form-control input-lg font-16" data-height="45px" id="mce-EMAIL-footer" >
                        <span class="input-group-btn">
                <button data-height="45px" class="btn btn-colored btn-theme-colored btn-xs m-0 font-14" type="submit">Subscribe</button>
              </span>
                    </div>
                </form>
                <!-- Mailchimp Subscription Form Validation-->

            </div>
            <div class="col-md-4 col-md-offset-3 mt-20">
                <div class="pull-right">
                    <ul class="styled-icons icon-bordered small square list-inline mt-10">
                        <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype text-white"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube text-white"></i></a></li>
                    </ul>
                </div>
                <div class="pull-left">
                    <h5 class="text-white">Call Us Now</h5>
                    <h4 class="text-gray">01850888897</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copy-right p-20 bg-black-333">
        <div class="row text-center">
            <div class="col-md-12">
                <p class="font-11 text-black-777 m-0">All Rights Reserved © 2019. Development by <a href="#" target="_blank" style="text-decoration:none;">AFIA ISLAM</a></p>
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>