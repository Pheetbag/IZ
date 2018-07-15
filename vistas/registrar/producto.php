<?php include_head('Registrar producto | IZ'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/registrar/style.css?v=0.2">
</head>
<body>
<?php include_header('registrar', 'Registrar', 'Producto'); ?>


<main class="container-fluid nav-spaced full-screen" id="navPush">

<div class="row">
    <form class="col-md-8 col-lg-7 col-xl-6 container-fluid validar" method="POST" action="#" novalidate>



					<div class="columns">
						<div class="column">

							<div class="card">
								<div class="card-header">
									<div class="card-title">
										Registrar producto
									</div>
								</div>
								<div class="card-content">


									<div class="columns">
										<strong class="column">Nombre:</strong>
										<div class="column">
											<input required type="text" class="form-control bg-light" name="nombre" placeholder="Nombre">

										</div>
									</div>
									<div class="columns">
										<strong class="column">Tipo:</strong>
										<div class="column">

											<input type="text" class="form-control bg-light" name="tipo" placeholder="Tipo">

										</div>
									</div>
									<div class="columns">
										<strong class="column">Marca:</strong>
										<div class="column">

											<input type="text" class="form-control bg-light" name="marca" placeholder="Marca">
											<input type="text" class="form-control bg-light sr-only" min="0" name="modelo" placeholder="Modelo" value="sin modelo">

										</div>
									</div>
									<div class="columns">
										<strong class="column">Inventario:</strong>
										<div class="column">

											<input required type="number" class="form-control bg-light" min="0" name="existencias" placeholder="Existencias">

										</div>
									</div>
									<div class="columns">
										<strong class="column">Precio:</strong>
										<div class="column has-text-success">

					                        <input required type="number" class="form-control bg-light" min="0" step="0.01" name="precio" placeholder="Precio">

										</div>
									</div>

								</div>

							</div>

						</div>
					</div>

					<div class="row">
		                <div class="col-sm-10">
		                    <button type="submit" name="nuevo-producto" class="button is-primary is-fullwidth">Registrar producto</button>
		                </div>
		            </div>
    </form>
</div>

</main>

<?php include_footer(); ?>
