<?php
class Calendario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_calendario;

     /**
     *
     * @var integer
     */
    public $id_participante;
    
    /**
     *
     * @var string
     */
    public $fecha_inicio;
    
    public function initialize()
    {
    	$this->belongsTo('id_calendario', 'Antropometricos', 'id_calendario', array(
    			'reusable' => true
    	));
    }
    
}
