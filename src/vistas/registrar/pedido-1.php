<?php include_head('Registrar pedido | IZ'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/registrar/style.css?v=0.5">
</head>
<body>

<?php include_header('registrar', 'Registrar', 'Pedido'); ?>


<main class="container-fluid nav-spaced full-screen" id="navPush">

<form class="container-fluid validar" method="POST" action="<?php echo HTTP ?>/registrar/pedido/validar-proveedor?<?php echo datos_url($datos); ?>" novalidate>

<div class="columns">
    <div class="column is-half m-auto">

        <div class="card">
            <div class="card-header">
                Seleccionar proveedor
            </div>
            <div class="card-content">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">J-</span>
                    </div>
                    <input required type="number" class="form-control" name="rif" placeholder="Rif" value="<?php echo $datos['rif-numero'] ?>">
                    <div class="invalid-feedback">
                        Ingrese un rif válido.
                    </div>
                    <div class="valid-feedback">
                        ¡Perfecto!
                    </div>
                </div>
            </div>
        </div>

<div class="card mt-4">
            <div class="card-header">
                Indique la llegada
            </div>
            <div class="card-content">

                <input required type="date" class="form-control bg-light" name="llegada" value="<?php echo $datos['llegada'] ?>">
                <div class="invalid-feedback">
                    Ingrese una fecha de llegada válida.
                </div>
            </div>
        </div>


<input type="submit" class="button is-link btn-block mt-4" value="Continuar">
    </div>
</div>


</form>

</main>

<?php

if(isset($_GET['error'])){
    include_footer("
    <script type='    text/javascript'    >
    $(window).on('load',function(){
        $('#agregar-proveedor').modal('show');
    });
    </script>");

}else{

    include_footer();

}


?>
