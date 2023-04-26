<?php
session_start();

include_once "conexao.php";

extract($_POST);
extract($_SESSION);
$stmt =  $conn->prepare("INSERT INTO perfil (perfil) VALUES('$perfil')");
$stmt->execute();




if ($stmt->rowCount()) {
    echo 'Salvo com sucesso!';
} else {
}
