<?php
App::uses('AppModel', 'Model');
/**
 * Registroasistente Model
 *
 * @property Evento $Evento
 */
class Registroasistente extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
        'evento_id' => array(
                'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
        'tipo_asistente' => array(
                'rule' => array('inList', array('interno','externo')),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
        ),
        'nombre_completo' => array(
                'rule' => array('notEmpty'),
                'message' => 'Ingrese su nombre completo',
                'allowEmpty' => false,
                'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
        ),
        'semestre' => array(
                'rule' => array('between', 1,10),
                'message' => 'El intervalo de numero de semestres es del 1 al 10',
                'allowEmpty' => false,
                'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
        ),
        'foto' => array(
                'rule' => array('extension', array('jpeg', 'png', 'jpg')),
                'message' => 'Para la fotografia solo se aceptan archivos en formato: jpeg, png y jpg',
                'allowEmpty' => false,
                'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
        ),
        'fecha_registro' => array(
                'rule' => array('date'),
                'message' => 'Favor de ingresar una fecha valida',
                'allowEmpty' => false,
                'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
        ),
        'email' => array(
                'rule' => array('email'),
                'message' => 'Favor de ingresar un email valido',
                'allowEmpty' => false,
                'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
        ),


	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Evento' => array(
			'className' => 'Evento',
			'foreignKey' => 'evento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
