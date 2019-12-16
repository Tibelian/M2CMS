
<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>dispatcher.php">
    <h3>DataBase connection: </h3>
    <div class="row">
        <div class="group">
            <label for="db_host">Host</label>
            <input type="text" id="db_host" name="db_host" placeholder="ex: 127.0.0.1" value="<?php if(isset($_SESSION['database']['host'])){echo $_SESSION['database']['host'];} ?>">
        </div>
        <div class="group">
            <label for="db_user">User</label>
            <input type="text" id="db_user" name="db_user" placeholder="ex: root" value="<?php if(isset($_SESSION['database']['user'])){echo $_SESSION['database']['user'];} ?>">
        </div>
        <div class="group">
            <label for="db_pass">Password</label>
            <input type="password" id="db_pass" name="db_pass" placeholder="ex: 123456" value="<?php if(isset($_SESSION['database']['pass'])){echo $_SESSION['database']['pass'];} ?>">
        </div>
        <div class="group">
            <label for="db_port">Port</label>
            <input type="number" id="db_port" name="db_port" placeholder="ex: 3306" value="<?php if(isset($_SESSION['database']['port'])){echo $_SESSION['database']['port'];} ?>">
        </div>
    </div>
    <button type="submit" name="next">Next step</button>
</form>