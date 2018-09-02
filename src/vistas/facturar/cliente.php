<?php include_head('IZ | Facturación'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/style.css?v=0.8">
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/producto.css?v=0.2">
</head>
<body>

<?php include_header('facturar', 'Facturación', 'Cliente'); ?>

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
					Cliente
				</div>
			</div>
			<div class="card-content">

				<?php

				if($resultado['telefono'] == null){
					$resultado['telefono'] = 'Sin teléfono';
				}


				?>

				<div class="columns">
					<strong class="column">Nombre:</strong>
					<div class="column"><?php echo $resultado['nombre_cliente'] ?></div>
				</div>
				<div class="columns">
					<strong class="column">Apellido:</strong>
					<div class="column"><?php echo $resultado['apellido_cliente'] ?></div>
				</div>
				<div class="columns">
					<strong class="column">Cédula:</strong>
					<div class="column"><?php

					$ci_div   = explode('-', $resultado['ci_cliente']);
					$ci       = $ci_div[0] . '-' . number_format( $ci_div[1] ,0, ',','.');

					echo $ci ?></div>
				</div>
				<div class="columns">
					<strong class="column">Teléfono:</strong>
					<div class="column"><?php echo $resultado['telefono'] ?></div>
				</div>
				<div class="columns">
					<strong class="column">Dirección:</strong>
					<div class="column"><?php echo $resultado['direccion_cliente'] ?></div>
				</div>

			</div>

		</div>

	</div>
</div>





</div>

</main>

<?php include_footer(); ?>
