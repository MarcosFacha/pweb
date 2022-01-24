<?php
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$query = "SELECT * FROM utilizador WHERE nome='$nome' AND senha='$senha'";
include 'ligaBD.php';

$dados = mysqli_query($liga,$query);
if(mysqli_num_rows($dados)>0){
    while($row = mysqli_fetch_assoc($dados)){
        session_start();
        $_SESSION['utilizador'] = $row['nome'];
        $_SESSION['id_utilizador'] = $row['id_utilizador'];
    }
}else{
    echo "<script>alert('Dados de Login inválidos');</script>";
}
if(isset($_SESSION['utilizador'])){
    echo "<script>window.location = '../php/sobras.php'</script>";
    
}else{
    echo "<script>window.location = '../index.html'</script>";
}
mysqli_close($liga);
?>