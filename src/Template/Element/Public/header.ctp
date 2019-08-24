<?php
    $session = $this->request->getSession();
    $info = $session->read('Auth.Info');
    $user = $session->read('Auth.User');
?>
<style>.menuzord{font-family:unset !important;}</style>
<div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed bg-lighter">
        <div class="container">
            <nav id="menuzord-right" class="menuzord orange no-bg"> <a class="menuzord-brand pull-left flip" href="<?=$this->Url->build(['controller' => 'Home', 'action' => 'home'])?>"></a>
                
                <ul class="menuzord-menu pull-right">

                <?php  if(isset($info)){ ?>

                    <li class="<?= $this->fetch('doctor') ?>"><a href="<?= $this->Url->build(['controller' => 'Doctors', 'action' => 'doctorList']) ?>">Our Doctors</a></li>

                    <li class="<?= $this->fetch('message') ?>"><a href="<?= $this->Url->build(['controller' => 'Messages', 'action' => 'showconv']) ?>">Messages<span rid="<?=$info->uid?>" id="msgcount" class="badge ml-5 text-red"></span></a></li>



                    <li class="<?= $this->fetch('pres') ?>"><a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescriptionList']) ?>">Prescriptions</a>
                        
                        <ul class="dropdown" style="right: auto; display: none;">
                          <li><a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescriptionList']);?>">All</a></li>
                          <li><a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescriptionList','?'=>['op'=>'pending']]);?>">Pending</a></li>
                          <li><a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescriptionList','?'=>['op'=>'complete']]);?>">Complete</a></li>
                          <li><a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescriptionList','?'=>['op'=>'cancel']]);?>">Cancel</a></li>                         
                        </ul>
                    </li>

                    <?php  if(isset($user)&& $user['type']==3 ){ ?>
                        <li class="<?= $this->fetch('bil') ?>"><a href="">Billing</a>

                            <ul class="dropdown" style="right: auto; display: none;">
                                <li><a href="<?= $this->Url->build(['controller' => 'Transactions', 'action' => 'transactions']);?>">Transactions</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Statements', 'action' => 'statements']);?>">Statements</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'Transactions', 'action' => 'withdraw']);?>">Request Withdraw</a></li>
                            </ul>
                        </li>

                        <?php } else{ ?>
                        <li><a href="<?= $this->Url->build(['controller' => 'Transactions', 'action' => 'transactions']);?>">Transactions</a></li>

                        <?php }?>



                    <li class="<?= $this->fetch('prof') ?>"><a href="">Profile</a>
                        
                        <ul class="dropdown" style="right: auto; display: none;">
                            <li><a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'dashboard']);?>">Summary</a></li>
                          <li><a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'profile']);?>">My Profile</a></li>
                          <li><a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'profile']);?>">Change Password</a></li>
                          <li><a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'activity']);?>">Activity Log</a></li>                                                
                        </ul>
                    </li>
  

                <?php }else{?>

                    <li class="<?= $this->fetch('home') ?>"><a href="<?=$this->Url->build(['controller' => 'Home', 'action' => 'home'])?>">Home</a></li>                    
                    <li class="<?= $this->fetch('doctor') ?>"><a href="<?= $this->Url->build(['controller' => 'Doctors', 'action' => 'doctorList']) ?>">Our Doctors</a></li>
                    <li class=""><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'gallery']) ?>">Gallery</a></li>
                    <li class=""><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']) ?>">About</a></li>
                    <li class="<?= $this->fetch('contact') ?>"><a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']) ?>">Contact</a></li> 

                <?php }   ?>              
                </ul>
            </nav>
        </div>
    </div>
</div>