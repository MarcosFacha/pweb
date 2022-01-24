<?php
include('ligaBD.php');
	liga();
	
	$query = "SELECT id_comida, left(descricao,20) 'descricao', quantidade, imagem, restaurante, morada FROM comida";
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
				<p><a href="visualizarProduto.php?idprod=<?php echo $row['id_comida'];?>"><img id="imgProduto" src="<?php echo $row['imagem'];?>"></a></p>
				</center>
				<div class="info">					
					<p id="descricao"><?php echo $row['descricao']; ?></p>
					<p id="qtd"><?php echo 'Quantidade: '.$row['quantidade'].'&nbsp;&nbsp;&nbsp;';?></p>
					<p id="idProd"><?php echo 'ID Produto '.$row['id_comida'];?></p>	
				</div>		
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
           <button  id="topo"><img onClick="slideTopo()" src="../imagens/icons/arrow-up-circle-fill.svg"></button> 
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
		height: 15%;
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
	#imgProduto:hover{
		filter: sepia(100%) hue-rotate(190deg) saturate(350%)  blur(2px);
	}
	.info{
		text-align: left;
		font-size: 120%;
	}
	#descricao{
		font-size: 30px;
		margin-bottom: 5px;
	}
	#idProd{
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