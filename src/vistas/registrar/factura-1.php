<?php include_head('Registrar factura | IZ'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/registrar/style.css?v=0.5">
</head>
<body>

<?php include_header('registrar', 'Registrar', 'Factura'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">



<form class="container-fluid validar" method="POST" action="<?php echo HTTP ?>/registrar/factura/validar-cliente?<?php echo datos_url($datos); ?>" novalidate>

<div class="columns">
    <div class="column is-half m-auto">

        <div class="card">
            <div class="card-header">
                Seleccionar proveedor
            </div>
            <div class="card-content row">



								<select required class="form-control col-3 col-sm-4 col-md-3 col-xl-2 ml-3 mr-1" name="ci-prefijo">
									<?php


										$selected_v = null;
										$selected_e = null;

										switch ($datos['ci-prefijo']) {
											case 'E':
												$selected_e = 'selected';
												break;

											default:
												$selected_v = 'selected';
												break;
										}

										echo '
										<option '. $selected_v .' value="V">V</option>
										<option '. $selected_e .' value="E">E</option>
										';

									?>
								</select>
								<div class="col mr-3 px-0">
	                                <input required type="number" class="form-control" name="ci" placeholder="Cedula" value="<?php echo $datos['ci-numero'] ?>">
									<div class="invalid-feedback">
									  Ingrese un número de cédula válido.
									</div>
									<div class="valid-feedback">
									  ¡Perfecto!
									</div>
								</div>
                            </div>


        </div>



<input type="submit" class="button is-link btn-block mt-4" value="Continuar">
    </div>
</div>


</form>



</main>



<?php

if($datos['error'] == 'cliente'){
    include_footer("
    <script type='    text/javascript'    >
    $(window).on('load',function(){
        $('#agregar-cliente').modal('show');
    });
    </script>");

}else{

    include_footer();

}


?>
