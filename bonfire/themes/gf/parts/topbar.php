<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">

	    <div class="container">
			<!-- .btn-navbar is used as the toggle for collapsible content -->
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<?php //echo anchor( '/', $this->settings_lib->item('site.title'), 'class="brand"' ); ?>
			<a href="<?php echo base_url(); ?>" class="brand" title="GoFarmer"><img src="<?php echo base_url('assets/images/tractor-x03.png'); ?>"  width='30' height='30' class="">&nbsp;Go<span>Farmer</span></a>
			<?php //echo anchor( '/', 'Go<span>Farmer</span>', 'class="brand"', 'title="GoFarmer"' ); ?>

			<!-- Everything you want hidden at 940px or less, place within here -->
			<div class="nav-collapse collapse">
				<ul class="nav pull-left">
					<?php if (isset($current_user->email)) : ?>
						<li><a href="<?php echo site_url('gfusers/gf_my_profile');?>">Αρχική</a></li>
						<li class="dropdown" >
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo lang('bf_nav_crops') ?>
								<b class="caret"></b></a>

								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo site_url('crop');?>">
											<i class="icon-tasks"></i>  <?php echo lang('bf_nav_crops') ?>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('crop/my_crops');?>">
											<i class="icon-leaf"></i>  <?php echo lang('bf_nav_my_crops') ?>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('crop/add_crop');?>">
											<i class="icon-tag"></i>  <?php echo lang('bf_nav_new_crop') ?>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('crop/my_crops/edit_my_crop');?>">
											<i class="icon-tasks"></i>  <?php echo lang('bf_nav_crops') ?>Επεξ
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('gfusers/gfusers/profile');?>">
											<i class="icon-tasks"></i>  <?php echo lang('bf_nav_crops') ?>Προφίλ
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('crdemand');?>">
											<i class="icon-tasks"></i>  <?php echo lang('bf_nav_crops') ?>Ζητήσεις
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('crdemand/create');?>">
											<i class="icon-tasks"></i>  <?php echo lang('bf_nav_crops') ?>Ζήτηση
										</a>
									</li>
								</ul>
						</li>
						<li><a href="<?php echo site_url('croffer/create');?>">Προσφορά</a></li>
						<li><a href="<?php echo site_url('');?>">Ζήτηση</a></li>
						<li class="dropdown" >
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php //echo lang('bf_nav_crops') ?>Περισσότερα
								<b class="caret"></b></a>

								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo site_url('questions');?>">
											<i class="icon-tasks"></i>  <?php //echo lang('bf_nav_crops') ?>Ερωτήσεις
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('');?>">
											<i class="icon-tasks"></i>  <?php //echo lang('bf_nav_crops') ?>Αγγελίες
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('');?>">
											<i class="icon-tasks"></i>  <?php //echo lang('bf_nav_crops') ?>Ομάδες
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('');?>">
											<i class="icon-tasks"></i>  <?php //echo lang('bf_nav_crops') ?>Εκδηλώσεις
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('gfusers/all_gfusers');?>">
											<i class="icon-tasks"></i>  <?php //echo lang('bf_nav_crops') ?>Επαφές
										</a>
									</li>
									<li>
										<a href="<?php echo site_url('');?>">
											<i class="icon-tasks"></i>  <?php //echo lang('bf_nav_crops') ?>Blog
										</a>
									</li>
								</ul>
						</li>
						<li><a href="<?php echo site_url('messages/mails');?>" title='Δείτε τα μηνύματα'><i class="icon-envelope"></i>  
						
							<?php if (isset($count_inbox_mails) && $count_inbox_mails > 0) : echo '<span class="badge">' . $count_inbox_mails;  '</span>' ?>
    						<?php endif; ?>
						</a></li>
						<li><a href="<?php echo site_url('messages/mails');?>" title='Δείτε τις ειδοποιήσεις'><i class="icon-flag"></i> </a></li>

					<?php endif; ?>
				</ul>
				<ul class="nav pull-right">
					<li class="divider-vertical"></li>
<?php //style="height:40px" ?>
					<?php if (isset($current_user->email)) : ?>
					
					<li class="dropdown" >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-user"></i>&nbsp;<?php echo $current_user->username; ?>
						<?php //echo $current_user->user_img; ?>
						<b class="caret"></b></a>

						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo site_url(); ?>">
									<i class="icon-home"></i>  <?php echo lang('bf_home') ?>
								</a>
							</li>

							<?php if (has_permission('Site.Content.View')) : ?>
							<li class="divider"></li>
							<li>
								<i class="icon-lock"></i><?php echo anchor(SITE_AREA, 'Control Panel'); ?>
							</li>

							<?php endif; ?>
							<li class="divider"></li>
							<li>
								<a href="<?php echo site_url('gfusers/gfusers/profile'); //site_url('users/profile');?>">
									<i class="icon-user"></i>  <?php echo lang('bf_user_settings') ?>
								</a>
							</li>

							<li class="divider"></li>
							<li>
								<a href="<?php echo site_url('logout');?>">
									<i class="icon-off"></i>  <?php echo lang('bf_action_logout') ?>
								</a>
							</li>
						</ul>
					</li>

					<?php else :  ?>

						<li>
							<a href="<?php echo site_url('user_registration');?>">
								<?php echo lang('bf_action_register') ?>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('login');?>" class="login-btn">
								<?php echo lang('bf_action_login') ?>
							</a>
						</li>

					<?php endif; ?>
				</ul>
				<div id="navi-search" >
					<form class="pull-right">
		                <div class="input-append">
		                  <div class="btn-toolbar" style="margin: 0;">
		                    <div class="btn-group">
		                      <input class="input-medium" id="appendedInputButton" placeholder='Αναζήτηση' type="text">
		                      <button class="btn" type="submit"><i class="icon-search"></i></button>
		                    </div>
		                  </div>
		                </div>
		            </form>
				</div>
				

			</div><!--/.nav-collapse -->
		</div>	<!-- /.container -->
	</div>	<!-- /.navbar-inner -->
</div>	<!-- /.navbar -->
<!-- End of Navbar Template -->

