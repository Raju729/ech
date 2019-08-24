<?php

$this->assign('title','All Patients');
$this->assign('pagename','All Patient');
$this->assign('patientmenu','active');
$this->assign('patientmenuopen','menu-open');
$this->assign('patientmenudetails','active');
$this->start('meta');
?>
<meta name="ajax" url="<?=$this->Url->build(["controller" => "Patients",
    "action" => "ajax"]);?>">

<?php
$this->end();
$this->start('contents');
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">PATIENTS DATA</h3>
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
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Occupation</th>
                    <th>Phone</th>
                    <th>Marrital Status</th>
                    <th>Action</th>
                    </thead>
                    <?php foreach ($patients as $u):?>
                        
                        <tr id="tr_<?= ($u->pid) ?>">
                            <td><?= $this->Number->format($u->pid) ?></td>
                            <td><?= ($u->f_name. $u->l_name) ?></td>
                            <td><?php if($u->gender == 'M'){?>
                                    <span class="">Male</span>

                                <?php }
                                else { ?>
                                    <span class="">Female</span>
                                <?php } ?></td>
                            <td><?= ($u->occupation) ?></td>
                            <td><?= $u->mobile ?></td>
                            <td><?php if($u->m_status == 'M'){?>
                                    <span class="">Married</span>

                                <?php }
                                else { ?>
                                    <span class="">Unmarried</span>
                                <?php } ?></td>
                            <td style="min-width:140px;">
                                <data class="hidden"  jd="<?= ($u->created->format('d-m-Y'))?>" uid="<?= ($u->pid)?>" fn="<?= ($u->f_name)?>" ln="<?= ($u->l_name) ?>" oc="<?= $this->Public->OCCUPATION[$u->occupation]?>"mb="<?= ($u->mobile) ?>" ag="<?= ($u->age) ?>" db="<?= $u->dob ?>" gn="<?=$this->Public->GENDER[$u->gender]?>"rl="<?=$this->Public->RELIGION[$u->religion]?>" nd="<?= $u->nid ?>" ad="<?= $u->address ?>"pic="<?= $u->thumb_url ?>">
                                </data>
                                <a id="<?php echo($u->pid) ?>"  class="view" data-toggle="modal" data-target="#modal-view"><span class="fa fa-eye " style="color:purple;margin-right: 5px"></span> </a>|
                                <a id="<?= ($u->pid) ?>" class="edit" data-toggle="modal" data-target="#modal-edit"><span class=" fa fa-pencil-square-o " style="color: green;margin: 5px"></span> </a>|
                                <a id="<?php echo($u->pid); ?>" href="#"  class="delete"><span class="fa fa-trash " style="color: red;margin: 5px"></span> </a>

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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-success"> patient Edit (<data id="pid"></data>)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body border m-4 p-4">
                <div class="row">

                </div>
                <style>.input-group-text{min-width: 40px !important;}</style>
                <form name=" " id="patient_update_form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="uploadsingleimg">
                                    <div class="col-lg-4 col-md-6 col-sm-12 border p-1 mb-4">
                                        <img id="myphoto" src="" alt="Enterpreneur" style="width: 100%;"><input name="thumb_url" type="hidden">
                                    </div>
                                    <div class="progress mb-2 mt-2">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%">0%</div>
                                    </div>
                                    <input type="file" name="uploadfile" style="display:none">
                                    <button id="uploadbutton" type="button" class="btn btn-default" >Upload/Change</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="f_name" id="f_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="l_name"  id="l_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>DOB</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control"  name="dob" id="dob">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="address"  id="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="mobile"  id="mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="age"  id="age">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>NID</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-id-card" aria-hidden="true">
                                            </i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nid"  id="nid">
                                </div>
                            </div>


                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success pull-left">Update</button>
                <button type="cancel" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!--view modal-->
<div class="modal fade" id="modal-view">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-success"> Patient View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body border m-4 p-4">
                <div class="row">
                    <div class=" col-lg-4 col-md-6 col-sm-12 border p-1 mb-4">
                        <img id="patient_pic" src="" alt="Doctor" style="width: 100%; " >
                    </div>

                    <div class="clearfix"></div> <div class=" col-lg-1 col-md-1"></div>

                    <div class=" col-lg-7 col-md-5 mb-4">
                        <strong class="border-bottom text-success"><data id="name"></data></strong>
                        <ul style="list-style-type: circle;">
                            <li><data id="oc"></data></li>
                            <li><data id="mb"></data></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-condensed table-responsive">
                            <tbody>
                            <tr>
                                <td style="min-width: 110px;"><strong>ID</strong></td>
                                <td>-</td>
                                <td><data id="uid"></data></td>
                            </tr>
                            <tr>
                                <td><strong>Date Of Birth</strong></td>
                                <td>-</td>
                                <td><data id="db"></data></td>
                            </tr>
                            <tr>
                                <td><strong>Gender</strong></td>
                                <td>-</td>
                                <td><data id="gn"></data></td>
                            </tr>
                            <tr>
                                <td><strong>Age</strong></td>
                                <td>-</td>
                                <td><data id="ag"></data></td>
                            </tr>
                            <tr>
                                <td><strong>Religion</strong></td>
                                <td>-</td>
                                <td><data id="rl"></data></td>
                            </tr>
                            <tr>
                                <td><strong>NID</strong></td>
                                <td>-</td>
                                <td><data id="nd"></data></td>
                            </tr>
                            <tr>
                                <td><strong>Address</strong></td>
                                <td>-</td>
                                <td><data id="ad"></data></td>
                            </tr>
                            <tr>
                                <td><strong>Joined Date</strong></td>
                                <td>-</td>
                                <td><data id="jd"></data></td>
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
    $(document).on('click',"a.delete",function(){
        var id = $(this).attr('id');
        var tr= $('#tr_'+id);
        var url =$('meta[name="ajax"]').attr('url');
        url = url+"?op=delete&id="+id;
        console.log(url);
        if(confirm("Are you sure?")){
            $.ajax({
                url:url,
                type: "GET",
                dataType: "JSON",
                success: function(obj){
                    console.log(obj);
                    if(obj.status=="success")
                        tr.remove();
                    FlashStatus(obj.status,obj.response);
                }
            });
        }
    });

    $("#patient_update_form").submit(function(e) {
        e.preventDefault();

        var id = $("#pid").text();

        var data = $("#patient_update_form").serialize();
        var url =$('meta[name="ajax"]').attr('url');
        url = url+"?op=update&id="+id;
         console.log(data);console.log(url);

        $.ajax({
            url:url,
            type:"GET",
            data:data,
            dataType:"JSON",
            success: function(obj){
                console.log(obj);
                FlashStatus(obj.status,obj.response);
            }
        });

    });


    $(document).on('click',"a.view",function(){

        var uid = $(this).siblings("data.hidden").attr('uid');

        var jd = $(this).siblings("data.hidden").attr('jd');
        var fn = $(this).siblings("data.hidden").attr('fn');
        var ln = $(this).siblings("data.hidden").attr('ln');
        var db = $(this).siblings("data.hidden").attr('db');
        var gn = $(this).siblings("data.hidden").attr('gn');
        var ag = $(this).siblings("data.hidden").attr('ag');
        var mb = $(this).siblings("data.hidden").attr('mb');
        var rl = $(this).siblings("data.hidden").attr('rl');
        var nd = $(this).siblings("data.hidden").attr('nd');
        var ad = $(this).siblings("data.hidden").attr('ad');
        var oc = $(this).siblings("data.hidden").attr('oc');
        var pic = $(this).siblings("data.hidden").attr('pic');


        document.getElementById("name").innerHTML=fn+'&nbsp'+ln;
        document.getElementById("uid").innerHTML=uid;
        document.getElementById("db").innerHTML=db;
        document.getElementById("gn").innerHTML=gn;
        document.getElementById("ag").innerHTML=ag;
        document.getElementById("mb").innerHTML=mb;
        document.getElementById("rl").innerHTML=rl;
        document.getElementById("nd").innerHTML=nd;
        document.getElementById("ad").innerHTML=ad;
        document.getElementById("oc").innerHTML=oc;
        document.getElementById("jd").innerHTML=jd;
        if(pic == ""){
            document.getElementById("patient_pic").src="<?php echo $this->request->webroot;?>img/no-image.png";
        }
        else{
            document.getElementById("patient_pic").src="<?php echo $this->request->webroot ?>img/"+pic;

        }


    });


    $(document).on('click',"a.edit",function(){

        var uid = $(this).siblings("data.hidden").attr('uid');
        var fn = $(this).siblings("data.hidden").attr('fn');
        var ln = $(this).siblings("data.hidden").attr('ln');
        var db = $(this).siblings("data.hidden").attr('db');
        var ag = $(this).siblings("data.hidden").attr('ag');
        var mb = $(this).siblings("data.hidden").attr('mb');
        var nd = $(this).siblings("data.hidden").attr('nd');
        var ad = $(this).siblings("data.hidden").attr('ad');
        var pic = $(this).siblings("data.hidden").attr('pic');
        document.getElementById("pid").innerHTML=uid;
        document.getElementById("f_name").value=fn;
        document.getElementById("l_name").value=ln;
        document.getElementById("address").value=ad;
        document.getElementById("mobile").value=mb;
        document.getElementById("age").value=ag;
        document.getElementById("dob").value=db;
        document.getElementById("nid").value=nd;
        if(pic == ""){
            document.getElementById("myphoto").src="<?php echo $this->request->webroot;?>img/no-image.png";
        }
        else{
            document.getElementById("myphoto").src="<?php echo $this->request->webroot ?>img/"+pic;

        }




    });

</script>

<?php $this->end(); ?>


