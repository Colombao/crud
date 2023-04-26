<?php

include "conexao.php";

extract($_POST);
$atribuir = $conn->prepare("UPDATE datatables SET profile_id = '$perfil' WHERE id = '$perfilId'");
try {
    $atribuir->execute();
    if ($atribuir->rowCount()) {
        echo 'Usuario atribuido com sucesso';
    } else {
        echo 'deu ruim';
        echo '</br>';
    }
} catch (PDOException $e) {
    $e->getMessage();
};
