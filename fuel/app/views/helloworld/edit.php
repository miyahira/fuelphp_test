<h2>Editing <span class='muted'>HelloWorld</span></h2>
<br>

<?php echo render('helloworld/_form'); ?>
<p>
	<?php echo Html::anchor('helloworld/view/'.$HelloWorld->id, 'View'); ?> |
	<?php echo Html::anchor('helloworld', 'Back'); ?></p>
