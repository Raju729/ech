<?php $this->start('contents');
echo WWW_ROOT;
?>
<style>
.main-section{width:400px;position:fixed;right:50px;bottom:-450px;z-index:999}.first-section:hover{cursor:pointer}.open-more{bottom:0;transition:2s}.border-chat{border:1px solid #dcdcdc;margin:0}.first-section{background-color:#FD8468}.first-section p{color:#fff;margin:0;padding:10px 0}.first-section p:hover{color:#fff;cursor:pointer}.right-first-section{text-align:right}.right-first-section i{color:#fff;font-size:15px;padding:12px 3px}.right-first-section i:hover{color:#fff}.chat-section ul li{list-style:none;margin-top:10px;position:relative}.chat-section{overflow-y:scroll;height:400px}.chat-section ul{padding:0;height:400px}.left-chat img,.right-chat img{width:50px;height:50px;float:left;margin:0 10px}.right-chat img{float:right}.second-section{padding:0;margin:0;background-color:#F3F3F3;height:400px}.left-chat,.right-chat{overflow:hidden}.left-chat p,.right-chat p{background-color:#FD8468;padding:10px;color:#fff;border-radius:5px;float:left;width:60%;margin-bottom:20px}.left-chat span,.right-chat span{position:absolute;left:70px;top:45px;color:#B7BCC5}.left-chat:before,.right-chat:before{content:" ";position:absolute;top:0;bottom:150px}.right-chat span{left:unset;right:70px}.right-chat p{float:right;background-color:#FFF;color:#FD8468}.third-section{border-top:1px solid #EEE;padding-bottom:5px}.text-bar input{width:90%;margin-left:-15px;padding:10px;border:1px solid #fff}.text-bar a i{background-color:#FD8468;color:#fff;width:30px;height:30px;padding:7px 0;border-radius:50%;text-align:center}.left-chat:before{left:55px;border:15px solid transparent;border-top-color:#FD8468}.right-chat:before{right:55px;border:15px solid transparent;border-top-color:#fff}
</style>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#hhhchat">
  Launch modal
</button>

<!-- Modal -->
<div class="modal fade" id="hhhchat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #fd8468;
    border-radius: 5px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:black;">&times;</span></button>
        <h4 style="color:white;" class="modal-title" id="myModalLabel"><i class="mr-10 fa fa-commenting-o" aria-hidden="true"></i>Send Message</h4>
      </div>
      <div class="modal-body">
        	<div class="row border-chat">
				<div class="col-md-12 col-sm-12 col-xs-12 second-section">
					<div class="chat-section">
						<ul>
							<li>
								<div class="left-chat">
									<img src="/demo/man01.png">
									<p>Lorem ipsum dolor sit ameeserunt.
									</p>
									<span>2 min</span>
								</div>
							</li>
							<li>
								<div class="right-chat">
									<img src="/demo/man02.png">
									<p>Lorem ipsum dolor sit ameeserunt.</p>
									<span>2 min</span>
								</div>
							</li>
							<li>
								<div class="left-chat">
									<img src="/demo/man01.png">
									<p>Lorem ipsum dolor sit ameeserunt.</p>
									<span>2 min</span>
								</div>
							</li>
							<li>
								<div class="right-chat">
									<img src="/demo/man02.png">
									<p>Lorem ipsum dolor sit ameeserunt.</p>
									<span>2 min</span>
								</div>
							</li>
							<li>
								<div class="left-chat">
									<img src="/demo/man01.png">
									<p>Lorem ipsum dolor sit ameeserunt.</p>
									<span>2 min</span>
								</div>
							</li>
							<li>
								<div class="right-chat">
									<img src="/demo/man02.png">
									<p>Lorem ipsum dolor sit ameeserunt.</p>
									<span>2 min</span>
								</div>
							</li>
							<li>
								<div class="left-chat">
									<img src="/demo/man01.png">
									<p>Lorem ipsum dolor sit ameeserunt.</p>
									<span>2 min</span>
								</div>
							</li>
							<li>
								<div class="right-chat">
									<img src="/demo/man02.png">
									<p>Lorem ipsum dolor sit ameeserunt.</p>
									<span>2 min</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
    	</div>

      <div class="modal-footer">
        	<div class="row border-chat">
				<div class="col-md-12 col-sm-12 col-xs-12 third-section">
					<div class="text-bar">
						<input type="text" placeholder="Write messege"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
      </div>
    </div>
  </div>
</div>
<?php $this->end();?>
