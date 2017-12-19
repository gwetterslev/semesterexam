<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fischer</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="https://use.fontawesome.com/fbef65a9ae.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Hos Fischer vil gerne vise deres gæster, hvordan de laver deres pasta">
</head>
<body>


<a class=tilbage href="index.html"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>

	<div id="content">
		<div class="container">
			<div id="intro">
			<div id="logo">
				<img src="img/Fischerlogo.jpg">
				</div>


<?php
$cmd = filter_input(INPUT_POST, 'cmd');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');

	if(empty($cmd)){

		?>
<div class="nyhedstekst">


<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<fieldset>
		<h1>Email notifikation</h1>
		<input type="text" name="name" placeholder="Navn"><br>
		<input type="email" name="email" placeholder="E-mail"><br>
		<input type="submit" name="cmd" value="Tilmeld">
		<input type="submit" name="cmd" value="Afmeld">
	</fieldset>
</form>
</div>
</div>
</div>
		</div>
	</div>

	<?php
	}
	else {
	if($cmd == 'Tilmeld') {

		require_once('dbcon.php');
		$sql = 'INSERT INTO bruger (name, email) VALUES (?, ?)';
		$stmt = $link->prepare($sql);
		$stmt->bind_param('ss', $name, $email);
		$stmt->execute();
		if ($stmt->affected_rows > 0){
			echo 'Du er nu tilføjet  nyhedsbrevet';
		}
		else {
			echo $email.' var allerede på listen';
		}
	}
}
if($cmd == 'Afmeld') {
	require_once('dbcon.php');
	$sql = 'DELETE FROM bruger WHERE email=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $email);
	$stmt->execute();

	if ($stmt->affected_rows > 0){
		echo 'Du er nu fjernet fra nyhedsbrevet';
	}
	else {
		echo $email.' var ikke på listen';
	}
}
?>


<footer>
        <a href="https://www.facebook.com/Fischer-180802545294141/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/hosfischer/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
</footer>



</body>
</html>
