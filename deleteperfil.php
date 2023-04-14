<?php

include "conexao.php";


session_start();
extract($_POST);
extract($_SESSION);

$dono = $conn->prepare("SELECT * FROM perfil WHERE datatables_id = $id AND id=$id_perfil");
$dono->execute();
if (!$dono->rowCount()) {
    echo 'Não é o dono';
    echo "SELECT * FROM perfil WHERE datatables_id = $id AND id=$id_perfil";
    die();
}
$deletar = $conn->prepare("DELETE * FROM perfil WHERE id=$id_perfil");
$deletar->execute();

if ($deletar->rowCount()) {
    echo 'deu boa';
} else {
    echo 'deu ruim';
}
