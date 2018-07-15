<?php

$nombre_empresa = 'Inversiones Zamora MKS, C. A.';

function include_head($title = 'IZ'){
    echo '

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>'. $title .'</title>
            <link rel="stylesheet" href="'    . HTTP . '/recursos/libs/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="'    . HTTP . '/recursos/libs/bulma/css/bulma.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
            <link rel="stylesheet" href="'    . HTTP . '/vistas/defaults/defaults.css?v=0.15">

    ';
}

function include_header($activo = null, $title = 'Titulo', $subtitle = ''){

	global $nombre_empresa;

	$alerta = null;

	if(isset($_GET['err']) AND $_GET['err'] == 'contra'){

		$alerta = '
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Contraseña inválida.</strong> La contraseña actual que ha ingresado es inválida.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>';
	}

/*
	echo '
	<div class="modal fade" tabindex="-1" id="ajustes-usuario">
	    <div class="modal-dialog modal-dialog-centered">
	        <form method="POST" action="'. HTTP .'/perfil/cambiar_contra" class="modal-content validar" novalidate>
	        <div class="modal-header">
	            <h5 class="modal-title">Ajustes de usuario</h5>
	        </div>
	        <div class="modal-body">

			'. $alerta .'

				<small class="text-muted mb-3">Esta es el área de ajustes de usuario, en esta ventana puedes cambiar tu contraseña.</small>

				<div class="form-group row mt-3">
					<label for="cantidad" class="font-weight-bold col-sm-6 col-form-label">Contraseña actual</label>

					<div class="col-sm-6">
						<input type="password" class="form-control" name="antigua">
							<div class="invalid-feedback">
							  Ingrese su contraseña actual.
							</div>
							<div class="valid-feedback">
							  ¡Perfecto!
							</div>
					</div>

				</div>
					<hr>
				<div class="form-group row mt-3">
					<label for="cantidad" class="font-weight-bold col-sm-6 col-form-label">Nueva contraseña</label>

					<div class="col-sm-6">
						<input required type="password" class="form-control" name="nueva">
							<div class="invalid-feedback">
							  Ingrese la nueva contraseña.
							</div>
							<div class="valid-feedback">
							  ¡Perfecto!
							</div>
					</div>

				</div>

	        </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	            <button type="submit" class="btn btn-primary">Guardar</button>
	        </div>
			</form>
	    </div>
	</div>
	';

*/

	$usuario = null;

	if(isset($_SESSION['usuario']['usuario'])){

		$usuario = $_SESSION['usuario']['usuario'] ;
	}



    $pedidos_link    = HTTP . '/pedidos"';
    $factura_link    = HTTP . '/facturar"';
    $inventario_link = HTTP . '/inventario"';
    $reportes_link   = HTTP . '/reportes"';
    $registrar_link  = HTTP . '/registrar"';

	$inventario = '<a class="has-text-white" href="'. $inventario_link .'">Inventario</a>';
    $factura    = '<a class="has-text-white" href="'. $factura_link    .'">Facturas</a>';
    $pedidos    = '<a class="has-text-white" href="'. $pedidos_link    .'">Pedidos</a>';
    $reportes   = '<a class="has-text-white" href="'. $reportes_link   .'">Reportes/a>';
    $registrar  = '<a class="has-text-white" href="'. $registrar_link  .'">Registrar</a>';

    if(isset($activo)){

        switch($activo){

            case 'inventario':
                $inventario  = '<a class="has-text-dark" href="'. $inventario_link .'"><strong>Inventario</strong></a>';
               break;

            case 'facturar':
               $factura      = '<a class="has-text-dark" href="'. $factura_link    .'"><strong>Facturas</strong></a>';
               break;

            case 'pedidos':
               $pedidos      = '<a class="has-text-dark" href="'. $pedidos_link    .'"><strong>Pedidos</strong></a>';
               break;

            case 'reportes':
               $reportes     = '<a class="has-text-dark" href="'. $reportes_link   .'"><strong>Reportes</strong></a>';
               break;

            case 'registrar':
               $registrar    = '<a class="has-text-dark" href="'. $registrar_link  .'"><strong>Registrar</strong></a>';
               break;
		}
    }

    echo '

	<!-- Main container -->
	<nav class="level p-2 has-background-primary ">
	  <!-- Left side -->
	  <div class="level-left has-text-white">
	    <div class="level-item">
	      <p class="subtitle is-5 has-text-white">
	        <strong>IZ</strong> '.$nombre_empresa.'
	      </p>
	    </div>
	  </div>

	  <!-- Right side -->
	  <div class="level-right has-text-white">
	    <p class="level-item">' . $inventario .'</p>
	    <p class="level-item">' . $pedidos    .'</p>
	    <p class="level-item">' . $factura    .'</p>
	    <p class="level-item"><a href="'. HTTP . '/salir" class="button is-danger has-text-white">Salir</a></p>
	  </div>
	</nav>

    ';
}

function include_footer($extra = ''){
    echo '


    <script src="' . HTTP . '/recursos/libs/jquery.min.js"></script>
	<script src="' . HTTP . '/vistas/defaults/cookies.js"></script>


    <script src="' . HTTP . '/recursos/libs/popper.min.js"></script>
	<script src="' . HTTP . '/recursos/libs/bootstrap/js/bootstrap.min.js"></script>


    <script src="' . HTTP . '/vistas/defaults/defaults.js?v=0.5"></script>
    ' . $extra . '
    </body>
    </html>
    ';
}
