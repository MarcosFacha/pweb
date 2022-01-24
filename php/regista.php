<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nif = $_POST['nif'];

include "ligaBD.php";
$query = "INSERT INTO utilizador(nome, email, senha, nif) VALUES('$nome','$email','$senha','$nif')";
if(mysqli_query($liga, $query)){
    echo "<script>alert('Registo realizado com sucesso')</script>";
}else{
    echo "<script>alert('Falha no registo'".mysqli_connect_error()."')</script>";
}
echo "<script>window.location = '../index.html'</script>";
mysqli_close($liga);
?>
