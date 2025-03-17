<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Pessoa</title>
</head>

<body>
    <style>
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            width: 600px;
        }
    </style>

    <main class="container text-center my-5">
        <h2>Editar Pessoa</h2>
        <br>

        <?php
        // Conexão com o banco de $cadastrarPessoa
        $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $banco = new PDO($dsn, $user, $password);

        // Obtém o id_pessoa da URL
        $id_pessoa_alterar = $_GET['id_pessoa_alterar']; 

        // Consulta SQL para buscar os $cadastrarPessoa da pessoa e do usuário
        $select = "SELECT tb_pessoa.*, tb_usuario.usuario, tb_usuario.senha 
                   FROM tb_usuario 
                   INNER JOIN tb_pessoa ON tb_usuario.id_pessoa = tb_pessoa.id 
                   WHERE tb_usuario.id_pessoa = $id_pessoa_alterar";

        // Executa a consulta
        $cadastrarPessoa = $banco->query($select)->fetch();
        ?>

        <form action="enviarEditado.php" method="POST">
            <input type="hidden" name="id" value="<?= $cadastrarPessoa['id'] ?>">

            <!-- Campos da tabela tb_pessoa -->
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" value="<?= $cadastrarPessoa['nome'] ?>" disabled>

            <div class="row mt-2">
                <div class="col">
                    <label for="telefone_1">Telefone 1:</label>
                    <input type="text" class="form-control" name="tel1" value="<?= $cadastrarPessoa['telefone_1'] ?>">
                </div>
                <div class="col">
                    <label for="telefone_2">Telefone 2:</label>
                    <input type="text" class="form-control" name="tel2" value="<?= $cadastrarPessoa['telefone_2'] ?>">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label for="logradouro">Logradouro:</label>
                    <input type="text" class="form-control" name="rua" value="<?= $cadastrarPessoa['logradouro'] ?>">
                </div>
                <div class="col">
                    <label for="n_casa">Número:</label>
                    <input type="number" class="form-control" name="n_casa" value="<?= $cadastrarPessoa['n_casa'] ?>">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label for="bairro">Bairro:</label>
                    <input type="text" class="form-control" name="bairro" value="<?= $cadastrarPessoa['bairro'] ?>">
                </div>
                <div class="col">
                    <label for="cidade">Cidade:</label>
                    <input type="text" class="form-control" name="cidade" value="<?= $cadastrarPessoa['cidade'] ?>">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" name="cpf" value="<?= $cadastrarPessoa['cpf'] ?>" disabled>
                </div>
                <div class="col">
                    <label for="ano_nascimento">Ano de Nascimento:</label>
                    <input type="number" class="form-control" name="ano_nascimento" value="<?= $cadastrarPessoa['ano_nascimento'] ?>" disabled>
                </div>
            </div>

            <!-- Campos da tabela tb_usuario -->
            <div class="row mt-2">
                <div class="col">
                    <label for="usuario">Usuário:</label>
                    <input type="text" class="form-control" name="usuario" value="<?= $cadastrarPessoa['usuario'] ?>" disabled>
                </div>
                <div class="col">
                    <label for="senha">Senha:</label>
                    <input type="text" class="form-control" name="senha" value="<?= $cadastrarPessoa['senha'] ?>">
                </div>
            </div>

            <input type="submit" class="btn btn-success mt-3" value="Salvar Alterações">
        </form>
    </main>
</body>

</html>