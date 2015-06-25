<?php
class Antropometricos extends \Phalcon\Mvc\Model
{

	/**
	 *
	 * @var integer
	 */
	public $id_antropometrico;
	
    /**
     *
     * @var integer
     */
    public $id_calendario;

    /**
     *
     * @var integer
     */
    public $edad;
    
    /**
     *
     * @var integer
     */
    public $peso;
    
    /**
     *
     * @var integer
     */
    public $estatura;
    
    /**
     *
     * @var string
     */
    public $imc;
    
    /**
     *
     * @var integer
     */
    public $p_abdominal;

}
