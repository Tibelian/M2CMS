
<!-- encabezado -->
<header class="bg-opacity">

    <!-- título y eslogan -->
    <div class="d-flex flex-column p-3 text-center">
        <h1><?= WEB_NAME ?></h1> 
        <h5><?= Language::translate('welcome-slogan') ?></h5>
    </div>

    <!-- barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-opacity">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/"><i class="fas fa-home"></i> <?= Language::translate('home') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/download"><i class="fas fa-download"></i> <?= Language::translate('download') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/user/register"><i class="fas fa-user-plus"></i> <?= Language::translate('register') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>/ranking/players"><i class="fas fa-award"></i> <?= Language::translate('ranking') ?></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-book"></i> <?= Language::translate('forum') ?></a></li>
            </ul>
        </div>
    </nav>

</header>
