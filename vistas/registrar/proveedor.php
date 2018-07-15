<?php include_head('Registrar proveedor | IZ'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/registrar/style.css?v=0.2">
</head>
<body>
<?php include_header('registrar', 'Registrar', 'Proveedor'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">

<div class="row">
    <form class="col-md-8 col-lg-7 col-xl-6 container-fluid validar" method="POST" action="#" novalidate>






							<div class="columns">
								<div class="column">

									<div class="card">
										<div class="card-header">
											<div class="card-title">
												Registrar proveedor
											</div>
										</div>
										<div class="card-content">


											<div class="columns">
												<strong class="column">Nombre de proveedor:</strong>
												<div class="column">
													<input required type="text" class="form-control bg-light" name="nombre" placeholder="Nombre">

												</div>
											</div>
											<div class="columns">
												<strong class="column">Rif:</strong>
												<div class="column">

													<div class="card-body input-group">
														<div class="input-group-prepend">
															<span class="input-group-text">J-</span>
														</div>
														<input required type="text" class="form-control bg-light" min="0" name="rif" placeholder="Rif">
													</div>

												</div>
											</div>
											<div class="columns">
												<strong class="column">Teléfono:</strong>
												<div class="column">

													<input type="number" class="form-control bg-light" min="0" name="telefono" placeholder="Teléfono">

												</div>
											</div>
											<div class="columns">
												<strong class="column">Dirección:</strong>
												<div class="column">

													<input required type="text" class="form-control bg-light" name="direccion" placeholder="Dirección">

												</div>
											</div>

										</div>

									</div>

								</div>
							</div>

							<div class="row">
				                <div class="col-sm-10">
				                    <button type="submit" name="nuevo-proveedor" class="button is-primary is-fullwidth">Registrar proveedor</button>
				                </div>
				            </div>

    </form>
</div>

</main>


<?php include_footer(); ?>
