<?php
App::uses('AppController', 'Controller');
/**
 * Revisionproyectos Controller
 *
 * @property Revisionproyecto $Revisionproyecto
 */
class RevisionproyectosController extends AppController {

    public $uses= array('Revisionproyecto','Registroponente', 'User'); 
/**
 * index method
 *
 * @return void
 */
    public function index() {
        if ($this->Auth->user('role') != 'admin' ) {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
   		$this->Revisionproyecto->recursive = 0;
        $this->set('revisionproyectos', $this->paginate());
       
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
    public function view($id = null) {
         if ($this->Auth->user('role') != 'admin' ) {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
       
		$this->Revisionproyecto->id = $id;
		if (!$this->Revisionproyecto->exists()) {
			throw new NotFoundException(__('Invalido revisionproyecto'));
		}
		$this->set('revisionproyecto', $this->Revisionproyecto->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
    public function add() {
         if ($this->Auth->user('role') != 'admin' ) {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
		if ($this->request->is('post')) {
			$this->Revisionproyecto->create();
			if ($this->Revisionproyecto->save($this->request->data)) {
				$this->Session->setFlash(__('El revisionproyecto ha sido salvado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El revisionproyecto no pudo salvarse. Por favor, intente de nuevo.'));
			}
		}
		$registroponentes = $this->Revisionproyecto->Registroponente->find('list');
        $users = $this->Revisionproyecto->User->find('list');
		$this->set(compact('registroponentes', 'users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
          if ($this->Auth->user('role') != 'admin' ) {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
		$this->Revisionproyecto->id = $id;
		if (!$this->Revisionproyecto->exists()) {
			throw new NotFoundException(__('Invalido revisionproyecto'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Revisionproyecto->save($this->request->data)) {
				$this->Session->setFlash(__('El revisionproyecto ha sido salvado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El revisionproyecto no pudo salvarse. Por favor, intente de nuevo.'));
			}
		} else {
			$this->request->data = $this->Revisionproyecto->read(null, $id);
		}
		$registroponentes = $this->Registroponente->find('list');
        $users = $this->User->find('list',array('fields' => 'User.nombre_completo', 
                                                'conditions' => array('User.id !=' => '1')));
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        if ($this->Auth->user('role') != 'admin' ) {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Revisionproyecto->id = $id;
		if (!$this->Revisionproyecto->exists()) {
			throw new NotFoundException(__('Invalido revisionproyecto'));
		}
		if ($this->Revisionproyecto->delete()) {
			$this->Session->setFlash(__('Revisionproyecto borrado'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Revisionproyecto no se pudo borrar'));
		$this->redirect(array('action' => 'index'));
    }

    function download($filepdf) {
        if ($this->Auth->user('role') != 'admin' ) {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
        $fileData = fread(fopen(WWW_ROOT.'uploadFiles/'.$filepdf, "r"),filesize(WWW_ROOT.'uploadFiles/'.$filepdf));
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$filepdf.'"');
        echo WWW_ROOT.'uploadFiles/'.$fileData;
        exit();
    }
}
