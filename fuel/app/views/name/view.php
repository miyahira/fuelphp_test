<h2>Viewing <span class='muted'>#<?php echo $name->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $name->name; ?></p>

<?php echo Html::anchor('name/edit/'.$name->id, 'Edit'); ?> |
<?php echo Html::anchor('name', 'Back'); ?>