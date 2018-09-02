<?php include_head('IZ | ADMINISTRACIÓN');?>
</head>
<body>

<?php include_header('administrar','Facturación'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">

	<div class="columns">
		<div class="column">

			<div class="field is-grouped">
					<!-- <div class="control"><a href="" class="button is-link">Registrar proveedor</a></div> -->
				<div class="control"><a href="<?php echo HTTP ?>/registrar/usuario" class="button is-link">Registrar usuarios</a></div>
			</div>

		</div>
	</div>


	<div class="columns">

		<div class="column">

			<div class="box">

				<div class="columns">

					<div class="column">
						<H1 class="subtitle">Clientes</H1>
					</div>

				</div>

				<div class="columns">
					<div class="column">

						<?php

						if ($usuarios == null) {

							echo'

								<div class="card-body center font-weight-bold text-center">
									No hay usuarios registrados.
								</div>

							';
						}else{

							$cantidad_usuarios = count($usuarios);

							for ($i=0; $i < $cantidad_usuarios; $i++) {

								$usuario = $usuarios[$i];
								$rango   = null;

								switch ($usuario['rango']) {
									case '1':
										$rango = 'Administrador';
										break;

									case '2':
										$rango = 'Operador';
										break;

									case '3':
										$rango = 'Vendedor';
										break;
								}

								echo'
								<div class="list-group-item list-group-item-action container-fluid">
									<div class="row">

										<div class="col">
											<div class="font-weight-bold">'. $usuario['usuario'] .'</div>
										</div>
										<div class="col text-center">
											<div class="text-muted">'. $rango .'</div>
										</div>
										<div class="col d-flex justify-content-center">
											<a href="'. HTTP .'/administrar/eliminar/'. $usuario['id'] .'" class="button is-danger">X</a>
										</div>

									</div>
								</div>
								';

							}

						}

						 ?>

						</ul>
						</p>


					</div>
				</div>

			</div>
			</div>

		</div>
	</div>




</main>

<?php include_footer(); ?>
