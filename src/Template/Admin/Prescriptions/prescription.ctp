<?php
if(isset($active['r'])) $review= $active['r'];
if(isset($active['p'])) $pending= $active['p'];
if(isset($active['c'])) $complete= $active['c'];
if(isset($active['cn'])) $cancel= $active['cn'];
$this->assign('title','All Prescriptions');
$this->assign('pagename',' Prescriptions');
$this->assign('presmenu','active');
$this->assign('presmenuopen','menu-open');
$this->assign('presmenureview',$review);
$this->assign('presmenupending',$pending);
$this->assign('presmenucomplete',$complete);
$this->assign('presmenucancel',$cancel);

$this->start('contents');
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Prescription DATA</h3>
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

                    <th>Pres ID</th>
                    <th>Member Id</th>
                    <th>Doctor Id</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <?php
                    foreach ($pres as $pr):
                    $p = json_decode($pr->pid_info);
                    ?>
                        <tr id="tr_<?= ($pr->id) ?>">
                            <td><?=$pr->pres_id?></td>
                            <td><?=$pr->eid?></td>
                            <td><?=$pr->did?></td>
                            <td><?=$p->f_name. $p->l_name ?></td>
                            <td><?=$p->age ?></td>
                            <td><?=$p->gender ?></td>
                            <td><?php if($pr->status == 0){?>
                                    <span> In Review</span>
                                <?php } ?>
                                <?php if($pr->status == 1){?>
                                    <span>Pending</span>
                                <?php } ?>
                                <?php if($pr->status == 2){?>
                                    <span class="text-success"> Completed</span>
                                <?php } ?>
                                <?php if($pr->status == 3){?>
                                    <span class="text-danger"> Cancelled</span>
                                <?php } ?>
                            </td>
                            <td style="min-width:40px;">
                                <a id="<?php echo($pr->pres_id) ?>"  class="view" data-toggle="modal" data-target="#modal-view"><span class="fa fa-eye " style="cursor: pointer;color:purple;margin-right: 5px"></span> </a>|
                                <a id="<?php echo($pr->pres_id) ?>"  class="edit" data-toggle="modal" data-target="#modal-edit"><span class="fa fa-edit " style="cursor: pointer; color:green;margin-right: 5px"></span> </a>

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
<!--edit modal-->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form id="status_change_form" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title text-success"> Status Review</h4>
                </div>
                        <div class="modal-body border m-4 p-4">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Change Status:</label>
                                    <select id="status"name="status" class="form-control">
                                        <option>****</option>
                                        <option value="1">Pending</option>
                                        <option value="3">Cancel</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-left" >Submit</button>
                    <button type="cancel" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--end edit modal-->

<!--view modal-->
<div class="modal fade" id="modal-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-success">  View Request</h4>
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
                                <td style="min-width: 110px;" ><strong>Pres id</strong></td>
                                <td>-</td>
                                <td><data id="tid">312</data></td>
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

<?php $this->end(); ?>
<?php $this->start('script');?>

<script>
    $("#status_change_form").submit(function(e) {
        e.preventDefault();
        var id = $('a.edit').attr('id');
        var data = $("#status_change_form").serialize();
        var url =$('meta[name="baseurl"]').attr('url');
        url = url+"admin/prescriptions/updatestatus?id="+id;
        console.log(url);
        console.log(data);
        $.ajax({
            url:url,
            type: "GET",
            data:data,
            dataType: "json",
            success: function(obj){
                console.log(obj);
                FlashStatus(obj.status,obj.response);
            }
        });

    });


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


