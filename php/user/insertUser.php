<?php
    $name_user = $_POST['name'];
    $second_name = $_POST['second_name'];
    $bd = $_POST['date'];
    $email = $_POST['email'];
    $function = $_POST['function'];
    $sector = $_POST['sector'];
    $phone = $_POST['tel'];
    $ramal = $_POST['ramal'];
    $permission = $_POST['permission_user'];

    if($email != null)
    {
    require_once("../../connection/connection.php");
    $database = connection_db();

    $query = mysqli_query($database,"INSERT INTO users VALUES(null,\"$name_user\",\"$second_name\",\"$bd\",
    \"$function\",$sector,\"$phone\",\"$ramal\",\"$email\",\"202cb962ac59075b964b07152d234b70\",0,$permission);") or die("<body onLoad=\"alert('Erro contate o programador!')\"");
   
    echo "<body onLoad=\"alert('Usuário cadastrado com sucesso!');window.location='../../pages/users_dados_admin.php'\">";
    }
    else{}
?>