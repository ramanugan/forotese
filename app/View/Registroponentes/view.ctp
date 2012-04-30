<div class="registroponentes view">
<h2><?php  echo __('Registroponente');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($registroponente['Registroponente']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evento'); ?></dt>
		<dd>
			<?php echo $this->Html->link($registroponente['Evento']['id'], array('controller' => 'eventos', 'action' => 'view', $registroponente['Evento']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Ponente'); ?></dt>
		<dd>
			<?php echo h($registroponente['Registroponente']['tipo_ponente']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Completo'); ?></dt>
		<dd>
			<?php echo h($registroponente['Registroponente']['nombre_completo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Proyecto'); ?></dt>
		<dd>
			<?php echo h($registroponente['Registroponente']['nombre_proyecto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Semestre'); ?></dt>
		<dd>
			<?php echo h($registroponente['Registroponente']['semestre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foto'); ?></dt>
		<dd>
			<?php echo h($registroponente['Registroponente']['foto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Registro'); ?></dt>
		<dd>
			<?php echo h($registroponente['Registroponente']['fecha_registro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proyecto Pdf'); ?></dt>
		<dd>
			<?php echo h($registroponente['Registroponente']['proyecto_pdf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($registroponente['Registroponente']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">                                                                                                                                                
    <h3><?php echo __('TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'); ?></h3>                              
</div>

