<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo isset($page_title) ? $page_title .' : ' : ''; ?> <?php e($this->settings_lib->item('site.title')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php 
    	Assets::add_js( 'bootstrap.min.js' ); ?>
    	<style type="text/css">
                    body {
                      padding-top: 40px;
                      padding-bottom: 0px;
                    }
                </style>
	<?php	Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.min.css'));
	?>
				<script src="<?php echo Template::theme_url('js/modernizr-2.5.3.js') ?>"></script>

				<?php echo Assets::css(); ?>
				

    <!-- iPhone and Mobile favicon's and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-114x114.png">

  </head>
<body>
<!--[if lt IE 7]>
		<p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or
		<a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p>
<![endif]-->



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
			<a href="#" class="brand" title="GoFarmer - Social Farming"><b>[<img src="<?php echo base_url('assets/images/tractor-x03.png'); ?>"  width='30' height='30' class="">]</b>&nbsp;Go<span>Farmer</span></a>
			<?php //echo anchor( '/', 'Go<span>Farmer</span>', 'class="brand"', 'title="GoFarmer"' ); ?>

			<!-- Everything you want hidden at 940px or less, place within here -->
			<div class="nav-collapse collapse">
				
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

							<?php if (has_permission('Site.Content.View')) : ?>

							<?php endif; ?>
							<li>
								<a href="<?php echo site_url('logout');?>">
									<i class="icon-off"></i>  <?php echo lang('bf_action_logout') ?>
								</a>
							</li>
						</ul>
					</li>

					<?php else :  ?>


					<?php endif; ?>
				</ul>
				

			</div><!--/.nav-collapse -->
		</div>	<!-- /.container -->
	</div>	<!-- /.navbar-inner -->
</div>	<!-- /.navbar -->
<!-- End of Navbar Template -->

