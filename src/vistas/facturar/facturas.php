<?php include_head('IZ | Facturación');?>
</head>
<body>

<?php include_header('facturar','Facturación'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">


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

							<ul class="pagination-list">

								<?php

								for($i = 0; $i < $paginacion; $i++){

									$pagina_activa = null;
									if($i + 1 == $pagina){ $pagina_activa = 'is-current'; }

									echo '
									<li><a class="pagination-link '. $pagina_activa .'" href="'. HTTP .'/facturar/todas/'. ($i + 1) .'">'. ($i + 1) .'</a></li>
									';
								}

								?>
							</ul>

							<a href="<?php echo HTTP ?>/facturar/todas/<?php echo $anterior_link; ?>" class="pagination-previous  <?php echo $anterior; ?>">Anterior</a>
							<a  href="<?php echo HTTP ?>/facturar/todas/<?php echo $siguiente_link; ?>" class="pagination-next <?php echo $siguiente; ?>">Siguiente</a>

						</div>
					</div>
				</div>
				</div>

			</div>
		</div>


</main>

<?php include_footer(); ?>
