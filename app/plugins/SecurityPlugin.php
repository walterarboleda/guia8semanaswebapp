<?php

use Phalcon\Events\Event,
Phalcon\Mvc\Dispatcher,
Phalcon\Mvc\User\Plugin;

/**
 * Security
 *
 * Gestiona la seguridad y el acceso de la aplicación
 */
class SecurityPlugin extends Plugin
{

    /**
	 * This action is executed before execute any action in the application
	 *
	 * @param Event $event
	 * @param Dispatcher $dispatcher
	 */
	public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
    	$controlador = $dispatcher->getControllerName();
        $user = $this->session->get('auth');
        
        if (!$user && $controlador !== "session" && $controlador !== "index" && $controlador !== "android"){
        	$this->session->set("last_url", str_replace('/app8semanasphp/', '', $_SERVER["REQUEST_URI"]));
        	return $this->response->redirect('session/index');
        } else {
        	return TRUE;
        }
    }
}
