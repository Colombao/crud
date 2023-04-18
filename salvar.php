<?php

include "conexao.php";


session_start();
extract($_GET);
extract($_SESSION);

$dono = $conn->prepare("SELECT * FROM perfil WHERE datatables_id = $id AND id=$id_perfil");
$dono->execute();
if (!$dono->rowCount()) {
    echo json_encode(['data' => 'Não é o dono']);
    die();
}

$salvar = $conn->prepare("UPDATE perfil SET perfil='$perfil' WHERE id=$id_perfil");
$salvar->execute();


if ($salvar->rowCount()) {
    echo json_encode(['data' => 'usuario editado com sucesso']);
} else {
    echo json_encode(['data' => 'deu ruim']);
}
