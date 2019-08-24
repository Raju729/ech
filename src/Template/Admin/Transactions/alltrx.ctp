<?php
$this->assign('title','All Transaction');
$this->assign('pagename','All Transaction');
$this->assign('trxmenu','active');
$this->assign('trxmenuopen','menu-open');
$this->assign('trxmenudetails','active');

$this->start('contents');
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">TRANSACTION DATA</h3>
        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table table-bordered p-0">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead style="background-color:#00cc00;color: white">

                    <th>ID</th>
                    <th>PRES ID</th>
                    <th>Pay Method</th>
                    <th>TRX Id</th>
                    <th>Amount</th>
                    <th>Comments</th>
                    <th>Details</th>
                    <th>TRX Status</th>
                    <th>Action</th>
                    </thead>
                    <?php foreach ($alltrx as $u):
                        $p= (object)$u->p;

                        ?>

                        <tr id="tr_<?= ($u->id) ?>">
                            <td><?= $this->Number->format($u->id) ?></td>
                            <td><?= $u->reff_id ?></td>
                            <td><?= $u->pay_method ?></td>
                            <td><?= $u->pay_trx_id?></td>
                            <td><?= $u->amount  ?></td>
                            <td><?= $u->comments  ?></td>
                            <td><?= $u->details ?></td>
                            <td><?php if($u->trx_status == 1){?>
                                    <span   class="text-primary ">Pending</span>

                                <?php }
                                elseif($u->trx_status == 0) { ?>
                                    <span   class="text-warning ">Review</span>
                                <?php }
                                elseif($u->trx_status == 3) { ?>
                                <span   class="text-danger ">Cancelled</span>
                                <?php }

                                elseif($u->trx_status == 2) { ?>
                                <span   class="text-success ">Completed</span>
                                <?php }
                                elseif($u->trx_status == 4) { ?>
                                <span   class="text-danger ">Invalid</span>
                                <?php } ?>
                            </td>
                            <td style="min-width:40px;">
                                <data class="hidden"  ct="<?= ($u->created->format('d-m-Y'))?>" id="<?= ($u->id)?>" pm="<?= ($u->pay_method)?>" tid="<?= $u->pay_trx_id?>" rid="<?= ($u->reff_id) ?>" am="<?= ($u->amount) ?>" tn="<?= ($u->trx_name) ?>" tp="<?= $u->details ?>" mb="<?= $u->modified_by ?>" cb="<?= $u->created_by ?>" uid="<?= $u->created_for ?>">
                                </data>
                                <a id="<?php echo($u->uid) ?>"  class="view" data-toggle="modal" data-target="#modal-view"><span class="fa fa-eye " style="color:purple;margin-right: 5px"></span> </a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
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

<!--view modal-->
<div class="modal fade" id="modal-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="status_change_form" method="post" enctype="multipart/form-data" id="status_change_form">
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
                                    <td ><strong>ID</strong></td>
                                    <td>-</td>
                                    <td><data id="id"></data></td>


                                </tr>
                                <tr>
                                    <td><strong>Assaign Doctor</strong></td>
                                    <td>-</td>
                                    <td><data id="uid"></data></td>
                                </tr>

                                <tr>
                                    <td><strong>Requested By</strong></td>
                                    <td>-</td>
                                    <td><data id="cb"></data></td>
                                </tr>
                                <tr>

                                    <td><strong>Requested Date</strong></td>
                                    <td>-</td>
                                    <td><data id="jd"></data></td>

                                </tr>
                                <tr>
                                    <td><strong>Details</strong></td>
                                    <td>-</td>
                                    <td><data id="tp"></data></td>

                                </tr>
                                <tr>
                                    <td style="min-width: 110px;width: 45%" ><strong>TRX ID</strong></td>
                                    <td>-</td>
                                    <td style="width: 55%"><data id="tid"></data></td>

                                </tr>
                                <tr>
                                    <td><strong>TRX Name</strong></td>
                                    <td>-</td>
                                    <td><data id="tn"></data></td>
                                </tr>
                                <tr>

                                    <td><strong>Amount</strong></td>
                                    <td>-</td>
                                    <td><data id="am"></data></td>

                                </tr>
                                <tr>
                                    <td><strong>Method</strong></td>
                                    <td>-</td>
                                    <td><data style="text-transform: uppercase;" id="pm"></data></td>
                                </tr>

                                <tr>

                                    <td><strong>Status</strong></td>
                                    <td>-</td>

                                    <td><select name="status" id="" class="form-control">
                                            <option value="0">change status</option>
                                            <option value="0">Review</option>
                                            <option value="1">pending</option>
                                            <option value="2">Complete</option>
                                            <option value="3">cancel</option>
                                            <option value="4">Invalid</option>
                                        </select>
                                        <input type="hidden"value="" id="status" name="id">
                                    </td>

                                </tr>
                                <tr>
                                    <td><strong>Comment</strong></td>
                                    <td>-</td>
                                    <td><input type="text" class="form-control" name="comments"></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-left">Submit</button>

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <!--loading modal start-->
    <div class="modal " id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
            <h1>Please Wait</h1>
        </div>
        <div class="modal-body">
            <div id="ajax_loader">
                <img src="<?= $this->request->webroot ?>img/public/please-wait.gif" style="display: block; margin-left: auto; margin-right: auto;">
            </div>
        </div>
    </div>
    <!--loading modal end-->
</div>

<?php $this->end(); ?>
<?php $this->start('script');?>

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
        $("#status").val(id);
        document.getElementById("id").innerHTML=id;
        document.getElementById("uid").innerHTML=uid;
        document.getElementById("am").innerHTML=am;
        document.getElementById("pm").innerHTML=pm;
        document.getElementById("tp").innerHTML=tp;
        document.getElementById("tn").innerHTML=tn;
        document.getElementById("cb").innerHTML=cb;
        document.getElementById("jd").innerHTML=ct;
        document.getElementById("tid").innerHTML=tid;
//        document.getElementById("rid").innerHTML=rid;
//        document.getElementById("rn").innerHTML=rn;



    });
    $("#status_change_form").submit(function(e) {
        e.preventDefault();
        $('#pleaseWaitDialog').modal();
        var data = $("#status_change_form").serialize();
        var url =$('meta[name="baseurl"]').attr('url');
        url = url+"admin/transactions/ajax?op=updatetrx";
        console.log(url);
        console.log(data);
        $.ajax({
            url:url,
            type: "POST",
            data:data,
            dataType: "json",
            success: function(obj){
                console.log(obj);
                $('#modal-view').modal('hide');
                $('#pleaseWaitDialog').modal('hide');
                FlashStatus(obj.status,obj.response);
            }
        });

    });


</script>

<?php $this->end();?>


