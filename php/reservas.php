<?php
include('ligaBD.php');
	liga();

	$query = "SELECT id_comida, left(descricao,20) 'descricao', quantidade, imagem, restaurante, morada FROM comida WHERE id_comida = comida_idComida";
	$result = mysqli_query($_SESSION['liga'], $query);
    $query2 = "SELECT * FROM reserva WHERE user_idUtilizador = ".$_SESSION['id_utilizador']."";
    $result2 = mysqli_query($_SESSION['liga'], $query2);
    $query3 = "SELECT descricao, quantidade, imagem, restaurante, morada, id_reserva, nome
                FROM reserva INNER JOIN comida
                ON reserva.comida_idComida = comida.id_comida
                INNER JOIN utilizador
                ON reserva.user_idUtilizador = utilizador.id_utilizador
                WHERE user_idUtilizador = ".$_SESSION['id_utilizador']."";
    $result3 = mysqli_query($_SESSION['liga'], $query3);
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
			if (mysqli_num_rows($result3)>0) {
				while($row = mysqli_fetch_assoc($result3)){
		?>    
        <div id="contentor">
            <p><a><img id="imgProduto" src="<?php echo $row['imagem'];?>"></a></p>
            <div class="info">
                <p><?php echo 'Nome: '.$row['nome'];?></p>
                <p><?php echo 'Descrição: '.$row['descricao'];?></p>
                <p><?php echo 'Quantidade: '.$row['quantidade'];?></p>
                <p><?php echo 'Estabelecimento: '.$row['restaurante']; ?></p>
                <p><?php echo 'Morada: '.$row['morada']; ?></p>
            </div>
			 <p id="idReserva"><?php echo 'ID Reserva '.$row['id_reserva'];?></p>
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
           <button id="topo"><img onClick="slideTopo()"  src="../imagens/icons/arrow-up-circle-fill.svg"></button> 
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
		width: 50%;
		height: 46%;
		background-color: rgba(255, 255, 255, 0.426);
        margin-top: 30px;
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
		font-size: 120%;
	}
    #idReserva{
		visibility: hidden;
	}
    footer{
        background-image: linear-gradient(rgb(58, 121, 216), rgb(27, 53, 92));
        padding: 10px;
        color: white;
        position: relative;
        bottom: 0;
        font-size: 80%;
        width: 100%;
        height: 50px;
    }
</style>
<script>
    function slideTopo(){
		document.body.scrollTo({
			top: 0,
        	behavior: "smooth"
		});
  		document.documentElement.scrollTop = 0;
	}
</script>