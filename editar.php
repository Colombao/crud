<?php

include_once "conexao.php";

include "Classes.php";

$usuario = new Usuario();

$usuario->editar($conn);

// $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// if (empty($dados['id'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais tarde!</div>"];
// } elseif (empty($dados['nome'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
// } elseif (empty($dados['email'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo email!</div>"];
// } elseif (empty($dados['Telefone'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo idade!</div>"];
// } elseif (empty($dados['Cpf'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Cpf!</div>"];
// } elseif (empty($dados['Cep'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Cep!</div>"];
// } elseif (empty($dados['Rua'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Rua!</div>"];
// } elseif (empty($dados['Numero'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Numero!</div>"];
// } elseif (empty($dados['Nascimento'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Nascimento!</div>"];
// } elseif (empty($dados['Bairro'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Bairro!</div>"];
// } elseif (empty($dados['profile_id'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessario selecionar um perfil!</div>"];
// } else {
//     $query_usuario = "UPDATE datatables SET nome=:nome, email=:email, Telefone=:Telefone, Cpf=:Cpf, Cep=:Cep, Rua=:Rua, Bairro=:Bairro, Nascimento=:Nascimento, complemento=:complemento, Numero=:Numero, profile_id=:profile_id WHERE id=:id;";
//     $edit_usuario = $conn->prepare($query_usuario);
//     $edit_usuario->bindParam(':nome', $dados['nome']);
//     $edit_usuario->bindParam(':email', $dados['email']);
//     $edit_usuario->bindParam(':Telefone', $dados['Telefone']);
//     $edit_usuario->bindParam(':Cpf', $dados['Cpf']);
//     $edit_usuario->bindParam(':Cep', $dados['Cep']);
//     $edit_usuario->bindParam(':Rua', $dados['Rua']);
//     $edit_usuario->bindParam(':Bairro', $dados['Bairro']);
//     $edit_usuario->bindParam(':Nascimento', $dados['Nascimento']);
//     $edit_usuario->bindParam(':complemento', $dados['complemento']);
//     $edit_usuario->bindParam(':Numero', $dados['Numero']);
//     $edit_usuario->bindParam(':id', $dados['id']);
//     $edit_usuario->bindParam(':profile_id', $dados['profile_id']);

//     if ($edit_usuario->execute()) {
//         $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
//     } else {
//         $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não editado com sucesso!</div>"];
//     }
// }

// echo json_encode($retorna);
