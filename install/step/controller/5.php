<?php


// database
$sql_alter = "
    ALTER TABLE `account`
        ADD COLUMN `referral` VARCHAR(100) NULL AFTER `web_admin`,
        ADD COLUMN `lost_token` VARCHAR(100) NULL AFTER `referral`;
";
$sql_create_a = "
    CREATE TABLE `m2cms_article` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `author` VARCHAR(50) NULL DEFAULT NULL,
        `content` TEXT NULL DEFAULT NULL,
        `date` DATETIME NOT NULL DEFAULT current_timestamp(),
        `lang` VARCHAR(3) NOT NULL DEFAULT `all`,
        PRIMARY KEY (`id`)
    )
    COLLATE='utf8mb4_general_ci'
    ENGINE=InnoDB;
";
$sql_create_at = "
    CREATE TABLE `m2cms_article_tag` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `article_id` INT(11) NOT NULL,
        `tag` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`id`),
        INDEX `FK__m2cms_article` (`article_id`),
        CONSTRAINT `FK__m2cms_article` FOREIGN KEY (`article_id`) REFERENCES `m2cms_article` (`id`)
    )
    COLLATE='utf8mb4_general_ci'
    ENGINE=InnoDB;
";
$mysqli = new mysqli(
    $_SESSION['database']['host'],
    $_SESSION['database']['user'],
    $_SESSION['database']['pass'],
    'account',
    $_SESSION['database']['port']
);
if($mysqli->query($sql_alter)){
    $_SESSION['alert'][] = '<font color="lightgreen">' . date('d/m/Y H:i') . ' | Table "account" modified successfully</font>';
}else{
    $_SESSION['alert'][] = '<font color="red">' . date('d/m/Y H:i') . ' | Could not modify table "account"</font>';
    $_SESSION['alert'][] = '<font color="yellow">' . date('d/m/Y H:i') . ' | ' . $mysqli->errno . ' - ' . $mysqli->error . '</font>';
}
if($mysqli->query($sql_create_a)){
    $_SESSION['alert'][] = '<font color="lightgreen">' . date('d/m/Y H:i') . ' | Table "m2cms_article" created successfully</font>';
}else{
    $_SESSION['alert'][] = '<font color="red">' . date('d/m/Y H:i') . ' | Could not create table "m2cms_article"</font>';
    $_SESSION['alert'][] = '<font color="yellow">' . date('d/m/Y H:i') . ' | ' . $mysqli->errno . ' - ' . $mysqli->error . '</font>';
}
if($mysqli->query($sql_create_at)){
    $_SESSION['alert'][] = '<font color="lightgreen">' . date('d/m/Y H:i') . ' | Table "m2cms_article_tag" created successfully</font>';
}else{
    $_SESSION['alert'][] = '<font color="red">' . date('d/m/Y H:i') . ' | Could not create table "m2cms_article_tag"</font>';
    $_SESSION['alert'][] = '<font color="yellow">' . date('d/m/Y H:i') . ' | ' . $mysqli->errno . ' - ' . $mysqli->error . '</font>';
}



// .htaccess
$current = str_replace('\\', '/', realpath(__DIR__ . '/../../../'));
$base = str_replace($_SERVER['DOCUMENT_ROOT'], '', $current);

$htaccess = "
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php [L]

Options -Indexes
ErrorDocument 403 \"$base/Public/403.html\"
";
$file = str_replace('\\', '/', realpath( __DIR__ . '/../../../') . '/.htaccess');
if(file_put_contents($file, $htaccess)){
    $_SESSION['alert'][] = '<font color="lightgreen">' . date('d/m/Y H:i') . ' | File ".htaccess" created successfully</font>';
}else{
    $_SESSION['alert'][] = '<font color="red">' . date('d/m/Y H:i') . ' | Could not create the file ".htaccess"</font>';
}



// settings
include '../Source/functions.php';
if(isset($_SESSION['mailer'])){
    $mailer = $_SESSION['mailer'];
}else{
    $mailer = array();
}
if(saveJson('database', $_SESSION['database'])){
    $_SESSION['alert'][] = '<font color="lightgreen">' . date('d/m/Y H:i') . ' | File "database.json" created successfully</font>';
}else{
    $_SESSION['alert'][] = '<font color="red">' . date('d/m/Y H:i') . ' | Could not create the file "database.json"</font>';
}
if(saveJson('website', $_SESSION['website'])){
    $_SESSION['alert'][] = '<font color="lightgreen">' . date('d/m/Y H:i') . ' | File "website.json" created successfully</font>';
}else{
    $_SESSION['alert'][] = '<font color="red">' . date('d/m/Y H:i') . ' | Could not create the file "website.json"</font>';
}
if(saveJson('mailer', $mailer)){
    $_SESSION['alert'][] = '<font color="lightgreen">' . date('d/m/Y H:i') . ' | File "mailer.json" created successfully</font>';
}else{
    $_SESSION['alert'][] = '<font color="red">' . date('d/m/Y H:i') . ' | Could not create the file "mailer.json"</font>';
}


$_SESSION['step']++;
