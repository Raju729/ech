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



                        <div class="col-md-12 text-center table-responsive">
                            <h2 class="title text-uppercase">All <span class="text-black font-weight-300">Transactions</span></h2>
                            <p class="text-uppercase letter-space-4">Check your All Transaction now.</p>
                            <br>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-primary text-center" style="background-color:#00A4EF">
                                <th>ID</th>
                                <th>Date</th>                                
                                <th>Description</th>
                                <th>Pay Method</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Details</th>
                                </thead>
                                <tbody>
                                <?php $id = 0;
                                foreach ($tran as $u): $id++;
                                    ?>

                                    <tr id="tr_<?= $id ?>">
                                        <td><?= $id ?></td>
                                        <td><?= $u->created ?></td>
                                        <td><?= $u->details  ?></td>
                                        <td><?= $u->pay_method?></td>
                                        <td><?= $u->amount  ?></td>
                                        <td>
                                            <?php
                                            if($u->trx_status == 1)
                                                echo '<p class="text-success">Complete</p>';
                                            else if($u->trx_status == 2)
                                                echo  '<p class="text-danger">Cancelled</p>';
                                            else
                                                echo  '<p class="text-warning">Pending</p>';
                                            ?>
                                        </td>
                                        <td style="min-width:40px;">
                                            <data class="hidden"  ct="<?= ($u->created->format('d-m-Y'))?>" id="<?= ($u->id)?>" pm="<?= ($u->pay_method)?>" tid="<?= $u->pay_trx_id?>" rid="<?= ($u->reff_id) ?>" am="<?= ($u->amount) ?>" tn="<?= ($u->trx_name) ?>" tp="<?= $u->type ?>" mb="<?= $u->modified_by ?>" cb="<?= $u->created_by ?>" uid="<?= $u->uid ?>">
                                            </data>
                                            <a id="<?php echo($u->uid) ?>"  class="view" data-toggle="modal" data-target="#modal-view"><span class="fa fa-eye " style="color:purple;margin-right: 5px"></span>View</a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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

        <!--view modal-->
        <div class="modal fade" id="modal-view">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-success">  View Transaction</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body border m-4 p-4">
                        <div class="row">


                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-condensed table-responsive">
                                    <tbody>
                                    <tr>
                                        <td ><strong>TRX ID</strong></td>
                                        <td>-</td>
                                        <td><data id="tid"></data></td>
                                        <td><strong>Pay Method</strong></td>
                                        <td>-</td>
                                        <td><data id="pm"></data></td>
                                    </tr>
                                    <tr>
                                        <td ><strong>ID</strong></td>
                                        <td>-</td>
                                        <td><data id="id"></data></td>
                                        <td><strong>Req Doctor</strong></td>
                                        <td>-</td>
                                        <td><data id="uid"></data></td>

                                    </tr>
                                    <tr>

                                        <td><strong>Amount</strong></td>
                                        <td>-</td>
                                        <td><data id="am"></data></td>
                                        <td><strong>Created By</strong></td>
                                        <td>-</td>
                                        <td><data id="cb"></data></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Type</strong></td>
                                        <td>-</td>
                                        <td><data id="tp"></data></td>
                                        <td><strong>TRX Name</strong></td>
                                        <td>-</td>
                                        <td><data id="tn"></data></td>
                                    </tr>
                                    <tr>

                                        <td><strong>Requested Date</strong></td>
                                        <td>-</td>
                                        <td><data id="jd"></data></td>

                                    </tr>
                                    <tr>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="cancel" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <script>
            $("i#show_contact").click(function(){

            });
        </script>


    </div>
    <!-- end main-content -->

<?php
$this->end();
$this->start('bottomscript');
?>
<script>
    $(document).on('click',"a.view",function(){
        var id = $(this).siblings("data.hidden").attr('id');
        var uid = $(this).siblings("data.hidden").attr('uid');
        var am = $(this).siblings("data.hidden").attr('am');
        var pm = $(this).siblings("data.hidden").attr('pm');
        var rid = $(this).siblings("data.hidden").attr('rid');
        var tid = $(this).siblings("data.hidden").attr('tid');
        var cb = $(this).siblings("data.hidden").attr('cb');
        var dt = $(this).siblings("data.hidden").attr('dt');
        var tn = $(this).siblings("data.hidden").attr('tn');
        var rn = $(this).siblings("data.hidden").attr('rn');
        var tp = $(this).siblings("data.hidden").attr('tp');
        var ct = $(this).siblings("data.hidden").attr('ct');
        var mb = $(this).siblings("data.hidden").attr('mb');
        // var pic = $(this).siblings("data.hidden").attr('pic');
        console.log(uid);
        document.getElementById("id").innerHTML=am;
        document.getElementById("uid").innerHTML=uid;
        document.getElementById("am").innerHTML=am;
        document.getElementById("pm").innerHTML=pm;
        document.getElementById("tp").innerHTML=tp;
        document.getElementById("tn").innerHTML=tn;
        document.getElementById("cb").innerHTML=cb;
        document.getElementById("jd").innerHTML=ct;
        document.getElementById("tid").innerHTML=tid;
        document.getElementById("rid").innerHTML=rid;
        document.getElementById("dt").innerHTML=dt;
        document.getElementById("rn").innerHTML=rn;



    });
</script>

<?php $this->end();?>
