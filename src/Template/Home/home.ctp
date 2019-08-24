
<?php
$this->assign('home','active');
$this->start('contents');
//$login_token = $this->Public->encryptDecrypt('sdfdf','e');
//print_r($login_token);
?>
<div class="main-content">

    <!-- Section: Welcome -->
    <section>
        <div class="container pb-0">
            <div class="row">
                
                
                <div class="col-md-8 ">
                    <img class="border-6px" src="<?= $this->request->getAttribute("webroot") ?>img/public/homepage_pic/frontfinal.jpg" alt="">

                </div>

                <div class="col-md-4">
                    <div class="border-6px p-30 pt-10 pb-10">
                        <h5><i class="fa fa-pencil-square-o text-theme-colored"></i> Need Help?</h5>
                        <p class="mt-0 text-uppercase">Just make an account to get help from our experts</p>

                        <!-- Appontment Form Starts -->
                        <form id="appointment_form_at_home" name="appointment_form_at_home" class="" method="post" action="http://thememascot.net/demo/html/health-beauty/health-zone/v3.0/includes/appointment.php">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group mb-10">
                                        <input  name="form_name" class="form-control" type="text" required="" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group mb-10">
                                        <input name="form_email" class="form-control required email" type="email" placeholder="Enter Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-10">
                                <textarea name="form_message" class="form-control required"  placeholder="Enter Message" rows="5"></textarea>
                            </div>
                            <div class="form-group mb-0 mt-20">
                                <input name="form_botcheck" class="form-control" type="hidden" value="">
                                <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Send Message</button>
                            </div>
                        </form>

                        <!-- Appointment Form Validation-->

                        <!-- Appontment Form Ends -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Services -->
    <section id="services">
        <div class="container pb-40">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title text-uppercase">Benefits of EHC<span class="text-black font-weight-300"> Telemedicine</span></h2>
                        <p class="text-uppercase letter-space-4">We are here for you, when you need us.</p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="icon-box text-center p-0 mb-40">
                            <a class="icon mb-10 mr-30 ml-30 mt-10" href="#">
                                <i class="flaticon-medical-ambulance9 font-54 text-theme-colored"></i>
                            </a>
                            <div>
                                <h5 class="icon-box-title mt-15 mb-10 text-uppercase letter-space-2"><strong>Instant Medical Care</strong></h5>
                                <p>We are providing instant health care in emergency situations. With our experts help you will heal very quickly. </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="icon-box text-center p-0 mb-40">
                            <a class="icon mb-10 mr-30 ml-30 mt-10" href="#">
                                <i class="flaticon-medical-hospital35 font-54 text-theme-colored"></i>
                            </a>
                            <div>
                                <h5 class="icon-box-title mt-15 mb-10 text-uppercase letter-space-2"><strong>Lowest Cost</strong></h5>
                                <p>We charge a minimum cost for traetment. Every kind of people can take our treatment becuase we provide services not for money.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="icon-box text-center p-0 mb-40">
                            <a class="icon mb-10 mr-30 ml-30 mt-10" href="#">
                                <i class="flaticon-medical-baby137 font-54 text-theme-colored"></i>
                            </a>
                            <div>
                                <h5 class="icon-box-title mt-15 mb-10 text-uppercase letter-space-2"><strong>Traetment at Home</strong></h5>
                                <p>you can visit doctors by sitting in your home. With online help from mobile or computer make an appoinment with doctor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-box text-center p-0 mb-40">
                            <a class="icon mb-10 mr-30 ml-30 mt-10" href="#">
                                <i class="flaticon-medical-bone11 font-54 text-theme-colored"></i>
                            </a>
                            <div>
                                <h5 class="icon-box-title mt-15 mb-10 text-uppercase letter-space-2"><strong>Time Saving Process</strong></h5>
                                <p>Telemedicine's doctors visit patient on mobile or computer. In this process your time will save from travelling. </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="icon-box text-center p-0 mb-40">
                            <a class="icon mb-10 mr-30 ml-30 mt-10" href="#">
                                <i class="flaticon-medical-lung1 font-54 text-theme-colored"></i>
                            </a>
                            <div>
                                <h5 class="icon-box-title mt-15 mb-10 text-uppercase letter-space-2"><strong>Selection of Doctors</strong></h5>
                                <p>Human Health Helpline have lots of treatment department. You can easilly choose a doctor accourding to your desease. </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="icon-box text-center p-0 mb-40">
                            <a class="icon mb-10 mr-30 ml-30 mt-10" href="#">
                                <i class="flaticon-medical-first32 font-54 text-theme-colored"></i>
                            </a>
                            <div>
                                <h5 class="icon-box-title mt-15 mb-10 text-uppercase letter-space-2"><strong>24 Hours Support</strong></h5>
                                <p>We are providing 24 hours treatment facilities for you. We are able to give 24 hour services because of online help. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section: funfact  -->
    <section class="divider parallax" data-bg-img="<?= $this->request->webroot?>img/public/homepage_pic/front2.jpg" data-parallax-ratio="0.7" >
        <div class="container-fluid pt-0 pb-0">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-5 pt-100 pb-100"></div>
                    <div class="col-md-7 bg-lighter">
                        <div class="pt-40 pr-50 pb-70 pl-60 p-md-30">
                            <h3 class="title letter-space-4">EASY HEALTH CARE</h3>
                            <p class="mb-40">EHC is a wonderful helping system<br> for the people live in our villages and who are can't pay fess for visit a doctor.</p>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 hvr-wobble-vertical sm-text-center">
                                    <div class="funfact ml-md-0">
                                        <a href="#"><i class="pe-7s-date"></i></a>
                                        <h3 class="animate-number font-28 font-weight-500 mt-15 mb-10" data-value="12" data-animation-duration="2500">0</h3>
                                        <h5 class="title text-gray font-weight-300 font-16">Years of Experience</h5>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 hvr-wobble-vertical sm-text-center ml-50 ml-md-0">
                                    <div class="funfact">
                                        <a href="#"><i class="pe-7s-smile"></i></a>
                                        <h3 class="animate-number font-28 font-weight-500 mt-15 mb-10" data-value="1921" data-animation-duration="2500">0</h3>
                                        <h5 class="title text-gray font-weight-300 font-16">Happy Clients</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-30">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 hvr-wobble-vertical sm-text-center">
                                    <div class="funfact">
                                        <a href="#"><i class="pe-7s-medal"></i></a>
                                        <h3 class="animate-number font-28 font-weight-500 mt-15 mb-10" data-value="24" data-animation-duration="2500">0</h3>
                                        <h5 class="title text-gray font-weight-300 font-16">Awards</h5>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4 hvr-wobble-vertical sm-text-center ml-50 ml-md-0">
                                    <div class="funfact">
                                        <a href="#"><i class="pe-7s-like2"></i></a>
                                        <h3 class="animate-number font-28 font-weight-500 mt-15 mb-10" data-value="26892" data-animation-duration="2500">0</h3>
                                        <h5 class="title text-gray font-weight-300 font-16">People Likes</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section: departments -->
    <section id="departments" class="bg-lighter">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title text-uppercase">Available Specialization</h2>
                        <p class="text-uppercase letter-space-4">All our specialists are experienced and well trained from top mediacl institutions in our country.</p>
                    </div>
                </div>
            </div>
            <div class="row mtli-row-clearfix">
                <div class="col-md-12">
                    <div class="owl-carousel-3col" data-dots="true">
                        <div class="item">
                            <div class="class-item box-hover-effect effect1 mb-md-30 bg-lighter">
                                <div class="thumb mb-20" > <img style="height: 300px" alt="featured project" src="<?= $this->request->webroot ?>img/public/homepage_pic/frontfinal.jpg" class="img-responsive img-fullwidth">
                                </div>
                                <div class="content text-left flip p-25 pt-0">
                                    <h4 class="text-uppercase font-weight-800 line-bottom">Surgery Specialist</h4>
                                    <p>Surgery is a the last process of any treatment and it's a complicated process too. We have lots of surgery specialists for your harmless treatment.</p>
                                    <a href="#" class="btn-read-more btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="class-item box-hover-effect effect1 mb-md-30 bg-lighter">
                                <div class="thumb mb-20" > <img alt="featured project" style="height: 300px" src="<?= $this->request->webroot ?>img/public/homepage_pic/classes/2.jpg" class="img-responsive img-fullwidth">
                                </div>
                                <div class="content text-left flip p-25 pt-0">
                                    <h4 class="text-uppercase font-weight-800 line-bottom">Dental Specialist</h4>
                                    <p>We have dental specialists also. To keeping their natural teeth throughout their lives you should regularly checkup your teeth. Here you can do that easily.</p>
                                    <a href="#" class="btn-read-more btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="class-item box-hover-effect effect1 mb-md-30 bg-lighter">
                                <div class="thumb mb-20" > <img alt="featured project" style="height: 300px" src="<?= $this->request->webroot ?>img/public/homepage_pic/front2.jpg" class="img-responsive img-fullwidth">
                                </div>
                                <div class="content text-left flip p-25 pt-0">
                                    <h4 class="text-uppercase font-weight-800 line-bottom">Medicine Specialist</h4>
                                    <p>Medecine is one of the important part of any treatment. Right time right medecine can save someones life. We have some medecine specialists for your help.</p>
                                    <a href="#" class="btn-read-more btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="class-item box-hover-effect effect1 mb-md-30 bg-lighter">
                                <div class="thumb mb-20" > <img alt="featured project" style="height: 300px" src="<?= $this->request->webroot ?>img/public/homepage_pic/front.jpg" class="img-responsive img-fullwidth"> </div>
                                <div class="content text-left flip p-25 pt-0">
                                    <h4 class="text-uppercase font-weight-800 line-bottom">Neorology Specialist</h4>
                                    <p>A neurologist is a medical doctor who specializes in treating diseases of the nervous system. Preasent days neorological problems one of the mejor desease.</p>
                                    <a href="#" class="btn-read-more btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- section:  -->
    <section class="divider parallax layer-overlay overlay-light-dark" data-bg-img="<?= $this->request->webroot ?>img/public/homepage_pic/bg/bg5.jpg" data-parallax-ratio="0.7">
        <div class="container pt-170 pb-170 pt-sm-100 pb-sm-100">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
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

    <!-- divider: offers -->
    <section id="offers" data-bg-img="<?= $this->request->webroot ?>img/public/homepage_pic/pattern/p8.png">
        <div class="container pb-0">
            <div class="bg-lighter bg-img-right-top sm-no-bg mt-sm-0" data-margin-top="-350px" data-bg-img="<?= $this->request->webroot ?>img/public/homepage_pic/photos/2.png">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1 p-sm-40 pt-sm-0 pt-50 pb-20">
                        <h2 class="title text-uppercase text-theme-colored">Our Happy Clients</h2>
                        <p>Our healed patients praise us for our great treatment, warm services and instant response. We understand the pain and difficulities what going through a patient. That is the reason we can give a perfect treatment to our patients. We provides the suitable treatment process to our patients. Read what says our happy patient about Human-Health-Helpline. </p>

                        <div class="icon-box text-left flip sm-text-center p-0 mt-50 mb-45">
                            <a href="#" class="icon mt-20 mb-30 mr-30 ml-30 pull-left flip sm-pull-none bg-theme-colored rotate">
                                <i class="flaticon-medical-hospital35 text-white no-rotate"></i>
                            </a>
                            <div>
                                <h5 class="icon-box-title mt-15 mb-10"><strong>By Romy Taormina</strong></h5>
                                <q> It's a pleasure to take treatment in EHC and it's team. They are personable, responsive, and results-oriented telemedicine company. EHC Always available for our treatment, extremely knowledgeable </q>
                            </div>
                        </div>

                        <div class="icon-box text-left flip sm-text-center p-0 mb-45">
                            <a href="#" class="icon mt-20 mb-30 mr-30 ml-30 pull-left flip sm-pull-none bg-theme-colored rotate">
                                <i class="flaticon-medical-heart36 text-white no-rotate"></i>
                            </a>
                            <div>
                                <h5 class="icon-box-title mt-15 mb-10"><strong>By Scott Swanson</strong></h5>
                                <q> You all are very good at what you do, and provide exceptional treatment service. The whole treatment process was very smoothly done by your doctors team. Thank you EHC for make me heal </q>
                            </div>
                        </div>

                        <div class="icon-box text-left flip sm-text-center p-0 mb-45">
                            <a href="#" class="icon mt-20 mb-30 mr-30 ml-30 pull-left flip sm-pull-none bg-theme-colored rotate">
                                <i class="flaticon-medical-person278 text-white no-rotate"></i>

                            </a>
                            <div>
                                <h5 class="icon-box-title mt-15 mb-10"><strong>By Moe Ammar</strong></h5>
                                <q> The EHC team has proven to be extremely effective in increasing Urgent Care patient volume. Their expertise in detect desease, choose the treatment process are wonderful and 100% effective in healing process </q>
                            </div>
                        </div>


                        <div class="icon-box text-left flip sm-text-center p-0 mb-45">
                            <a href="#" class="icon mt-20 mb-30 mr-30 ml-30 pull-left flip sm-pull-none bg-theme-colored rotate">
                                <i class="flaticon-medical-mother19 text-white no-rotate"></i>
                            </a>
                            <div>
                                <h5 class="icon-box-title mt-15 mb-10"><strong>By Zia Shapiro</strong></h5>
                                <q> We were highly impressed with the thoroughness of the onsite review and the overall treatment process in-depth assessment. The HHH team was extremely knowledgeable in their areas of expertise </q>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- end main-content -->
<?php

$this->end();
?>