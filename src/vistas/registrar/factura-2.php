<?php include_head('Registrar pedido | IZ'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/registrar/style.css?v=0.5">
</head>
<body>

<?php include_header('registrar', 'Registrar', 'Factura'); ?>


<main class="container-fluid nav-spaced full-screen" id="navPush">

<div class="columns">
		<div class="column is-two-thirds mx-auto">
			<div class="card">
				<div class="card-content row">
					<div class="col text-center font-weight-bold">

<?php
if($datos['ci'] != null){

	$rif_div   = explode('-', $datos['ci']);
	$rif       = $rif_div[0] . '-' . number_format( $rif_div[1] ,0, ',','.');

	echo

	$datos['cliente']['nombre_cliente'] .
	' '. 	$datos['cliente']['apellido_cliente'] .' | ' . $rif . '
	<br><br>' .
	$datos['cliente']['direccion_cliente'] .
	' <br>' .
	$datos['cliente']['telefono']
	;

}else{

	echo '
	Sin cliente asociado
	<br><br>
	No hay datos disponible. Debes asociar un cliente a la factura para continuar';

}


 ?>
					</div>
					<div class="col text-center ">

					<b>Fecha de factura</b>
					<br>
						<?php echo(date('d/m/Y',strtotime($datos['fecha']))); ?><br>
					</div>
				</div>
			</div>
		</div>
	</div>














<div class="columns">
		<div class="column">

			<div class="card">
				<div class="card-header">Inventario</div>
				<div class="card-content" style="max-height: 400px; overflow-y: scroll;">

				<?php if($select_productos == null): ?>

					<div class="p-5"></div>

				<?php else: ?>


				<?php for($i=0; $i < count($select_productos); $i++): ?>

				<?php 

				
				$nombre   = $select_productos[$i]['nombre'];
				$marca   = $select_productos[$i]['marca'];
				$tipo   = $select_productos[$i]['tipo'];
				$codigo   = $select_productos[$i]['codigo'];
				$precio = number_format( $select_productos[$i]['precio'] ,2,',', '.');
				$max = $select_productos[$i]['max'];

				if(isset($datos['productos']) AND in_array($codigo, $datos['productos'])){ continue; }
				?>

					<form class="row" action="<?php echo HTTP ?>/registrar/factura/agregar-producto?<?php echo datos_url($datos); ?>" method="POST">

						<input type="hidden" name="codigo" value="<?php echo $codigo ?>">
						
						<div class="col">
							<b><?php echo $nombre ?></b>
							<br>
							<b>Marca:</b> <?php echo $marca ?>
							<br>
							<b>Tipo:</b> <?php echo $tipo ?>
						</div>

						<div class="col">
						<b>Cantidad:</b>
						<br>
						<input type="number" class="form-control" min="1" max="<?php echo $max; ?>" name="cantidad" value="1">
						</div>

						<div class="col">
						<b>Precio:</b>
						<br>
						<?php echo $precio ?>
						</div>

						<div class="col-1 d-flex align-items-center justify-content-center"><input class="button is-success" type="submit" value=">"></div>
						
					</form>
					<hr>

				<?php endfor; ?>

				<?php endif; ?>



				</div>
			</div>

		</div>
		<div class="column">

			<div class="card mb-2  font-weight-bold">
				<div class="card-header">
				

					<?php 
						$subtotal = 0;

						for ($i=0; $i < count($datos['productos']); $i++) {
							$subtotal += $datos['subtotales'][$i];
						}
					?>

					SUBTOTAL <?php echo number_format( $subtotal ,2,',', '.') ?> Bs.S
					<br>
					IVA (16%) <?php echo number_format( $subtotal * 0.16 ,2,',', '.') ?> Bs.S
					<br>
					TOTAL <?php echo number_format( $subtotal * 1.16 ,2,',', '.') ?> Bs.S
				</div>
			</div>

			<a href="<?php echo HTTP ?>/registrar/factura/paso-3?<?php echo datos_url($datos); ?>" class="button is-success btn-block py-2 mb-3">
                        Generar factura
                    </a>

			<div class="card">
				<div class="card-header">Productos agregados</div>
				<div class="card-content" style="max-height: 400px; overflow-y: scroll;">
				
				<?php if($datos['productos'] == null): ?>

					<div class="p-5"></div>
					
				<?php else: ?>

					<?php for($i= 0; $i < count($datos['productos']); $i++):  ?>

						<?php
						$producto = $consultar->get('producto', $datos['productos'][$i]);
						$cantidad = number_format( $datos['cantidades'][$i] ,0,',', ' ');
						$subtotal = number_format( $datos['subtotales'][$i] ,2,',', '.');
						$precio   = number_format( $datos['subtotales'][$i] / $datos['cantidades'][$i] ,2,',', '.');
						?>

						<div class="row">

							<div class="col">
								<b><?php echo $producto['nombre_producto']; ?></b>
								<br>
								<b>Precio:</b> <?php echo $precio; ?>

							</div>

						<div class="col">
							<b>Cantidad:</b>
							<br>
							<?php echo $cantidad ?>
						</div>

						<div class="col">
							<b>Subtotal:</b>
							<br>
							<?php echo $subtotal ?> Bs.S
						</div>

						<div class="col-1 d-flex align-items-center justify-content-center">
						<a href="<?php echo HTTP ?>/registrar/factura/eliminar-producto?eliminar=<?php echo $i ?>&<?php echo datos_url($datos) ?>" class="button is-danger">X</a>
						</div>

						</div>
						<hr>

					<?php endfor; ?>

				<?php endif; ?>

					


				</div>

				
			</div>

		</div>
	</div>






</main>


<?php
if(isset($_GET['err'])){

switch ($_GET['err']) {

	case 'producto':
		include_footer("
		<script type='    text/javascript'    >
		$(window).on('load',function(){
		    $('#agregar-producto').modal('show');
		});
		</script>");
		break;

	case 'existencia':
		include_footer("
		<script type='    text/javascript'    >
		$(window).on('load',function(){
			$('#agregar-producto').modal('show');
		});
		</script>");
		break;

	case 'repetido':
		include_footer("
		<script type='    text/javascript'    >
		$(window).on('load',function(){
			$('#agregar-producto').modal('show');
		});
		</script>");
		break;

	case 'existencia-edit':
		include_footer("
		<script type='    text/javascript'    >
		$(window).on('load',function(){
			$('#editar-producto-". $_GET['datacodigo'] ."').modal('show');
		});
		</script>");
		break;
	}
}else{

    include_footer();

}



?>
