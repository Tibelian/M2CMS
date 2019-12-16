
<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>dispatcher.php" >
    <h3>Last review: </h3>
    <div class="row">
        <h5>DataBase</h5>
        <ul class="review">
            <li><strong>Host: </strong><?= $_SESSION['database']['host']; ?></li>
            <li><strong>User: </strong><?= $_SESSION['database']['user']; ?></li>
            <li><strong>Password: </strong><?= $_SESSION['database']['pass']; ?></li>
            <li><strong>Port: </strong><?= $_SESSION['database']['port']; ?></li>
        </ul>

        <h5>Mailer</h5>
        <?php 
        if(isset($_SESSION['mailer'])){
            $auth = 'false';
            if($_SESSION['mailer']['smtp-auth']){
                $auth = 'true';
            }
        ?>
        <ul class="review">
            <li><strong>Host: </strong><?= $_SESSION['mailer']['host']; ?><li>
            <li><strong>User: </strong><?= $_SESSION['mailer']['user']; ?></li>
            <li><strong>Password: </strong><?= $_SESSION['mailer']['pass']; ?></li>
            <li><strong>Port: </strong><?= $_SESSION['mailer']['port']; ?></li>
            <li><strong>SMTP Auth: </strong><?= $auth; ?></li>
            <li><strong>SMTP Secure: </strong><?= $_SESSION['mailer']['smtp-secure']; ?></li>
        </ul>
        <?php
        }else{
        ?>
        <ul class="review">
            <li>Mailer skiped!</li>
        </ul>
        <?php
        }
        ?>

        <?php
        $act = 'false'; $ref = 'false'; $proxy = 'None';
        if($_SESSION['website']['register-activation']){
            $act = 'true';
        }
        if($_SESSION['website']['referral']){
            $ref = 'true';
        }
        if($_SESSION['website']['proxy'] == 'HTTP_CF_CONNECTING_IP'){
            $proxy = 'CloudFlare';
        }else if($_SESSION['website']['proxy'] == 'HTTP_X_SUCURI_CLIENTIP'){
            $proxy = 'Sucuri';
        }
        ?>
        <h5>WebSite</h5>
        <ul class="review">
            <li><strong>Title: </strong><?= $_SESSION['website']['title']; ?></li>
            <li><strong>URL: </strong><?= $_SESSION['website']['url']; ?></li>
            <li><strong>Language: </strong><?= $_SESSION['website']['lang']; ?></li>
            <li><strong>Proxy: </strong><?= $proxy; ?></li>
            <li><strong>Register mail activation: </strong><?= $act; ?></li>
            <li><strong>Register coins: </strong><?= $_SESSION['website']['register-coins']; ?></li>
            <li><strong>Referral system: </strong><?= $ref; ?></li>
        </ul>

        <h5>Administrators</h5>
        <ul class="review">
            <?php
            $sql = "
                SELECT * 
                FROM account 
                WHERE web_admin > 0 
                ORDER BY web_admin DESC, id ASC
            ";
            $mysqli = new mysqli(
                $_SESSION['database']['host'],
                $_SESSION['database']['user'],
                $_SESSION['database']['pass'],
                'account',
                $_SESSION['database']['port']
            );
            if($result = $mysqli->query($sql)){
                if($result->num_rows > 0){
                    while($account = $result->fetch_object()){
            ?>
            <li><strong>ID: </strong><?= $account->id ?></li>
            <li><strong>Login: </strong><?= $account->login ?></li>
            <li><strong>Email: </strong><?= $account->email ?></li>
            <li style="padding-bottom:5px;"><strong>Admin level: </strong><?= $account->web_admin ?></li>
            <?php
                    }
                }else{
            ?>
            <li>0 web administrators!</li>
            <?php
                }
            }
            ?>
        </ul>

    </div>

    <h3>New changes: </h3>
    <div class="row">
        <p class="title-changes">'account' database</p>
        <code>
        <pre>

            ALTER TABLE `account`
                ADD COLUMN `referral` VARCHAR(100) NULL AFTER `web_admin`,
                ADD COLUMN `lost_token` VARCHAR(100) NULL AFTER `referral`;

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
        </pre>
        </code>

        <?php
        $current = str_replace('\\', '/', realpath(__DIR__ . '/../../../'));
        $baseApache = str_replace($_SERVER['DOCUMENT_ROOT'], '', $current);
        ?>
        <p class="title-changes">/.htaccess</p>
        <code>
        <pre>

            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule . index.php [L]

            Options -Indexes
            ErrorDocument 403 "<?= $baseApache; ?>/Public/403.html"
        </pre>
        </code>

        <p class="title-changes">/Source/Settings/</p>
        <code>
        <pre>
            
           database.json
           mailer.json
           website.json
           languague/<?= $_SESSION['website']['lang']; ?>/locale.json
           languague/<?= $_SESSION['website']['lang']; ?>/mail.json

        </pre>
        </code>

    </div>

    <div style="display:flex;flex-direction:row-reverse;">
        <button type="submit" name="next">Finish!</button>
        <button type="submit" name="back">Previous step</button>
    </div>

</form>

