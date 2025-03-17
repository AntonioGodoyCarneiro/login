<?php

//Para puxar informação da URL, que nesse caso é o id_aluno
$id_pessoa = $_GET['id_pessoa'];


$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$select = "SELECT * FROM tb_pessoa INNER JOIN tb_usuario ON tb_usuario.id_pessoa = tb_pessoa.id WHERE tb_pessoa.id= " . $id_pessoa;


$cadastrarPessoa = $banco->query($select)->fetch();

// echo '<pre>'; //Para organizar o var_dump
// var_dump($dados);


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<style>
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form {
        width: 600px;
    }

    img {
        width: 200px;
        object-fit: cover;
    }
</style>

<main class="container text-center my-5">

    

<form action="./cadastrarNovo.php" method="POST">

<label for="nome">Nome:</label class="form-control">
<input type="text"   value="<?= $cadastrarPessoa['nome'] ?>" disabled class="form-control" name="nome" >

<label for="usuario">Usuario:</label class="form-control">
<input type="text"  value="<?= $cadastrarPessoa['usuario'] ?>" disabled class="form-control" name="usuario">

<div class="row mt-2 ">

    <div class="col">
        <label for="telefone">Ano Nascimento:</label>
        <input type="number" value="<?= $cadastrarPessoa['ano_nascimento'] ?>" disabled  class="form-control" name="ano_nasc">
    </div>

    <div class="col">
        <label for="cpf">cpf:</label>
        <input type="number" value="<?= $cadastrarPessoa['cpf'] ?>" disabled  class="form-control" name="cpf">
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <label for="telefone_1">telefone_1:</label>
        <input type="number"  value="<?= $cadastrarPessoa['telefone_1'] ?>" disabled class="form-control" name="tel1">
    </div>

    <div class="col">
        <label for="telefone_2">telefone_2:</label>
        <input type="number"  value="<?= $cadastrarPessoa['telefone_2'] ?>" disabled class="form-control" name="tel2">
    </div>

    <div class="col">
        <label for="logradouro">logradouro:</label>
        <input type="text" value="<?= $cadastrarPessoa['logradouro'] ?>" disabled  class="form-control" name="rua">
    </div>

</div>

<div class="row mt-2">
    <div class="col">
        <label for="n_casa">N° :</label>
        <input type="number"  value="<?= $cadastrarPessoa['n_casa'] ?>" disabled  class="form-control" name="n_casa">
    </div>
    <div class="col">
        <label for="bairro">Bairro:</label>
        <input type="text"  value="<?= $cadastrarPessoa['bairro'] ?>" disabled class="form-control" name="bairro">
    </div>
    <div class="col">
        <label for="cidade">Cidade:</label>
        <input type="text"  value="<?= $cadastrarPessoa['cidade'] ?>" disabled class="form-control" name="cidade">
    </div>
</div>
    <div class="col">
        <label for="senha">Senha:</label>
        <input type="text" value="<?= $cadastrarPessoa['senha'] ?>" disabled  class="form-control" name="senha">
    </div>
   
</div>

<input type="submit" class="btn btn-success mt-3" hidden >
<a class="btn btn-primary mt-3" href="loginSucesso.php">VOLTAR</a>
</form>
</main>