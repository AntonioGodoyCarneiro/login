<h1>Bem Vindo, Avangers!</h1>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php

// echo "Olá";

$dsn = 'mysql:dbname=db_login;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$select = "SELECT * FROM tb_usuario";

$resultado = $banco->query($select)->fetchAll();

// echo '<pre>'; //pre serve para organizar 
// var_dump($resultado); //ele faz um debug das informações
?>

<main class="container my-5">
    <table class="table table-striped">
        
        <tr>
            <td>    ID  </td>
            <td>    Avanger  </td>
            <td class="text-center">    AçÃO</td>
        </tr>

        <?php foreach($resultado as $linha) {?> <!-- AS significa -->
            <tr>
                <td>  <?=$linha['id'] ?> </td>
                <td>  <?php echo $linha['usuario'] ?> </td>
                <td class="text-center">
                    <a class="btn btn-primary" href="ficha.php?id_pessoa=<?=$linha['id'] ?>">Abrir</a>
                    <a class="btn btn-warning" href="formularioEditar.php?id_pessoa_alterar=<?=$linha['id'] ?>">Editar</a>
                    <a class="btn btn-danger" href="avangerDeletar.php?id=<?=$linha['id'] ?>">Excluir</a>
                                                <!-- caminho arquivo ? variável-->
                </td>
            </tr>
        <?php } ?>
    </table>
</main>
