<?php

class PostsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $name = 'Posts';
    public $components = array('Session');

    public function index() {
        $this->set('posts', $this->Post->find('all'));
    }

    public function view($id) {
        $this->Post->id = $id;
        $this->set('post', $this->Post->read());

    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Seu POst Foi Salvo Manolo.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
}

?>