<?php
	// Setup our default assets to load.
	Assets::add_js( 'bootstrap.min.js' );
	Assets::add_css( array('bootstrap.min.css', 'bootstrap-responsive.min.css','jquery.pnotify.default.css', 'jquery.pnotify.default.icons.css'));
			
	$inline  = '$(".dropdown-toggle").dropdown();';
	$inline .= '$(".tooltips").tooltip();';
	$inline .= '$(".login-btn").click(function(e){ e.preventDefault(); $("#modal-login").modal(); });';
	$inline .= '$("#appendedInputButton").focusin(function(e){ e.preventDefault(); $("#appendedInputButton").switchClass("input-medium", "input-large", 600); 
			$("#appendedInputButton").blur(function(e){ e.preventDefault(); $("#appendedInputButton").switchClass("input-large", "input-medium",  600); })
		})';

	Assets::add_js( $inline, 'inline' );

	Template::block('header', 'parts/head');

	Template::block('topbar', 'parts/topbar');
?>
