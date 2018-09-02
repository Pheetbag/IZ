<?php include_head('Reportes | IZ'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/registrar/style.css?v=0.2">
</head>
<body>
<?php include_header('reportes', 'reportes', 'Cliente'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">

    <div class="columns">
        <form method="GET" action="<?php echo HTTP . '/reportes/imprimir/pedido' ?>" class="column">
            <card class="card">
                <h5 class="card-header">Reportes de pedidos</h5>
                <div class="card-content">
                    <p class="text-center font-weight-bold">Resumen de operaciones</p>
                    <p class="text-center text-muted">Resumen de la información de los pedidos realizados en el periodo indicado, principalmente enfocandose en los costos de cada pedido.</p>
                    <div class="columns mt-3">
                        <div class="column text-center">Desde</div>
                        <div class="column text-center">Hasta</div>
                    </div>
                    <div class="columns">
                        <div class="column"><input required type="date" name="fmin" class="form-control"></div>
                        <div class="column"><input required type="date" name="fmax" class="form-control"></div>
                    </div>

                    <input type="submit" value="Imprimir" class="button is-link btn-block">
                </div>
            </card>
        </form>
        <form method="GET" action="<?php echo HTTP . '/reportes/imprimir/factura' ?>" class="column">
            <card class="card">
                <h5 class="card-header">Reportes de facturas</h5>
                <div class="card-content">
                    <p class="text-center font-weight-bold">Resumen de operaciones</p>
                    <p class="text-center text-muted">Resumen de la información de los facturas realizados en el periodo indicado, principalmente enfocandose en los los ingresos por cada factura.</p>
                    <div class="columns mt-3">
                        <div class="column text-center">Desde</div>
                        <div class="column text-center">Hasta</div>
                    </div>
                    <div class="columns">
                        <div class="column"><input required type="date" name="fmin" class="form-control"></div>
                        <div class="column"><input required type="date" name="fmax" class="form-control"></div>
                    </div>

                    <input type="submit" value="Imprimir" class="button is-link btn-block">
                </div>
            </card>
        </form>
    </div>

    <div class="columns">
        <form method="GET" action="<?php echo HTTP . '/reportes/imprimir/inventario' ?>" class="column">
            <card class="card">
                <h5 class="card-header">Reportes de inventario</h5>
                <div class="card-content">
                    <p class="text-center font-weight-bold">Estado de inventario</p>
                    <p class="text-center text-muted">Un informe general de todos los productos del inventario, sus operaciones realizadas en el periodo indicado y el estado de el inventario al final de ese periodo.</p>
                    <div class="columns mt-3">
                        <div class="column text-center">Desde</div>
                        <div class="column text-center">Hasta</div>
                    </div>
                    <div class="columns">
                        <div class="column"><input required type="date" name="fmin" class="form-control"></div>
                        <div class="column"><input required type="date" name="fmax" class="form-control"></div>
                    </div>

                    <input type="submit" value="Imprimir" class="button is-link btn-block">
                </div>
            </card>
        </form>
        <form method="GET" action="<?php echo HTTP . '/reportes/imprimir/producto' ?>" class="column">
            <card class="card">
                <h5 class="card-header">Reportes de producto</h5>
                <div class="card-content">
                    <p class="text-center font-weight-bold">Operaciones</p>
                    <p class="text-center text-muted">Informe detallado de un producto determinado durante el periodo indicado, sus operaciones y el estado al final de ese periodo.</p>
                    <div class="columns mt-3">
                        <div class="column text-center">Producto</div>
                    </div>
                    <div class="columns">
                        <div class="column text-center">
                        <?php if($productos != null): ?>
                            <select class="form-control" name="producto">
                            <?php foreach ($productos as $producto): ?>
                                <option value="<?php echo $producto['id'] ?>"><?php echo $producto['nombre'] ?></option>
                            <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            <p class="text-center font-weight-bold">No se han encontrado productos en el inventario.</p>
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="columns mt-3">
                        <div class="column text-center">Desde</div>
                        <div class="column text-center">Hasta</div>
                    </div>
                    <div class="columns">
                        <div class="column"><input required type="date" name="fmin" class="form-control"></div>
                        <div class="column"><input required type="date" name="fmax" class="form-control"></div>
                    </div>

                    <input type="submit" value="Imprimir" class="button is-link btn-block">
                </div>
            </card>
        </form>
    </div>
</main>

<?php include_footer(); ?>
