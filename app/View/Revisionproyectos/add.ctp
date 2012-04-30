<div class="revisionproyectos form">
<?php echo $this->Form->create('Revisionproyecto');?>
	<fieldset>
		<legend><?php echo __('Add Revisionproyecto'); ?></legend>
	<?php
		echo $this->Form->input('registroponentes_id');
		echo $this->Form->input('users_id');
		echo $this->Form->input('estatus');
		echo $this->Form->input('comentarios_profesor');
		echo $this->Form->input('fecha_exposicion');
		echo $this->Form->input('hora_exposicion');
		echo $this->Form->input('lugar');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">                                                                                                                                                
    <h3><?php echo __('TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'); ?></h3>                                                                                                                                   
</div>
