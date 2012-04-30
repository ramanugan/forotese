<div class="revisionproyectos index">
	<h2><?php echo __('Revisión y asignación de proyectos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('registroponentes_id');?></th>
			<th><?php echo $this->Paginator->sort('users_id');?></th>
			<th><?php echo $this->Paginator->sort('estatus');?></th>
			<th><?php echo $this->Paginator->sort('comentarios_profesor');?></th>
			<th><?php echo $this->Paginator->sort('fecha_exposicion');?></th>
			<th><?php echo $this->Paginator->sort('hora_exposicion');?></th>
			<th><?php echo $this->Paginator->sort('lugar');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($revisionproyectos as $revisionproyecto): ?>
		<td><?php echo h($revisionproyecto['Revisionproyecto']['id']); ?>&nbsp;</td>
		<td><?php echo h($revisionproyecto['Registroponentes']['nombre_completo']); ?>&nbsp;</td>
		<td><?php echo h($revisionproyecto['Users']['nombre_completo']); ?></td>
		<td><?php echo h($revisionproyecto['Revisionproyecto']['estatus']); ?>&nbsp;</td>
		<td><?php echo h($revisionproyecto['Revisionproyecto']['comentarios_profesor']); ?>&nbsp;</td>
		<td><?php echo h($revisionproyecto['Revisionproyecto']['fecha_exposicion']); ?>&nbsp;</td>
		<td><?php echo h($revisionproyecto['Revisionproyecto']['hora_exposicion']); ?>&nbsp;</td>
		<td><?php echo h($revisionproyecto['Revisionproyecto']['lugar']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $revisionproyecto['Revisionproyecto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $revisionproyecto['Revisionproyecto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $revisionproyecto['Revisionproyecto']['id']), null, __('Are you sure you want to delete # %s?', $revisionproyecto['Revisionproyecto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">                                                                                                                                                
    <h3><?php echo __('TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'); ?></h3>                                                                                                                                   
</div>
