<?php
    include "conexao.php";
    $nome = $_POST['nome'];
    $senha = $_POST['password'];
    $sql = "INSERT INTO users (usern, password) VALUES ('$nome', '$senha')";
    mysqli_query($conn,$sql) or die(error());
    $response = array("success" => true);
    echo json_encode($response);
?>