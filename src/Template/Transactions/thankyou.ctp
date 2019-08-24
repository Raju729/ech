<?php
//print_r($token[]);exit;
$this->start('topscript');
echo $this->Html->script('public/stepselect.js');
echo $this->Html->script('jquery/fileupload.js');
$this->end();

$this->start('contents');
?>
<div class="main-content" >

    <!-- Section: departments -->
    <section style="padding-top:3rem;padding-bottom:3rem;background-image: url(http://www.codexwp.com/wp-content/uploads/2018/01/pattern1.png);">
        <div class="container effect7" style=" background-color:white;">
            <div class="section-title text-center">
               <h1 style="color: #00a4ef">Thank you for payment</h1>
               <h4>Your prescription will be visible after review the payment shortly</h4>
               <a href=""><button class="btn btn-success">View Prescriptions</button></a>
            </div>
        </div>
</div>
</section>


</div>




<?php $this->end();?>
