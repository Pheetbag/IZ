<?php include_head('CDA - Inventario'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/style.css?v=0.8">
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/inventario/producto.css?v=0.2">
</head>
<body>

<?php include_header('inventario', 'Producto', 'Eliminado'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 container-fluid">



			<article class="message is-success">
			  <div class="message-body">
                <p>El producto: <b>"<?php echo $resultado['nombre_producto'] ?>"</b> se ha eliminado de el inventario del sistema.</p>
			  </div>
			</article>



        </div>
    </div>

</main>

<?php include_footer(); ?>
