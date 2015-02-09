<h2>Editing <span class='muted'>Name</span></h2>
<br>

<?php echo render('name/_form'); ?>
<p>
	<?php echo Html::anchor('name/view/'.$name->id, 'View'); ?> |
	<?php echo Html::anchor('name', 'Back'); ?></p>
