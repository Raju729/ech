<?php $this->start('contents') ?>
<style>
    .dropdown-toggle{height:45px !important; }
    /*.dropdown-menu{top:unset !important;}*/
    .dropdown-toggle:hover{
    background-color: white;
    border-color:#ccc;}


.info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 2px;
    margin-bottom: 15px;
        border: 1px solid gainsboro;
        cursor: pointer;

}
.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    color:white;
}
.info-box-text{
    text-transform: uppercase;
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding-top:1em;
}
.info-box-number{font-size: 2em;}
.bg-aqua{background-color: #00c0ef !important;}
.bg-green{background-color: #00a65a !important;color:white!important;}
.bg-blue{background-color: #00A4EF !important;}
.bg-red{background-color: #D33C44 !important;}
.bg-yellow{    background-color: #f39c12 !important;color:white!important;}

</style>
    <div class="main-content">

        <!-- Section: inner-header -->

        <!-- Section: Have Any Question -->
        <!-- Section: Contact -->
        <section data-bg-img="<?=$this->request->Webroot;?>img/public/p4.png">
            <div class="container">

                <div class="section-title text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-uppercase font-28 mt-0"><span class="text-theme-colored">REGISTER AS</h2>
                            <p class="text-uppercase letter-space-4">Select you registration type from the bellow box.</p>
                        </div>
                    </div>
                    <div class="row mt-50 mb-50">
                        <div class="col-md-4 col-md-offset-2">
                            <a id="member_register" href="<?=$this->Url->build(['controller'=>'Authexs','action'=>'register','?'=>['type'=>'member']]);?>">
                            <div class="info-box">
                              <span class="info-box-icon bg-blue"><i class="fa fa-user-o"></i></span>
                              <div class="info-box-content pt-20 pb-20">                               
                                <span class="info-box-number">MEMBER</span>
                              </div>
                            </div>
                            </a>
                            <!-- /.info-box -->
                          </div>
                          <!-- /.col -->
                          <div class="col-md-4">
                              <a id="doctor_register" href="<?=$this->Url->build(['controller'=>'Authexs','action'=>'register','?'=>['type'=>'doctor']]);?>">
                                <div class="info-box">
                                  <span class="info-box-icon bg-green"><i class="fa fa-user-md" aria-hidden="true"></i></span>

                                  <div class="info-box-content pt-20 pb-20">
                                    <span class="info-box-number">DOCTOR</span>
                                  </div>
                                </div>
                              </a>
                            <!-- /.info-box -->
                          </div>
                          <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 effect7 pt-15 pb-10">
                            <iframe width="640" height="360" src="https://www.youtube.com/embed/kW9gT9YpZtU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider: Google Map -->

    </div>
<!-- Start main-content -->

<!-- end main-content -->
<?php $this->end();
$this->start('bottomscript');
?>
<script>
//    $('#doctor_register').click(function () {
//        var url =$('meta[name="baseurl"]').attr('url');
//        url = url+"register?type=doctor";
//        $( location ).attr("href", url);
//        console.log(url);
//
//    });
//    $('#member_register').click(function () {
//        var url =$('meta[name="baseurl"]').attr('url');
//        url = url+"register?type=member";
//        console.log(url);
//        $( location ).attr("href", url);
//
//
//    });
    $("#doc_add_form").submit(function(e) {
        e.preventDefault();

        var data = $("#doc_add_form").serialize();
        var url =$('meta[name="ajax"]').attr('url');
        url = url+"?op=add";
        console.log(url);
        console.log(data);
        $.ajax({
            url:url,
            type:'POST',
            data:data,
            dataType:"JSON",
            success: function(obj){
                console.log(obj);
                if(obj.status =='success'){
                    FlashStatus(obj.status,obj.response);
                    $('#doc_add_form').find("input[type=text],input[type=password],input[type=email],input[type=number], textarea").val("");

                }
                else{

                    FlashStatus(obj.status,obj.response);
                }

            }

        });

    });
</script>

<?php $this->end();?>


