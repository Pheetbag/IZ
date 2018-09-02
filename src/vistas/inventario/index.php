<?php include_head('IZ - Inventario'); ?>

<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/style.css?v=0.7">
</head>
<body>

<?php include_header('inventario','Inventario'); ?>

<main class="nav-spaced full-screen" id="navPush ">

	<!-- <div class="columns">
		<div class="column is-10-tablet is-offset-1">

			<div class="card">

				<form novalidate class="validar card-content" action="<?php echo HTTP ?>/inventario/buscar" method="GET">

					<div class="field has-addons">
						<div class="control is-expanded">
							<input required type="text" name="busqueda" id="" class="input" placeholder="Buscar producto">
						</div>
						<div class="control">
							<button type="submit" class="button is-primary">Buscar</button>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div> -->

    <div class="columns">

        <!-- <div class="column">

            <div class="card mb-4">
                <h6 class="card-header">Buscar</h6>
                <form novalidate class="card-body validar" action="<?php echo HTTP ?>/inventario/buscar" method="GET">
                    <div class="form-group mb-0">
                        <input required type="text" name="busqueda" id="" class="form-control" placeholder="Buscar en el inventario">
						<div class="invalid-feedback">
						  Ingrese un término de búsqueda.
						</div>
                        <button type="submit" class="btn btn-primary mt-3 btn-block">Buscar</button>
                    </div>
                </form>
            </div>

 ESTO SE ELIMINO, SE DEJA COMENTADO EN CASO DE UTILIDAD FUTURA

            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Nuevo producto</h6>
                    <small class="card-text">Registra un nuevo producto en el inventario.</small>
                    <a class="btn btn-primary mt-3 d-block" href="/registrar/producto">Crear nuevo</a>
                </div>
            </div>

        </div> -->
        <div class="column is-10-tablet is-offset-1">
            <div class="box">

				<div class="columns">

					<div class="column is-narrow">
						<a href="<?php echo HTTP ?>/registrar/producto" class="button is-link">Crear producto</a>
					</div>

					<div class="column">

						<form novalidate class="validar" action="<?php echo HTTP ?>/inventario/buscar" method="GET">

							<div class="field has-addons">
								<div class="control">
									<button type="submit" class="button is-primary">Buscar</button>
								</div>
								<div class="control is-expanded">
									<input required type="text" name="busqueda" id="" class="input" placeholder="Buscar producto">
								</div>
							</div>
						</form>


					</div>

				</div>

				<div class="columns">
					<div class="column">

						<ul class="">
							<?php

							if($resultado != null){
								foreach($resultado as $item){

									if($item['marca_producto'] == null){
										$item['marca_producto'] = 'Sin marca';
									}
									if($item['tipo_producto'] == null){
										$item['tipo_producto'] = 'Sin tipo';
									}

									echo '
									<a href="'. HTTP .'/inventario/producto/'. $item['codigo_producto'] .'" class="list-group-item list-group-item-action container-fluid">
									<div class="row">
									<div class="col-12 col-sm-4 left align-items-center align-items-sm-start">
										<div class="has-text-dark is-size-5">'   . $item['nombre_producto'] . '</div>
									</div>
									<div class="col-6 col-sm-4 left align-items-center align-items-sm-end">
										<div class=" has-text-success font-weight-bold">'. number_format( $item['precio_venta'] ,2,',', '.') .' Bs.S</div>
										<div class="producto-existencias">'. number_format( $item['existencias'] ,0,',', ' ') .' en inventario</div>

									</div>
									<div class="col-6 col-sm-4 right align-items-end">
										<div class="tags has-addons">
											<span class="tag is-success">Marca</span>
											<span class="tag is-dark">'  . $item['marca_producto']  . '</span>
										</div>
										<div class="tags has-addons">

										<span class="tag is-primary">Tipo</span>
										<span class="tag is-dark">'  . $item['tipo_producto']  . '</span>

										</div>
									</div>
									</div>
									</a>';
								}
							}else{


								echo'
								<div class="card-body center font-weight-bold text-center">
								No hay ningún producto en el inventario.
								</div>

								';
							}
							?>
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
								<li><a class="pagination-link '. $pagina_activa .'" href="'. HTTP .'/inventario/pag/'. ($i + 1) .'">'. ($i + 1) .'</a></li>
								';
							}

							?>
						</ul>

						<a href="<?php echo HTTP ?>/inventario/pag/<?php echo $anterior_link; ?>" class="pagination-previous  <?php echo $anterior; ?>">Anterior</a>
						<a href="<?php echo HTTP ?>/inventario/pag/<?php echo $siguiente_link; ?>" class="pagination-next <?php echo $siguiente; ?>">Siguiente</a>

					</div>
				</div>
            </div>
        </div>
    </div>
</main>

<?php include_footer(); ?>
