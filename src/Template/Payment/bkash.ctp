<?php
//print_r($token[]);exit;
$this->start('topscript');
echo $this->Html->script('public/stepselect.js');
echo $this->Html->script('jquery/fileupload.js');
$this->end();

$this->start('contents');
?>
<div class="main-content" >
    <meta name="redirect" url="<?=$this->Url->build(['controller' => 'Transactions', 'action' => 'store',]);?>">
    <!-- Section: departments -->
    <section style="padding-top:3rem;padding-bottom:3rem;background-image: url(http://www.codexwp.com/wp-content/uploads/2018/01/pattern1.png);">
        <div class="container effect7" style=" background-color:white;">
            <div class="section-title ">
                <div class="row">
                    <div class="col-md-7 mb-50">
                        <div class="text-center col-md-12 mb-40" style="border-bottom:5px solid #d62267">
                            <h2 class="title text-uppercase" style="color:#d62267">Pay with <span class="text-black font-weight-300">Bkash</span></h2>
                            <p class="text-uppercase letter-space-4">Make the payment with your bkash</p>
                        </div>
                        <div class=" col-md-12">
                            <form class="form-horizontal" id="bkash_form" method="post" action="<?=$this->Url->build(["controller" => "Transactions",
                                "action" => "store"]);?>">
                                <div class="form-group">
                                    <label class="col-md-4 col-md-offset-2" for="exampleInputName3">
                                        <?=$this->Html->Image('systems/flat-color-icons-svg/businessman.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                        Marchant Bkash
                                    </label>
                                    <?php   foreach ($bkash as $b){
                                     ?>
                                    <label class="col-md-6"> <?= $b->acc_number;  ?></label>
                                        <input type="hidden" name="m_account"value="<?=$b->acc_number;  ?>">
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-md-offset-2" for="exampleInputName3">
                                        <?=$this->Html->Image('systems/flat-color-icons-svg/currency_exchange.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                        Amount </label>
                                    <label class="col-md-6"> <?php
                                        if(isset($dtoken['amount'])){
                                            echo $dtoken['amount'];
                                        }
                                        else{
                                            echo '00';
                                        }
                                         ?></label>
                                    <input type="hidden" name="amount"value="<?php
                                    if(isset($dtoken['amount'])){
                                        echo $dtoken['amount'];
                                    }

                                    ?>">
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-md-offset-2" for="exampleInputName3">
                                        <?=$this->Html->Image('systems/flat-color-icons-svg/nook.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                        Refference No </label>
                                    <label class="col-md-6"><?php
                                        if(isset($dtoken['pres_id'])){
                                            echo $dtoken['pres_id'];
                                        }
                                        else{
                                            echo '00';
                                        }
                                        ?></label>
                                    <input type="hidden" name="reff_id"value="<?php
                                    if(isset($dtoken['pres_id'])){
                                        echo $dtoken['pres_id'];
                                    }
                                    ?>">



                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 col-md-offset-2" for="exampleInputEmail2">
                                        <?=$this->Html->Image('systems/flat-color-icons-svg/serial_tasks.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                        Counter No </label>
                                    <label class="col-md-6">1</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 col-md-offset-2" for="exampleInputEmail2">
                                        <?=$this->Html->Image('systems/flat-color-icons-svg/sim_card.svg',['width'=>'20', 'class'=>'mr-10'])?>
                                        Transaction ID </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" required name="pay_trx_id" id="pay_trx_id" placeholder="Trx Id-653456732457345xx">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="token" value=<?php if(isset($_GET['token'])){
                                    echo $_GET['token'];
                                } ?>>

                                <div class="form-group mt-40">
                                    <div class="col-sm-offset-5 col-sm-5">
                                        <button type="submit" class="btn btn-lg text-white" style="background-color:#d62267">Confirm Payment</button>
                                    </div>
                                </div>

                            </form>



                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-heading text-white"  style="background-color:#d62267"><strong>How to make payment?</strong></div>
                            <div class="panel-body">
                                <div class="widget">
                                    <ul class="list-divider list-border list check">
                                        <li><i class="fa fa-hand-o-right mr-10"></i><strong>Step-1 :</strong> Dial <strong style="color:#00A4EF">*247#</strong></li>
                                        <li><i class="fa fa-hand-o-right mr-10"></i><strong>Step-2 :</strong> Select option 3 <strong style="color:#00A4EF">payment</strong></li>
                                        <li><i class="fa fa-hand-o-right mr-10"></i><strong>Step-3 :</strong> Type marchant account <strong style="color:#00A4EF"><?=$b->acc_number;  ?></strong></li>
                                        <li><i class="fa fa-hand-o-right mr-10"></i><strong>Step-4 :</strong> Enter amount <strong style="color:#00A4EF"><?php
                                    if(isset($dtoken['amount'])){
                                        echo $dtoken['amount'];
                                    }

                                    ?></strong></li>
                                        <li><i class="fa fa-hand-o-right mr-10"></i><strong>Step-5 :</strong> Enter refference no <strong style="color:#00A4EF"><?php
                                    if(isset($dtoken['pres_id'])){
                                        echo $dtoken['pres_id'];
                                    }
                                    ?></strong></li>
                                        <li><i class="fa fa-hand-o-right mr-10"></i><strong>Step-6 :</strong> Enter counter <strong style="color:#00A4EF">1</strong></li>
                                        <li><i class="fa fa-hand-o-right mr-10"></i><strong>Step-7 :</strong> Enter your bkash PIN <strong style="color:#00A4EF">XXXXX</strong></li>
                                        <li><i class="fa fa-hand-o-right mr-10"></i><strong>Step-8 :</strong> Use Transaction ID</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</section>
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

</div>




<?php $this->end();
$this->start('bottomscript');
?>
<script>
    $("#bkash_form").submit(function(e) {
        e.preventDefault();
//        $('#pleaseWaitDialog').modal();
        var data = $("#bkash_form").serialize();
        var url2 =$('meta[name="redirect"]').attr('url');
        var url =$('meta[name="baseurl"]').attr('url');
        url = url+"pay/ajax?op=data_token";
        $.ajax({
            url:url,
            type:'POST',
            data:data,
            dataType:"json",
            success: function(obj){
                console.log(obj);
                if(obj.status == 'success'){

                    var url = obj.data;
                    url2 = url2+'?token='+url;
                    console.log(url2);
                    $( location ).attr("href", url2);
                    $('#pleaseWaitDialog').modal('hide');
//                    FlashStatus("success","Successfully saved.");

                }
                else {

                }



            }
        });
    });

</script>



<?php $this->end(); ?>

