<?php

/**
 * SessionController
 *
 * Permite autenticar a los usuarios
 */
class SessionController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Iniciar Sesión');
        parent::initialize();
    }

    public function indexAction()
    {
    	$this->assets
    	->addCss('css/bootstrap-select.min.css')
    	->addJs('js/bootstrap-select.min.js')
    	->addJs('js/iniciar_sesion.js');
    }

    /**
     * Registra el usuario autenticado en los datos de la sesión (session)
     *
     * @param $user
     */
    private function _registerSession($user)
    {
    	$this->session->set('auth', array(
    			'id_usuario' => $user->id_usuario,
    			'username' => $user->id_componente
    	));
    }

    /**
     * Autenticación y logueo del usuario en la aplicación
     *
     */
    
    public function startAction()
    {
    	if ($this->request->isPost()) {
    		$username = $this->request->getPost('username');
    		$password = $this->request->getPost('password');
    		$user = Admin::findFirst("username = '$username'");
    		if ($user) {
    			if ($this->security->checkHash($password, $user->password)) {
    				$this->_registerSession($user);
    				$this->flash->success('Bienvenido(a) ' . $user->username);
    				if ($this->session->has("last_url")) {
    					return $this->response->redirect($this->session->get("last_url"));
    				}
    				return $this->response->redirect('participantes/index');
    			}
    		}
            $this->flash->error('Contraseña o usuario inválido');
        }
        return $this->response->redirect('session/index');
    }
    
    public function restartAction($id_usuario)
    {
    	$user = Admin::findFirstByid_usuario($id_usuario);
    	if ($user) {
    		$this->_registerSession($user);
    		return $this->response->redirect('participantes/index');
    	} else {
    		return $this->response->redirect('session/index');
    	}
    	return $this->response->redirect('session/index');
    }

    /**
     * Finalización de la sesión redireccionando al inicio
     *
     * @return unknown
     */
    public function endAction()
    {
        $this->session->remove('auth');
        $this->flash->success('¡Hasta pronto!');
        return $this->response->redirect('session/index');
    }
}
