<?php
    $date = $_POST['date'];
    $dish1 = $_POST['dish1'];
    $dish2 = $_POST['dish2'];
    $dish3 = $_POST['dish3'];
    $garrison1 = $_POST['garrison1'];
    $garrison2 = $_POST['garrison2'];
    $option = $_POST['option'];
    $salad = $_POST['salad'];
    $dessert = $_POST['dessert'];

    if($date != null)
    {
    require_once("../../connection/connection.php");
    $database = connection_db();

    $query = mysqli_query($database,"INSERT INTO menu VALUES(null,\"$date\",\"$dish1\",\"$dish2\",
    \"$dish3\",\"$garrison1\",\"$garrison2\",\"$option\",\"$salad\",\"$dessert\");
    ") or die("<body onLoad=\"alert('Erro contate o programador!')\"");
   
    echo "<body onLoad=\"alert('Cardápio cadastrado com sucesso!');window.location='../../pages/menu_admin.php'\">";
    }
    else{
        
    }
        ?>