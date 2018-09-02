<?php include_head('Factura | IZ');?>
</head>
<body>

<?php include_header('facturar', 'Facturación', 'Factura'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">

	<div class="columns">
		<div class="column">
			<div class="card">
				<h5 class="card-header">Factura #<?php echo $factura['codigo_factura'] ?></h5>
				<div class="card-content">

					<div class="row">
						<b class="col-6">Fecha:</b>
						<div class="col-6"><?php echo(date('d/m/Y',strtotime($factura['fecha_venta']))) ?> </div>
					</div>
					<div class="row">
						<b class="col-6">Cliente:</b>
						<div class="col-6"><?php echo ucwords($factura['nombre_cliente'] . ' ' . $factura['apellido_cliente']) ?></div>
					</div>
					<div class="row">
						<b class="col-6">C.I.:</b>
						<div class="col-6"><?php

$ci_div   = explode('-', $factura['ci_cliente']);
$ci       = $ci_div[0] . '-' . number_format( $ci_div[1] ,0, ',','.');

echo $ci ?></div>
					</div>
					<div class="row">
						<b class="col-6">Dirección:</b>
						<div class="col-6"> <?php echo $factura['direccion_cliente'] ?></div>
					</div>
					<div class="row">
						<b class="col-6">Teléfono:</b>
						<div class="col-6"><?php echo $factura['telefono'] ?></div>
					</div>
					<hr>
					<div class="row">
						<b class="col-6">Subtotal:</b>
						<div class="col-6">Bs.S <?php echo number_format( $factura['subtotal']  ,2,',', '.'); ?></div>
					</div>
					<div class="row">
						<b class="col-6">IVA:</b>
						<div class="col-6">Bs.S <?php echo number_format( $factura['iva'] ,2,',', '.'); ?> </div>
					</div>
					<div class="row">
						<b class="col-6">TOTAL</b>
						<div class="col-6">Bs.S <?php echo number_format( $factura['total']  ,2,',', '.'); ?></div>
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
