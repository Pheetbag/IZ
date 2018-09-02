<?php include_head('Inventario - IZ'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/style.css?v=0.8">
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/producto.css?v=0.2">
</head>
<body>

<!-- MODAL BORRAR -->

<div class="modal" id="alerta-borrar" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar eliminación</h5>
            </div>
            <div class="modal-body">
                <p>
                    Estás intentando eliminar el producto:
                    <b>"<?php echo $resultado['nombre_producto'] ?>"</b> del inventario.
                </p>
                <p class="text-justify">
                    Este y todos los datos asociados a el se perderan, las referencias y relaciones en las facturas creadas con anterioridad usando este producto tambien se perderán.
                </p>
                <small class="text-muted">
                Nota: Crear un producto con las mismas caracteristicas en el futuro no recuperará estas infomación, ni asociará el producto a las facturas antiguas.
                </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="?action=eliminar" class="btn btn-danger">Eliminar producto</a>
            </div>
        </div>
    </div>
</div>

<!-- FIN MODAL BORRAR -->

<?php include_header('inventario', 'Inventario', 'Producto'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">

    <div class="row">
        <div class="col-md-6 container-fluid">

            <div class="row mb-0">
                <div class="col-12">

                    <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#alerta-borrar">Eliminar</button> -->
                </div>
            </div>
			<div class="columns">
				<div class="column">
					<article class="message is-success">
					  <div class="message-body">
					    Producto creado correctamente.
					  </div>
					</article>
					<div class="card">
						<div class="card-header">
							<div class="card-title">
								Producto
							</div>
						</div>
						<div class="card-content">

							<?php

							if($resultado['marca_producto'] == null){
								$resultado['marca_producto'] = 'Sin marca';
							}
							if($resultado['tipo_producto'] == null){
								$resultado['tipo_producto'] = 'Sin tipo';
							}

							?>

							<div class="columns">
								<strong class="column">Nombre:</strong>
								<div class="column"><?php echo $resultado['nombre_producto'] ?></div>
							</div>
							<div class="columns">
								<strong class="column">Tipo:</strong>
								<div class="column"><?php echo $resultado['tipo_producto'] ?></div>
							</div>
							<div class="columns">
								<strong class="column">Marca:</strong>
								<div class="column"><?php echo $resultado['marca_producto'] ?></div>
							</div>
							<div class="columns">
								<strong class="column">Inventario:</strong>
								<div class="column"><?php echo number_format($resultado['existencias'],0,',', ' ') ?></div>
							</div>
							<div class="columns">
								<strong class="column">Precio:</strong>
								<div class="column has-text-success"><?php echo number_format($resultado['precio_venta'],2,',', '.') ?></div>
							</div>

						</div>
						<div class="card-footer">
							<?php

								if ($_SESSION['usuario']['rango'] <= 1) {
									 echo '
										<a class="card-footer-item" href="?action=editar">Editar</a>';
								}
							?>

						</div>
					</div>

				</div>
			</div>

        </div>

    </div>

</main>

<?php include_footer(); ?>
