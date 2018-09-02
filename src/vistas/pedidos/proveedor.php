<?php include_head('CDA - Inventario'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/style.css?v=0.8">
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/producto.css?v=0.2">
</head>
<body>

<?php include_header('pedidos', 'Pedidos', 'Proveedor'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">



	<div class="row">
		<div class="col-md-6 container-fluid">
	<!--
			<div class="row mb-0">
				<div class="col-12">
					<a href="?action=editar" class="btn btn-primary" role="button">Editar</a>
				</div>
			</div>
	-->




	<div class="columns">
	<div class="column">

		<div class="card">
			<div class="card-header">
				<div class="card-title">
					Proveedor
				</div>
			</div>
			<div class="card-content">

				<?php

				if($resultado['telefono'] == null){
					$resultado['telefono'] = 'Sin teléfono';
				}


				?>

				<div class="columns">
					<strong class="column">Nombre del proveedor:</strong>
					<div class="column"><?php echo $resultado['nombre_empresa'] ?></div>
				</div>
				<div class="columns">
					<strong class="column">Rif:</strong>
					<div class="column"><?php
					$rif_div   = explode('-', $resultado['rif']);
					$rif       = $rif_div[0] . '-' . number_format( $rif_div[1] ,0, ',','.');
					echo $rif ?></div>
				</div>
				<div class="columns">
					<strong class="column">Teléfono:</strong>
					<div class="column"><?php echo $resultado['telefono'] ?></div>
				</div>
				<div class="columns">
					<strong class="column">Dirección:</strong>
					<div class="column"><?php echo $resultado['direccion'] ?></div>
				</div>

			</div>

		</div>

	</div>
	</div>





	</div>

</main>

<?php include_footer(); ?>
