<?php
include_once "conexao.php";
include "Classes.php";

$usuario = new Usuario();

$usuario->deletar($conn);
// $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


// if (!empty($id)) {

//     $query_usuario = "DELETE FROM datatables WHERE id='$id'";
//     $result_usuario = $conn->prepare($query_usuario);
//     $erro = $result_usuario;

//     if ($result_usuario->execute()) {

//         $retorna = ['status' => true, 'msg' => "<div class ='alert alert-danger' role='alert'>Usuário apagado com sucesso</div>"];
//     } else {
//         $retorna = ['status' => false, 'msg' => "<div class ='alert alert-danger' role='alert'>Erro: Usuário não apagado com sucesso</div>"];
//     }
// } else {
//     $retorna = ['status' => false, 'msg' => "<div class ='alert alert-danger' role='alert'>Erro: Usuário não apagado com sucesso</div>"];
// }
// echo json_encode($retorna);
