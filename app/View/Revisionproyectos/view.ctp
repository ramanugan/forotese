<div class="revisionproyectos view">
<h2><?php  echo __('Revisionproyecto');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($revisionproyecto['Revisionproyecto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registroponentes'); ?></dt>
		<dd>
			<?php echo $this->Html->link($revisionproyecto['Registroponentes']['id'], array('controller' => 'registroponentes', 'action' => 'view', $revisionproyecto['Registroponentes']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Users'); ?></dt>
		<dd>
			<?php echo $this->Html->link($revisionproyecto['Users']['id'], array('controller' => 'users', 'action' => 'view', $revisionproyecto['Users']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estatus'); ?></dt>
		<dd>
			<?php echo h($revisionproyecto['Revisionproyecto']['estatus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comentarios Profesor'); ?></dt>
		<dd>
			<?php echo h($revisionproyecto['Revisionproyecto']['comentarios_profesor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Exposicion'); ?></dt>
		<dd>
			<?php echo h($revisionproyecto['Revisionproyecto']['fecha_exposicion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Exposicion'); ?></dt>
		<dd>
			<?php echo h($revisionproyecto['Revisionproyecto']['hora_exposicion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lugar'); ?></dt>
		<dd>
			<?php echo h($revisionproyecto['Revisionproyecto']['lugar']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">                                                                                                                                                
    <h3><?php echo __('TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'); ?></h3>                                                                                                                                   
</div>
