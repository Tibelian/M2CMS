<!DOCTYPE html>
<html lang="<?= Language::getIso() ?>">
<head>

    <!-- meta tags / seo -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?= Language::translate('title-download') ?> - <?= WEB_NAME ?></title>

    <!-- css -->
    <link rel="stylesheet" href="<?= THEME_URL ?>/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= THEME_URL ?>/Assets/css/fa-all.min.css">
    <link rel="stylesheet" href="<?= THEME_URL ?>/Assets/css/main.css">

</head>
<body class="bg-image bg-fixed text-light" style="background-image:url('<?= THEME_URL ?>/Assets/img/2.jpg');">
       
    <?php include View::get('Partials/Header'); ?>

    <!-- contenido principal -->
    <main class="container-fluid mt-3">
        <div class="row justify-content-center">

            <!-- barra lateral -->
            <aside class="col-md-3 d-flex flex-column">

                <!-- iniciar sesión -->
                <div class="mb-3 p-3 bg-opacity">
                    <h5 class="border-bottom pb-2 mb-3"><?= Language::translate('login-form') ?></h5>
                    <?php include View::get('Partials/LoginForm'); ?>
                </div>

                <!-- server status -->
                <div class="mb-3 p-3 bg-opacity">
                    <h5 class="border-bottom pb-2 mb-3"><?= Language::translate('server-status') ?></h5>
                    <?php include View::get('Partials/Status'); ?>
                </div>

                <!-- top 5 players -->
                <div class="mb-3 p-3 bg-opacity">
                    <h5 class="border-bottom pb-2 mb-3"><?= Language::translate('top5-players') ?></h5>
                    <?php include View::get('Partials/Top5'); ?>
                </div>

            </aside>

            <div class="col-md-8">
                
                <!-- descargas -->
                <section class="mb-3">
                   
                    

                </section>

            </div>

        </div>
    </main>

    <?php include View::get('Partials/Footer'); ?>

    <!-- javascript -->
    <script src="<?= THEME_URL ?>/Assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="<?= THEME_URL ?>/Assets/js/popper.min.js"></script>
    <script src="<?= THEME_URL ?>/Assets/js/bootstrap.min.js"></script>
    <script src="<?= THEME_URL ?>/Assets/js/main.js"></script>

</body>
</html>