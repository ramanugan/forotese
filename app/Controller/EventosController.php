<?php
App::uses('AppController', 'Controller');
/**
 * Eventos Controller
 *
 * @property Evento $Evento
 */
class EventosController extends AppController {


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
		$this->Evento->recursive = 0;
		$this->set('eventos', $this->paginate());
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
        $this->Evento->id = $id;
		if (!$this->Evento->exists()) {
			throw new NotFoundException(__('Invalido evento'));
		}
		$this->set('evento', $this->Evento->read(null, $id));
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
			$this->Evento->create();
			if ($this->Evento->save($this->request->data)) {
				$this->Session->setFlash(__('El evento ha sido guardado.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El evento no se pudo guardar.Por favor, intentelo de nuevo.'));
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

        $this->Evento->id = $id;
		if (!$this->Evento->exists()) {
			throw new NotFoundException(__('Invalido evento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Evento->save($this->request->data)) {
				$this->Session->setFlash(__('El evento ha sido guardado.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El evento no se pudo guardar.Por favor, intentelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->Evento->read(null, $id);
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
		$this->Evento->id = $id;
		if (!$this->Evento->exists()) {
			throw new NotFoundException(__('Invalido evento'));
		}
		if ($this->Evento->delete()) {
			$this->Session->setFlash(__('Evento eliminado.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Evento no se pudo eliminar.'));
		$this->redirect(array('action' => 'index'));
	}
}
