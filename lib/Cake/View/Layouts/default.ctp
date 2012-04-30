<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>:
		<?php //echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
    <?php 
    if ($currentUser['id'] != 0) 
       if ( isset($currentUser) && $currentUser['id'] == 1) {
    ?>
		<div id="header">
            <ul class="menu_color2">
                <li>Asistentes
                    <ul>
                        <li><?php echo $this->Html->link(__('Agregar'), array('controller' => 'registroasistentes','action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('Listar'), array('controller' => 'registroasistentes','action' => 'index')); ?></li>
                    </ul>
                </li>
                <li>Ponentes
                    <ul>
                        <li><?php echo $this->Html->link(__('Agregar'), array('controller' => 'registroponentes','action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('Listar'), array('controller' => 'registroponentes','action' => 'index')); ?></li>
                    </ul>
                </li>
                 <li>Eventos
                    <ul>
                        <li><?php echo $this->Html->link(__('Agregar'), array('controller' => 'eventos','action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('Listar'), array('controller' => 'eventos','action' => 'index')); ?></li>
                    </ul>
                </li>
                <li>Revision Proyectos
                    <ul>
                        <li><?php echo $this->Html->link(__('Listar'), array('controller' => 'revisionproyectos','action' => 'index')); ?></li>
                    </ul>
                </li>
                 <li>Usuarios(Profesores)
                    <ul>
                        <li><?php echo $this->Html->link(__('Agregar'), array('controller' => 'users','action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('Listar'), array('controller' => 'users','action' => 'index')); ?></li>
                    </ul>
                </li>
                  <li>Utilidades
                    <ul>
                        <li><?php echo $this->Html->link(__('Imprimir Gafete'), array('controller' => 'falta','action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('Lista de Proyectos'), array('controller' => 'falta','action' => 'index')); ?></li>
                    </ul>
                </li>
             <li><?php echo $this->Html->link(__('Salir'), array('controller' => 'users','action' => 'logout')); ?></li> 
            </ul>
		</div> 
    <?php 
        } else if ( isset($currentUser) && $currentUser['id'] != 1) {
    ?>
		<div id="header">
            <ul class="menu_color2">
                   <li>Revision Proyectos
                    <ul>
                        <li><?php echo $this->Html->link(__('Listar'), array('controller' => 'revisionproyectos','action' => 'index')); ?></li>
                    </ul>
                </li>
                  <li>Utilidades
                    <ul>
                        <li><?php echo $this->Html->link(__('Imprimir Gafete'), array('controller' => 'falta','action' => 'add')); ?></li>
                        <li><?php echo $this->Html->link(__('Lista de Proyectos'), array('controller' => 'falta','action' => 'index')); ?></li>
                    </ul>
                </li>
             <li><?php echo $this->Html->link(__('Salir'), array('controller' => 'users','action' => 'logout')); ?></li> 
            </ul>
		</div> 
<?php
        }
?>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>
		<div id="footer">
            <?php 
                    /*
                    echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
                );
                     */
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
