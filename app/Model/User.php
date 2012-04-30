<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 */
class User extends AppModel {
    public $name='User';
    public $validate = array (
        'username'=> array(
            'required' => array (
                'rule' => array('notEmpty'),
                'message' => 'Un usuario valido es requerido'
            )
        ),
        'password'=> array(
            'required' => array (
                'rule' => array('notEmpty'),
                'message' => 'Un usuario valido es requerido'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('profesor', 'admin')),
                'message' => 'ingrese un rol valido',
                'allowEmpty' => false
            )
        )
    );

    function beforeSave () {
        if (isset ($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}
