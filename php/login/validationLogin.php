<?php

    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_criptografy = md5($password); 

    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {

        require_once("../../connection/connection.php");
        $database = connection_db();
        $date = date("Y-m-d");
        $hour = date("H:i:s");
        $data = "";
        $id_user = "";

        $query = mysqli_query($database,"SELECT * FROM users WHERE email_user=\"$email\" AND password_user=\"$password_criptografy\"");
        if(mysqli_fetch_assoc($query) == null)
        {

            echo "<body onLoad=\"alert('Usuário não cadastrado!');window.location='../../pages/login.php'\">";
            

        }
        else
        {
            echo "<body onLoad=\"window.location='../../pages/index.php'\">";
            $query2 = mysqli_query($database,"SELECT * FROM users WHERE email_user=\"$email\" AND password_user=\"$password_criptografy\"");
            while($row = mysqli_fetch_assoc($query2))
            {
            $data = array('Select'=>$row);
            }
            $json = json_encode($data);
            $obj = json_decode($json,true);
            foreach($obj as $id)
            {
            $id_user = $id['id_user'];
            }
            session_start();
            $_SESSION["id"] = $id_user;
            $_SESSION["name"] = $id['name_user']." ".$id['second_name_user']; 
            $_SESSION["permission"] = $id['permission_user'];
            mysqli_query($database,"INSERT INTO logs_users VALUES(null,$id_user,'$hour','$date');");
        }
        

    }
    else{

    }

?>