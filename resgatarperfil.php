<?php

include "conexao.php";

extract($_GET);

$recebe = $conn->prepare("SELECT * FROM perfil WHERE id= $id");
$recebe->execute();

if ($retorno = $recebe->fetch(PDO::FETCH_ASSOC)) {
    echo json_encode($retorno);
}
