<div class="registroasistentes view">
<h2><?php  echo __('Registroasistente');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($registroasistente['Registroasistente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($registroasistente['Evento']['id'], array('controller' => 'eventos', 'action' => 'view', $registroasistente['Evento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Asistente'); ?></dt>
		<dd>
			<?php echo h($registroasistente['Registroasistente']['tipo_asistente']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Completo'); ?></dt>
		<dd>
			<?php echo h($registroasistente['Registroasistente']['nombre_completo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Semestre'); ?></dt>
		<dd>
			<?php echo h($registroasistente['Registroasistente']['semestre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foto'); ?></dt>
		<dd>
			<?php echo h($registroasistente['Registroasistente']['foto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Registro'); ?></dt>
		<dd>
			<?php echo h($registroasistente['Registroasistente']['fecha_registro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($registroasistente['Registroasistente']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'); ?></h3>
	</ul>
</div>


