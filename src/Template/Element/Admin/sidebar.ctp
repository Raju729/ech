  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=$this->URL->image('Admin/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin-EHC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=$this->URL->image('admin/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Afia Islam</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item  ">
            <a href="#" class="nav-link <?= $this->fetch('dashboardmenu') ?>">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

          </li>

         <li class="nav-item has-treeview <?= $this->fetch('membermenuopen') ?> ">
            <a href="#" class="nav-link <?= $this->fetch('membermenu') ?> ">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Members
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'add']);?>" class="nav-link  <?= $this->fetch('membermenuadd') ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'users']);?>" class="nav-link <?= $this->fetch('membermenudetails') ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p> All Members</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview <?= $this->fetch('doctormenuopen') ?>">
                <a href="#" class="nav-link <?= $this->fetch('doctormenu') ?>">
                    <i class="nav-icon fa fa-tree"></i>
                    <p>
                        Doctors
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo $this->Url->build(['controller' => 'Doctors', 'action' => 'add']);?>" class="nav-link <?= $this->fetch('doctormenuadd') ?>">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Add </p>
                        </a>
                    </li>
                    <li class="nav-item">
                       <a href="<?php echo $this->Url->build(['controller' => 'Doctors', 'action' => 'doctors']);?>" class="nav-link <?= $this->fetch('doctormenudetails') ?>">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>All Doctors</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item has-treeview <?= $this->fetch('patientmenuopen') ?>">
                <a href="" class="nav-link <?= $this->fetch('patientmenu') ?>">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>
                        Patients
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo $this->Url->build(['controller' => 'Patients', 'action' => 'add']);?>" class="nav-link <?= $this->fetch('patientmenuadd') ?>">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo $this->Url->build(['controller' => 'Patients', 'action' => 'patients']);?>" class="nav-link <?= $this->fetch('patientmenudetails') ?>">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Patient Details</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview <?= $this->fetch('presmenuopen') ?>">
                <a href="" class="nav-link <?= $this->fetch('presmenu') ?>">
                    <i class="nav-icon fa fa-edit"></i>
                    <p>
                        Prescription
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescription','?'=>['op'=>'review']]);?>" class="nav-link <?= $this->fetch('presmenureview') ?>">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Review</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescription','?'=>['op'=>'pending']]);?>" class="nav-link <?= $this->fetch('presmenupending') ?>">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Pending</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescription','?'=>['op'=>'complete']]);?>" class="nav-link <?= $this->fetch('presmenucomplete') ?>">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Complete</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= $this->Url->build(['controller' => 'Prescriptions', 'action' => 'prescription','?'=>['op'=>'cancel']]);?>" class="nav-link <?= $this->fetch('presmenucancel') ?>">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Cancel</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview <?= $this->fetch('trxmenuopen') ?>">
                <a href="#" class="nav-link <?= $this->fetch('trxmenu') ?>">
                    <i class="nav-icon fa fa-table"></i>
                    <p>
                        Transaction
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo $this->Url->build(['controller' => 'Transactions', 'action' => 'alltrx']);?>" class="nav-link <?= $this->fetch('trxmenudetails') ?>">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>All Transaction</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $this->Url->build(['controller' => 'Transactions', 'action' => 'refund']);?>" class="nav-link <?= $this->fetch('patientmenurefund') ?>">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Refund History</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-tree"></i>
                    <p>
                        Staff
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/UI/general.html" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Add Staff</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/UI/icons.html" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>staff Details</p>
                        </a>
                    </li>

                </ul>
            </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Patients
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Patient Details</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">SETTINGS</li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                HHH-Settings
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>set-01</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>set-02</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>set-03</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-plus-square-o"></i>
              <p>
                Extras
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>HHH-History</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>