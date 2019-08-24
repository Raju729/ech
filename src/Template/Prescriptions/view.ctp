<?php
    $this->start('contents');
?>
<style>
@media print{.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9{float:left}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}.visible-xs{display:none!important}.hidden-xs{display:block!important}table.hidden-xs{display:table}tr.hidden-xs{display:table-row!important}td.hidden-xs,th.hidden-xs{display:table-cell!important}.hidden-sm,.hidden-xs.hidden-print{display:none!important}.visible-sm{display:block!important}table.visible-sm{display:table}tr.visible-sm{display:table-row!important}td.visible-sm,th.visible-sm{display:table-cell!important}}

.border-l{border-left:1px solid gainsboro;}.border-b{border-bottom:1px solid gainsboro;}.border-t{border-top:1px solid gainsboro;}.border{border:1px solid gainsboro;}
</style>

<?php
foreach ($pres as $obj) {
  $pid_info = json_decode($obj->pid_info);
  $eid_info = json_decode($obj->eid_info);
  $did_info = json_decode($obj->did_info);
  $pcommon_info = json_decode($obj->pcommon_info);
  $pres_info = json_decode($obj->pres_info);
  $pres_id = $obj->pres_id;
}
?>
<section class="container" style="font-family: unset !important;color:#333 !important;">
    <div class="main-container">
        <div class="row">
            <div class="list-fullwidth">
                <div class="row">         
                    <!--Item-->
                    <div class="col-sm-12">

                        <div class="col-sm-9" style="margin: 0 auto;float:unset;">                            
                           <div class="row" id="presview">                              
                                <div class="col-sm-12 mt-40 mb-40" >                       
                                   <div class="panel panel-default">     
                                        <div class="panel-body">

                                            <div class="row text-center" >
                                                <div class="col-sm-2 pt-20">

                                                </div>
                                                <div class="col-sm-8">
                                                    <h3 class="mb-0">EHC TELEMEDICINE PROGRAMME</h3>
                                                    Organized by Raju IT.<br>
                                                    Prescription # <?=$pres_id?>

                                                </div>
                                                 <div class="col-sm-1">
                                                     <h3><i style="color:#2570bb;" class="fa fa-print" aria-hidden="true"></i></h3>
                                                </div>
                                                <div class="col-sm-1">
                                                    <a id="pdf" href=""><h3><i style="color:#2570bb;" class="fa fa-download" aria-hidden="true"></i></h3></a>
                                                </div>
                                            </div>


                                            <div class="row mt-30" >
                                                <div class="col-sm-6">
                                                    <p>
                                                    <strong><?=$did_info->f_name.' '.$did_info->l_name?></strong>
                                                     <br><?=$did_info->specialist?>
                                                     <br><?=$did_info->chamber?>
                                                    </p>
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                     <p>
                                                    <strong><?=$eid_info->f_name.' '.$eid_info->l_name?></strong>
                                                     <br><?=$did_info->address?>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="row border-t border-b mt-5 mb-20 pt-5 pb-5" >
                                                <div class="col-sm-12">                            
                                                   <span class="col-sm-5 p-0"><strong>Patient : </strong> 
                                                    <?=$pid_info->f_name.' '.$pid_info->l_name?>
                                                    </span>
                                                   <span class="col-sm-2 p-0"><strong>Age : </strong>
                                                   <?=$pid_info->age?></span>
                                                    <span class="col-sm-2 p-0"><strong>Sex : </strong> <?=$this->Public->GENDER[$pid_info->gender]?></span>
                                                     <span class="col-sm-3 p-0"><strong>Date : </strong> <?=$obj->modified->format('d-m-Y')?></span>
                                                </div>                                        
                                            </div>
                                             <div class="row">
                                                <div class="col-sm-4">                               
                                                   <span class="col-sm-12 mb-10 border-b" >
                                                        <strong >HISTORY :</strong>
                                                    </span>
                                                    <span class="col-sm-12">
                                                    <?=$pres_info->diseases?>                              

                                                   </span>

                                                   <span class="col-sm-12 mt-10 mb-10 border-b" >
                                                        <strong >PHYSICAL :</strong>
                                                    </span>
                                                    <span class="col-sm-12">
                                                    

                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                            <td style="width:58%;">Height</td>
                                                            <td style="width:10%;">:</td>
                                                            <td><?=$pcommon_info->height?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Weight</td>
                                                                <td>:</td>
                                                                <td><?=$pcommon_info->weight?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>BP</td>
                                                                <td>:</td>
                                                                <td><?=$pcommon_info->bloodpressure?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Temp</td>
                                                                <td>:</td>
                                                                <td><?=$pcommon_info->temperature?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pulse rate</td>
                                                                <td>:</td>
                                                                <td><?=$pcommon_info->pulserate?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Glucose: </td>
                                                                <td>:</td>
                                                                <td><?=$pcommon_info->bloodglucose?></td>   
                                                            </tr>
                                                        </tbody>
                                                    </table>                              

                                                   </span>


                                                   <span class="col-sm-12 mt-10 mb-10 border-b">
                                                        <strong >ADVICE :</strong>
                                                    </span>
                                                    <span class="col-sm-12"">

                                                   <?=$pres_info->advices?>

                                                   </span>

                                                   <span class="col-sm-12 mb-10 mt-10 border-b" >
                                                        <strong >TEST :</strong>
                                                    </span>
                                                    <span class="col-sm-12" >
                                                    <?php
                                                    if(!empty($pres_info->tests)){ 
                                                    foreach ($pres_info->tests as $test) {
                                                        echo $test.'<br>';
                                                    }
                                                }
                                                    ?>

                                                   </span>

                                                </div>
                                                <div class="col-sm-8 border-l mb-20" style="min-height: 37em;">                    
                                                    <span class="col-sm-12 mb-10">
                                                        <strong >RX :</strong>
                                                    </span>
                                                    <span class="col-sm-12" >

                                                   <?php
                                                   if(!empty($pres_info->medicines )  ){ 
                                                    foreach ($pres_info->medicines as $rx) {
                                                        $rx_arr = explode('*',$rx);
                                                        echo $rx_arr[0].'. '.$rx_arr[1].$rx_arr[2].'<br><small class="ml-30">Take before meal</small><br>';
                                                    }
                                                }
                                                    ?>


                                                   </span>

                                                </div>    

                                        
                                            </div>

                                            <div class="row border-t pt-10 pb-10">
                                                <div class="col-sm-12 text-center" style="font-size:0.8em;">
                                                    এই প্রেসক্রিপশন রেজিস্টার্ড চিকিৎসক কর্তৃক টেলিমেডিসিন সফটওয়্যার
        ব্যবহার করে প্রদানকৃত। হাতে লেখা কোন ঔষধ/পরামর্শ গ্রহনযোগ্য নয়।
                                                </div>  
                                            </div>


                                                                      
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>

            </div>        
        </div>
    </div>
<script>

</script>
</section>

<?php
    $this->end();
    $this->start('bottomscript');
    echo $this->Html->script('public/jQuery.print.js');
?>

<script type="text/javascript">
    $("#presview").find("i.fa-print").click(function(){
    console.log("hi");
    $("#presview").print();

});
</script>

<?php $this->end();?>

