
<?php echo $this->getContent(); ?>
<h1>Participantes</h1>
<?php if ((!(empty($participantes)))) { ?>
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
    <?php foreach ($participantes as $participante) { ?>
        <tr>
            <td><?php echo $this->tag->linkTo(array('participantes/ver/' . $participante->id_participante, $participante->nombre)); ?></td>
            <td><?php echo $this->tag->linkTo(array('participantes/ver/' . $participante->id_participante, $participante->apellido)); ?></td>
            <td><?php echo $this->tag->linkTo(array('participantes/ver/' . $participante->id_participante, $participante->cedula)); ?></td>
            <td><?php echo $this->tag->linkTo(array('participantes/ver/' . $participante->id_participante, $participante->email)); ?></td>
            <td><?php echo $this->tag->linkTo(array('participantes/ver/' . $participante->id_participante, $participante->telefono)); ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php } ?>