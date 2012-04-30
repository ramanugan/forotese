<?php
App::uses('AppController', 'Controller');
/**
 * Registroasistentes Controller
 *
 * @property Registroasistente $Registroasistente
 */
class RegistroasistentesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }


/**
 * index method
 *
 * @return void
 */
    public function index() {
        if ($this->Auth->user('role') == 'admin') {
            $this->Registroasistente->recursive = 0;
            $this->set('registroasistentes', $this->paginate());
        }  else {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
         }
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

        $this->Registroasistente->id = $id;
		if (!$this->Registroasistente->exists()) {
			throw new NotFoundException(__('Invalido registroasistente'));
		}
		$this->set('registroasistente', $this->Registroasistente->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
            $this->Registroasistente->create();
            if ($this->request->data['Registroasistente']['foto']['size'] && 
                !$this->request->data['Registroasistente']['foto']['error']) {
                    //obtenemos el nombre del archivo y le agregamos un uuid
                    $uuid = uniqid('asistente_'). '_';
                    move_uploaded_file($this->request->data['Registroasistente']['foto']['tmp_name'], WWW_ROOT.'uploadFiles/'.$uuid.$this->request->data['Registroasistente']['foto']['name']);
                    $this->request->data['Registroasistente']['foto'] = $uuid.$this->request->data['Registroasistente']['foto']['name'];  
                    $this->createthumb(WWW_ROOT.'uploadFiles/'.$this->request->data['Registroasistente']['foto'], WWW_ROOT.'uploadFiles/thumb_'.$this->request->data['Registroasistente']['foto'],100,100);
                if ($this->Registroasistente->save($this->request->data)) {
                    $this->Session->setFlash(__('Su registro ha sido guardado exitosamente.'));
                    $this->redirect(array('controller'=>'pages','action' => 'inicio'));
			    } else {
				    $this->Session->setFlash(__('El registro del asistente no se pudo guardar.Por favor, intentelo de nuevo.'));
                }
            }
		}
        $eventos = $this->Registroasistente->Evento->find('list',array('fields' => 'Evento.nombre_del_evento'));
		$this->set(compact('eventos'));
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

        $this->Registroasistente->id = $id;
		if (!$this->Registroasistente->exists()) {
			throw new NotFoundException(__('Invalido registroasistente'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Registroasistente->save($this->request->data)) {
				$this->Session->setFlash(__('El registroasistente ha sido guardado.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El registroasistente no se pudo guardar.Por favor, intentelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->Registroasistente->read(null, $id);
		}
		$eventos = $this->Registroasistente->Evento->find('list');
		$this->set(compact('eventos'));
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
		$this->Registroasistente->id = $id;
		if (!$this->Registroasistente->exists()) {
			throw new NotFoundException(__('Invalido registroasistente'));
		}
		if ($this->Registroasistente->delete()) {
			$this->Session->setFlash(__('Registroasistente eliminado.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Registroasistente no se pudo eliminar.'));
		$this->redirect(array('action' => 'index'));
    }
    /*
     *  Function createthumb($name,$filename,$new_w,$new_h)
     *  creates a resized image
     *  variables:
     *  $name       Original filename
     *  $filename   Filename of the resized image
     *  $new_w      width of resized image
     *  $new_h      height of resized image
     **/
    function createthumb($name,$filename,$new_w,$new_h) {
        $system=explode(".",$name);
        if (preg_match("/jpg|jpeg/",$system[1])){
            $src_img=imagecreatefromjpeg($name);
        }
        if (preg_match("/png/",$system[1])){
            $src_img=imagecreatefrompng($name);
        }
        $old_x=imageSX($src_img);
        $old_y=imageSY($src_img);
        if ($old_x > $old_y) {
            $thumb_w=$new_w;
            $thumb_h=$old_y*($new_h/$old_x);
        }
        if ($old_x < $old_y) {
            $thumb_w=$old_x*($new_w/$old_y);
            $thumb_h=$new_h;
        }
        if ($old_x == $old_y) {
            $thumb_w=$new_w;
            $thumb_h=$new_h;
        }

        $dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
        imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
        if (preg_match("/png/",$system[1])) {
            imagepng($dst_img,$filename); 
        } else {
            imagejpeg($dst_img,$filename); 
        }
        imagedestroy($dst_img); 
        imagedestroy($src_img); 
    }

}
