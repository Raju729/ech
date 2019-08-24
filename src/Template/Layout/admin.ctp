<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?= $this->fetch('title') ?> </title>
    <meta url="<?=$this->Url->build('/',true)?>" name="baseurl">

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('admin/adminlte.css') ?>
    <?= $this->Html->css('admin/customhhh.css') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') ?>
    <!-- jQuery -->
    <?= $this->Html->script('jquery/jquery.min.js') ?>
    <?= $this->Html->script('jquery/fileupload.js') ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet"/>


    <?= $this->Html->script('admin/adminlte.js') ?>

    <?= $this->fetch('topscript') ?>

    <?= $this->fetch('meta') ?>

    <?= $this->fetch('css') ?>


</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php echo $this->element('Admin/nav');?>
        <?php echo $this->element('Admin/sidebar');?>


        <div class="content-wrapper">
            <?php echo $this->element('Admin/flashstatus');?>
            <div class="content-header">
              <div class="container-fluid">

                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> HHH-Dashboard </h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <?= $this->fetch('contents') ?>
              </div>
            </section>
            <!-- /. main content -->
        </div>
        <!-- End Content Wrapper. Contains page content -->

        <?php echo $this->element('Admin/footer');?>


    </div>
  <!-- /.content-wrapper -->


    <!-- REQUIRED SCRIPTS -->
    <!-- Bootstrap -->
    <?= $this->Html->script('bootstrap/bootstrap.bundle.min.js') ?>
    <!-- AdminLTE App -->
    

    <!-- CUSTOM SCRIPTS -->
    <?= $this->Html->script('admin/custom.js') ?>

    <?= $this->fetch('script') ?>
        <?= $this->fetch('bottomscript') ?>

</body>
</html>







