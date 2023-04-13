<?php

session_start();

include_once "conexao.php";

extract($_POST);
$senha = md5($_POST['senha']);
$login = $conn->prepare("SELECT * FROM datatables where Login = '$usuario' AND Senha = '$senha' ");

$login->execute();
if ($login->rowCount()) {

    $result = $login->fetch(PDO::FETCH_ASSOC);

    $_SESSION['login'] = $result['Login'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['id'] = $result['id'];
    echo 'usuario existe';
} else {
    echo 'Erro bd';
}
