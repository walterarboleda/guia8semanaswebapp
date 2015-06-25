
{{ content() }}
<h1>Participante <em>{{ participante.nombre }} {{ participante.apellido }}</em></h1>
{{ link_to("participantes/index", '<i class="glyphicon glyphicon-chevron-left"></i> Regresar', "class": "btn btn-primary menu-tab") }}
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
			<td>{{ participante.Calendario.Antropometricos.edad }}</td>
			<td>{{ participante.Calendario.Antropometricos.peso }}</td>
			<td>{{ participante.Calendario.Antropometricos.estatura }}</td>
			<td>{{ participante.Calendario.Antropometricos.imc }}</td>
			<td>{{ participante.Calendario.Antropometricos.p_abdominal }}</td>
		</tr>
	</tbody>
</table>