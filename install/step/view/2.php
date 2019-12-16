
<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>dispatcher.php">
    <h3>Mailer: <small>(optional)</small></h3>
    <div class="row">
        <div class="group">
            <label for="mail_host">Host</label>
            <input type="text" id="mail_host" name="mail_host" placeholder="ex: smtp.gmail.com" value="<?php if(isset($_SESSION['mailer']['host'])){echo $_SESSION['mailer']['host'];} ?>">
        </div>
        <div class="group">
            <label for="mail_user">User</label>
            <input type="email" id="mail_user" name="mail_user" placeholder="ex: metin2@gmail.com" value="<?php if(isset($_SESSION['mailer']['user'])){echo $_SESSION['mailer']['user'];} ?>">
        </div>
        <div class="group">
            <label for="mail_pass">Password</label>
            <input type="password" id="mail_pass" name="mail_pass" placeholder="ex: 123456" value="<?php if(isset($_SESSION['mailer']['pass'])){echo $_SESSION['mailer']['pass'];} ?>">
        </div>
        <div class="group">
            <label for="mail_port">Port</label>
            <input type="number" id="mail_port" name="mail_port" placeholder="ex: 25 | 465 | 587" value="<?php if(isset($_SESSION['mailer']['port'])){echo $_SESSION['mailer']['port'];} ?>">
        </div>
        <div class="group">
            <label for="mail_secure">SMTP Secure</label>
            <select name="mail_secure" id="mail_secure">
                <option value="ssl" <?php if(isset($_SESSION['mailer']['port']) && $_SESSION['mailer']['smtp-secure'] == 'ssl'){echo 'selected';} ?>>SSL</option>
                <option value="tls" <?php if(isset($_SESSION['mailer']['port']) && $_SESSION['mailer']['smtp-secure'] == 'tls'){echo 'selected';} ?>>TLS</option>
            </select>
        </div>
        <div class="group">
            <label for="mail_auth">SMTP Auth</label>
            <select name="mail_auth" id="mail_auth">
                <option value="true" <?php if(isset($_SESSION['mailer']['smtp-auth']) && $_SESSION['mailer']['smtp-auth'] == 'true'){echo 'selected';} ?>>YES</option>
                <option value="false" <?php if(isset($_SESSION['mailer']['smtp-auth']) && $_SESSION['mailer']['smtp-auth'] == 'false'){echo 'selected';} ?>>NO</option>
            </select>
        </div>
    </div>
    <div style="display:flex;flex-direction:row-reverse;">
        <button type="submit" name="next">Next step</button>
        <button type="submit" name="back">Previous step</button>
    </div>
</form>