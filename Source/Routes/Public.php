<?php

// datos por defecto
if(!isset($_SESSION['top5List'])){
    include Controller::get('default/top5');
}
if(!isset($_SESSION['statics'])){
    include Controller::get('default/statics');
}

///////////////
// ERROR 404 //
///////////////
$router->set404(function(){
    header('HTTP/1.1 404 Not Found');
    include View::get('Partials/404');
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
        include View::get('LandPage');
        unset(
            $_SESSION['articleList'], 
            $_SESSION['mainText'],
            $_SESSION['socialMedia']
        );
    }else{
        Controller::setRedirect(false);
        include Controller::get('news/list');
        include Controller::get('other/mainText');
        include Controller::get('other/socialMedia');
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }
});

//////////////
// DOWNLOAD //
//////////////
$router->get('/download', function(){
    if(isset($_SESSION['downloadList']) && isset($_SESSION['text'])){
        include View::get('Download');
    
        unset($_SESSION['downloadList'], $_SESSION['text']);
    }else{
        include Controller::get('download/list');
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
        include View::get('Media/Images');
    
        unset($_SESSION['imageList']);
    }else{
        include Controller::get('media/images');
        header('Location: ' . BASE_URL . '/media/images');
        exit;
    }
});
$router->get('/media/videos', function(){
    include View::get('Media/Videos');

});

//////////
// NEWS //
//////////
$router->get('/news/(\w+)/(.*)', function($date, $title){
    include View::get('News/Single');
});

//////////////////////////
// TERMS AND CONDITIONS //
//////////////////////////
$router->get('/terms', function(){
    include View::get('Other/Terms');
});
$router->get('/legal', function(){
    include View::get('Other/Legal');
});

/////////////
// RANKING //
/////////////
$router->get('/ranking', function(){
    header('Location: ' . BASE_URL . '/ranking/players');
});
$router->get('/ranking/players', function(){
    include View::get('Ranking/Players');
});
$router->get('/ranking/guilds', function(){
    include View::get('Ranking/Guilds');
});

//////////////////////
// UNEXPECTED ERROR //
//////////////////////
$router->get('/error', function(){
    include View::get('other/error');
});
