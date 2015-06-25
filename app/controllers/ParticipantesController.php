<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ParticipantesController extends ControllerBase
{    
	public $user;
    public function initialize()
    {
        $this->tag->setTitle("Participantes");
        $this->user = $this->session->get('auth');
        $this->id_usuario = $this->user['id_usuario'];
        parent::initialize();
    }

    /**
     * index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
        $participantes = Participantes::find(['order' => 'id_participante asc']);
        if (count($participantes) == 0) {
            $this->flash->notice("Ningún participante ha enviado datos hasta el momento");
            $participantes = null;
        }
        $this->view->participantes = $participantes;
    }
    
    /**
     * Calendarios
     *
     * @param int $id_participante
     */
    public function calendariosAction($id_participante)
    {
    	$calendarios = Calendario::find("id_participante = $id_participante");
    	if (!$calendarios) {
    		$this->flash->error("El participante no fue encontrado");
    		return $this->response->redirect("calendarios/");
    	}
    	$participante = Participantes::findFirstByid_participante($id_participante);
    	$this->view->participante = $participante;
    	$this->view->calendarios = $calendarios;
    }
    
    /**
     * Ver
     *
     * @param int $id_periodo
     */
    public function verAction($id_participante)
    {
    	$participante = Participantes::findFirstByid_participante($id_participante);
    	if (!$id_participante) {
    		$this->flash->error("El participante no fue encontrado");
    		return $this->response->redirect("participantes/");
    	}
    	$this->view->participante = $participante;
    }
    
}
