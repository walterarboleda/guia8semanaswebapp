<?php

use Phalcon\Mvc\Model\Criteria;

class AndroidController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

	/**
     * Insertar datos desde Android
     *
     */
    public function insertarAction()
    {
    	if ($this->request->isPost()) {
    		$json = $_POST["datosJSON"];
    		//Quitar Slashes
    		if (get_magic_quotes_gpc()){
    			$json = stripslashes($json);
    		}
    		$data = json_decode($json);
    		if(count($data) > 0){
    			$participante = new Participantes();
	    		$participante->cedula = $data->datos_generales->participante->cedula;
	    		$participante->nombre = $data->datos_generales->participante->nombre;
	    		$participante->apellido = $data->datos_generales->participante->apellido;
	    		$participante->alias = $data->datos_generales->participante->alias;
	    		$participante->telefono = $data->datos_generales->participante->telefono;
	    		$participante->email = $data->datos_generales->participante->email;
	    		$participante_check = Participantes::findFirstBycedula($data->datos_generales->participante->cedula);
	    		if (!$participante_check) {
	    			$participante->save();
	    			$id_participante = $participante->id_participante;
	    		} else {
	    			$participante->update();
	    			$id_participante = $participante_check->id_participante;
	    		}
	    		$fecha_inicio = $data->datos_generales->calendario->fecha_inicio;
	    		$calendario_check = Calendario::find("id_participante = $id_participante AND fecha_inicio = '$fecha_inicio'")->toArray();
	    		if (!$calendario_check){
	    			$calendario = new Calendario();
	    			$calendario->id_participante = $id_participante;
	    			$calendario->fecha_inicio = $fecha_inicio;
	    			$calendario->save();
	    			$id_calendario = $calendario->id_calendario;
	    			$edad_fisiologica = new EdadFisiologica();
	    			$edad_fisiologica->id_calendario =  $id_calendario;
	    			$edad_fisiologica->ejercicio = $data->datos_generales->edad_fisiologica->ejercicio;
	    			$edad_fisiologica->desayuno = $data->datos_generales->edad_fisiologica->desayuno;
	    			$edad_fisiologica->cena = $data->datos_generales->edad_fisiologica->cena;
	    			$edad_fisiologica->descanso = $data->datos_generales->edad_fisiologica->descanso;
	    			$edad_fisiologica->fumar = $data->datos_generales->edad_fisiologica->fumar;
	    			$edad_fisiologica->alcohol = $data->datos_generales->edad_fisiologica->alcohol;
	    			$edad_fisiologica->save();
	    		} else {
	    			$id_calendario = $calendario_check[0]['id_calendario'];
	    			$edad_fisiologica = EdadFisiologica::findFirstByid_calendario($id_calendario);
	    			$edad_fisiologica->id_calendario =  $id_calendario;
	    			$edad_fisiologica->ejercicio = $data->datos_generales->edad_fisiologica->ejercicio;
	    			$edad_fisiologica->desayuno = $data->datos_generales->edad_fisiologica->desayuno;
	    			$edad_fisiologica->cena = $data->datos_generales->edad_fisiologica->cena;
	    			$edad_fisiologica->descanso = $data->datos_generales->edad_fisiologica->descanso;
	    			$edad_fisiologica->fumar = $data->datos_generales->edad_fisiologica->fumar;
	    			$edad_fisiologica->alcohol = $data->datos_generales->edad_fisiologica->alcohol;
	    			$edad_fisiologica->save();
	    			foreach (Antropometricos::find("id_calendario = $id_calendario") as $dato) {
	    				$dato->delete();
	    			}
	    			
	    			foreach (MetasPersonales::find("id_calendario = $id_calendario") as $dato) {
	    				$dato->delete();
	    			}
	    			foreach (Control::find("id_calendario = $id_calendario") as $dato) {
	    				$dato->delete();
	    			}
	    		}
	    		foreach($data->antropometricos as $row){
	    			$antropometricos = new Antropometricos();
	    			$antropometricos->id_calendario = $id_calendario;
	    			$antropometricos->edad = $row->edad;
	    			$antropometricos->peso = $row->peso;
	    			$antropometricos->estatura = $row->estatura;
	    			$antropometricos->imc = $row->imc;
	    			$antropometricos->p_abdominal = $row->p_abdominal;
	    			$antropometricos->save();
	    		}
	    		foreach($data->metas_personales as $row){
	    			$metas_personales = new MetasPersonales();
	    			$metas_personales->id_calendario = $id_calendario;
	    			$metas_personales->id_meta = $row->id_meta;
	    			$metas_personales->save();
	    		}
	    		foreach($data->control as $row){
	    			$control = new Control();
	    			$control->id_calendario = $id_calendario;
	    			$control->id_actividad = $row->id_actividad;
	    			$control->fecha = $row->fecha;
	    			$control->save();
	    		}
    		}
    		$a=array();
    		$b=array();
    		$b["mensaje"] = "La sincronización se realizó correctamente";
    		array_push($a,$b);
    		echo json_encode($a);
    	}
    }
}
