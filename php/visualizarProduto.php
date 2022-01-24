<?php
session_start();
include('ligaBD.php');
	liga();
    $id = $_GET["idprod"];
    
    $query = "SELECT id_comida, left(descricao,20) 'descricao', quantidade, imagem, restaurante, morada FROM comida where $id = id_comida";
	$result = mysqli_query($_SESSION['liga'], $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../imagens/logo.png">
    <title>FOOD SHARING</title>
</head>
<body>
    <header id="menuHeader">
        <div id="titulo" class="row">
            <img id="logo" src="../imagens/logo.png"><a id="site">FOOD SHARING</a>
        </div>
        <div id="options">
            <input type="checkbox" name="" id="">
            <nav id="nav">
                <a id="opt" href="../php/sobras.php"><img id="icons" src="../imagens/icons/house.svg">Home</a>
                <a id="opt" href="../php/reservas.php"><img id="icons" src="../imagens/icons/cart3.svg">Reservas</a>
                <a id="sair" href="../php/terminarSessao.php"><img id="icons" src="../imagens/icons/box-arrow-left.svg">Sair</a>
            </nav> 
        </div>
    </header>
    <main>
    <center>
			<?php
				if (mysqli_num_rows($result)>0) {
					while($row = mysqli_fetch_assoc($result)){
			?>
			<div id="contentor">
				<center>
				<p><img id="imgProduto" src="<?php echo $row['imagem'];?>"></p>
				</center>
				<div class="info">					
					<p id="descricao"><?php echo $row['descricao']; ?></p>
					<p id="qtd"><?php echo 'Quantidade: '.$row['quantidade'].'&nbsp;&nbsp;&nbsp;';?></p>	
				</div>
                <form method="POST">
                    <input type="submit" name="submit" value="RESERVAR">
                </form>
                <p id="idProd"><?php echo 'ID Produto '.$row['id_comida'];?></p>	
			</div>
			<?php 
						}
					}
			?>
		</center>
    </main>
    <footer>
        <div>
           <p>&copy;Trabalho realizado por: Marcos Facha e Rodrigo Mendes</p>
        </div>
    </footer>
</body>
</html>
<style>
    header{
		background-image: linear-gradient(rgb(58, 121, 216), rgb(27, 53, 92));
  		color: white;
  		height: 60px;
	}
    #contentor{
		width: 45%;
		height: 95%;
		background-color: rgba(255, 255, 255, 0.426);
		padding: 20px;
		border-radius: 15px;
	}
	#imgProduto{
		width: 100%;
		border-radius: 15px;
		margin-bottom: 20px;
	}
    .info{
		text-align: left;
		font-size: 100%;
	}
    #descricao{
		font-size: 20px;
		margin-bottom: 5px;
	}
	#idProd{
		visibility: hidden;
	}
    input[type="submit"] {
        width: 80px;
        height: 25px;
        border: none;
        background-image: linear-gradient(rgb(58, 121, 216), rgb(27, 53, 92));
        padding-top: 5px;
        color: white;
        border-radius: 5px;
        font-family: "Josefin Sans", sans-serif;
        cursor: pointer;
        margin-top: 10px;
        padding: 5px;
    }
    input[type="submit"]:hover {
        background: rgb(58, 121, 216);
    }
    footer{
        background-image: linear-gradient(rgb(58, 121, 216), rgb(27, 53, 92));
        padding: 10px;
        color: white;
        position: absolute;
        bottom: 0;
        font-size: 80%;
        width: 100%;
        height: 40px;
    }
</style> 
<?php
$liga = mysqli_connect($servername,$login,$pass,$bd);

if($liga === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['submit']) && $_POST['submit'] !== ""){
$sql = "INSERT INTO reserva (user_idUtilizador, comida_idComida) VALUES ('".$_SESSION['id_utilizador']."', '$id')";

if(mysqli_query($liga, $sql)){
    echo "<script>alert('Reserva efetuada com sucesso!');</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($liga);
}
mysqli_close($liga);
}
?>