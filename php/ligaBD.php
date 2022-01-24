<?php
$servername = "localhost";
$login = "root";
$pass = "";
$bd = "trabalhoweb";

$liga = mysqli_connect($servername,$login,$pass,$bd);
if($liga){
	echo "<script>alert('Ligação estabelecida')</script>";
}
else{
	echo "<script>alert('A ligação não estabelecida'".mysqli_connect_error()."')</script>";
    echo "Erro ->".mysqli_connect_error();
}

function liga(){
	$servername = "localhost";
	$login = "root";
	$pass = "";
	$bd = "trabalhoweb"; 

	$ligacao = mysqli_connect($servername,$login,$pass,$bd);
	mysqli_query($ligacao,"SET CHARACTER SET 'utf8'");
	if(!$ligacao){
		die("Erro de ligação" . mysqli_connect_error());
	}
	else{
		session_start();
		$_SESSION['liga'] = $ligacao;
	}
}
?>