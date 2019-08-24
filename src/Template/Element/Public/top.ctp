
<div class="header-top sm-text-center bg-theme-colored">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <nav>
                    <?php
                    $session = $this->request->getSession();
                    $info = $session->read('Auth.Info');

                    ?>
                    <ul class="list-inline sm-text-center text-left flip mt-5">
                     <?php if(isset($info)){?>
                         <li><i class="fa fa-user-md text-white" aria-hidden="true"></i>  <a class="text-white" href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'profile']);?>">Logged as <span ><b><?=$info->f_name."&nbsp". $info->l_name ?></b></span></a> </li>
                        <li class="text-white">|</li>
                        <li><i class="fa fa-sign-out text-white" aria-hidden="true"></i> <a class="text-white" href="<?=$this->URL->build(['controller'=>'Authexs','action'=>'logout'])  ?>">Logout</a> </li>
                    <?php }else{ ?>
                        <li><i class="fa fa-sign-in text-white" aria-hidden="true"></i> <a class="text-white" href="<?=$this->URL->build(['controller'=>'Authexs','action'=>'login'])  ?>">Sign In</a> </li>
                        <li class="text-white">|</li>
                        <li><i class="fa fa-user-plus text-white" aria-hidden="true"></i> <a class="text-white" href="<?=$this->URL->build(['controller'=>'Authexs','action'=>'register'])  ?>">Register</a> </li>
                       <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="widget m-0 mt-5 no-border">
                    <ul class="list-inline text-right sm-text-center">
                        <li class="pl-10 pr-10 mb-0 pb-0">
                            <div class="header-widget text-white"><i class="fa fa-phone"></i> 0170000000</div>
                        </li>
                        <li class="pl-10 pr-10 mb-0 pb-0">
                            <div class="header-widget text-white"><i class="fa fa-envelope-o"></i> ehc@afia.com </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 text-right flip sm-text-center">
                <div class="widget m-0">
                    <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm">
                        <li class="mb-0 pb-0"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="mb-0 pb-0"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="mb-0 pb-0"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="mb-0 pb-0"><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>