<?php
class Participantes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_participante;

    /**
     *
     * @var string
     */
    public $cedula;
    
    /**
     *
     * @var string
     */
    public $nombre;
    
    /**
     *
     * @var string
     */
    public $apellido;
    
    /**
     *
     * @var string
     */
    public $alias;
    
    /**
     *
     * @var integer
     */
    public $telefono;
    
    /**
     *
     * @var string
     */
    public $email;
    
    public function initialize()
    {
    	$this->belongsTo('id_participante', 'Calendario', 'id_participante', array(
    			'reusable' => true
    	));
    }
    
}
