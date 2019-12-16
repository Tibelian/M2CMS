<?php
session_start();

if(!isset($_SESSION['step']) && !isset($_SESSION['alert'])){
	$_SESSION['step'] = 1;
	$_SESSION['alert'] = array();
}

$step = $_SESSION['step'];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./assets/main.css">
    <script src="./assets/main.js"></script>
	<title>Installer M2CMS</title>
</head>
<body>

	<h1>Install Metin2 Content Management System</h1>
	<div class="container">

		<h3>All steps:</h3>
		<ul>
			<li <?php if($step == 1){echo 'class="active"';} ?>>1. Database</li>
			<li <?php if($step == 2){echo 'class="active"';} ?>>2. Mailer</li>
			<li <?php if($step == 3){echo 'class="active"';} ?>>3. WebSite</li>
			<li <?php if($step == 4){echo 'class="active"';} ?>>4. Administrator</li>
			<li <?php if($step == 5){echo 'class="active"';} ?>>5. Finish!</li>
		</ul>

		<?php
        $view = 'step/view/' . $step . '.php';
        if(file_exists($view)){
            include $view;
        }else{
            echo 'View does not exist';
        }
		?>

	</div>

	<div class="log">
        <?php
        if(isset($_SESSION['alert'])){
            foreach($_SESSION['alert'] as $alert){
                echo $alert;
            }
        }
        ?>
	</div>

	<div style="margin:auto 0 10px 0;">
		<p>M2CMS Installer | Visit <a href="//www.tibelian.com/m2cms" style="color:lightgreen">www.tibelian.com</a> for more instructions</p>
	</div>

</body>
</html>
