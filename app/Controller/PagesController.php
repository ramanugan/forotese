<?php
class PagesController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('inicio');
    }

    public function inicio() {
    }

    public function display() {
        $this->Session->setFlash('Usted no esta autorizado en esta area');
    }
}
