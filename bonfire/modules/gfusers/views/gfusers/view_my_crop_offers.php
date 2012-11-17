<div class="my-crop-offers">
	<div class="accordion" id="accordion2">
	    <div class="accordion-group">
	      <div class="accordion-heading">
	        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
	        	<ul>
	        		<li class="divider-vertical">
	        			<h4 class="">Ροδάκινα <small><span ><em>ποικιλία <b>Έβερτ</b></em></span></small></h4>
	        		</li>
	        		<li>
	        			lkjdashldkaj
	        		</li>
	        	</ul>
	          	
	        </a>
	      </div>
	      <div id="collapseOne" class="accordion-body collapse in">
	        <div class="accordion-inner">
	          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
	        </div>
	      </div>
	    </div>
	    <div class="accordion-group">
	      <div class="accordion-heading">
	        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
	          Collapsible Group Item #2
	        </a>
	      </div>
	      <div id="collapseTwo" class="accordion-body collapse">
	        <div class="accordion-inner">
	          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
	        </div>
	      </div>
	    </div>
	    <div class="accordion-group">
	      <div class="accordion-heading">
	        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
	          Collapsible Group Item #3
	        </a>
	      </div>
	      <div id="collapseThree" class="accordion-body collapse">
	        <div class="accordion-inner">
	          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
	        </div>
	      </div>
	    </div>
	</div>
</div>






<div class="media">
  <a class="pull-left" href="#">
    <img class="media-object" src="http://placehold.it/64x64">
  </a>
  <div class="media-body">
    <h4 class="media-heading">Ροδάκινα<small>
    	<span class='pull-right'><em>ποικιλία <b>Έβερτ</b></em>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<em>ποσότητα&nbsp;&nbsp;&nbsp;<b>36</b> τόνοι</em></span></small></h4>
    <p>
    	<span class="muted">
    		Συμβατική Καλλιέργεια &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Συσκευασία <b>Ναί</b>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Ποιότητα <b>Α</b>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Τιμή <b>360</b> &#8364; / ανά τόνο &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; διαθέση από <b>Νοεμ 2012</b>
    	</span>
    </p>
    <p>Πώς ακολουθείς σωστή διατροφή όταν έχεις αλλεργία στο αλεύρι, το αυγό ή τα γαλακτοκομικά; Ποια είναι τα μυστικά της; Πώς η γυμναστική την έκανε πιο... ήρεμο άνθρωπο; Έχουμε όλα τα μυστικά της εδώ!</p>
    <small class='muted'>Τελευταία ενημέρωση στις <b>18 Οκτ, 2012</b></small>
    <hr>
  </div>
</div>







<div class="my-crop_offers">
	<h3><?php echo lang('crop_view_my_crops_title') ?></h3><hr>
	<?php echo form_open($this->uri->uri_string()); ?>	
		<?php if (isset($records) && is_array($records) && count($records)) : ?>
			<?php foreach ($records as $record) : ?>
				<div class="media">
			      <a class="pull-left" href="#">
			        <img class="media-object" src="<?php echo base_url('assets/images/weat-64.png'); ?>" width='64' height='64'>
			      </a>
			      <div class="media-body">
			        <h4 class="media-heading"><a href="#"><?php echo $record->crops_gr?></a><small><span class='pull-right'><em>στρέμματα&nbsp;&nbsp;&nbsp;<b><?php echo $record->hectar?></b> στρ.</em></span></small></h4>
			        <p><em>ποικιλία <b><?php echo $record->crop_variety_gr?></b></em>&nbsp;&nbsp;&nbsp;
		        		<?php if($record->certification == 0) : ?>
							<?php echo '<span class="muted">|&nbsp;&nbsp;&nbsp; Συμβατική Καλλιέργεια</span>'; ?>
						<?php elseif ($record->certification == 1) : ?>
							<?php echo '<span class="text-info">|&nbsp;&nbsp;&nbsp; Ολοκληρωμένη Διαχείρηση</span>'; ?>
						<?php else : ?>
							<?php echo '<span class="text-success">|&nbsp;&nbsp;&nbsp; Βιολογική Καλλιέργεια</span>'; ?>
						<?php endif ?>
			        </p>
			        <p><?php echo $record->comment?></p>
			        <small class='muted'>Τελευταία ενημέρωση στις <b><?php echo date('j M, Y', strtotime($record->created_on)); ?></b></small>
			      </div>
			    </div>
			    <hr>
			<?php endforeach; ?>
		<?php else: ?>
			No records found that match your selection.
		<?php endif; ?>
	<?php echo form_close(); ?>
</div>