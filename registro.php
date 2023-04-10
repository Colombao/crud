
<?php


include 'conexao.php';


// $nome = $_POST['nome'];
// $salario = 1000;
// $idade = 10;
// $usuario = $_POST['usuario'];
// $email = $_POST['email'];
// $senha = md5($_POST['senha']);
// $cpf = $_POST['cpf'];
// $cep = $_POST['cep'];
// $rua = $_POST['rua'];
// $numero = $_POST['Numero'];
// $telefone = $_POST['Telefone'];
// $bairro = $_POST['Bairro'];
// $complemento = $_POST['complemento'];
// $nascimento = $_POST['nascimento'];
extract($_POST);
$senha = md5($_POST['senha']);
$stmt =  $conn->prepare("INSERT INTO datatables (nome,login,email, senha, Cpf, Cep, Rua, Numero, Telefone, Nascimento,Complemento) VALUES('$nome','$usuario','$email','$senha','$cpf','$cep','$rua','$Numero','$Telefone','$nascimento','$complemento')");
$stmt->execute();
if ($stmt->rowCount()) {
    echo 'Salvo com sucesso!';
} else {
    echo 'Deu pau';
}
// $validar = mysqli_query($link, $sql2);

// if ($validar) {
//     $dados = mysqli_fetch_array($validar);
//     if (isset($dados['email'])) {
//         $_SESSION['email'] = $dados['email'];
//         echo 'usuario existe';
//     }
// } else {
// 
?>
