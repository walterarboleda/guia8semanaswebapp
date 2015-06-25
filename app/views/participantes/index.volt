
{{ content() }}
<h1>Participantes</h1>
{% if (not(participantes is empty)) %}
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cédula</th>
            <th>Email</th>
            <th>Teléfono</th>
         </tr>
    </thead>
    <tbody>
    {% for participante in participantes %}
        <tr>
            <td>{{ link_to("participantes/ver/"~participante.id_participante, participante.nombre) }}</td>
            <td>{{ link_to("participantes/ver/"~participante.id_participante, participante.apellido) }}</td>
            <td>{{ link_to("participantes/ver/"~participante.id_participante, participante.cedula) }}</td>
            <td>{{ link_to("participantes/ver/"~participante.id_participante, participante.email) }}</td>
            <td>{{ link_to("participantes/ver/"~participante.id_participante, participante.telefono) }}</td>
        </tr>
    {% endfor %}
    </tbody>
</table>
{% endif %}