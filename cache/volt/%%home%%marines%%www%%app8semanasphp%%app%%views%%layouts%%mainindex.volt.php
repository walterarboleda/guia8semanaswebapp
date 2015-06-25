<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><?php echo $this->tag->image(array('img/logo_pascual.png', 'alt' => 'Interventoría Buen Comienzo')); ?> <span class="caret"></span></a>
			<div class="dropdown-menu list-group" role="menu">
				<?php echo $this->elements->getMenuInicio(); ?>
			</div>
        </div>
        <?php echo $this->elements->getMenu(); ?>
    </div>
</nav>
<div class="container">
	<div class="row">
	<?php echo $this->flash->output(); ?>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-9">
		  <?php echo $this->getContent(); ?>
        </div>
        <div class="col-xs-6 col-sm-3" id="sidebar" style="padding-right: 0px !important;">
          <div class="list-group">
          	<?php echo $this->elements->getMenuInicio(); ?>
          </div>
          <div class="well">
          	<h4>Enlaces</h4>
          	<ul style="padding-left: 15px !important;">
          		<li><a href="http://www.interventoriabuencomienzo.org/webmail" target="_blank">Correo Institucional</a></li>
          		<li><a href="http://www.pascualbravo.edu.co/" target="_blank">Institución Universitaria Pascual Bravo</a></li>
          		<li><a href="http://www.medellin.gov.co/buencomienzo" target="_blank">Buen Comienzo</a></li>
          		<li><a href="http://www.medellin.gov.co" target="_blank">Alcaldía de Medellín</a></li>
          		<li><a href="https://www.sisben.gov.co/ConsultadePuntaje.aspx" target="_blank">Consulta SISBEN</a></li>
          	</ul>
          </div>
        </div>
	</div>
    <hr>
    <footer>
        <p>Interventoría Buen Comienzo<br>Calle 52 (av. La Playa) # 49-27, edificio Santa Elena piso 14, Medellín (Antioquia)<br>Horario: lunes a viernes 8:00 am - 11:45 am; 1:30 pm - 4:30 pm<br> PBX: (4) 5121233. Email: info@interventoriabuencomienzo.org</p>
    </footer>
</div>
