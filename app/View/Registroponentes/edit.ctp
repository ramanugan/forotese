<div class="registroponentes form">
<?php echo $this->Form->create('Registroponente');?>
	<fieldset>
		<legend><?php echo __('Editar Registroponente'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('evento_id');
		echo $this->Form->input('tipo_ponente');
		echo $this->Form->input('nombre_completo');
		echo $this->Form->input('nombre_proyecto');
		echo $this->Form->input('semestre');
		echo $this->Form->input('foto');
		echo $this->Form->input('fecha_registro');
		echo $this->Form->input('proyecto_pdf');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>
<div class="actions">                                                                                                                                                
    <h3><?php echo __('TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'); ?></h3>                              
</div>

