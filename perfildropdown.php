<?php

include "conexao.php";

$stmt = $conn->prepare("SELECT perfil FROM perfil");
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($resultado);
