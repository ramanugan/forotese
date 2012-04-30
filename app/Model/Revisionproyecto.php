<?php
App::uses('AppModel', 'Model');
/**
 * Revisionproyecto Model
 *
 * @property Registroponentes $Registroponentes
 * @property Users $Users
 */
class Revisionproyecto extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Registroponentes' => array(
			'className' => 'Registroponentes',
			'foreignKey' => 'registroponentes_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
