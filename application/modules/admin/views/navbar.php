<div class="extrabar-underlay"></div>

<header id="topnav" class="navbar navbar-bluegray navbar-fixed-top">

	<div class="logo-area">
		<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
			<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
				<span class="icon-bg">
					<i class="ti ti-shift-left"></i>
				</span>
			</a>
		</span>
	</div><!-- logo-area --> 


	<ul class="nav navbar-nav toolbar pull-right">


		<li class="dropdown toolbar-icon-bg">
			<a href="#" id="navbar-links-toggle" data-toggle="collapse" data-target="header>.navbar-collapse">
				<span class="icon-bg">
					<i class="ti ti-more"></i>
				</span>
			</a>
		</li>
 

		<li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
			<a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="ti ti-fullscreen"></i></span></a>
		</li>

		 

				<li class="dropdown toolbar-icon-bg">
					<a href="#" class="dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-user"></i></span></a>
					<ul class="dropdown-menu userinfo arrow">
				<!-- <li><a href="#/"><i class="ti ti-user"></i><span>Profile</span><span class="badge badge-info pull-right">73%</span></a></li>
				<li><a href="#/"><i class="ti ti-settings"></i><span>Settings</span></a></li>
				<li><a href="#/"><i class="ti ti-help-alt"></i><span>Help</span></a></li>
				<li class="divider"></li>
				<li><a href="#/"><i class="ti ti-view-list-alt"></i><span>Statement</span></a></li>
				<li><a href="#/"><i class="ti ti-stats-up"></i><span>Earnings</span></a></li> -->
				<li><a href="<?php echo $this->config->item('admin_url')."login/changepassword"; ?>"><i class="fa fa-key"></i><span>Change Password</span></a></li>
				<li class="divider"></li>
				<li><a href="<?php echo $this->config->item('admin_url')."login/logout"; ?>"><i class="ti ti-shift-right"></i><span>Sign Out</span></a></li>
			</ul>
		</li>

	</ul>

</header>