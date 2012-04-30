<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function isAuthorized($user) {
        if ($user['role'] === 'admin') 
            return true;
        else
            return false;
    }


    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                    $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('usuario o clave invalidas'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

/**
 * index method
 *
 * @return void
 */
    public function index() {
        if ($this->Auth->user('role') != 'admin') {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
        $this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
         if ($this->Auth->user('role') != 'admin') {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
       
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalido user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
    public function add() {
         if ($this->Auth->user('role') != 'admin') {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
       
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El user ha sido salvado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El user no pudo salvarse. Por favor, intente de nuevo.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
         if ($this->Auth->user('role') != 'admin') {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
       
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalido user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El user ha sido salvado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El user no pudo salvarse. Por favor, intente de nuevo.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
         if ($this->Auth->user('role') != 'admin') {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
       
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalido user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User borrado'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User no se pudo borrar'));
		$this->redirect(array('action' => 'index'));
	}
}
