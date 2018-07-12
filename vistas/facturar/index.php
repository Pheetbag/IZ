<?php include_head('IZ | Facturación');?>
</head>
<body>

<?php include_header('facturar','Facturación'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">

	<div class="columns">
		<div class="column">

			<div class="field is-grouped">
					<!-- <div class="control"><a href="" class="button is-link">Registrar proveedor</a></div> -->
				<div class="control"><a href="<?php echo HTTP ?>/registrar/cliente" class="button is-link">Registrar cliente</a></div>
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

						if ($clientes == null) {

							echo'

								<div class="card-body center font-weight-bold text-center">
									<div class="ico-no-resultados"></div>
									No se han encontrado resultados.
								</div>

							';
						}else{

							$cantidad_clientes = count($clientes);

							for ($i=0; $i < $cantidad_clientes; $i++) {

								$nombre    = ucwords($clientes[$i]['nombre_cliente'] . ' ' . $clientes[$i]['apellido_cliente']);

								$ci_div   = explode('-', $clientes[$i]['ci_cliente']);
								$ci       = $ci_div[0] . '-' . number_format( $ci_div[1] ,0, ',','.');

								$direccion = $clientes[$i]['direccion_cliente'];
								$telefono  = $clientes[$i]['telefono'];

								$codigo = $clientes[$i]['ci_cliente'];


								echo'
								<a href="'. HTTP .'/facturar/cliente/'. $codigo .'" class="list-group-item list-group-item-action container-fluid">
									<div class="row">
										<div class="col-12 col-sm-4 left align-items-center align-items-sm-start">
											<div class="font-weight-bold">'. $nombre .'</div>
											<div>'. $ci .'</div>
										</div>
										<div class="col-6 col-sm-4 d-flex align-items-center flex-column justify-content-around align-items-end">
											<div class="text-muted">'. $direccion .'</div>

										</div>
										<div class="col-6 col-sm-4 d-flex align-items-center flex-column justify-content-around align-items-end">
											<div class="text-muted">'. $telefono .'</div>
										</div>
									</div>
								</a>
								';

							}

						}

						 ?>

						</ul>
						</p>


					</div>
				</div>

				<div class="columns">
					<div class="column pagination is-centered is-rounded">

						<a href="<?php echo HTTP ?>/facturar/clientes" class="pagination-next">Ver todos</a>

					</div>
				</div>
			</div>
			</div>

		</div>
	</div>


</main>

<?php include_footer(); ?>
