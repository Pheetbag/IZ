<?php include_head('CDA - Registrar'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/registrar/style.css?v=0.2">
</head>
<body>
<?php include_header('registrar', 'Registrar', 'Usuario'); ?>

<main class="container-fluid nav-spaced full-screen" id="navPush">

    <form action="" class="col-md-8 col-lg-7 col-xl-6  container-fluid validar" method="POST" action="#" novalidate>
        <div class="card">
        <div class="card-header">Registrar usuario</div>

        <div class="card-content">

            <div class="columns">
                <div class="column">Nombre:</div>
                <div class="column">
                    <input required type="text" class="form-control bg-light" name="nombre" placeholder="Nombre">
                    <div class="invalid-feedback">
                        Ingrese un nombre de usuario válido.
                    </div>
                    <div class="valid-feedback">
                        ¡Perfecto!
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column">Contraseña:</div>
                <div class="column">
                    <input required type="password" class="form-control bg-light" min="0" name="contraseña" placeholder="Contraseña">
                    <div class="invalid-feedback">
                        Ingrese una contraseña válida.
                    </div>
                    <div class="valid-feedback">
                        ¡Perfecto!
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column">Rango:</div>
                <div class="column">
                    <select name="rango" required class="form-control bg-light">
                        <option value selected disabled>Selecciona un rango</option>
                        <option value="1">Administrador</option>
                        <option value="2">Operador</option>
                        <option value="3">Vendedor</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione un rango válido.
                    </div>
                    <div class="valid-feedback">
                        ¡Perfecto!
                    </div>
                </div>
            </div>
        </div>

        </div>

        <div class="row">
            <div class="col-sm-10">
                <button type="submit" name="nuevo-usuario" class="mt-4 button is-primary is-fullwidth">Registrar usuario</button>
            </div>
        </div>
    </form>

</main>

<?php include_footer(); ?>
