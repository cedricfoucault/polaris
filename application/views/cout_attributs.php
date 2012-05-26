<h2><?php echo $title?></h2>
<table>
	<tr>
		<th>Niveau</th>
		<th>Points d'attributs</th>
	</tr>
	<?php foreach ($cout_attributs as $row): ?>
		<tr>
			<td><?php echo $row->niveau?></td>
			<td><?php echo $row->points?></td>
		</tr>
	<?php endforeach ?>
	</table>
	<?php echo anchor('personnage/creation', 'Retourner à la création de personnage');?>