<?php


// error 404
$router->set404(function() use($website){
    header('HTTP/1.1 404 Not Found');
    echo $website->getTemplate()->render('error/404.html', ['website' => $website]);
});


// landpage
$router->get('/', function() use($website){

    $news = [
        ['title' => 'Testing news', 'author' => 'Administrator', 'content' => 'hello bla bla bla', 'time' => '2019-12-31 18:04'],
        ['title' => 'Server update', 'author' => 'Tibelian', 'content' => 'hello bla bla bla', 'time' => '2019-12-31 18:04'],
        ['title' => 'New language added', 'author' => 'Unknown', 'content' => 'hello bla bla bla', 'time' => '2019-12-31 18:04']
    ];
    $status = [
        "totalAccounts" => 123,
        "totalGuilds" => 23,
        "onlinePlayers" => 43,
        "onlinePlayers24" => 65,
        "ranking" => [
            ['name' => 'test1', 'level' => 56, 'empire' => 'jinno'],
            ['name' => 'testing', 'level' => 39, 'empire' => 'chunjo'],
            ['name' => 'hello', 'level' => 19, 'empire' => 'jinno'],
            ['name' => 'lorem', 'level' => 16, 'empire' => 'shinsoo'],
            ['name' => 'bro', 'level' => 14, 'empire' => 'shinsoo']
        ]
    ];

    echo $website->getTemplate()->render('landpage.html', ['website' => $website, 'news' => $news, 'status' => $status]);

});


// download
$router->get('/download', function() use($website){
    echo $website->getTemplate()->render('download.html');
});