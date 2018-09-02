<?php include_head('Pedidos | IZ'); ?>

</head>
<body>

<?php include_header('pedidos','Pedidos'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">



	<div class="columns">
		<div class="column">

			<div class="field is-grouped">

				<div class="control"><a href="<?php echo HTTP ?>/registrar/proveedor" class="button is-link">Registrar proveedor</a></div>
			</div>

		</div>
	</div>


	<div class="columns">

		<div class="column">

			<div class="box">

				<div class="columns">

					<div class="column">
						<H1 class="subtitle">Proveedores</H1>
					</div>

				</div>

				<div class="columns">
					<div class="column">

						<?php

						if ($proveedores == null) {

							echo'

								<div class="card-body center font-weight-bold text-center">
									No hay proveedores guardados.
								</div>

							';
						}else{

							$cantidad_proveedores = count($proveedores);

							for ($i=0; $i < $cantidad_proveedores; $i++) {

								$nombre    = $proveedores[$i]['nombre_empresa'];
								$codigo    = $proveedores[$i]['rif'];
								$rif_div   = explode('-', $proveedores[$i]['rif']);
								$rif       = $rif_div[0] . '-' . number_format( $rif_div[1] ,0, ',','.');
								$direccion = $proveedores[$i]['direccion'];
								$telefono  = $proveedores[$i]['telefono'];


								echo'
								<a href="'. HTTP .'/pedidos/proveedor/'. $codigo .'" class="list-group-item list-group-item-action container-fluid">
		                            <div class="row">
		                                <div class="col-12 col-sm-4 left align-items-center align-items-sm-start">
		                                    <div class="font-weight-bold">'. $nombre .'</div>
		                                    <div>'. $rif .'</div>
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

						<a href="<?php echo HTTP ?>/pedidos/proveedores" class="pagination-next">Ver todos</a>

					</div>
				</div>
			</div>
			</div>

		</div>
	</div>



	<div class="columns">
		<div class="column">

			<div class="field is-grouped">
				<div class="control"><a href="<?php echo HTTP ?>/registrar/pedido" class="button is-link">Registrar pedido</a></div>
			</div>

		</div>
	</div>

		<div class="columns">

<div class="column">

	<div class="box">

		<div class="columns">

			<div class="column">
				<H1 class="subtitle">Pedidos</H1>
			</div>

		</div>

		<div class="columns">
			<div class="column">

				<?php

				if ($pedidos == null) {

					echo'

						<div class="card-body center font-weight-bold text-center">
							No hay pedidos guardados.
						</div>

					';
				}else{

					$cantidad_pedidos = count($pedidos);

					for ($i=0; $i < $cantidad_pedidos; $i++) {

						$nombre    = $pedidos[$i]['nombre_empresa'];
						$cantidad  = number_format( $pedidos[$i]['cantidad_productos'] ,0,',', ' ');
						$total     = number_format( $pedidos[$i]['subtotal'] ,2,',', '.');
						$codigo    = $pedidos[$i]['codigo_pedido'];
						$rif_div   = explode('-', $pedidos[$i]['codigo_proveedor']);
						$rif       = $rif_div[0] . '-' . number_format( $rif_div[1] ,0, ',','.');
						$fecha     = date('d/m/Y',strtotime($pedidos[$i]['fecha']));
						$llegada   = date('d/m/Y',strtotime($pedidos[$i]['fecha_llegada']));


						echo'
						<a href="'. HTTP .'/pedidos/p/'. $codigo .'" class="list-group-item list-group-item-action container-fluid">
							<div class="row">
								<div class="col-12 col-sm-4 left align-items-center align-items-sm-start">
									<div class="font-weight-bold">'. $nombre .'</div>
									<div>'. $rif .'</div>
									<div>Pedido #'. $codigo .'</div>
								</div>
								<div class="col-6 col-sm-4 d-flex align-items-center flex-column justify-content-around align-items-end">
									<div class="producto-precio has-text-success font-weight-bold">Total Bs.S '. $total .'</div>
									<div class="producto-existencias text-muted">Productos adquiridos: '. $cantidad .'</div>

								</div>
								<div class="col-6 col-sm-4 d-flex align-items-center flex-column justify-content-around align-items-end">
									<div class="text-muted">Emitido: '. $fecha .'</div>
									<div class="text-muted">Llegada: '. $llegada .'</div>
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

				<a  href="<?php echo HTTP ?>/pedidos/todos" class="pagination-next">Ver todos</a>

			</div>
		</div>
	</div>
	</div>

</div>
</div>



</main>

<?php include_footer(); ?>
