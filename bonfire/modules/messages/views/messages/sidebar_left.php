<div class='side-left'>

	<div class=' left-bar-widget'>
		<a class="btn btn-large btn-block" href="<?php echo site_url('messages/messages/write_mail') ?>"><i class="icon-edit"></i> Σύνταξη Νέου Μηνύματος</a>
	</div>

	<hr>

	<div class=' left-bar-widget'>
		<div class="nums left">
			<table class=''>
				<thead>
					<tr>
						<th class="span4">
							<a href="<?php echo site_url('messages/mails') ?>">
								<?php if (isset($count_inbox_mails) && $count_inbox_mails > 0) : echo $count_inbox_mails; ?>
								<?php else : ?>
								0
	    						<?php endif; ?>
							</a>
						</th>
						<th class="span4">
							<a href="<?php echo site_url('messages/send_mails') ?>">
								<?php if (isset($count_send_mails) && $count_send_mails > 0) : echo $count_send_mails; ?>
								<?php else : ?>
								0
	    						<?php endif; ?>
							</a>
						</th >
						<th class="span4">
							<a href="<?php echo site_url('messages/delete_mails') ?>">
								<?php if (isset($count_trash_mails) && $count_trash_mails > 0) : echo $count_trash_mails; ?>
								<?php else : ?>
								0
	    						<?php endif; ?>
							</a>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="span4">
							Εισερχόμενα &nbsp;
						</td>
						<td class="span4">
							Απεσταλμένα &nbsp;
						</td>
						<td class="span4">
							Διαγραμμένα &nbsp;
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<hr>

</div>