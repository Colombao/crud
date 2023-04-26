<?php

include "conexao.php";

extract($_GET);

$recebe = $conn->prepare("SELECT * FROM perfil WHERE id_perfil= $id_perfil");
$recebe->execute();

if ($retorno = $recebe->fetch(PDO::FETCH_ASSOC)) {
    echo json_encode($retorno);
}
