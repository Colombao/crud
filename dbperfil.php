<?php

include "conexao.php";

$sql = "SELECT id, datatables_id, perfil FROM perfil";
$stmt = $conn->query($sql);

$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $row["acoes"] = "<button class='editar btn btn-warning'>Editar</button> <button id='excluir' class='excluir btn btn-danger' onclick='deletarperfil($id)'>Excluir</button>";
    $data[] = $row;
}

echo json_encode(array("data" => $data));
