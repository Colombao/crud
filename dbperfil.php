<?php

include "conexao.php";

$sql = "SELECT * FROM perfil";
$stmt = $conn->query($sql);

$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $row["perfil"] = "<p id='nome_perfil_$id_perfil'>$perfil</p>";
    $row["acoes"] = "<button class='editar btn btn-outline-warning' onclick='editarperfil($id_perfil)'>Editar</button> <button id='excluir' class='excluir btn btn-outline-danger' onclick='deletarperfil($id_perfil)'>Excluir</button> <button data-bs-toggle='modal' data-bs-target='#atribuirForm' id='atribuirbtn' class='atribuir btn btn-outline-warning' onclick='atribuirPerfil($id_perfil)')>Atribuir</button>";
    $data[] = $row;
}

echo json_encode(array("data" => $data));
