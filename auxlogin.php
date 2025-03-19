<?php


echo'<h1>Login</h1>';

$userForm=$_POST['user'];
$passwordForm=$_POST['password'];


$dsn='mysql:dbname=db_login;host=127.0.0.1';
$user='root';
$password='';




$banco=new PDO($dsn,$user,$password);


$consultarUsuarioSenha='SELECT * FROM tb_usuario where usuario ="'.$userForm .'" AND senha = "'. $passwordForm . '"';


$resultado =$banco ->query($consultarUsuarioSenha)->fetch();

$status = $resultado ['status'];
?>



<?php if ($status == 'adimim'){?>

    <h1> BEM VINDO, AVANGERS ADMIN</h1>

<?php } ?>




<h1> BEM VINDO, AVANGERS COMUM</h1>

<?php

die; 

if (!empty($resultado)&& $resultado != false){
    header('location:loginSucesso.php');
} else{
    
    echo'<script>
    alert("Senha ou Usuário errado!")
    window.location.replace("index.php")
</script>';
}

