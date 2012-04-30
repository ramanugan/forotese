<?php
App::uses('AppController', 'Controller');
/**
 * Registroponentes Controller
 *
 * @property Registroponente $Registroponente
 */
class RegistroponentesController extends AppController {
    public $uses= array('Registroponente','Revisionproyecto');

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
         if ($this->Auth->user('role') != 'admin') {
            $this->Session->setFlash('Usted no esta autorizado en esta area');
            $this->redirect(array('controller'=> 'users', 'action' => 'login'));
            exit();
        }
		$this->Registroponente->recursive = 0;
		$this->set('registroponentes', $this->paginate());
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
		$this->Registroponente->id = $id;
		if (!$this->Registroponente->exists()) {
			throw new NotFoundException(__('Invalido registroponente'));
		}
		$this->set('registroponente', $this->Registroponente->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
            $this->Registroponente->create();
            if ($this->request->data['Registroponente']['foto']['size'] && 
                !$this->request->data['Registroponente']['foto']['error'] &&
                $this->request->data['Registroponente']['proyecto_pdf']['size'] && 
                !$this->request->data['Registroponente']['proyecto_pdf']['error']) {
                    print_r($this->request->data['Registroponente']);
                    //obtenemos el nombre del archivo y le agregamos un uuid
                    $uuid = uniqid();
                    move_uploaded_file($this->request->data['Registroponente']['foto']['tmp_name'], WWW_ROOT.'uploadFiles/ponente_foto_'.$uuid.'_'.$this->request->data['Registroponente']['foto']['name']);
                    move_uploaded_file($this->request->data['Registroponente']['proyecto_pdf']['tmp_name'], WWW_ROOT.'uploadFiles/ponente_pdf_'.$uuid.'_'.$this->request->data['Registroponente']['proyecto_pdf']['name']);
                    $this->request->data['Registroponente']['foto'] = 'ponente_foto_'.$uuid.'_'.$this->request->data['Registroponente']['foto']['name'];     
                    $this->createthumb(WWW_ROOT.'uploadFiles/'.$this->request->data['Registroponente']['foto'], WWW_ROOT.'uploadFiles/thumb_'.$this->request->data['Registroponente']['foto'],100,100);
                    $this->request->data['Registroponente']['proyecto_pdf'] = 'ponente_pdf_'.$uuid.'_'.$this->request->data['Registroponente']['proyecto_pdf']['name'];     
                    if ($this->Registroponente->save($this->request->data)) {
                        $ponenteid=$this->Registroponente->id; 
                        $data_revisionproyecto = array ('Revisionproyecto'=>array('registroponentes_id'=>$ponenteid, 'users_id'=>2, 'estatus'=>'no aceptado' ));
                        //Guardamos parcialmente el proyecto para su Revisionproyecto
                        $this->Revisionproyecto->create();
                        $this->Revisionproyecto->save($data_revisionproyecto);
                        $this->Session->setFlash(__('Su registro ha sido guardado exitosamente.'));
                        $this->redirect(array('controller'=>'pages','action' => 'inicio'));
			    } else {
                    $this->Session->setFlash(__('El registro del ponente no se pudo guardar.Por favor, intentelo de nuevo.'));
                }
            }
		}
		$eventos = $this->Registroponente->Evento->find('list',array('fields' => 'Evento.nombre_del_evento'));
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
        $this->Registroponente->id = $id;
		if (!$this->Registroponente->exists()) {
			throw new NotFoundException(__('Invalido registroponente'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Registroponente->save($this->request->data)) {
				$this->Session->setFlash(__('El registroponente ha sido guardado.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El registroponente no se pudo guardar.Por favor, intentelo de nuevo.'));
			}
		} else {
			$this->request->data = $this->Registroponente->read(null, $id);
		}
		$eventos = $this->Registroponente->Evento->find('list');
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
		$this->Registroponente->id = $id;
		if (!$this->Registroponente->exists()) {
			throw new NotFoundException(__('Invalido registroponente'));
		}
		if ($this->Registroponente->delete()) {
			$this->Session->setFlash(__('Registroponente eliminado.'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Registroponente no se pudo eliminar.'));
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
