<?php


$nomeForm = $_POST['nome'];
$anoNascForm = $_POST['ano_nasc'];
$cpfForm = $_POST['cpf'];
$tel1Form = $_POST['tel1'];
$tel2Form = $_POST['tel2'];
$ruaForm = $_POST['rua'];
$n_casaForm = $_POST['n_casa'];
$bairroForm = $_POST['bairro'];
$cidadeForm = $_POST['cidade'];



$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$cadastrarPessoa='INSERT INTO tb_pessoa (nome, ano_nascimento, cpf, telefone_1, telefone_2, logradouro, n_casa, bairro, cidade) VALUE (:nome, :ano_nascimento, :cpf, :telefone_1, :telefone_2, :logradouro, :n_casa, :bairro, :cidade)';

$box = $banco->prepare($cadastrarPessoa);

$box->execute([
    ':nome' => $nomeForm,
    ':ano_nascimento' => $anoNascForm,
    ':cpf'=> $cpfForm,
    ':telefone_1'=> $tel1Form,
    ':telefone_2'=> $tel2Form,
    ':logradouro'=> $ruaForm,
    ':n_casa'=> $n_casaForm,
    ':bairro'=> $bairroForm,
    ':cidade'=> $cidadeForm,

]);



$usuarioForm = $_POST ['usuario'];
$senhaForm = $_POST ['senha'];

$id_pessoa = $banco->lastInsertId();

$cadastrarPessoa='INSERT INTO tb_usuario (usuario, senha, id_pessoa) VALUE (:usuario, :senha, :id_pessoa)';

$box = $banco->prepare($cadastrarPessoa);

$box->execute([
    ':usuario' => $usuarioForm,
    ':senha' => $senhaForm,
    ':id_pessoa'=> $id_pessoa
]);

echo '<script>
    alert("Avangers Cadastrado com Sucesso!!!")
    window.location.replace("index.php")
</script>';