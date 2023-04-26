<?php

include_once "conexao.php";

include "Classes.php";

$usuario = new Usuario();

$usuario->cadastrar($conn);
// $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// if (empty($dados['nome'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
// } elseif (empty($dados['email'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo salario!</div>"];
// } elseif (empty($dados['Telefone'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Telefone </div>"];
// } elseif (empty($dados['Cpf'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Cpf</div>"];
// } elseif (empty($dados['Cep'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Cep</div>"];
// } elseif (empty($dados['Rua'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Rua</div>"];
// } elseif (empty($dados['Bairro'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Bairro</div>"];
// } elseif (empty($dados['Nascimento'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Nascimento</div>"];
// } elseif (empty($dados['complemento'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Complemento</div>"];
// } elseif (empty($dados['Numero'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Numero</div>"];
// } elseif (empty($dados['Login'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Login</div>"];
// } elseif (empty($dados['Senha'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Senha</div>"];
// } elseif (empty($dados['profile_id'])) {
//     $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário selecionar um perfil</div>"];
// } else {
//     $senha = md5($dados['Senha']);
//     $query_usuario = "INSERT INTO datatables (nome, email, Telefone, Cpf, Cep, Rua, Bairro, Nascimento, complemento, Numero, Login, Senha, profile_id) VALUES (:nome, :email, :Telefone, :Cpf, :Cep, :Rua, :Bairro, :Nascimento, :complemento, :Numero, :Login, :Senha, :profile_id)";
//     $cad_usuario = $conn->prepare($query_usuario);
//     $cad_usuario->bindParam(':nome', $dados['nome']);
//     $cad_usuario->bindParam(':email', $dados['email']);
//     $cad_usuario->bindParam(':Telefone', $dados['Telefone']);
//     $cad_usuario->bindParam(':Cpf', $dados['Cpf']);
//     $cad_usuario->bindParam(':Cep', $dados['Cep']);
//     $cad_usuario->bindParam(':Rua', $dados['Rua']);
//     $cad_usuario->bindParam(':Bairro', $dados['Bairro']);
//     $cad_usuario->bindParam(':Nascimento', $dados['Nascimento']);
//     $cad_usuario->bindParam(':complemento', $dados['complemento']);
//     $cad_usuario->bindParam(':Numero', $dados['Numero']);
//     $cad_usuario->bindParam(':Login', $dados['Login']);
//     $cad_usuario->bindParam(':Senha', $senha);
//     $cad_usuario->bindParam(':profile_id', $profile_id);
//     $cad_usuario->execute();

//     if ($cad_usuario->rowCount()) {
//         $retorna = ['status' => true, 'msg' => "<div class='alert alert-succes' role='alert'>Usuario cadastrado com sucesso</div>"];
//     } else {
//         $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Dados já existem!   </div>"];
//     }
// }
// echo json_encode($retorna);
