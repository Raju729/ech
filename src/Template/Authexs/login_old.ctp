<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>
    <meta name="ajax" url="<?=$this->Url->build(["controller" => "Authexs",
        "action" => "login"]);?>">
    <meta name="redirect" url="<?=$this->Url->build(['controller' => 'Pages', 'action' => 'display', 'home']);?>">


    <?= $this->Html->css('font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('admin/adminlte.css') ?>
    <?= $this->Html->css('admin/customhhh.css') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') ?>
    <!-- jQuery -->
    <?= $this->Html->script('jquery/jquery.min.js') ?>
    <?= $this->Html->script('admin/adminlte.js') ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form id="login_form" action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="UserName">

                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">

                </div>
                <div class="row">
                    <div class="col-8">
<!--                        <div class="checkbox icheck">-->
<!--                            <label>-->
<!--                                <input type="checkbox"> Remember Me-->
<!--                            </label>-->
<!--                        </div>-->
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
<!---->
<!--            <div class="social-auth-links text-center mb-3">-->
<!--                <p>- OR -</p>-->
<!--                <a href="#" class="btn btn-block btn-primary">-->
<!--                    <i class="fa fa-facebook mr-2"></i> Sign in using Facebook-->
<!--                </a>-->
<!--                <a href="#" class="btn btn-block btn-danger">-->
<!--                    <i class="fa fa-google-plus mr-2"></i> Sign in using Google+-->
<!--                </a>-->
<!--            </div>-->
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="#">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<!-- Bootstrap -->
<?= $this->Html->script('bootstrap/bootstrap.bundle.min.js') ?>
<!-- AdminLTE App -->


<!-- CUSTOM SCRIPTS -->
<?= $this->Html->script('admin/custom.js') ?>
<?= $this->Html->script('admin/icheck.min.js') ?>
<!-- iCheck -->

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass   : 'iradio_square-blue',
            increaseArea : '20%' // optional
        })
    })

    $("#login_form").submit(function(e) {
        e.preventDefault();
        var url =$('meta[name="ajax"]').attr('url');
        var url2 =$('meta[name="redirect"]').attr('url');
        var data = $("#login_form").serialize();
        $.ajax({
            url:url,
            type:"POST",
            data:data,
            dataType: "JSON",
            success: function(obj){
                if(obj.status =='success'){

                    $( location ).attr("href", url2);
                    //console.log(obj);
                }



            }
        });
        // alert(data);
    });



</script>
</body>
</html>
