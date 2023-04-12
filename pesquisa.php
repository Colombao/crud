<?php

include_once "conexao.php";

$dados_requisicao = $_REQUEST;

$colunas = [
    0 => 'id',
    1 => 'nome',
    2 => 'email',
    3 => 'Telefone'
];

$query_qnt_usuarios = "SELECT COUNT (id) as qnt_usuarios FROM datatables";

if (!empty($dados_requisicao['search']['value'])) {
    $query_qnt_usuarios .= " WHERE id LIKE :id ";
    $query_qnt_usuarios .= " OR nome LIKE :nome ";
    $query_qnt_usuarios .= " OR email LIKE :email ";
    $query_qnt_usuarios .= " OR Telefone LIKE :Telefone ";
}
$result_qnt_usuarios = $conn->prepare($query_qnt_usuarios);

if (!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_qnt_usuarios->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':email', $valor_pesq, PDO::PARAM_STR);
    $result_qnt_usuarios->bindParam(':Telefone', $valor_pesq, PDO::PARAM_STR);
}

$result_qnt_usuarios->execute();
$row_qnt_usuarios = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC);

$query_usuarios = "SELECT id, nome, email, Telefone FROM datatables";

if (!empty($dados_requisicao['search']['value'])) {
    $query_usuarios .= " WHERE id LIKE :id ";
    $query_usuarios .= " OR nome LIKE :nome ";
    $query_usuarios .= " OR email LIKE :email ";
    $query_usuarios .= " OR Telefone LIKE :Telefone ";
}
$query_usuarios .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";

$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$result_usuarios->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);

if (!empty($dados_requisicao['search']['value'])) {
    $valor_pesq = "%" . $dados_requisicao['search']['value'] . "%";
    $result_usuarios->bindParam(':id', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':nome', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':email', $valor_pesq, PDO::PARAM_STR);
    $result_usuarios->bindParam(':Telefone', $valor_pesq, PDO::PARAM_STR);
}

$result_usuarios->execute();
$dados = [];
while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    extract($row_usuario);
    $registro = [];
    $registro[] = "<button type='button' id='$id' class='btn btn-outline-primary btn-sm' onclick='visualizar($id)'>Visualizar</button> <button type='button' id='$id' class='btn btn-outline-warning btn-sm' onclick='editUsuario($id)'>Editar</button> <button type='button' id='$id' class='btn btn-outline-danger btn-sm' onclick='apagarUsuario($id)'>Apagar</button>";
    $registro[] = $id;
    $registro[] = $nome;
    $registro[] = $email;
    $registro[] = $Telefone;
    $dados[] = $registro;
}
$resultado = [
    "data" => $dados
];

echo json_encode($resultado);
