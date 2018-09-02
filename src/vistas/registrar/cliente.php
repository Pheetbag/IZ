<?php include_head('Registrar cliente | IZ'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/registrar/style.css?v=0.2">
</head>
<body>
<?php include_header('registrar', 'Registrar', 'Cliente'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">

<div class="row">
    <form class="col-md-8 col-lg-7 col-xl-6 container-fluid validar" method="POST" action="#" novalidate>



							<div class="columns">
								<div class="column">

<?php if(isset($_GET['from']) AND $_GET['from'] == 'factura'): ?>
								<div class="alert alert-warning" role="alert">
								El cliente que intenta asociar no existe, registrelo para continuar con el proceso
								</div>
<?php endif; ?>

									<div class="card">
										<div class="card-header">
											<div class="card-title">
												Registrar cliente
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
												<strong class="column">Apellido:</strong>
												<div class="column">

													<input required type="text" class="form-control bg-light" name="apellido" placeholder="Apellido">

												</div>
											</div>
											<div class="columns">
												<strong class="column">Cédula:</strong>
												<div class="column">
													<div class="row">

														<select required class="form-control col-4 col-xl-3 ml-3 mr-1" name="ci-prefijo">
															<option selected value="V">V</option>
															<option value="E">E</option>
														</select>

														<div class="col mr-3 px-0">
															<input required type="number" class="form-control bg-light" min="0" name="ci" placeholder="Cedula">
														</div>

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
												<div class="column has-text-success">

							                        <input required type="text" class="form-control bg-light" name="direccion" placeholder="Dirección">

												</div>
											</div>

										</div>

									</div>

								</div>
							</div>

							<div class="row">
				                <div class="col-sm-10">
				                    <button type="submit" name="nuevo-cliente" class="button is-primary is-fullwidth">Registrar cliente</button>
				                </div>
				            </div>


    </form>
</div>

</main>

<?php include_footer(); ?>
