<?php
class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'registroasistentes', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'inicio'),
            'authorize' => array('Controller')
            )
        );
    public function beforeFilter() {
        $this->Auth->allow('view');
    }

    public function beforeRender(){
        $this->set('currentUser', $this->Auth->user());
    }

    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        return false;
    }

}
