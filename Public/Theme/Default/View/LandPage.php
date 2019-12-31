<!DOCTYPE html>
<html lang="<?= Language::getIso() ?>">
<head>

    <!-- meta tags / seo -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?= Language::translate('title-welcome') ?> - <?= WEB_NAME ?></title>

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
                
                <!-- noticias -->
                <section class="mb-3" class="news-list" id="news-list">
                   
                    <?php
                    $newsList = array(
                        array('title' => 'Testing news', 'author' => 'Administrator', 'content' => 'hello bla bla bla', 'time' => '2019-12-31 18:04'),
                        array('title' => 'Server update', 'author' => 'Tibelian', 'content' => 'hello bla bla bla', 'time' => '2019-12-31 18:04'),
                        array('title' => 'New language added', 'author' => 'Unknown', 'content' => 'hello bla bla bla', 'time' => '2019-12-31 18:04')
                    );
                    foreach($newsList as $article){
                    ?>
                        <article class="p-2 mb-2 bg-opacity">
                            <header>
                                <h6><?= $article['title'] ?></h6>
                                <time datetime="2007-08-29T13:58Z"><?= $article['time'] ?></time>
                            </header>
                            <div>
                                <?= $article['content'] ?>
                                <a href="#"><?= Language::translate('read-more') ?></a>
                            </div>
                            <span>By: <?= $article['author'] ?></span>
                        </article>
                    <?php
                    }
                    ?>

                    <div class="d-flex justify-content-around">
                        <button class="btn btn-sm btn-light col-3"><i class="fas fa-arrow-left"></i> <?= Language::translate('previous') ?></button>
                        <button class="btn btn-sm btn-light col-3"><?= Language::translate('next') ?> <i class="fas fa-arrow-right"></i></button>
                    </div>

                </section>

                <!-- decripción servidor -->
                <section class="mb-3 p-2 bg-opacity">
                    
                    <h3 class="text-center border-bottom mb-3 pb-2">about us</h3>
                    
                    <div class="d-flex">
                        <div class="col-7 text-justify">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis incidunt velit quo nisi tempore. Minima, expedita blanditiis laborum nobis numquam fugit cum, doloribus quasi praesentium, possimus modi fugiat quaerat debitis.
                            </p>
                            <p>
                                Eum eos placeat nisi saepe optio, culpa recusandae quis non repudiandae repellendus facilis atque? Id molestias labore, laboriosam rem ex voluptatem adipisci?
                            </p>
                        </div>
                        <div class="col-5">
                            <img src="<?= THEME_URL ?>/Assets/img/0.jpeg" alt="example" width="100%">
                        </div>
                    </div>

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