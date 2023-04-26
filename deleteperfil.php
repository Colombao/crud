<?php

include "conexao.php";


session_start();
extract($_POST);
extract($_SESSION);


$select = $conn->prepare("SELECT * FROM perfil WHERE id_perfil=$id_perfil ");
$select->execute();
$dadosSelect = $select->fetch(PDO::FETCH_ASSOC);
$nome = $dadosSelect['perfil'];
$update = $conn->prepare("UPDATE datatables SET profile_id = null WHERE profile_id='$nome'");
$update->execute();
$deletar = $conn->prepare("DELETE FROM perfil WHERE id_perfil=$id_perfil");
$deletar->execute();
if ($deletar->rowCount()) {
    echo 'Usuario apagado com sucesso';
} else {
    echo 'deu ruim';
}
