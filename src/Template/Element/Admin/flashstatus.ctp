<div class="row" id="flashstatus">
    <div class="col-sm-12">
        <div style="position: absolute;right: 22px;z-index: 999;"}
" class="alert alert-success alert-dismissible fade show col-sm-4 float-right " role="alert">
            <p style="margin:0px;" id="message"></p>
        </div>
    </div>
</div>
<script>
    $(".alert").hide();
    function FlashStatus(s,m)
    {
        $('html, body').animate({scrollTop: $("#flashstatus").offset().top}, 500);

        if(s=="success")
        {
            $("#flashstatus").find(".alert").removeClass("alert-danger");
            $("#flashstatus").find(".alert").addClass("alert-success");
        }
        else if(s=="failed")
        {
            $("#flashstatus").find(".alert").addClass("alert-danger");
            $("#flashstatus").find(".alert").removeClass("alert-success");
        }
        $("#flashstatus").find("p#message").html(m);
        $(".alert").slideDown('slow');
        $(".alert").delay(5000).fadeOut('slow');
    }
</script>

<?= $this->Flash->render('message') ?>