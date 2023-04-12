
<?php


include 'conexao.php';



extract($_POST);
$senha = md5($_POST['senha']);

$stmt =  $conn->prepare("INSERT INTO datatables (nome,Login,email, Senha, Cpf, Cep, Rua, Numero, Telefone, Nascimento,Complemento) VALUES('$nome','$usuario','$email','$senha','$cpf','$cep','$rua','$Numero','$Telefone','$nascimento','$complemento')");
$stmt->execute();
if ($stmt->rowCount()) {
    echo 'Salvo com sucesso!';
} else {
    echo 'Algo não ocorreu como o esperado tente alterar o email/cpf/login pois podem estar em uso por outra pessoa.';
}
