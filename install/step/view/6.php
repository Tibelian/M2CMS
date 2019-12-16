
<h2>Installation finished!</h2>
<div class="row">
    <p style="text-align:center;width:100%;margin-top:20px;">What do you want to do with the installer?</p>   
    <form style="display:flex;flex-direction:row;width:100%;padding:30px;" action="<?= $_SERVER['REQUEST_URI']; ?>dispatcher.php" method="post" onsubmit="return confirm('Are you sure?');">
        <input type="hidden" name="next" value="1">
        <button type="submit" style="margin-right:5px" name="disable">Disable</button>
        <button type="submit" style="margin-left:5px" name="delete">Delete</button>
    </form>
</div> 

<form action="<?= $_SERVER['REQUEST_URI']; ?>dispatcher.php">
    <button type="submit" name="back">Go back!</button>
</form>
