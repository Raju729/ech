 <?php

$this->start('contents');
?>

 <style>

.info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 2px;
    margin-bottom: 15px;
        border: 1px solid gainsboro;

}
.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    color:white;
}
.info-box-text{
    text-transform: uppercase;
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding-top:1em;
}
.info-box-number{font-size: 2em;}
.bg-aqua{background-color: #00c0ef !important;}
.bg-green{background-color: #00a65a !important;color:white!important;}
.bg-blue{background-color: #00A4EF !important;}
.bg-red{background-color: #D33C44 !important;}
.bg-yellow{    background-color: #f39c12 !important;color:white!important;}

</style>

<!-- Start main-content -->
<div class="main-content" >
  <!-- Section: departments -->
  <section style="padding-top:3rem;padding-bottom:3rem;background-image: url(http://www.codexwp.com/wp-content/uploads/2018/01/pattern1.png);">    
    <div class="container effect7" style=" background-color:white;">
      <div class="section-title ">
        <div class="row">



          <div class="col-md-12 text-center">
            <h2 class="title text-uppercase">Account<span class="text-black font-weight-300"> Summary</span></h2>
            <p class="text-uppercase letter-space-4">Here is the short summary of your accounts.</p>
            <br>
              <?php
              $session = $this->request->session();
              $user = $session->read('Auth.User');
              if($user['type'] == 3){?>
                  <div class="row mb-20">

                      <div class="separator">
                          <span><strong>Balance</strong></span>
                      </div>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="info-box">
                              <span class="info-box-icon bg-blue"><i class="fa fa-money"></i></span>

                              <div class="info-box-content">
                                  <span class="info-box-text">Balance</span>
                                  <span class="info-box-number"><?= $data['balance'] ?></span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="info-box">
                              <span class="info-box-icon bg-green"><i class="fa fa-signal" aria-hidden="true"></i></span>

                              <div class="info-box-content">
                                  <span class="info-box-text">Income</span>
                                  <span class="info-box-number"><?= $data['income']?></span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>
                      <!-- /.col -->

                      <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="info-box">
                              <span class="info-box-icon bg-yellow"><i class="fa fa-krw" aria-hidden="true"></i></span>

                              <div class="info-box-content">
                                  <span class="info-box-text">Withdraw</span>
                                  <span class="info-box-number"><?= $data['withdraw']?></span>
                              </div>
                              <!-- /.info-box-content -->
                          </div>
                          <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                  </div>
              <?php }
              ?>



             <div class="row mb-20">
              <div class="separator">
                <span><strong>Prescriptions</strong></span>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-blue"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <span class="info-box-number"><?= $data['total_pres']?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Pending</span>
                    <span class="info-box-number"><?= $data['pending_pres']?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-yellow"><i class="fa fa-heart-o" aria-hidden="true"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Complete</span>
                    <span class="info-box-number"><?= $data['complete_pres']?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>


            <div class="row mb-20">
              <div class="separator">
                <span><strong>Recent Prescriptions</strong></span>
              </div>
              <div class="col-md-12">
              <table class="table table-bordered table-responsive">
                    <thead class="bg-green text-center" style="background-color:#00A4EF">
                      <th>Pres ID</th>
                      <th>Patient Name</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Contact</th>
                    </thead>
                    <tbody>
                    <?php

                        foreach ($data['recent_pres'] as $pr){
                        $p = json_decode($pr->pid_info);
                    ?>
                     <tr>
                         <td><?=$pr->pres_id?></td>
                       <td><?=$p->f_name. $p->l_name ?></td>
                       <td><?=$p->age ?></td>
                       <td><?=$p->gender ?></td>
                       <td>
                         <i id="show_contact" skype="live:444" mobile="0154285455" whatsapp="0154" imo="51454" viber="554" data-toggle="modal" data-target="#patient-contact" class="fa fa-info-circle" aria-hidden="true"></i>
                       </td>
                    </tr>
                    <?php  } ?>
                    </tbody>                    
                </table>
              </div>
            </div>

            <div class="row mb-20">
              <div class="separator">
                <span><strong>Recent Transactions</strong></span>
              </div>
              <div class="col-md-12">
              <table class="table table-bordered table-responsive">
                    <thead class="bg-yellow text-center" style="background-color:#00A4EF">
                      <th>Date</th>
                      <th>Trx ID</th>
                      <th>Description</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data['recent_trans'] as $u){

                    ?>
                    <tr>
                       <td><?= $u->created ?></td>
                       <td><?= $u->details  ?></td>
                       <td><?= $u->pay_method?></td>
                       <td><?= $u->amount  ?></td>
                       <td>   <?php
                           if($u->trx_status == 1)
                               echo '<p class="text-success">Complete</p>';
                           else if($u->trx_status == 2)
                               echo  '<p class="text-danger">Cancelled</p>';
                           else
                               echo  '<p class="text-warning">Pending</p>';
                           ?></td>
                    </tr>
                    <?php } ?>


                    </tbody>
                </table>
              </div>
            </div>


  			  </div>





        </div>
      </div>
    </div>
  </section>
    <!-- stat patient contact modal -->
    <div id ="patient-contact" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contact</h4>
                </div>
                <div class="modal-body">

                    <div class="widget">
                        <ul class="list-divider list-border list check pl-10 pr-10">
                            <li><i class="fa fa-phone-square mr-10" aria-hidden="true"></i> Mobile : <data id="pat_mobile">d</data></li>
                            <li><i class="fa fa-skype mr-10" aria-hidden="true"></i>Skype : <data id="pat_skype">d</data></li>
                            <li><i class="fa fa-whatsapp mr-10" aria-hidden="true"></i>WhatsApp : <data id="pat_whatsapp"></data></li>
                            <li><i class="fa fa-commenting-o mr-10" aria-hidden="true"></i>Imo : <data id="pat_imo"></data></li>
                            <li><i class="fa fa-commenting-o mr-10" aria-hidden="true"></i>Viber : <data id="pat_imo"></data></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end patient contact modal -->
</div>
<!-- end main-content -->

<?php
$this->end();
?>