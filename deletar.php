<?php
    include "conexao.php";
    $id = $_POST['id'];
    $senha = $_POST['password'];
    $sql = "DELETE FROM users WHERE id = " . $_POST['id'];
    mysqli_query($conn,$sql) or die(error());
    $response = array("success" => true);
    echo json_encode($response);
?>