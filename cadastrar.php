<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['nome'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"];
} elseif (empty($dados['salario'])) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo salario!</div>"];
} elseif (empty($dados['nascimento']) and $dados > 0) {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nascimento ou idade invalida</div>"];
} else {
    $query_usuario = "INSERT INTO datatables (nome, salario, nascimento) VALUES (:nome, :salario, :nascimento)";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':nome', $dados['nome']);
    $cad_usuario->bindParam(':salario', $dados['salario']);
    $cad_usuario->bindParam(':nascimento', $dados['nascimento']);
    $cad_usuario->execute();

    if ($cad_usuario->rowCount()) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-succes' role='alert'>Usuario cadastrado com sucesso</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso!</div>"];
    }
}
echo json_encode($retorna);
