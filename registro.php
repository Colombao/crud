
<?php



require_once('db.php');


$name = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "insert into usuarios (login,email,senha) values('$name','$email','$senha')";

$response = mysqli_query($link, $sql);

if ($response) {
    echo 'sucess';
}
?>
