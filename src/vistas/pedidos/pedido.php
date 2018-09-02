<?php include_head('Pedido | IZ'); ?>
</head>
<body>

<?php include_header('pedidos', 'Pedidos', 'Pedido'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">





	<div class="columns">
		<div class="column">
			<div class="card">
				<h5 class="card-header">Pedido #<?php echo $pedido['codigo_pedido'] ?></h5>
				<div class="card-content">

					<div class="row">
						<b class="col-6">Fecha:</b>
						<div class="col-6"><?php echo(date('d/m/Y',strtotime($pedido['fecha']))) ?> </div>
					</div>
                    <div class="row">
						<b class="col-6">Llegada:</b>
						<div class="col-6"><?php echo(date('d/m/Y',strtotime($pedido['fecha_llegada']))) ?> </div>
					</div>
					<div class="row">
						<b class="col-6">Cliente:</b>
						<div class="col-6"><?php echo $pedido['nombre_empresa'];  ?></div>
					</div>
					<div class="row">
						<b class="col-6">C.I.:</b>
						<div class="col-6"><?php							$rif_div   = explode('-', $pedido['rif']);
							$rif       = $rif_div[0] . '-' . number_format( $rif_div[1] ,0, ',','.');
							echo $rif ?></div>
					</div>
					<div class="row">
						<b class="col-6">Dirección:</b>
						<div class="col-6"> <?php echo $pedido['direccion'] ?></div>
					</div>
					<div class="row">
						<b class="col-6">Teléfono:</b>
						<div class="col-6"><?php echo $pedido['telefono'] ?></div>
					</div>
					<hr>
					<div class="row">
						<b class="col-6">TOTAL</b>
						<div class="col-6">Bs.S <?php echo number_format( $pedido['subtotal']  ,2,',', '.'); ?></div>
					</div>

				</div>
			</div>
		</div>
		<div class="column">
			<div class="card">
			<ul class="list-group list-group-flush">

						<?php

						$cantidad_detalles = count($detalles);

						for ($i=0; $i < $cantidad_detalles; $i++) {

							$codigo   = $detalles[$i]['codigo_producto'];
							$producto = $detalles[$i]['nombre_producto'];
							$cantidad = number_format($detalles[$i]['cantidad'],0,',', ' ');
							$subtotal = number_format($detalles[$i]['subtotal'],2,',', '.');

						echo '
						<a href="'. HTTP .'/inventario/producto/'. $codigo .'" class="list-group-item list-group-item-action container-fluid">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <p class="mb-0 font-weight-bold">'. $producto .'</p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p class="font-weight-bold mb-0 has-text-success ">Bs.S '. $subtotal .'</p>
                                    <p class="mb-0">x'. $cantidad .'</p>
                                </div>
                            </div>
                        </a>
						';

						}
						?>

                        </ul>
			</div>
		</div>
	</div>



</main>

<?php include_footer(); ?>
