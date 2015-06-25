<?php

use Phalcon\Mvc\Model\Criteria;

class AdminController extends ControllerBase
{
	public $user;
    public function initialize()
    {
        $this->tag->setTitle("Admin");
        $this->user = $this->session->get('auth');
        $this->id_usuario = $this->user['id_usuario'];
        parent::initialize();
    }

	/**
     * Cambiar la contraseña
     *
     */
    public function passwordAction()
    {
    	if (!$this->request->isPost()) {
    		$usuario = Admin::findFirstByid_usuario($this->user['id_usuario']);
    		if (!$usuario) {
    			$this->flash->error("El usuario no fue encontrado");
    			return $this->response->redirect("index");
    		}
    		$this->assets
    		->addJs('js/parsley.min.js')
    		->addJs('js/parsley.extend.js')
    		->addJs('js/nuevo_usuario.js');
    		$this->view->usuario = $usuario;
    	}
    }
}
