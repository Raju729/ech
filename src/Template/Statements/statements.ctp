<?php

$this->assign('bil','active');
$this->start('topscript');
echo $this->Html->script('public/stepselect.js');
echo  $this->Html->script('public/prescribe.js');
$this->end();


$this->start('contents');

?>
    <style>
        /*==================================================
       * Effect 7
       * ===============================================*/
        .effect7{position:relative;-webkit-box-shadow:0 1px 4px rgba(0,0,0,.3),0 0 5px rgba(0,0,0,.1) inset;-moz-box-shadow:0 1px 4px rgba(0,0,0,.3),0 0 5px rgba(0,0,0,.1) inset;box-shadow:0 1px 4px rgba(0,0,0,.3),0 0 5px rgba(0,0,0,.1) inset}.effect7:after,.effect7:before{content:"";position:absolute;z-index:-1;-webkit-box-shadow:0 0 20px rgba(0,0,0,.8);-moz-box-shadow:0 0 20px rgba(0,0,0,.8);box-shadow:0 0 20px rgba(0,0,0,.8);top:0;bottom:0;left:10px;right:10px;-moz-border-radius:100px/10px;border-radius:100px/10px}.effect7:after{right:10px;left:auto;-webkit-transform:skew(8deg) rotate(3deg);-moz-transform:skew(8deg) rotate(3deg);-ms-transform:skew(8deg) rotate(3deg);-o-transform:skew(8deg) rotate(3deg);transform:skew(8deg) rotate(3deg)}.stepwizard-step p{margin-top:10px}.stepwizard-row{display:table-row}.stepwizard{display:table;width:100%;position:relative}.stepwizard-step button[disabled]{opacity:1!important;filter:alpha(opacity=100)!important}.stepwizard-row:before{top:14px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0;left:0}.stepwizard-step{display:table-cell;text-align:center;position:relative}.btn-circle{width:30px;height:30px;text-align:center;padding:6px 0;font-size:12px;line-height:1.428571429;border-radius:15px}label{padding-top:10px}
    </style>

    <!-- Start main-content -->
    <div class="main-content" >
        <!-- Section: departments -->
        <section style="padding-top:3rem;padding-bottom:3rem;background-image: url(http://www.codexwp.com/wp-content/uploads/2018/01/pattern1.png);">
            <div class="container effect7" style=" background-color:white;">
                <div class="section-title ">
                    <div class="row">



                        <div class="col-md-12 text-center">
                            <h2 class="title text-uppercase">ALL <span class="text-black font-weight-300">Statement</span></h2>
                            <p class="text-uppercase letter-space-4">Check your Transaction Statement from here</p>
                            <br>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-primary" style="background-color:#00A4EF">
                                <th class=" text-center">Date</th>
                                
                                <th class=" text-center">TRX ID</th>
                                <th class=" text-center">Status</th>
                                <th class=" text-center">Type</th>
                                <th class=" text-center">Amount</th>
                                <th class=" text-center">Balance</th>
                                </thead>
                                <tbody>
                                <?php                                
                                foreach ($states as $state)
                                { ?>

                                    <tr>
                                        <td><?=$state->created?></td>                                                                         
                                        <td><?=$state->tr_id?></td>
                                        <td><?=$state->status?></td>
                                        <td><?=$state->type?></td>
                                        <td><?=$state->amount?></td>
                                        <td>
                                            <?=$state->cur_bal?></i>
                                        </td>

                                    </tr>

                                <?php }?>
                                </tbody>
                            </table>
                        </div>

                            <style>
                                .card-footer .page-item.active .page-link{background-color: #28a745 !important;border-color: #007bff !important;}
                            </style>
                            <?php
                            $this->Paginator->setTemplates(['prevActive' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                            $this->Paginator->setTemplates(['prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                            $this->Paginator->setTemplates(['number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                            $this->Paginator->setTemplates(['current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                            $this->Paginator->setTemplates(['nextActive' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                            $this->Paginator->setTemplates(['nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>']);
                            ?>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        <?= $this->Paginator->prev('< ' . __('prev')) ?>
                                        <?= $this->Paginator->numbers() ?>
                                        <?= $this->Paginator->next(__('next') . ' >') ?>
                                    </ul>
                                </nav>
                                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
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