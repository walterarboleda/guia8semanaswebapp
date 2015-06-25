<?php

use Phalcon\Mvc\User\Component;

/**
 * Elements
 *
 * Ayudan para la construcción de los elementos UI de la aplicación
 */
class Elements extends Component
{
    private $_headerMenu = array(
            'participantes' => array(
                'caption' => 'Participantes',
                'action' => 'index'
            )
    );

    /**
     * Builds header menu with left and right items
     *
     * @return string
     */
    public function getMenu()
    {
        $user = $this->session->get('auth');
        if ($user) {
        	$menu_usuario = "";
            $controllerName = $this->view->getControllerName();
            echo '<div class="nav-collapse">';
            echo '<ul class="nav navbar-nav navbar-left">';
            $menu = $this->_headerMenu;
            foreach ($menu as $controller => $option) {
            	if ($controllerName == $controller) {
            		echo '<li class="active">';
            	} else {
            		echo '<li>';
            	}
            	echo $this->tag->linkTo($controller . '/' . $option['action'], $option['caption']);
            	echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
            echo '<div class="nav-collapse">';
            echo '<ul class="nav navbar-nav navbar-right">';
	        echo '<li class="dropdown usuario">';
	        echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-user"></b> <b class="caret"></b></a>';
	        echo '<ul class="dropdown-menu">';
	            echo '<li>'.$this->tag->linkTo("admin/password", "Cambiar Contraseña").'</li>';
	            echo '<li>'.$this->tag->linkTo("session/end", "Cerrar Sesión").'</li>';
	        echo '</ul>';
	        echo '</li>';
            echo '</ul>';
            echo '</div>';
        } else {
        }

    }
    

    /**
     * Returns menu tabs
     */
    public function getTabs()
    {
        $controllerName = $this->view->getControllerName();
        $actionName = $this->view->getActionName();
        echo '<ul class="nav nav-tabs">';
        foreach ($this->_tabs as $caption => $option) {
            if ($option['controller'] == $controllerName && ($option['action'] == $actionName || $option['any'])) {
                echo '<li class="active">';
                echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption), '</li>';
            } else if($option['controller'] == $controllerName) {
                echo '<li>';
                echo $this->tag->linkTo($option['controller'] . '/' . $option['action'], $caption), '</li>';
            }
        }
        echo '</ul>';
    }
}
