this is crops file
<?php echo $crop; ?>

<?php if (isset($crop) && is_array($crop) && count($crop)) : ?>
	<?php foreach ($crop as $crops) : ?>

		<?php print_r($crops) ; ?>

	<?php endforeach; ?>
<?php endif; ?>