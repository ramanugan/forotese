<div class="registroasistentes index">
	<h2><?php echo __('Registroasistentes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('evento_id');?></th>
			<th><?php echo $this->Paginator->sort('tipo_asistente');?></th>
			<th><?php echo $this->Paginator->sort('nombre_completo');?></th>
			<th><?php echo $this->Paginator->sort('semestre');?></th>
			<th><?php echo $this->Paginator->sort('foto');?></th>
			<th><?php echo $this->Paginator->sort('fecha_registro');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th class="actions"><?php echo __('acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($registroasistentes as $registroasistente): ?>
	<tr>
		<td><?php echo h($registroasistente['Registroasistente']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($registroasistente['Evento']['id'], array('controller' => 'eventos', 'action' => 'view', $registroasistente['Evento']['id'])); ?>
		</td>
		<td><?php echo h($registroasistente['Registroasistente']['tipo_asistente']); ?>&nbsp;</td>
		<td><?php echo h($registroasistente['Registroasistente']['nombre_completo']); ?>&nbsp;</td>
		<td><?php echo h($registroasistente['Registroasistente']['semestre']); ?>&nbsp;</td>
		<td><?php echo h($registroasistente['Registroasistente']['foto']); ?>&nbsp;</td>
		<td><?php echo h($registroasistente['Registroasistente']['fecha_registro']); ?>&nbsp;</td>
		<td><?php echo h($registroasistente['Registroasistente']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $registroasistente['Registroasistente']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $registroasistente['Registroasistente']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $registroasistente['Registroasistente']['id']), null, __('Esta seguro de eliminar el registro # %s?', $registroasistente['Registroasistente']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registros de {:count}, empezando en el registro {:start}, finalizando en {:end}')
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
	</ul>
</div>
