<div class="col-md-3" style="padding:20px;">
    <div style="border:1px solid gainsboro;padding:15px;">
        <div class="widget">
            <h5 class="widget-title line-bottom"><i class="fa fa-bars" aria-hidden="true"></i> Dashboard Menu</h5>
            <ul class="list-divider list-border list check">
                <li><a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'dashboard']);?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Summary</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Profile', 'action' => 'profile']);?>"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> My profile</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescriptionList']);?>"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> All Prescriptions</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescriptionList','?'=>['op'=>'pending']]);?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Pending Prescriptions</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescriptionList','?'=>['op'=>'complete']]);?>"> <i class="fa fa-hand-o-right" aria-hidden="true"></i> Complete Perscriptions</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Transactions', 'action' => 'transactions']);?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Transactions</a></li>
                <li><a href="<?= $this->Url->build(['controller' => 'Statements', 'action' => 'statements']);?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Statements</a></li>
                <li><a href="#"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Messages</a></li>
                <li><a href="<?= $this->Url->build(['controller'=>'Authexs','action'=>'logout'])?>"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</div>