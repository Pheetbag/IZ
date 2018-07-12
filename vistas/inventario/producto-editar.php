<?php include_head('Inventario | IZ'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/style.css?v=0.8">
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/producto.css?v=0.2">
</head>
<body>

<?php include_header('inventario', 'Producto', 'Editar'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">

    <div class="row">
        <form class="col-md-6 container-fluid validar" method="POST" action="?action=guardar" novalidate>

            <div class="row mb-0">
                <div class="col-12">
                    <button type="submit" class="button is-success">Guardar</button>
                    <a href="<?php echo HTTP ?>/inventario/producto/<?php echo $resultado['codigo_producto'] ?>" class="button is-dark">Cancelar</a>
                </div>
            </div>




			<div class="columns">
				<div class="column">

					<div class="card">
						<div class="card-header">
							<div class="card-title">
								Producto
							</div>
						</div>
						<div class="card-content">


							<div class="columns">
								<strong class="column">Nombre:</strong>
								<div class="column">
									<input required type="text" class="form-control bg-light" name="nombre" placeholder="Nombre" value="<?php echo $resultado['nombre_producto'] ?>">

								</div>
							</div>
							<div class="columns">
								<strong class="column">Tipo:</strong>
								<div class="column">

									<input type="text" class="form-control bg-light" name="tipo" placeholder="Tipo" value="<?php echo $resultado['tipo_producto'] ?>">

								</div>
							</div>
							<div class="columns">
								<strong class="column">Marca:</strong>
								<div class="column">

									<input type="text" class="form-control bg-light" name="marca" placeholder="Marca" value="<?php echo $resultado['marca_producto'] ?>">

								</div>
							</div>
							<div class="columns">
								<strong class="column">Inventario:</strong>
								<div class="column">

			                        <input required type="number" class="form-control bg-light" min="0" name="existencias" placeholder="Existencias" value="<?php echo $resultado['existencias'] ?>">

								</div>
							</div>
							<div class="columns">
								<strong class="column">Precio:</strong>
								<div class="column has-text-success">
				                    <input type="text" class="form-control bg-light sr-only" min="0" name="modelo" placeholder="Modelo" value="<?php echo $resultado['modelo_producto'] ?>">
			                        <input required type="number" class="form-control bg-light" step="0.01" name="precio" placeholder="Precio" value="<?php echo $resultado['precio_venta']?>">

								</div>
							</div>

						</div>

					</div>

				</div>
			</div>

        </form>


    </div>

</main>

<?php include_footer(); ?>
