<?php include_head('Pedidos | IZ'); ?>

</head>
<body>

<?php include_header('pedidos','Pedidos'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">



	<div class="columns">
		<div class="column">

			<div class="field is-grouped">
					<!-- <div class="control"><a href="" class="button is-link">Registrar proveedor</a></div> -->
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






</main>

<?php include_footer(); ?>
