<?php

include "conexao.php";


session_start();
extract($_GET);
extract($_SESSION);


$salvar = $conn->prepare("UPDATE perfil SET perfil='$perfil' WHERE id_perfil=$id_perfil");
$salvar->execute();


if ($salvar->rowCount()) {
    echo json_encode(['data' => 'usuario editado com sucesso']);
} else {
    echo json_encode(['data' => 'deu ruim']);
}
