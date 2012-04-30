<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre_completo');
		echo $this->Form->input('username');
		echo $this->Form->input('clave_acceso');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar'));?>
</div>
<div class="actions">                                                                                                                                                
    <h3><?php echo __('TECNOLOGICO DE ESTUDIOS SUPERIORES DE ECATEPEC'); ?></h3>                                                                                                                                   
</div>
