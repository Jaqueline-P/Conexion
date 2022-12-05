<?php
error_reporting(0);

include 'includes/conecta.php';
if (isset($_POST['entrar'])){
	$user = 'Jaquip';
	$contra = 'Palayotj';
	$ruser = $_POST['ususaro'];
	$rpass = $_POST['pass'];
		//generar consulta
		$consulta = "SELECT * FROM Usuarios WHERE Usuario = '$ruser' and Pasword ='$rpass'";
		if($resultado = $conecta->query($consulta)){
			while($row =$resultado->fetch_array()){
			$userok = $row ['Usuario'];
			$passwordok = $row['Password'];
			}
		$resultado->close();
		}
	$conecta->close();
	if($ruser == $userok && $rpass == $passwprdok){
		$_SESSION['login'] = TRUE;
		$_SESSION['Usuario'] = $usuario;
		header("location:principal.php");
	}
	else{
		$mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
		<strong>Error tus datos no fueron encontrados</strong>verifica tus datos.
		<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
	  </div>";
	}
}
else{
	$mensaje .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
		<strong>Error tus datos no fueron encontrados</strong>verifica tus datos.
		<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
	  </div>";
}

$servidor= "localhost";
$usuario = "root";
$password = "";
$base = "Informatica";
$conecta= mysqli_connect($servidor,$usuario,$password,$base);
if ($conecta->connect_error) {
die('Error al conecta la Base de datos '. $conecta->connect_error);
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/preloader.css"> <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>  
    <title>Login</title>
</head>


<body>

	<div class="container py-4">
	 <div class="row justify-content-center h-100 py-4">
	   <div class="card col-sm-6 col-md-6 col-lg-6 shadow-lg p-3 mb-5 bg-white rounded">
	    <article class="card-body">
	     <h4 class="card-title text-center">Login al sistema</h4>
	     <hr>
	     <p class="text-success text-center">Coloca tus datos:</p>
	    <form action="<?php echo $SERVER['PHP_SELF']; ?></form> method="post">
	      <div class="form-grup">
	        <div class="input-group">
	         <input type="text" name="usuario" placeholder="Usuario" class="form-control">
	        </div>
	        <div class="input-group py-2">
	         <input type="password" name="pass" placeholder="Password" class="form-control">
	        </div>
	        <div class="input-group"> <input type="submit" name="entrar" value="Entrar" class="btn btn-sm btn-success btn-block">
	
	</form>
	</article>
	</div>
	</div>
	<?php echo $mensaje;?>
	</div>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/preloader.js"></script>
	<script src="js/main.js"></script>
	</body>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	</body>
	</html>