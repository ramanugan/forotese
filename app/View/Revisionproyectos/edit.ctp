<div class="ponente view">
    <table>
        <thead>
            <tr>
                <td>
                    Datos del Proyecto a Evaluar
                </td>
                <td></td>
            </tr>
        </thead>
        <tr>
            <td>Nombre del Ponente</td>
            <td><?php echo $this->data['Registroponentes']['nombre_completo'];?></td>
        </tr>
         <tr>
            <td>Nombre del Proyecto</td>
            <td><?php echo $this->data['Registroponentes']['nombre_proyecto'];?></td>
        </tr>
         <tr>
            <td>Fotografia del Ponente</td>
            <td><?php echo $this->Html->image('../uploadFiles/thumb_'. $this->data['Registroponentes']['foto'], array('fullBase' => true, 'align' => 'center'));?>
 </td>
        </tr>
         <tr>
            <td>Proyecto en PDF</td>
            <td><?php echo $this->Html->link(__($this->data['Registroponentes']['proyecto_pdf']), array('controller' => 'revisionproyectos','action' => 'download', $this->data['Registroponentes']['proyecto_pdf'])); ?>
 </td>
        </tr>


    </table>
</div>


<div class="revisionproyectos form">
<?php echo $this->Form->create('Revisionproyecto');?>
	<fieldset>
		<legend><?php echo __('Asignacion de Proyecto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('registroponentes_id', array('type'=>'hidden'));
		echo $this->Form->input('users_id', array('label'=>'Profesor Asignado'));
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
