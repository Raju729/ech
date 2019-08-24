
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="HealthZone - Daring Multi Concept Theme for Medical, Nursing, Yoga, Sports, Gym & Fitness" />
    <meta name="keywords" content="building,business,construction,cleaning,transport,workshop" />
    <meta name="author" content="ThemeMascot" />
    <meta url="<?=$this->Url->build('/',true)?>" name="baseurl">
    <?= $this->fetch('meta') ?>

    <title>Easy-Health-Care</title>

    <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('public/bootstrap.min.css') ?>
    <?= $this->Html->css('public/jquery-ui.min.css') ?>
    <?= $this->Html->css('public/animate.css') ?>
    <?= $this->Html->css('public/css-plugin-collections.css') ?>
    <?= $this->Html->css('public/style-main.css') ?>
    <?= $this->Html->css('public/preloader.css') ?>
    <?= $this->Html->css('public/custom-bootstrap-margin-padding.css') ?>
    <?= $this->Html->css('public/responsive.css') ?>
    <?= $this->Html->css('public/theme-skin-sky-blue.css') ?>
    <?= $this->Html->css('public/menuzord-boxed.css') ?>
    <?= $this->Html->css('public/custom.css') ?>
    <?= $this->fetch('css') ?>


    <?= $this->Html->script('public/jquery-2.2.4.min.js') ?>
    <?= $this->Html->script('public/jquery-ui.min.js') ?>
    <?= $this->Html->script('public/bootstrap.min.js') ?>
    <?= $this->Html->script('public/jquery-plugin-collection.js') ?>    
    <?= $this->fetch('topscript') ?>


    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script>
        var MSTATUS = {U:'Unmarried',M:'Married',O:'Others'};
        var RELIGION = {I:'Islam',H:'Hindu',C:'Christian',B:'Buddhism',O:'Others'};
        var GENDER = {M:"Male", F:"Female", O:'Others'};
        var OCCUPATION = {ST:"Student", SE:"Service", BU:'Business', HO:'Housewife', OT:'Others'};
    </script>

<!-- <script src="http://atikshakil.com/js/spp.js"></script> -->
<style>
  /*==================================================
 * Effect 7
 * ===============================================*/
.effect7{position:relative;-webkit-box-shadow:0 1px 4px rgba(0,0,0,.3),0 0 5px rgba(0,0,0,.1) inset;-moz-box-shadow:0 1px 4px rgba(0,0,0,.3),0 0 5px rgba(0,0,0,.1) inset;box-shadow:0 1px 4px rgba(0,0,0,.3),0 0 5px rgba(0,0,0,.1) inset}.effect7:after,.effect7:before{content:"";position:absolute;z-index:-1;-webkit-box-shadow:0 0 20px rgba(0,0,0,.8);-moz-box-shadow:0 0 20px rgba(0,0,0,.8);box-shadow:0 0 20px rgba(0,0,0,.8);top:0;bottom:0;left:10px;right:10px;-moz-border-radius:100px/10px;border-radius:100px/10px}.effect7:after{right:10px;left:auto;-webkit-transform:skew(8deg) rotate(3deg);-moz-transform:skew(8deg) rotate(3deg);-ms-transform:skew(8deg) rotate(3deg);-o-transform:skew(8deg) rotate(3deg);transform:skew(8deg) rotate(3deg)}.stepwizard-step p{margin-top:10px}.stepwizard-row{display:table-row}.stepwizard{display:table;width:100%;position:relative}.stepwizard-step button[disabled]{opacity:1!important;filter:alpha(opacity=100)!important}.stepwizard-row:before{top:14px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0;left:0}.stepwizard-step{display:table-cell;text-align:center;position:relative}.btn-circle{width:30px;height:30px;text-align:center;padding:6px 0;font-size:12px;line-height:1.428571429;border-radius:15px}label{padding-top:10px}

</style>
</head>

<body class="">

<div id="wrapper">


    <header id="header" class="header">

        <?php echo $this->element('Public/top');?>
       
        <?php echo $this->element('Public/header');?>


    </header>
    <?php echo $this->element('Public/flashstatus');?>

    <!-- Start main-content  home.ctp-->
    <?= $this->fetch('contents') ?>
    <!-- end main-content -->

    <!-- Footer -->
    <?php echo $this->element('Public/footer');?>

</div>

    <?= $this->Html->script('public/custom.js') ?>
    <?= $this->fetch('bottomscript') ?>

</body>
</html>