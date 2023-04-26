<?php

include_once "conexao.php";

$dados_requisicao = $_REQUEST;


$Exibir = $conn->prepare("SELECT id, nome, email, Telefone, profile_id FROM datatables");
$Exibir->execute();
$dados = [];
while ($row_usuario = $Exibir->fetch(PDO::FETCH_ASSOC)) {
    extract($row_usuario);
    $row_usuario['Ações'] = "<button type='button' id='$id' class='btn btn-outline-primary btn-sm' onclick='visualizar($id)'>Visualizar</button> <button type='button' id='$id' class='btn btn-outline-warning btn-sm' onclick='editUsuario($id)'>Editar</button> <button type='button' id='$id' class='btn btn-outline-danger btn-sm' onclick='apagarUsuario($id)'>Apagar</button>";
    $row_usuario['ID'] = $id;
    $row_usuario['Nome'] = $nome;
    $row_usuario['Email'] = $email;
    $row_usuario['Telefone'] = $Telefone;
    $row_usuario['Perfil'] = $profile_id;
    array_push($dados, $row_usuario);
}
$resultado = [
    "data" => $dados
];

echo json_encode($resultado);
