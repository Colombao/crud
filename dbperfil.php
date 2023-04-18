<?php

include "conexao.php";

$sql = "SELECT * FROM perfil";
$stmt = $conn->query($sql);

$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $row["perfil"] = "<p id='nome_perfil_$id'>$perfil</p>";
    $row["acoes"] = "<button class='editar btn btn-outline-warning' onclick='editarperfil($id)'>Editar</button> <button id='excluir' class='excluir btn btn-outline-danger' onclick='deletarperfil($id)'>Excluir</button>";
    $data[] = $row;
}

echo json_encode(array("data" => $data));
