<div class="registroasistentes form">
<?php echo $this->Form->create('Registroasistente', array('type'=> 'file'));?>
	<fieldset>
		<legend><?php echo __('Registro Asistente'); ?></legend>
	<?php
		echo $this->Form->input('evento_id');
		echo $this->Form->input('tipo_asistente',array('options'=>array('interno'=>'Interno', 'externo'=>'Externo'),'type'=>'radio','class'=>'radio','legend'=>'Tipo de Asistente','default'=>'interno')) ;
		echo $this->Form->input('nombre_completo');
		echo $this->Form->input('semestre',array('default'=>'1'));
		echo $this->Form->input('foto',array('type'=>'file','label'=>'Fotografia del Asistente'));
		echo $this->Form->input('fecha_registro');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>
<div class="actions">
	<h3><?php echo __('TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'); ?></h3>
</div>
