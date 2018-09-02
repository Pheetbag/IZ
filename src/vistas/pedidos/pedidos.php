<?php include_head('Pedidos | IZ');?>
</head>
<body>

<?php include_header('pedidos','Pedidos', 'Proveedores'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">



		<div class="columns">
			<div class="column">

				<div class="field is-grouped">
						<!-- <div class="control"><a href="" class="button is-link">Registrar proveedor</a></div> -->
					<div class="control"><a href="<?php echo HTTP ?>/registrar/pedido" class="button is-link">Registrar pedido</a></div>
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

							<ul class="pagination-list">

								<?php

								for($i = 0; $i < $paginacion; $i++){

									$pagina_activa = null;
									if($i + 1 == $pagina){ $pagina_activa = 'is-current'; }

									echo '
									<li><a class="pagination-link '. $pagina_activa .'" href="'. HTTP .'/pedidos/todos/'. ($i + 1) .'">'. ($i + 1) .'</a></li>
									';
								}

								?>
							</ul>

							<a href="<?php echo HTTP ?>/pedidos/todos/<?php echo $anterior_link; ?>" class="pagination-previous  <?php echo $anterior; ?>">Anterior</a>
							<a  href="<?php echo HTTP ?>/pedidos/todos/<?php echo $siguiente_link; ?>" class="pagination-next <?php echo $siguiente; ?>">Siguiente</a>

						</div>
					</div>
				</div>
				</div>

			</div>
		</div>


</main>

<?php include_footer(); ?>
