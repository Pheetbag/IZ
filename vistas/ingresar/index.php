<?php include_head('Entrar | IZ'); ?>
<link rel="stylesheet" href="<?php echo HTTP ?>/vistas/ingresar/style.css?v=0.2">
<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
  <!-- or -->
  <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>
<body>

<div class="contenedor">


    <div class="box" id="login" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title">Entrar</h5>
            <p class="card-text">
                <form method='post' action='ingresar/validar'>

                    <div class="form-group">
                        <input type="text" class="form-control <?php echo $vista_errores; ?>" id="usuario" name="usuario" aria-describedby="usuarioHelp" placeholder="Usuario">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control <?php echo $vista_errores; ?>" id="contraseña" name="contraseña" placeholder="Contraseña">
                    </div>

                    <button type="submit" class="button is-primary is-large is-fullwidth">Entrar</button>
                </form>
            </p>
        </div>
    </div>
</div>

<?php include_footer(); ?>
<script src="<?php echo HTTP ?>/vistas/ingresar/script.js?v=0"></script>

</body>
</html>
