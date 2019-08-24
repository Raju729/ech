<?php
//foreach ($message as $m) {
//    echo $m;
//}
$this->assign('message','active');
$this->start('contents');

?>
<style>

.media img{height:50px;}
.media-body h4{margin-bottom:0px;}

</style>

<!-- Start main-content -->
<div class="main-content" >
  <!-- Section: departments -->
  <section style="padding-top:3rem;padding-bottom:3rem;background-image: url(http://www.codexwp.com/wp-content/uploads/2018/01/pattern1.png);">    
    <div class="container effect7" style=" background-color:white;">
      <div class="section-title ">
        <div class="row">



            <div class="col-md-12 text-center">
	            <h2 class="title text-uppercase">All <span class="text-black font-weight-300">Messages</span></h2>
	            <p class="text-uppercase letter-space-4">Read or write messages to another person.</p>
	            <br>             
			</div>
<div class="col-md-12">
			<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-filter" data-target="pagado">Read</button>
								<button type="button" class="btn btn-warning btn-filter" data-target="pendiente">Unread</button>
							</div>
						</div>

						<div class="table-container mt-50">
							<table class="table">
								<tbody>
                                <?php foreach ($message as $m){

                                 ?>
									<tr data-status="pagado">
										<td>
											<div class="ckbox mt-10">
												<input type="checkbox" id="checkbox1">
												<label for="checkbox1"></label>
											</div>
										</td>
									
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
												</a>
												<div class="media-body">								<h4 class="title">
														<?= $m->s_name ?>
													</h4>
													<p class="summary"><?= $m->m_body ?></p>
												</div>
											</div>
										</td>
										<td>
											<button class="btn btn-success mt-10">Open Conversion</button>
										</td>
									</tr>
                                <?php } ?>
								
								</tbody>
							</table>
						</div>
					</div>
				</div>
</div>

        </div>
      </div>
    </div>
  </section>

</div>
<!-- end main-content -->

<?php
$this->end();
?>