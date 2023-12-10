<div class="static-sidebar-wrapper sidebar-bluegray">
  <div class="static-sidebar">
    <div class="sidebar">
     <div class="widget">
      <div class="widget-body">
        <div class="userinfo">
          <div class="avatar">
            <img src="<?php echo $this->config->item('base_url');?>assets/admin/demo/avatar/avatar_13.png" class="img-responsive img-circle"> 
             
          </div>
          <div class="info">
            <span class="username"><?php echo $this->session->userdata('name') ?></span>
            <span class="useremail"><?php echo $this->session->userdata('user') ?></span>
          </div>
        </div>
      </div>
    </div>
    <div class="widget stay-on-collapse" id="widget-sidebar">
      <nav class="widget-body">
        <ul class="acc-menu">

            <li <?php if($this->uri->segment(2)=="category") { ?> class="active" <?php } ?>><a href="<?php echo $this->config->item('admin_url')."dashboard"; ?>"><i class="ti ti-home"></i><span>Dashboard</span></a></li>


            <li <?php if($this->uri->segment(2)=="pages" || $this->uri->segment(2)=="news" || $this->uri->segment(2)=="attractions" || $this->uri->segment(2)=="speakers" || $this->uri->segment(2)=="programs" || $this->uri->segment(2)=="gallery") { ?> class="active" <?php } ?> ><a href="javascript:;"><i class="ti ti-layout"></i><span>Web Settings</span></a>
              <ul class="acc-menu">
              <li <?php if($this->uri->segment(2)=="pages") {?> class="active" <?php } ?> ><a href="<?php echo $this->config->item('admin_url')."pages"; ?>"><i class="fa fa-arrow-circle-right"></i> Pages </a></li>
              <li <?php if($this->uri->segment(2)=="news") { ?> class="active" <?php } ?>><a href="<?php echo $this->config->item('admin_url')."news"; ?>"><i class="fa fa-arrow-circle-right"></i><span> News & Events</span></a></li>
            <li <?php if($this->uri->segment(2)=="attractions") { ?> class="active" <?php } ?>><a href="<?php echo $this->config->item('admin_url')."attractions"; ?>"><i class="fa fa-arrow-circle-right"></i><span> Attractions</span></a></li>
            <li <?php if($this->uri->segment(2)=="speakers") { ?> class="active" <?php } ?>><a href="<?php echo $this->config->item('admin_url')."speakers"; ?>"><i class="fa fa-arrow-circle-right"></i><span> Speakers</span></a></li>
            <li <?php if($this->uri->segment(2)=="programs") { ?> class="active" <?php } ?>><a href="<?php echo $this->config->item('admin_url')."programs"; ?>"><i class="fa fa-arrow-circle-right"></i><span> Programs</span></a></li>
            <li <?php if($this->uri->segment(2)=="abstractcat") { ?> class="active" <?php } ?>><a href="<?php echo $this->config->item('admin_url')."abstractcat"; ?>"><i class="fa fa-arrow-circle-right"></i><span> Abstract Category</span></a></li>
            <li <?php if($this->uri->segment(2)=="gallery") { ?> class="active" <?php } ?>><a href="<?php echo $this->config->item('admin_url')."gallery"; ?>"><i class="fa fa-arrow-circle-right"></i><span>  Gallery</span></a></li>
              </ul>
            </li>

            

            <li <?php if($this->uri->segment(2)=="freeusers" || $this->uri->segment(2)=="paidusers") { ?> class="active" <?php } ?> ><a href="javascript:;"><i class="ti ti-user"></i><span>User Management</span></a>
              <ul class="acc-menu">
              <li <?php if($this->uri->segment(2)=="freeusers") {?> class="active" <?php } ?> ><a href="<?php echo $this->config->item('admin_url')."freeusers"; ?>"><i class="fa fa-arrow-circle-right"></i> Unpaid User </a></li>
              <li <?php if($this->uri->segment(2)=="paidusers") {?> class="active" <?php } ?>><a href="<?php echo $this->config->item('admin_url')."paidusers"; ?>"><i class="fa fa-arrow-circle-right"></i> Paid Users</a></li>
              </ul>
            </li>

           
             <li <?php if($this->uri->segment(2)=="allabstracts") {?> class="active" <?php } ?>><a href="<?php echo $this->config->item('admin_url')."allabstracts"; ?>"><i class="fa fa-file"></i> Abstract Management</a></li>
               


 


       
     </ul>
   </nav>
 </div>
</div>
</div>
</div>