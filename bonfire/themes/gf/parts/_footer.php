    </div><!--/.container-->

    <!-- FOOTER -->
  <footer>
    <div class='footer'>
      <div class="container" >
        <div class='row-fluid'>
          	<div class='span12'>

				<!-- <a href="http://www.gofarmer.eu" class='span1' target="_blank"><?php //echo lang('start_footer_gofarmer'); ?></a>
				<a href="http://www.gofarmer.eu" class='span1' target="_blank"><?php //echo lang('start_footer_about'); ?></a>
				<a href="http://www.gofarmer.eu" class='span1' target="_blank"><?php //echo lang('start_footer_terms'); ?></a>
				<a href="http://www.gofarmer.eu" class='span1' target="_blank"><?php //echo lang('start_footer_privacy'); ?></a>
				<a href="http://www.gofarmer.eu" class='span1' target="_blank"><?php //echo lang('start_footer_contact'); ?></a>
				<a href="http://www.gofarmer.eu" class='span1' target="_blank"><?php //echo lang('start_footer_gofarmer'); ?></a> -->
			</div>
        </div>

        <div class='footer_copy'>
          	<div class="row-fluid">
              	<div class='span12'>
                    <div class="row-fluid">
                        <div class='span4'>
                        	<?php if (ENVIRONMENT == 'development') :?>
              					<p style="float: right; margin-right: 80px;">Page rendered in {elapsed_time} seconds, using {memory_usage}.</p>
              					<?php endif; ?>
                        </div>
                        <div class='span2 '>
                            <p>Test Version 0.2.6</p>
                        </div>
                        <div class='span3'>
                            <div class="progress progress-info progress-striped active" >
                                &nbsp;&nbsp;Completed&nbsp;&nbsp;<div class="bar" style="width: 26%">26%</div>
                            </div>
                        </div>
                        <div class='span2'>
                            <p>Powered Proudly by <a href="http://www.artpixel.gr" target="_blank">ArtPixel <?php //echo BONFIRE_VERSION ?></a></p>
                        </div>
              	     </div>
          	     </div>
            </div>
        </div>
    </div>
  </footer>
	
	<?php echo theme_view('parts/modal_login'); ?>

	<div id="debug"></div>
  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery.js"><\/script>')</script>

  <?php Assets::add_js( 'jquery.pnotify.min.js' ); ?>

  <!-- This would be a good place to use a CDN version of jQueryUI if needed -->
	<?php echo Assets::js(); ?>


  <script type="text/javascript">

  // var _gaq = _gaq || [];
  // _gaq.push(['_setAccount', 'UA-34671725-1']);
  // _gaq.push(['_trackPageview']);

  // (function() {
  //   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  //   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  //   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  // })();

</script>

</body>
</html>
