<?php


include_once "conexao.php";

$id = filter_input(INPUT_GET, "id_perfil", FILTER_SANITIZE_NUMBER_INT);


if (!empty($id)) {
    $query_usuario = "SELECT perfil FROM perfil WHERE id_perfil=:id_perfil LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':id_perfil', $id);
    $result_usuario->execute();

    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        $retorna = ['status' => true, 'dados' => $row_usuario];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div>"];
}
echo json_encode($retorna);
