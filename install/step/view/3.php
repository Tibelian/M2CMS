
<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>dispatcher.php">
    <h3>WebSite Settings: </h3>
    <div class="row">
        <div class="group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="ex: Metin2 PServer" value="<?php if(isset($_SESSION['website']['title'])){echo $_SESSION['website']['title'];} ?>">
        </div>
        <div class="group">
            <?php
            $install_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $link = pathinfo($install_link);
            $base_link = $link['dirname'];
            ?>
            <label for="url">Current URL <small>( without final <strong>/</strong> )</small></label>
            <input type="url" name="url" id="url" placeholder="ex: http://metin2.es/web" value="<?php if(isset($_SESSION['website']['url'])){echo $_SESSION['website']['url'];}else{echo $base_link;} ?>">
        </div>
        <div class="group">
            <label for="lang">Default languague</label>
            <select id="lang" name="lang">
                <option value="en" <?php if(isset($_SESSION['website']['lang']) && !$_SESSION['website']['lang'] == 'en'){echo 'selected';} ?>>English</option>
                <option value="es" <?php if(isset($_SESSION['website']['lang']) && !$_SESSION['website']['lang'] == 'es'){echo 'selected';} ?>>Español</option>
                <option value="ro" <?php if(isset($_SESSION['website']['lang']) && !$_SESSION['website']['lang'] == 'ro'){echo 'selected';} ?>>Română</option>
            </select>
        </div>
        <div class="group">
            <label for="proxy">Proxy:</label>
            <select id="proxy" name="proxy">
                <option value="REMOTE_ADDR" <?php if(isset($_SESSION['website']['proxy']) && $_SESSION['website']['proxy'] == 'REMOTE_ADDR'){echo 'selected';} ?>>None</option>
                <option value="HTTP_CF_CONNECTING_IP" <?php if(isset($_SESSION['website']['proxy']) && $_SESSION['website']['proxy'] == 'HTTP_CF_CONNECTING_IP'){echo 'selected';} ?>>CloudFlare</option>
                <option value="HTTP_X_SUCURI_CLIENTIP" <?php if(isset($_SESSION['website']['proxy']) && $_SESSION['website']['proxy'] == 'HTTP_X_SUCURI_CLIENTIP'){echo 'selected';} ?>>Sucuri</option>
            </select>
        </div>
        <div class="group">
            <label for="register_mail" class="tooltip">
                Register mail activation: 
                <?php 
                if(!isset($_SESSION['mailer'])){
                ?>
                    <span class="tooltiptext">You must configure the mailer to use this system</span>
                <?php
                } 
                ?>
            </label>
            <select id="register_mail" name="register_mail" <?php if(!isset($_SESSION['mailer'])){echo 'disabled';} ?>>
                <option value="false" <?php if(isset($_SESSION['website']['register-activation']) && !$_SESSION['website']['register-activation']){echo 'selected';} ?>>No</option>
                <option value="true" <?php if(isset($_SESSION['website']['register-activation']) && $_SESSION['website']['register-activation']){echo 'selected';} ?>>Yes</option>
            </select>
        </div>
        <div class="group">
            <label for="register_coins">Register coins:</label>
            <input type="number" id="register_coins" name="register_coins" placeholder="0" value="<?php if(isset($_SESSION['website']['register-coins'])){echo $_SESSION['website']['register-coins'];} ?>">
        </div>
        <div class="group">
            <label for="referral">Referral system:</label>
            <select id="referral" name="referral">
                <option value="false" <?php if(isset($_SESSION['website']['referral']) && !$_SESSION['website']['referral']){echo 'selected';} ?>>Disabled</option>
                <option value="true" <?php if(isset($_SESSION['website']['referral']) && $_SESSION['website']['referral']){echo 'selected';} ?>>Enabled</option>
            </select>
        </div>
    </div>
    <div style="display:flex;flex-direction:row-reverse;">
        <button type="submit" name="next">Next step</button>
        <button type="submit" name="back">Previous step</button>
    </div>
</form>
