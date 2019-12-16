<?php

// datos por defecto
if(
    !isset($_SESSION['top5List']) || 
    !isset($_SESSION['statics'])
){
    Controller::load('default/top5');
    Controller::load('default/statics');
    header('Refresh: 0');
    exit;
}

///////////////
// ERROR 404 //
///////////////
$router->set404(function(){
    header('HTTP/1.1 404 Not Found');
    View::setFile('404');
    View::load();
});

//////////////////
// WELCOME PAGE //
//////////////////
$router->get('/', function(){
    if(
        isset($_SESSION['articleList']) && 
        isset($_SESSION['mainText']) && 
        isset($_SESSION['socialMedia'])
    ){
        View::setFile('news/list');
        View::load();
        unset(
            $_SESSION['articleList'], 
            $_SESSION['mainText'],
            $_SESSION['socialMedia']
        );
    }else{
        Controller::load('news/list');
        Controller::load('other/mainText');
        Controller::load('other/socialMedia');
        header('Location: ' . BASE_URL . '/');
        exit;
    }
});

//////////////
// DOWNLOAD //
//////////////
$router->get('/download', function(){
    if(isset($_SESSION['downloadList']) && isset($_SESSION['text'])){
        View::setFile('download/list');
        View::load();
        unset($_SESSION['downloadList'], $_SESSION['text']);
    }else{
        Controller::load('download/list');
        header('Location: ' . BASE_URL . '/download');
        exit;
    }
});

///////////
// MEDIA //
///////////
$router->get('/media', function(){
    header('Location: ' . BASE_URL . '/media/images');
});
$router->get('/media/images', function(){
    if(isset($_SESSION['imageList'])){
        View::setFile('media/images');
        View::load();
        unset($_SESSION['imageList']);
    }else{
        Controller::load('media/images');
        header('Location: ' . BASE_URL . '/media/images');
        exit;
    }
});
$router->get('/media/videos', function(){
    View::setFile('media/videos');
    View::load();
});

//////////
// NEWS //
//////////
$router->get('/news/(\w+)/(.*)', function($date, $title){
    View::setFile('news/single');
    View::load();
});

//////////////////////////
// TERMS AND CONDITIONS //
//////////////////////////
$router->get('/terms', function(){
    View::setFile('other/terms');
    View::load();
});
$router->get('/legal', function(){
    View::setFile('other/legal');
    View::load();
});

/////////////
// RANKING //
/////////////
$router->get('/ranking', function(){
    header('Location: ' . BASE_URL . '/ranking/player');
});
$router->get('/ranking/players', function(){
    View::setFile('ranking/players');
    View::load();
});
$router->get('/ranking/guilds', function(){
    View::setFile('ranking/guilds');
    View::load();
});

//////////////////////
// UNEXPECTED ERROR //
//////////////////////
$router->get('/error', function(){
    View::setFile('other/error');
    View::load();
});
