<?php
    session_start();

    $password = $_POST['password'];
    $password2 = $_POST['passwordAgain'];

    $password_md5 = md5($password);
    $password2_md5 = md5($password2);
    if($password2_md5 == $password_md5)
    {
        require_once("../../connection/connection.php");
        $database = connection_db();

        $query = mysqli_query($database,"UPDATE users SET password_user=\"$password_md5\" WHERE id_user=".$_SESSION["id"].";") or die("<body onLoad=\"alert('Erro contate o programador!')\"");
        echo "<body onLoad=\"alert('Senha alterada com sucesso!');window.location='../../pages/index.php'\">";
            
    }
    else
    {
        echo "<body onLoad=\"alert('Senhas diferentes!');\">";
    }

?>