
<?php echo $this->getContent(); ?>
<h1>Participante <em><?php echo $participante->nombre; ?> <?php echo $participante->apellido; ?></em></h1>
<?php echo $this->tag->linkTo(array('participantes/index', '<i class="glyphicon glyphicon-chevron-left"></i> Regresar', 'class' => 'btn btn-primary menu-tab')); ?>
<table class="table table-bordered table-hover">
    <thead>
    	<tr>
    		<th colspan="5" style="text-align:center">Datos Antropométricos</th>
    	</tr>
        <tr>
        	<th>Edad</th>
        	<th>Peso</th>
        	<th>Estatura</th>
        	<th>Índice de Masa Corporal</th>
        	<th>Perímetro Abdominal</th>
        </tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $participante->Calendario->Antropometricos->edad; ?></td>
			<td><?php echo $participante->Calendario->Antropometricos->peso; ?></td>
			<td><?php echo $participante->Calendario->Antropometricos->estatura; ?></td>
			<td><?php echo $participante->Calendario->Antropometricos->imc; ?></td>
			<td><?php echo $participante->Calendario->Antropometricos->p_abdominal; ?></td>
		</tr>
	</tbody>
</table>