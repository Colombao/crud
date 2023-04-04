<?php

session_start();

require_once('db.php');

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);


$sql = "SELECT * FROM usuarios where login = '$usuario' AND senha = '$senha' ";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

if ($resultado_id) {
    $dados = mysqli_fetch_array($resultado_id);
    if (isset($dados['login'])) {

        $_SESSION['login'] = $dados['login'];
        $_SESSION['email'] = $dados['email'];
        echo 'usuario existe';
    } else {
    }
} else {
    echo 'Erro bd';
}
