<!-- Inicio -->
<?php
require_once __DIR__ . '/inicio.part.php';
?>

<body id="page-top">
    <!-- Navigation Bar -->
    <?php
    require_once __DIR__ . '/navegacion.part.php';
    ?>

    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Asociados</h1>
                        <p class="text-white">Administra la información de nuestros asociados y sus logos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Principal Content Start -->
    <div id="asociados">
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-sm-push-2">
                <h2>Subir logos de asociados:</h2>
                <hr>
                <!-- Sección que muestra la confirmación del formulario o bien sus errores -->
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
                    <div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                        <?php if (empty($errores)) : ?>
                            <p><?= $mensaje ?></p>
                        <?php else : ?>
                            <ul>
                                <?php foreach ($errores as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <!-- Formulario que permite subir un logo con la información del asociado -->
                <!-- Hay que indicar OBLIGATORIAMENTE enctype="multipart/form-data" para enviar ficheros al servidor -->
                <form class="form-horizontal" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Logo</label>
                            <input class="form-control-file" type="file" name="logo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <label class="label-control">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
                            <label class="label-control">Descripción</label>
                            <textarea class="form-control" name="descripcion"><?= htmlspecialchars($descripcion) ?></textarea>
                            <button type="submit" class="pull-right btn btn-lg sr-button">ENVIAR</button>
                        </div>
                    </div>
                </form>
                <hr class="divider">
                <div class="logos_asociados">
                    <!-- Aquí podrías agregar la sección para mostrar los logos de los asociados si es necesario -->
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once __DIR__ . '/fin.part.php';
    ?>
