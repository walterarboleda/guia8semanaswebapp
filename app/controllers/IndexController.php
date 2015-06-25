<?php

use Phalcon\Mvc\Model\Criteria;

class IndexController extends ControllerBase
{
	public $user;
	
    public function initialize()
    {
        $this->user = $this->session->get('auth');        
        parent::initialize();
    }

    public function indexAction()
    {
    	return $this->response->redirect("participantes/index");
    }
}
