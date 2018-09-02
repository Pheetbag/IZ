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
									No hay clientes guardados.
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


	<div class="columns">
		<div class="column">

			<div class="field is-grouped">
				<div class="control"><a href="<?php echo HTTP ?>/registrar/factura" class="button is-link">Registrar factura</a></div>
			</div>

		</div>
	</div>

		<div class="columns">

<div class="column">

	<div class="box">

		<div class="columns">

			<div class="column">
				<H1 class="subtitle">Facturas</H1>
			</div>

		</div>

		<div class="columns">
			<div class="column">

				<?php

				if ($facturas == null) {

					echo'

						<div class="card-body center font-weight-bold text-center">
							No hay facturas guardadas.
						</div>

					';
				}else{

					$cantidad_facturas = count($facturas);

					for ($i=0; $i < $cantidad_facturas; $i++) {

						$codigo   = $facturas[$i]['codigo_factura'];
						$fecha    = date('d/m/Y',strtotime($facturas[$i]['fecha_venta']));

						$ci_div   = explode('-', $facturas[$i]['ci_cliente']);
						$ci       = $ci_div[0] . '-' . number_format( $ci_div[1] ,0, ',','.');

						$total    = number_format( $facturas[$i]['total'] ,2,',', '.');
						$nombre   = ucwords($facturas[$i]['nombre_cliente'] . ' ' . $facturas[$i]['apellido_cliente']);
						$cantidad = number_format( $facturas[$i]['cantidad_productos'] ,0,',', ' ');

						echo'
						<a href="'. HTTP .'/facturar/f/'. $codigo .'" class="list-group-item list-group-item-action container-fluid">
	                        <div class="row">
	                            <div class="col-12 col-sm-4 left align-items-center align-items-sm-start">
	                                <div class="font-weight-bold">'. $nombre .'</div>
	                                <div>'. $ci .'</div>
	                            </div>
	                            <div class="col-6 col-sm-4 left align-items-center align-items-sm-end">
	                                <div class="text-muted">Factura #'. $codigo .'</div>
	                                <div class="text-muted">Emitido: '. $fecha .'</div>
	                            </div>
	                            <div class="col-6 col-sm-4 right align-items-center">
	                                <div class="producto-precio has-text-success font-weight-bold">Total Bs.S '. $total .'</div>
	                                <div class="producto-existencias text-muted">Productos vendidos: '. $cantidad .'</div>
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

				<a  href="<?php echo HTTP ?>/facturar/todas" class="pagination-next">Ver todas</a>

			</div>
		</div>
	</div>
	</div>

</div>
</div>



</main>

<?php include_footer(); ?>
