<div class="eventos form">
<?php echo $this->Form->create('Evento');?>
	<fieldset>
		<legend><?php echo __('Agregar Evento'); ?></legend>
	<?php
		echo $this->Form->input('nombre_del_evento');
		echo $this->Form->input('fecha_del_evento');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>
<div class="actions">                                                                                                                                                
    <h3><?php echo __('TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'); ?></h3>                                                                                                                                   
</div>
