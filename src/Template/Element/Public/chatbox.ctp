<style>
    .main-section{width:400px;position:fixed;right:50px;bottom:-450px;z-index:999}.first-section:hover{cursor:pointer}.open-more{bottom:0;transition:2s}.border-chat{border:1px solid #dcdcdc;margin:0}.first-section{background-color:#FD8468}.first-section p{color:#fff;margin:0;padding:10px 0}.first-section p:hover{color:#fff;cursor:pointer}.right-first-section{text-align:right}.right-first-section i{color:#fff;font-size:15px;padding:12px 3px}.right-first-section i:hover{color:#fff}.chat-section ul li{list-style:none;margin-top:10px;position:relative}.chat-section{overflow-y:scroll;height:400px}.chat-section ul{padding:0;height:400px}.left-chat img,.right-chat img{width:50px;height:50px;float:left;margin:0 10px}.right-chat img{float:right}.second-section{padding:0;margin:0;background-color:#F3F3F3;height:400px}.left-chat,.right-chat{overflow:hidden}.left-chat p,.right-chat p{background-color:#FD8468;padding:10px;color:#fff;border-radius:5px;float:left;width:60%;margin-bottom:20px}.left-chat span,.right-chat span{position:absolute;left:70px;top:45px;color:#B7BCC5}.left-chat:before,.right-chat:before{content:" ";position:absolute;top:0;bottom:150px}.right-chat span{left:unset;right:70px}.right-chat p{float:right;background-color:#FFF;color:#FD8468}.third-section{border-top:1px solid #EEE;padding-bottom:5px}.text-bar input{width:90%;margin-left:-15px;padding:10px;border:1px solid #fff}.text-bar a i{background-color:#FD8468;color:#fff;width:30px;height:30px;padding:7px 0;border-radius:50%;text-align:center}.left-chat:before{left:55px;border:15px solid transparent;border-top-color:#FD8468}.right-chat:before{right:55px;border:15px solid transparent;border-top-color:#fff}
</style>
<?php
$session = $this->request->session();
$info = $session->read('Auth.Info');
$photo =$info->thumb_url;
?>
<!-- Modal -->
<div class="modal fade" id="chatbox" tabindex="-1" role="dialog"data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fd8468;
    border-radius: 5px;">
                <button type="button"id="modal_close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:black;">&times;</span></button>
                <h4 style="color:white;" class="modal-title" id="myModalLabel"><i class="mr-10 fa fa-commenting-o" aria-hidden="true"></i>Send Message to <data id="rcvr"></data></h4>
            </div>
            <div class="modal-body">
                <div class="row border-chat">
                    <div class="col-md-12 col-sm-12 col-xs-12 second-section">
                        <div class="chat-section">

                        <span class="mt-40" id="loading" >
                                <center><img src="http://www.championpropertymanagement.co.nz/wp-content/uploads/2017/06/sending2.gif">
                                <h4><span class="sr-only">Loading...</span></h4></center>
                        </span>

                            <span id="nomessage" class="m-20 " style="display: none"><h4>No messages</h4></span>

                            <ul id="chatul">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <form method="post" id="chat_form">
                    <div class="row border-chat">
                        <div class="col-md-12 col-sm-12 col-xs-12 third-section">
                            <div class="text-bar">
                                <input class="txtbox" type="text" placeholder="Write messege"name="m_body">
                                <input type="hidden" name="did" value="">
                                <input type="hidden" name="pid" value="">
                                <input type="hidden" name="conv_id" value="">
                                <input type="hidden" name="p_name" value="">
                                <input type="hidden" name="d_name" value="">
                                <a id="sendsms"><i class="fa fa-arrow-right sms_data" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    $("span#nomessage").hide();
    //    window.scrollTo(0,document.querySelector(".chat-section").scrollHeight);
    $("a#sendsms").click(function(){sendmessage();});
    $txtbox = $(".text-bar").find('input.txtbox');
    $txtbox.bind("enterKey",function(e){sendmessage();});
    $txtbox.keyup(function(e){
        if(e.keyCode == 13)$(this).trigger("enterKey");
    });
    function sendmessage()
    {

        var data = $("#chat_form").serialize();
        var url =$('meta[name="baseurl"]').attr('url');
        url = url+"messages/ajax?op=send";
        $txtbox.attr("disabled","true");
        $.ajax({
            url:url,
            type:'POST',
            data:data,
            dataType:"json",
            success: function(obj){
                if(obj.status == 'success'){
                    $txtbox.val("");
                    $txtbox.removeAttr("disabled");
                    $('#chat_form').find("input[type=text]").val("");
                    var data = obj.data;
                    var date = new Date(data.created);
                    html = '<li><div class="left-chat"><img src="<?=$this->request->webroot;?>img/<?=$photo?>"><p>'+data.m_body+'</p><span>'+date.toLocaleString()+'</span></div></li>';
                    $("ul#chatul").append(html);
                    scrolltobottom();
                }
            }
        });
    }
</script>