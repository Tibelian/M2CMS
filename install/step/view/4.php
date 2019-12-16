
<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>dispatcher.php">
    <h3>Web Administrators: </h3>
    <div class="row">
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
            ?>
            <table style="width:100%; text-align:center;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Admin level</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($account = $result->fetch_object()){
                ?>
                    <tr>
                        <td><?= $account->id ?></td>
                        <td><?= $account->login ?></td>
                        <td><?= $account->email ?></td>
                        <td>
                            <input type="hidden" name="login" value="<?= $account->login; ?>">
                            <input type="number" name="new_level" min="0" max="9" placeholder="level was: <?= $account->web_admin ?>" value="<?= $account->web_admin ?>">
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <?php
            }else{
            ?>
                <p style="padding:20px;text-align:center;">0 accounts found on the database with admin level.</p>
            <?php
            }
            ?>
        <?php
        }
        ?>
    </div>
    <button type="submit" name="change_level" style="margin:15px auto 50px auto;">Save changes</button>
</form>

<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>dispatcher.php">
    <h3>New account: </h3>
    <div class="row">
        <div class="group">
            <label for="login">Login: </label>
            <input type="text" id="login" name="login" required>
        </div>
        <div class="group">
            <label for="email">Email: </label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="group">
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="group">
            <label for="level">Admin level: </label>
            <input type="number" min="0" max="9" id="level" name="level" required>
        </div>
    </div>
    <button type="submit" name="create_account" style="margin-bottom:15px">Create account</button>
</form>

<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>dispatcher.php">
    <h3>Search account: </h3>
    <div class="row">
        <div class="group">
            <label for="search">Search the ID by login or email: </label>
            <input type="text" name="login" id="search" onkeyup="searchAccount(this.value);" list="found" autocomplete="off">
            <datalist id="found"></datalist>
        </div>
        <div class="group">
            <label for="searchLevel">Admin level <small>(0-9)</small>: </label>
            <input type="number" name="new_level" id="searchLevel" min="0" max="9">
        </div>
    </div>
    <button type="submit" name="save_admin" style="margin-bottom:15px">Change web admin</button>
</form>

<form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>dispatcher.php" style="margin-top:30px;">
    <div style="display:flex;flex-direction:row-reverse;">
        <button type="submit" name="next">Next step</button>
        <button type="submit" name="back">Previous step</button>
    </div>
</form>
