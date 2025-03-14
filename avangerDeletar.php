<?php

echo '<h1>Aluno Deletar.php</h1>';

$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$idFormulario = $_GET['id'];

$delete = 'DELETE FROM tb_pessoa  WHERE id = :id';
$box = $banco->prepare($delete);
$box->execute([
    ':id' => $idFormulario
]);


$delete = 'DELETE FROM tb_usuario WHERE id_pessoa = :id_pessoa'; //o primeiro id_alunos é o campo do banco, o segundo id_alunos é uma variável
$box = $banco->prepare($delete);
$box->execute([
    ':id_pessoa' => $idFormulario
    //esse id_alunos é a variável da linha 20
]);

echo '<script>
    alert("Usuário apagado com sucesso!")
    window.location.replace("loginSucesso.php")
</script>';

// header("location:index.php"); comando em PHP para fazer voltar em uma página em específica. 
