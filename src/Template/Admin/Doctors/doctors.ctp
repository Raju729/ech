<?php

$this->assign('title','All Doctors');
$this->assign('pagename','All Doctors');
$this->assign('doctormenu','active');
$this->assign('doctormenuopen','menu-open');
$this->assign('doctormenudetails','active');
$this->start('meta');
?>
<meta name="ajax" url="<?=$this->Url->build(["controller" => "Doctors",
    "action" => "ajax"]);?>">

<?php
$this->end();
$this->start('contents');
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">DOCTORS DATA</h3>
        <div class="card-tools">
            <form id="" action="/admin/doctors" method="get" class="doctor-search-form">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="doc_src_name" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
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
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <?php foreach ($doctors as $u):
                        $p= (object)$u->p;


                        ?>

                        <tr id="tr_<?= ($u->uid) ?>">
                            <td><?= $this->Number->format($u->uid) ?></td>
                            <td><?= ($p->f_name. $p->l_name) ?></td>
                            <td><?= ($u->username) ?></td>
                            <td><?= ($u->email) ?></td>
                            <td><?= $p->mobile ?></td>
                            <td><?php if($u->user_active == 1){?>
                                    <button class="btn btn-sm btn-success">active</button>

                                <?php }
                                else { ?>
                                    <button class="btn btn-sm btn-warning">pending</button>
                                <?php } ?></td>
                            <td style="min-width:140px;">
                                <data class="hidden"  jd="<?= ($u->created->format('d-m-Y'))?>" uid="<?= ($u->uid)?>" fn="<?= ($p->f_name)?>" ln="<?= ($p->l_name) ?>" un="<?= ($u->username) ?>" em="<?= ($u->email) ?>" dg="<?= ($p->degree) ?>" mb="<?= $p->mobile ?>"vt="<?= $p->visittime ?>"sp="<?= $p->specialist ?>"cm="<?= $p->chamber ?>"pic="<?= $p->thumb_url ?>">
                                </data>
                                <a id="<?php echo($u->uid) ?>"  class="view" data-toggle="modal" data-target="#modal-view"><span class="fa fa-eye " style="color:purple;margin-right: 5px"></span> </a>|
                                <a id="<?= ($u->uid) ?>" class="edit" data-toggle="modal" data-target="#modal-edit"><span class=" fa fa-pencil-square-o " style="color: green;margin: 5px"></span> </a>|
                                <a id="<?php echo($u->uid); ?>" href="#"  class="delete"><span class="fa fa-trash " style="color: red;margin: 5px"></span> </a>

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
            <form name=" " id="doc_update_form" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h4 class="modal-title text-success"> Doctor Edit (<data id="uid"></data>)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body border m-4 p-4">
                <div class="row">
                    <div class="uploadsingleimg">
                        <div class="col-lg-4 col-md-6 col-sm-12 border p-1 mb-4">

                            <img id="myphoto" src="<?= $this->request->webroot ;?>img/no-image.png" alt="Enterpreneur" style="width: 100%;"><input name="thumb_url" type="hidden">
                        </div>
                        <div class="progress mb-2 mt-2">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%">0%</div>
                        </div>
                        <input type="file" name="uploadfile" style="display:none">
                        <button id="uploadbutton" type="button" class="btn btn-default" >Upload/Change</button>
                    </div>
                </div>
                <style>.input-group-text{min-width: 40px !important;}</style>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Change Status</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                                    </div>
                                    <select name="user_active"class="form-control">
                                        <option value="">select status</option>
                                        <option value="0">pending</option>
                                        <option value="1">Active</option>

                                    </select>
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
                                <label>User Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control"  name="username" id="username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="password"  id="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="email"  id="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-volume-control-phone" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="mobile"  id="mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Degree</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user " aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="degree"  id="degree" placeholder="MBBS,FCPS,PHD">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chamber</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="chamber"  id="chamber">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Visittime</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="visittime"  id="visittime">
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
                <h4 class="modal-title text-success"> Doctor View</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body border m-4 p-4">
                <div class="row">
                    <div class=" col-lg-4 col-md-6 col-sm-12 border p-1 mb-4">
                        <img id="doctor_pic" src="" alt="Doctor" style="width: 100%; " ">
                    </div>

                    <div class="clearfix"></div> <div class=" col-lg-1 col-md-1"></div>

                    <div class=" col-lg-7 col-md-5 mb-4">
                        <strong class="border-bottom text-success"><data id="name"></data></strong>
                        <ul style="list-style-type: circle;">
                            <li><data id="em"></data></li>
                            <li><data id="mb"></data></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-condensed table-responsive">
                            <tbody>
                            <tr>
                                <td style="min-width: 110px;width: 30%"><strong>ID</strong></td>
                                <td>-</td>
                                <td style="width: 70%"><data id="uid"></data></td>
                            </tr>
                            <tr>
                                <td><strong>Login Name</strong></td>
                                <td>-</td>
                                <td><data id="un"></data></td>
                            </tr>
                            <tr>
                                <td><strong>Chamber</strong></td>
                                <td>-</td>
                                <td><data id="cm"></data></td>
                            </tr>
                            <tr>
                                <td><strong>Specialist</strong></td>
                                <td>-</td>
                                <td><data id="sp"></data></td>
                            </tr>
                            <tr>
                                <td><strong>Visit Time</strong></td>
                                <td>-</td>
                                <td><data id="vt"></data></td>
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

    $("#doc_update_form").submit(function(e) {
        e.preventDefault();

        var id = $("#uid").text();

        var data = $("#doc_update_form").serialize();
        var url =$('meta[name="ajax"]').attr('url');
        url = url+"?op=update&id="+id;
        // console.log(data);console.log(url);


        $.ajax({
            url:url,
            type:"GET",
            data:data,
            dataType:"JSON",
            success: function(obj){
                console.log(obj);
                FlashStatus(obj.status,obj.response);
                $('#modal-edit').modal('hide');
            }
        });

    });


    $(document).on('click',"a.view",function(){
    
        var uid = $(this).siblings("data.hidden").attr('uid');
        var jd = $(this).siblings("data.hidden").attr('jd');
        var fn = $(this).siblings("data.hidden").attr('fn');
        var ln = $(this).siblings("data.hidden").attr('ln');
        var un = $(this).siblings("data.hidden").attr('un');
        var em = $(this).siblings("data.hidden").attr('em');
        var mb = $(this).siblings("data.hidden").attr('mb');
        var cm = $(this).siblings("data.hidden").attr('cm');
        var sp = $(this).siblings("data.hidden").attr('sp');
        var vt = $(this).siblings("data.hidden").attr('vt');
        var pic = $(this).siblings("data.hidden").attr('pic');

        document.getElementById("uid").innerHTML=uid;
        document.getElementById("name").innerHTML=fn+'&nbsp'+ln;
        document.getElementById("un").innerHTML=un;
        document.getElementById("em").innerHTML=em;
        document.getElementById("mb").innerHTML=mb;
        document.getElementById("cm").innerHTML=cm;
        document.getElementById("sp").innerHTML=sp;
        document.getElementById("vt").innerHTML=vt;
        document.getElementById("jd").innerHTML=jd;
        if(pic == ""){
            document.getElementById("doctor_pic").src="<?php echo $this->request->webroot;?>img/no-image.png";
        }
        else{
            document.getElementById("doctor_pic").src="<?php echo $this->request->webroot ?>img/"+pic;

        }

    });


    $(document).on('click',"a.edit",function(){

        var uid = $(this).siblings("data.hidden").attr('uid');
        var fn = $(this).siblings("data.hidden").attr('fn');
        var ln = $(this).siblings("data.hidden").attr('ln');
        var un = $(this).siblings("data.hidden").attr('un');
        var em = $(this).siblings("data.hidden").attr('em');
        var mb = $(this).siblings("data.hidden").attr('mb');
        var cm = $(this).siblings("data.hidden").attr('cm');
        var dg = $(this).siblings("data.hidden").attr('dg');
        // var sp = $(this).siblings("data.hidden").attr('sp');
        var vt = $(this).siblings("data.hidden").attr('vt');
         var pic = $(this).siblings("data.hidden").attr('pic');
        document.getElementById("uid").innerHTML=uid;
        document.getElementById("f_name").value=fn;
        document.getElementById("l_name").value=ln;
        document.getElementById("username").value=un;
        document.getElementById("email").value=em;
        document.getElementById("mobile").value=mb;
        document.getElementById("degree").value=dg;
        document.getElementById("chamber").value=cm;
        document.getElementById("visittime").value=vt;
        if(pic == ""){
            document.getElementById("myphoto").src="<?php echo $this->request->webroot;?>img/no-image.png";
        }
        else{
            document.getElementById("myphoto").src="<?php echo $this->request->webroot ?>img/"+pic;

        }




    });

</script>

<?php $this->end(); ?>


