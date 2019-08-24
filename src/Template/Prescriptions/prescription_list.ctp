<?php
$session = $this->request->session();


$this->assign('pres','active');
$this->start('topscript');
echo $this->Html->script('public/stepselect.js');
echo  $this->Html->script('public/prescribe.js');
$this->end();


$this->start('contents');

?>
  <style>
table th,td{text-align:center;}
</style>

<!-- Start main-content -->
<div class="main-content" >

  <!-- Section: departments -->
  <section style="padding-top:3rem;padding-bottom:3rem;background-image: url(http://www.codexwp.com/wp-content/uploads/2018/01/pattern1.png);">    
    <div class="container effect7" style=" background-color:white;">
      <div class="section-title ">
        <div class="row">


          <div class="col-md-12 text-center">
            <h2 class="title text-uppercase"><?=$title ?> <span class="text-black font-weight-300">Prescriptions</span></h2>
            <p class="text-uppercase letter-space-4">Select a prescriptions and prescibe now.</p>
            <br>
              <div class="row">

                  <div class="col-md-4 col-md-offset-4 ">
                      <input type="text" class="form-control" id="ptntsearch" onkeyup="patientsearch()" placeholder="Search for address..">
                  </div>
              </div>
              <br>
              <div class="table-responsive">
                  <table class="table table-bordered table-responsive" id="ptnttable">
                    <thead class="bg-primary text-center" style="background-color:#00A4EF">
                      <th >Pres ID</th>
                      <th>Patient</th>
                      <th>Doctor</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Contact</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                    <?php

                      $session = $this->request->getSession();
                      $user = $session->read("Auth.User");
                      $uid = $user['uid'];

                    foreach ($pres as $pr)
                        {
                        $patobj = json_decode($pr->pid_info);
                        $docobj = json_decode($pr->did_info);
                        $usrobj = json_decode($pr->eid_info);
                        $pres_id = $pr->pres_id;
                        if(isset($patobj))
                        {
                        $pat_fullname= $patobj->f_name.' '.$patobj->l_name;
                        $doc_fullname= $docobj->f_name.' '.$docobj->l_name;
                        $pat_age = $patobj->age;
                        $pat_addr = $patobj->address;
                        $pat_gender = $patobj->gender;
                        $pat_mobile = $patobj->mobile;
                        }
                        else
                        {
                        $pat_fullname='';
                        $pat_age='';
                        $pat_gender='';
                        $pat_mobile='';
                        }

                        ?>

                    <tr>
                       <td><?=$pres_id?></td>
                       <td><?=$pr->pid.' - '.$pat_fullname?> </td>
                       <td><?=$pr->did.' - '.$doc_fullname?></td>
                       <td><?=$pat_age?></td>
                       <td><?=$this->Public->GENDER[$pat_gender] ?></td>
                            <td><?=$pat_addr?></td>
                       <td>
                         <i style="cursor: pointer" id="show_contact" skype="live:444" mobile="<?=$pat_mobile?>" whatsapp="0154" imo="51454" viber="554" data-toggle="modal" data-target="#patient-contact" class="fa fa-info-circle" aria-hidden="true"></i>
                         <i id="messages" p_name="<?=$pat_fullname ?>"d_name="<?=$doc_fullname ?>" pid="<?=$pr->eid?>" did="<?=$pr->did ?>" uid="<?=$uid?>" conv_id="<?=$pr->pres_id?>" style="cursor: pointer" class=" ml-10 fa fa-envelope-o" aria-hidden="true" data-toggle="modal" data-target="#chatbox"></i>
                       </td>
                       <td>
                           <?php
                            $info = $session->read('Auth.Info');
                            $photo =$info->thumb_url;
                           if($user['type']==3){
                                if($title =='COMPLETE'){
                                   ?>
                                   <a target="_blank" href="<?php echo $this->Url->build(['controller'=>'Prescriptions','action'=>'prescriptionList']).'/view/'.$pres_id;?>"><span class="text-success bold">View</span></a>
                               <?php }

                           elseif($title =='CANCEL'){
                               ?>
                               Cancelled
                               <?php }
                                   elseif($title =='ALL'){
                                   if($pr->status == 1){?>
                                       <a target="_blank" href="<?php echo $this->Url->build(['controller'=>'Prescriptions','action'=>'prescriptionList']).'/prescribe/'.$pres_id;?>"><span class="text-danger">Prescribe</span></a>

                                   <?php }
                                   elseif($pr->status == 0){
                                       ?>
                                       <span class="text-primary">In Review</span>
                                   <?php }
                                   elseif($pr->status == 3){
                                       ?>
                                       <span class="">Cancelled</span>

                                   <?php }
                                   elseif($pr->status == 2){
                                       ?>
                                       <a target="_blank" href="<?php echo $this->Url->build(['controller'=>'Prescriptions','action'=>'prescriptionList']).'/view/'.$pres_id;?>"><span class="text-success">View</span></a>
                                   <?php }}
                               else{
                                   ?>
                                   <a target="_blank" href="<?php echo $this->Url->build(['controller'=>'Prescriptions','action'=>'prescriptionList']).'/prescribe/'.$pres_id;?>"><span class="text-warning">Prescribe</span></a>


                               <?php }
                           }
                               else{
                           ?>
                               <?php if($title =='COMPLETE'){
                               ?>
                               <a target="_blank" href="<?php echo $this->Url->build(['controller'=>'Prescriptions','action'=>'prescriptionList']).'/view/'.$pres_id;?>">View</a>
                               <?php }
                                   elseif($title =='CANCEL'){
                                       ?>
                                       Cancelled
                                   <?php }
                                elseif($title =='ALL'){
                                  if($pr->status == 1){?>
                                     <span style="color: #bd2130">Pending</span>
                                      <?php }
                                      elseif($pr->status == 0){
                                      ?>
                                          <span class="text-primary">In Review</span>
                                      <?php }
                                          elseif($pr->status == 3){
                                          ?>
                                          <span class="text-danger">Cancelled</span>


                                      <?php }
                                      elseif($pr->status == 2){
                                      ?>
                                      <a target="_blank" href="<?php echo $this->Url->build(['controller'=>'Prescriptions','action'=>'prescriptionList']).'/view/'.$pres_id;?>"><span style="cursor:pointer">View</span></a>
                                   <?php }}
                                     else{
                                   ?>
                               <span>pending</span>


                           <?php } ?>
                       </td>
                    </tr>

                     <?php }
                        }?>
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

    <!-- end main-content -->
    <?php echo $this->element('Public/chatbox');?>
<?php

?>
<script>
    function patientsearch() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("ptntsearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("ptnttable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }







$("i#show_contact").click(function(){

  $m = $("div#patient-contact");
  $m.find("data#pat_mobile").text($(this).attr("mobile"));
  $m.find("data#pat_skype").text($(this).attr("skype"));
  $m.find("data#pat_whatsapp").text($(this).attr("whatsapp"));
  $m.find("data#pat_imo").text($(this).attr("imo"));
  $m.find("data#pat_viber").text($(this).attr("viber"));
});




$("i#messages").click(function(){
    var conv_id = $(this).attr("conv_id");
    var did = $(this).attr("did");
    var pid = $(this).attr("pid");
    var p_name = $(this).attr("p_name");
    var d_name = $(this).attr("d_name");
    var uid = $(this).attr("uid");

    $("input[name='conv_id']").val(conv_id);
    $("input[name='pid']").val(pid);
    $("input[name='did']").val(did);
    $("input[name='p_name']").val(p_name);
    $("input[name='d_name']").val(d_name);


    var baseurl = $("meta[name='baseurl']").attr("url");
    url = baseurl+"messages/ajax?op=messages&conv_id="+conv_id;
    $("ul#chatul").html("");
    $("span#loading").show();
    $.ajax({
        type: 'get',
        url: url,
        dataType:'json',
        success: function(resp)
        {
          //console.log(resp);
          if(resp.status=="success")
          {
            $("span#loading").hide();
              $("span#nomessage").hide();
            var obj = resp.data;
            console.log(obj);
            if(obj.length>0)
            {

              $("span#nomessage").hide();

              var date;
              for(var i=0;i<obj.length;i++)
              {
                var html='';
                date = new Date(obj[i].created);

                //console.log(obj[i].sid);

                if(obj[i].sid == uid)
                {

                  html = '<li><div id="chat" class="left-chat"><img src="<?=$this->request->webroot;?>img/<?=$photo?>"><p>'+obj[i].m_body+'</p><span>'+date.toLocaleString()+'</span></div></li>';
                }
                else
                {

                  html = '<li><div id="chat" class="right-chat"><img src="<?=$this->request->webroot;?>img/'+obj[i].thumb_url+'"><p>'+obj[i].m_body+'</p><span>'+date.toLocaleString()+'</span></div></li>';
                }

                $("ul#chatul").append(html);

              }
              $("data#rcvr").html(obj[0].s_name);
                scrolltobottom();
            }
            else
            {
                $("span#loading").hide();
               $("span#nomessage").show();
            }
            //f1 method
              $("span#loading").hide();

              refresh(conv_id);
          }
        }
      });
});
function scrolltobottom()
{
    var top = $(".chat-section").prop("scrollHeight");
    $('.chat-section').animate({scrollTop: top}, 1000);
}





// $("button#modal_close").click(function (){
//
//
//});




function refresh(conv_id) {
    var baseurl = $("meta[name='baseurl']").attr("url");
    url = baseurl+"messages/ajax?op=refresh&conv_id="+conv_id;
    $.ajax({
        type: 'get',
        url: url,
        dataType:'json',
        success: function(resp)
        {
            //console.log(resp);
            if(resp.status=="success")
            {
                $("span#nomessage").hide();
                var obj = resp.data;
                //console.log(obj);
                if(obj.length>0)
                {


                    var date;
                    for(var i=0;i<obj.length;i++)
                    {
                        var html='';
                        date = new Date(obj[i].created);
                            html = '<li><div class="right-chat"><img src="<?=$this->request->webroot;?>img/'+obj[i].thumb_url+'"><p>'+obj[i].m_body+'</p><span>'+date.toLocaleString()+'</span></div></li>';
                        $("ul#chatul").append(html);
                    }
                    scrolltobottom();
                }
                else
                {
                    $("span#nomessage").show();
                }
                //f1 method
                if ($('#chatbox').is(':visible')) {
                    refresh(conv_id);
                }
                else {
                    return;
                }


            }

        }
    });


}
</script>


</div>

<?php
$this->end();
?>